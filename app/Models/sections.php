<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;
    protected $fillable =[
        'section_name',
        'description'
    ];

    public function invoice(){
        return $this->hasMany(invoics::class, 'id', 'id');
    }
}
