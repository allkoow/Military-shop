<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesHasUsers extends Model
{
    protected $fillable = ['user_id', 'role_id'];
}
