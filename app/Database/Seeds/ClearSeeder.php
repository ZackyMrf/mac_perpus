<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClearSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('anggota')->truncate();
    }
}
