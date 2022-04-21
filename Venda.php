<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    protected $fillable = [
        'cliente_id',
        'produto_id',
        'peso',
        'frete',
        'valor',
        'desconto',
        'formadepagamento',
        'total',
        'data'
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function produto(){
        return $this->belongsTo('App\Models\Produto');
    }

}
