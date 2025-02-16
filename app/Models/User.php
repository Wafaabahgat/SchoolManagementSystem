<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function GetMailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }
    static public function GetToken($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

    public static function getAdmins()
    {
        $query = User::select('users.*')
            ->where('role', 'admin');

        if (request()->has('name') && request()->get('name') != '') {
            $query->where('name', 'like', '%' . request()->get('name') . '%');
        }
        if (request()->has('email') && request()->get('email') != '') {
            $query->where('email', 'like', '%' . request()->get('email') . '%');
        }


        $query = $query->orderBy('id', 'desc')
            ->paginate(2);

        return $query;
    }
}
