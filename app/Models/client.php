<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    public $guarded = [];
    public function invoice(){
        return $this->hasMany(invoice::class, 'id', 'id');
    }
}
