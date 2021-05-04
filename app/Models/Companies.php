<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'email',
        'website',
    ];

    public function employees() {
        return $this->belongsTo(Employees::class);
    }

}