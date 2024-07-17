<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calibration extends Model
{
    use HasFactory;

    protected $fillable = [
        'materiel_id',
        'date_calibrage',
        'date_prochaine_calibrage',
    ];

    public function material()
    {
        return $this->belongsTo(Materiel::class);
    }
}
