<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function colaboradores()
    {
        return $this->belongsToMany(Colaborador::class, 'colaboradores_permissions');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Slug::makeSlug($value);
    }
}
