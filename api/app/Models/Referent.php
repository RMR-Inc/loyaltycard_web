<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referent extends Model
{
    use HasFactory;

    protected $fillable = ['sponsporing_partner_id'];
}
