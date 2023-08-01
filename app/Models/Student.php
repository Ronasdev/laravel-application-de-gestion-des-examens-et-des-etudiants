<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'mobile',
        'filiere_id'
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}
