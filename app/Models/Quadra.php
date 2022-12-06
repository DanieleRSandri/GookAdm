<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quadra extends Model
{
    use HasFactory;
    protected $table = 'quadras';
    protected $fillable = ['nome', 'tipo', 'valorTempo', 'id_local'];

    public function local()
    {
        return $this->belongsTo("App\Models\Locais", 'id_local');
    }
}
