<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registrierung;
use App\Models\Profile;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    protected static ?string $recordTitleAttribute = 'name';
    
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
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
        'is_admin' => 'boolean',
    ];
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, '@stimme-mediengruppe.de')&& $this->is_admin == 1;
    }
    public function getId()
    {
        return $this->id;
    }
    public function sendLoginLink()
    {
        $profile =Profile::whereEmail($this->email)->first();
        $plaintext=$profile->token;
        $expires_at =  now()->addDays(7);        
        Mail::to($this->email)->send(new Registrierung($plaintext, $expires_at));
    }
   
}
