<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'users_app_passwords_reset';

    protected $fillable = [
        'email',
        'token'
    ];
}
