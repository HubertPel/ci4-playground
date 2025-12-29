<?php

namespace Verbum\Logger\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'logger_logs';
    protected $allowedFields = ['level','message','get','post','created_at'];
    protected $useTimestamps = false;
}
