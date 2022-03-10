<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'company_id',
        'email',
        'phone'
    ];
    public function company()
    {
        return $this->belongsTo(Comapany::class, 'company_id');
    }
}
