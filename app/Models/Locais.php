<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locais extends Model
{
    use HasFactory;
    protected $table = 'locais';
    protected $fillable = ['nome','endereco,telefone,cnpj'];

}
