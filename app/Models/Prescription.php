<?php

namespace App\Models;

use App\Models\PrescriptionImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['note', 'delivery_address', 'delivery_time', 'user_id'];

    public function images()
    {
        return $this->hasMany(PrescriptionImage::class);
    }
}
