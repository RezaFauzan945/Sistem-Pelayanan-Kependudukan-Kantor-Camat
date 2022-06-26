<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masyarakat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_masyarakat' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'NIK' =>[
                'type'       => 'VARCHAR',
                'constraint' => '20'
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
        ]);
        $this->forge->addKey('id_masyarakat', true);
        $this->forge->createTable('masyarakat');
    }

    public function down()
    {
        $this->forge->dropTable('masyarakat');
    }
}
