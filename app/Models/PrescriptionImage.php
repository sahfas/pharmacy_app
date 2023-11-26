<?php

namespace App\Models;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrescriptionImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'prescription_id'];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
