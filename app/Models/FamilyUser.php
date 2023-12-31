<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyUser extends Model
{
    use HasFactory;

    protected $table = 'family_users';

    protected $fillable = [
        'family_id', 'user_id', 'role', 'created_at','updated_at'
    ];
}
