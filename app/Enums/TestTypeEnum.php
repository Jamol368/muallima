<?php

namespace App\Enums;

enum TestTypeEnum: int
{
    case TEST_TYPE_ATTESTATION = 1;
    case TEST_TYPE_CERTIFICATE = 2;
    case TEST_TYPE_TOPIC = 5;
}
