<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Calibration;

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
        'is_sensor',
    ];

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }
    public function calibrations()
    {
        return $this->hasMany(Calibration::class);
    }
}
