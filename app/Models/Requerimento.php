<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
    use HasFactory;

    protected $table = 'requerimentos';
    protected $fillable = ['name', 'tipo', 'cpf', 'email', 'placa', 'auto', 'fato'];
}
