<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table = 'materiels';
    protected $fillable = [
        'titre',
        'localisation',
        'constructeur',
        'type',
        'n_serie',
        'n_inventaire',
        'n_marchee',
        'date_mise_service',
        'image',
    ] ;

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}
