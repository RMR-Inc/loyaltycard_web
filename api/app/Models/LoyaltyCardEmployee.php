<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyCardEmployee extends Model
{
    use HasFactory;

    protected $fillable = ['department_id'];
}
