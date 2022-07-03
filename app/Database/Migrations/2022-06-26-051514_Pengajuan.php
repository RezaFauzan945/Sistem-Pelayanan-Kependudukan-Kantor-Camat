<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengajuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengajuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_masyarakat' =>[
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'ktp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pas_foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'surat_keterangan_dari_desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'akta_kelahiran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'tanggal_pengajuan' => [
                'type'       => 'DATE',
            ],
            'updated_at' => [
                'type'       => 'DATE',
            ],
        ]);
        $this->forge->addKey('id_pengajuan', true);
        $this->forge->createTable('pengajuan');
        $this->db->query('ALTER TABLE `pengajuan` ADD INDEX(`id_masyarakat`)');
        // $this->forge->addForeignKey('id_masyarakat');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan');
    }
}
