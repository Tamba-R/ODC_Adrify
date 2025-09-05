<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'type',
        'date_partage',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    
}
