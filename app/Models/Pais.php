<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Deportista;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'pais';
    protected $primaryKey = 'id_pais';
    protected $fillable = ['pais'];
    public $timestamps = false;

    // RELACIÓN: un país tiene muchos deportistas
    public function deportistas()
    {
        return $this->hasMany(Deportista::class, 'id_pais', 'id_pais');
    }
}
