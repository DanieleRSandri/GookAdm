<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;
    protected $table = 'consumos';
    protected $fillable = ['valorTotal', 'id_cliente'];

    public function cliente()
    {
        return $this->belongsTo("App\Models\Cliente", 'id_cliente');
    }

    public function consumoProdutos()
    {
        return $this->hasMany("App\Models\ConsumoProduto", 'id_consumo');
    }
}
