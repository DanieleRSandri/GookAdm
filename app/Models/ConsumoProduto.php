<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumoProduto extends Model
{
    use HasFactory;

    protected $table = 'consumo_produtos';
    protected $fillable = ['quantidade','id_produto',"id_consumo"];
    
    public function consumo(){
        return $this->belongsTo("App\Models\ConsumoCliente","id_consumo");
    }

    public function produto(){
        return $this->belongsTo("App\Models\Produto","id_produto");
    }
}
