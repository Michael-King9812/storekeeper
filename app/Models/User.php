<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

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

    public function firstName(): string
    {
        return explode(' ', $this->name)[0];
    }

    public function role(): string 
    {
        return DB::table('roles')->whereId($this->role_id)->first('name')->name;
    }

    public function privileges(): array
    {
        $privileges = Privilege::all();
        $userPrivileges = json_decode(DB::table('user_privileges')->where('id', $this->id)->first('privileges')->privileges, true);
        $userPrivilegesDesc = [];
        
        foreach($userPrivileges as $privilegeId){
            $userPrivilegesDesc[] = $privileges[$privilegeId - 1]->name;
        }
        return $userPrivilegesDesc;
    }

    public function hasRightTo(string $privilege): bool
    {
        return in_array('can' . ucfirst($privilege), $this->privileges());
    }
}
