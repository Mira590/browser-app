<?php

namespace App\Models;
use App\Models\Department;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    
    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'job_title',
    'username',
    'photo',
    'phone',
    'azbid',
    'role',
    'department_id',
    'status',
    'bio',
    'password',
];
public function department(){
        return $this->belongsTo(Department::class);
    }

     //helper method for checking role
     public function isAdmin(){
        return $this->role ==='admin';
     }

      public function isSuperuser(){
        return $this->role ==='superuser';
     }
       public function isUser(){
        return $this->role ==='user';
     }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
