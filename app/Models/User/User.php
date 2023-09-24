<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany};
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasSlug;

  /**
   * Get the options for generating the slug.
   */
  public function getSlugOptions(): SlugOptions
  {
    return SlugOptions::create()->generateSlugsFrom(['first_name', 'last_name'])->saveSlugsTo('slug');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = ["first_name", "last_name", "email", "mobile", "role", "password", "profile", "permission"];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = ['password', 'remember_token'];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

  public function usermeta(): HasMany
  {
    return $this->hasMany(Usermeta::class);
  }
}
