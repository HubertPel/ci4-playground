<?php

namespace Verbum\Logger\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGetPostColumnsToLoggerLogs extends Migration
{
    public function up()
    {
        // Bezpiecznie: dodajemy tylko jeśli nie istnieją
        if (! $this->db->fieldExists('get', 'logger_logs')) {
            $this->forge->addColumn('logger_logs', [
                'get' => [
                    'type' => 'TEXT',
                    'null' => true,
                    'after' => 'message',
                ],
            ]);
        }

        if (! $this->db->fieldExists('post', 'logger_logs')) {
            $this->forge->addColumn('logger_logs', [
                'post' => [
                    'type' => 'TEXT',
                    'null' => true,
                    'after' => 'get',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('post', 'logger_logs')) {
            $this->forge->dropColumn('logger_logs', 'post');
        }

        if ($this->db->fieldExists('get', 'logger_logs')) {
            $this->forge->dropColumn('logger_logs', 'get');
        }
    }
}
