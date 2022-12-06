<?php

namespace Database\Seeders;
use App\Models\Quadra;
use Illuminate\Database\Seeder;

class QuadraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quadra::create(['nome' => 'Quadra Salão','tipo'=>'Salão','valorTempo'=>'80.00','id_local'=>'1']);
        Quadra::create(['nome' => 'Quadra Society ','tipo'=>'Society','valorTempo'=>'140.00','id_local'=>'1']);
    }
}
