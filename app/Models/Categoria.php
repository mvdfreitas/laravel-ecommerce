<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function categoriaPai()
    {
        return $this->belongsTo(self::class, 'categoria_pai_id');
    }

    private function makeSlug($value)
    {
        $slug = trim($value); // trim the string
        $slug = preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
        $slug = str_replace(' ','-', $slug); // replace spaces by dashes
        $slug = strtolower($slug);  // make it lowercase
        return $slug;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $this->makeSlug($value);
    }

    public function getCategoriaPaiNome()
    {
        return $this->categoriaPai->nome;
    }

}
