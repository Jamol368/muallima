<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportQuizzes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz:import
        {file : Path to txt file}
        {--test_type_id= : Test type ID}
        {--subject_id= : Subject ID}
        {--topic_id= : Topic ID}
        {--degree= : Degree}
        {--part= : Part}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import quizzes from txt file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error('File not found');
            return 1;
        }

        $questionTypeId = (int) $this->option('test_type_id');
        $subjectId      = (int) $this->option('subject_id');
        $degree         = (int) $this->option('degree');
        $part           = (int) $this->option('part');

        if (!$questionTypeId || !$subjectId) {
            $this->error('question_type_id and subject_id are required');
            return 1;
        }

        $content = file_get_contents($file);

        $blocks = preg_split('/\n(?=[1-9]\d*\.\s*[A-Z])/', $content, -1, PREG_SPLIT_NO_EMPTY);
        $blocks = preg_replace('/^\s*\d+\.\s*/', '', $blocks);
        array_shift($blocks);

        foreach ($blocks as $block) {
            $lines = array_values(array_filter(array_map('trim', explode("\n", $block))));

            $answersRaw = array_slice($lines, -4);

            $questionLines = array_slice($lines, 0, count($lines) - 4);

            $questionText = implode("\n", $questionLines);

            $answers = array_map(function ($line) {
                return preg_replace('/^[A-Da-d]\)\s*/', '', $line);
            }, $answersRaw);

            DB::transaction(function () use (
                $questionText,
                $answers,
                $questionTypeId,
                $subjectId,
                $degree,
                $part
            ) {
                $questionId = DB::table('tests')->insertGetId([
                    'question'         => $questionText,
                    'test_type_id'     => $questionTypeId,
                    'subject_id'       => $subjectId,
                    'degree'           => $degree,
                    'part'             => $part,
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);

                foreach ($answers as $index => $answer) {
                    DB::table('answers')->insert([
                        'test_id' => $questionId,
                        'option'        => $answer,
                        'is_true'     => $index === 0,
                        'created_at'  => now(),
                        'updated_at'  => now(),
                    ]);
                }
            });
        }

        $this->info('✅ Quizzes imported successfully');
    }
}
