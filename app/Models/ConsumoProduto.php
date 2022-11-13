<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumoProduto extends Model
{
    use HasFactory;
    protected $table = 'consumo_produtos';
    protected $fillable = ['id_consumo','id_produto'];

    public function produto(){
        return $this->belongsTo("App\Models\Produto",'id_produto');
    }

    public function consumo(){
        return $this->belongsTo("App\Models\Consumo",'id_consumo');
    }
}
