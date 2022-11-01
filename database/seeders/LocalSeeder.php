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
        Locais::create(['nome' => 'Arena1','endereco'=>'Avenida Rui Barbosa, 1457','telefone'=>'54999867130','cnpj'=>'72495054000186']);
    }
}
