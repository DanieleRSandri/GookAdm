<?php

namespace Database\Seeders;
use App\Models\Locais;

use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locais::create(['nome' => 'Arena1','endereco'=>'Avenida Rui Barbosa, 1457','telefone'=>'(54) 99986-7130','cnpj'=>'72.495.054/0001-86']);
    }
}
