<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class Profile extends Model
{
    
    protected  static  function  boot(){
    parent::boot();    
    static::creating(function  ($model)  {
        $model->token = (string) Str::uuid();
    });
    }

    public $table = 'profiles';
    protected static ?string $recordTitleAttribute = 'email';
    

    protected $guarded = [];
  
   
    protected $fillable=[
        'id',
        'token',
        'name',
        'vorname',
        'identifikation',
       'email',
       'telefonnummer',
        'geburtstag',
        'geburtsort',
        'straße',
        'plz',
        'ort',
        'land',
       'profileimg',       
       'tags',
       'user_id',
       'expires_at'
    ];
    protected $dates = [
        'expires_at'
      ];
    
    protected $casts = [
        'tags' => 'array',
        'experiences' => 'array',
        'educations' => 'array',
        'languages' => 'array',
        'profileimg' => 'array',  
        'expired_at' => 'datetime',
        'geburtstag' => 'datetime',      
    ];
  
 
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    } 
   

    public function experiences():HasMany
    {
        return $this->hasMany(Experience::class);
    }

 
    public function educations():HasMany
    {
        return $this->hasMany(Education::class);
    }
 
    public function languages():HasMany
    {
        return $this->hasMany(Language::class);
    }
    
    
  
}

