<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balanca extends Model
{
    use HasFactory;

    protected $table = 'balancas';

    protected $fillable = [
        'empresa',
        'placa',
        'densidade',
        'pesovazio',
        'pesocheio',
        'ton',
        'metros',
        'data'
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function produto(){
        return $this->belongsTo('App\Models\Produto');
    }
}
