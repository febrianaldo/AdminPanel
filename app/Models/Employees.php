<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    
    protected $table = 'employees';
    protected $fillable = [
        'firstname',
        'lastname',
        'id_companies',
        'email',
        'phone',
    ];

    public function companies(){
    	return $this->hasMany(Companies::class, 'id', 'id_companies');
    }

}