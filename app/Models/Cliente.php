<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNascimentoAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setNascimentoAttribute($value)
    {
        $this->attributes['nascimento'] = $this->convertStringToDate($value);
    }

    private function convertStringToDate(?string $param)
    {
        if(empty($param)){
            return null;
        }

        list($day,$month,$year) = explode('/', $param);

        return (new DateTime($year.'-'.$month.'-'.$day))->format('Y-m-d');
    }

    public function setCpftAttribute($value)
    {
        $this->attributes['cpf'] = $this->clearField($value);
    }

    private function clearField(?string $param)
    {
        if(empty($param)){
            return '';
        }

        return str_replace(['.','/','(',')',' ','-'],'',$param);
    }
}
