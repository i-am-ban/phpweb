<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMove extends Model
{
    use HasFactory;

    protected $table = 'families';

    protected $fillable = [
        'name', 'created_at','updated_at'
    ];
}
