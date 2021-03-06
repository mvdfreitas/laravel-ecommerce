<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function colaboradores()
    {
        return $this->belongsToMany(Colaborador::class, 'colaboradores_roles');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Slug::makeSlug($value);
    }
}
