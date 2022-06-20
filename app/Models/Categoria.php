<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function categoriaPai()
    {
        return $this->belongsTo(self::class, 'categoria_pai_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Slug::makeSlug($value);
    }

    public function getCategoriaPaiNome()
    {
        return $this->categoriaPai->nome;
    }

}
