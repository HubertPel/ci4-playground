<?php

namespace Verbum\Logger;

use Verbum\Logger\Models\LogModel;

class LoggerService
{
    public function log(string $message, string $level = 'info'): void
    {
        (new LogModel())->insert([
            'level' => $level,
            'message' => $message,
            'get' => json_encode($_GET ?? NULL),
            'post' => json_encode($_POST ?? NULL),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
