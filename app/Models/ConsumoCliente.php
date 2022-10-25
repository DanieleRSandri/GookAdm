<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumoCliente extends Model
{
    use HasFactory;
    protected $table = 'consumo_clientes';
    protected $fillable = ['valorTotal','id_cliente'];
    
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente","id_cliente");
    }    
}
