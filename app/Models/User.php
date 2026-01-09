<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* =========================
     |  Relationships
     ========================= */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /* =========================
     |  Role Helpers
     ========================= */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isSuperuser(): bool
    {
        return $this->role === 'superuser';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /* =========================
     |  Permission Helpers
     ========================= */

    // All roles can manage items (view, create, edit)
    public function canManageItems(): bool
    {
        return in_array($this->role, ['admin', 'superuser', 'user']);
    }

    // Only admin & superuser can delete items / view reports
    public function canDeleteItems(): bool
    {
        return in_array($this->role, ['admin', 'superuser']);
    }

    public function canViewReports(): bool
    {
        return in_array($this->role, ['admin', 'superuser']);
    }
}
