<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $connection = 'mysql_app';
    protected $table ="admins";
    /**
     * The attributes that are mass assignable.
     * @var list<string>
     */
    protected $fillable = [];

    public function bugs()
    {
        return $this->hasMany(Bug::class, 'admin_mobile', 'mobile');
    }
}
