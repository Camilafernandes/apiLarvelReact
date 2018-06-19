<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use SoftDeletes;
    
    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'valor_compra', 'valor_revenda', 'ativo', 'imagem'];

    protected $dates = ['deleted_at'];
}
