<?php

namespace Verbum\Logger\Controllers;

use App\Controllers\BaseController;
use Verbum\Logger\Models\LogModel;

class LoggerAdmin extends BaseController
{
    public function index()
    {
        return view('Verbum\Logger\Views\admin\index', [
            'logs' => (new LogModel())->orderBy('id','DESC')->findAll(50),
        ]);
    }
}
