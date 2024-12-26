<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Faker\Factory;  

class AnggotaSeeder extends Seeder
{
    public function run()
    {

        $faker = Factory::create('id_ID');
        for ($i=0; $i < 100; $i++) { 
            $data = [

                'nama' => $faker->name,
                'alamat' => $faker->address,
                'nomor' => $faker->e164PhoneNumber
            ];
            
            $this->db->table('anggota')->insert($data);
        }

        
        // $data = [
        //     [
        //         'nama' => "Riyan",
        //         'alamat' => "Kandeman",
        //         'nomor' => '089513653977'
        //     ],
        //     [
        //         'nama' => "Budi",
        //         'alamat' => "budi",
        //         'nomor' => 'test'
        //     ],
        //     [
        //         'nama' => "Siti",
        //         'alamat' => "test",
        //         'nomor' => 'test'
        //     ],

        // ];

        // $this->db->query('INSERT INTO anggota(nama,alamat,anggota) VALUES(:nama:,:alamat:,:anggota:)');
        // $this->db->table('anggota')->insertBatch($data);
    }
}
