<?php

namespace Database\Seeders;

use App\Models\Cctv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CctvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cctvData       = CctvData::getCctvsData();
        $existingCctv   = Cctv::all();

        if ( $existingCctv->isEmpty() ) {
            foreach ($cctvData as $cctv) {
                Cctv::create($cctv);
            }
        }
    }
}
