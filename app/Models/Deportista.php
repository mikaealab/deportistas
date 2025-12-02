<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deportista extends Model
{
    use HasFactory;
    protected $table = 'deportista';
    protected $primaryKey = 'id_deportista';
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'estatura_cm',
        'peso_kg',
        'id_pais',
        'id_disciplina'
    ];
    public $timestamps = false;
    // Relaciones
    public function pais()
    {
        return $this->belongsTo(Pais::class , 'id_pais');
    }
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class , 'id_disciplina');
    }
}
