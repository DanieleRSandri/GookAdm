<?php

namespace Database\Seeders;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create(['nome' => 'Gabriel Inchoste','cpf'=>'033.999.820-46','endereco'=>'Rua Princesa Isabel , 1440','telefone'=>'(54) 99901-4090']);
        Cliente::create(['nome' => 'Andriele Sandri','cpf'=>'033.999.820-47','endereco'=>'Rua Princesa Isabel,4567','telefone'=>'(54) 99958-3640']);

    }
}
