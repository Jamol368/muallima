<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Test;
use App\Models\TestType;
use App\Models\Subject;
use App\Models\Topic;
use PhpOffice\PhpWord\IOFactory;

class ImportTests extends Command
{
    protected $signature = 'import:test-questions
                            {file : Path to the DOCX file}
                            {--test_type_id= : Test type ID}
                            {--subject_id= : Subject ID}
                            {--topic_id= : Topic ID}';

    protected $description = 'Import test questions from DOCX file to database';

    public function handle()
    {
        $filePath = $this->argument('file');
        $testTypeId = $this->option('test_type_id');
        $subjectId = $this->option('subject_id');
        $topicId = $this->option('topic_id');

        $this->validateIds($testTypeId, $subjectId, $topicId);

        $phpWord = IOFactory::load($filePath);
        $content = $this->extractTextContent($phpWord);

        $questions = [];
        $lines = preg_split('/\r\n|\r|\n/', $content);
        $lines = array_filter($lines, fn($line) => trim($line) !== '');
        $lines = array_values($lines);
        $iMax = count($lines);

        for ($i = 0; $i < $iMax; $i += 5) {

            $questions[] = [
                'test_type_id' => $testTypeId,
                'subject_id' => $subjectId,
                'topic_id' => $topicId,
                'question' => trim($lines[$i]),
                'answers' => [
                    ['option' => trim($lines[$i + 1]), 'is_true' => true],
                    ['option' => trim($lines[$i + 2]), 'is_true' => false],
                    ['option' => trim($lines[$i + 3]), 'is_true' => false],
                    ['option' => trim($lines[$i + 4]), 'is_true' => false],
                ]
            ];
        }

        $this->saveQuestions($questions);
        $this->info(count($questions) . ' questions imported successfully!');
    }

    protected function validateIds($testTypeId, $subjectId, $topicId)
    {
        if (!TestType::find($testTypeId)) {
            $this->error("Test type with ID $testTypeId not found!");
            exit(1);
        }

        if (!Subject::find($subjectId)) {
            $this->error("Subject with ID $subjectId not found!");
            exit(1);
        }

        if (!Topic::find($topicId)) {
            $this->error("Topic with ID $topicId not found!");
            exit(1);
        }
    }

    protected function extractTextContent($phpWord)
    {
        $content = '';
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getElements')) {
                    foreach ($element->getElements() as $childElement) {
                        if (method_exists($childElement, 'getText')) {
                            $content .= $childElement->getText() . "\n";
                        }
                    }
                } elseif (method_exists($element, 'getText')) {
                    $content .= $element->getText() . "\n";
                }
            }
        }
        return $content;
    }

    protected function saveQuestions($questions)
    {
        foreach ($questions as $q) {
            $testQuestion = Test::create([
                'test_type_id' => $q['test_type_id'],
                'subject_id' => $q['subject_id'],
                'topic_id' => $q['topic_id'],
                'question' => $q['question'],
            ]);

            foreach ($q['answers'] as $answer) {
                $testQuestion->answers()->create([
                    'option' => $answer['option'],
                    'is_true' => $answer['is_true']
                ]);
            }
        }
    }
}
