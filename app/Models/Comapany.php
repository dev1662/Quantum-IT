<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comapany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'logo',
        'webiste'
    ];
    public function employees()
    {
        return $this->hasOne(Employees::class);
    }
}
