<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Validation;
use App\Models\Share;
use App\Models\Report;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'description',
        'repere_local',
        'adrify_code',
        'statut',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function validations()
    {
        return $this->hasMany(Validation::class);
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
