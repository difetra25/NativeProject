<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PinSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'caption' => 'Parantritis Beach',
            'location'    => 'Jogja',
            'hashtag'    => 'jogja,beach',
            'upload'    => 'parangtritis.jpg'
        ];

        // Simple Queries
        $this->db->table('pins')->insert($data);
    }
}
