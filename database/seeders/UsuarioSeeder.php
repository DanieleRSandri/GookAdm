<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Daniele Regina Sandri','email'=>'135966@upf.br','password'=>'12345678','tipoUsuario'=>'Administrador']);

    }
}
