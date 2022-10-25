<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $fillable = ['data','status','horario_inicio','horario_final','id_quadra','id_cliente'];

    public function quadra(){
        return $this->belongsTo("App\Models\Quadra",'id_quadra');
    }

    public function cliente(){
        return $this->belongsTo("App\Models\Cliente",'id_cliente');
    }

}
