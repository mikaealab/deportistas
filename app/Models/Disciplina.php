<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disciplina extends Model
{
    //
    use HasFactory;
    protected $table = 'disciplina';
    protected $primaryKey = 'id_disciplina';
    protected $fillable = ['disciplina'];
    public $timestamps = false;
}
