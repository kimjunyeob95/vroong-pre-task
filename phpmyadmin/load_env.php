<?php

$envPath = '/var/www/api/.env';

// .env 파일을 열기
if (file_exists($envPath)) {
    // 파일의 각 줄을 배열로 읽기
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // 주석 무시

        // 키와 값 분리
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        // 환경 변수로 설정
        putenv("$name=$value");
    }
}