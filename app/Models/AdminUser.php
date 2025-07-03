<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $table = 'admin_users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // Define the primary key if it's not 'id'
    protected $primaryKey = 'admin_id';
    // If the primary key is not an incrementing integer
    public function getAuthPassword()
    {
        return $this->password;
    }
}
