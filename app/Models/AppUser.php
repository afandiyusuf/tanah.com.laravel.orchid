<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class AppUser extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = ['name', 'email', 'phone', 'address', 'google_id', 'token'];
}
