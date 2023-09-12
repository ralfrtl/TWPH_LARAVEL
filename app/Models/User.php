<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * @OA\Schema(
 *      title="User",
 *      description="Connects to users table",
 *      @OA\Property(
 *          property="id",
 *          type="integer",
 *          description="Unique, auto increment, Primary key",
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          description="Unique",
 *          example="sample@mail.com",
 *          format="email",
 *      )
 * )
*/

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'user_level',
        'password',
    ];

    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'isAdmin',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'id', 'id');
    }

    public function getIsAdminAttribute() : Bool
    {
        if($this->user_level >= 1 and $this->user_level <= 4) {
            return true;
        }

        return false;
    }
}
