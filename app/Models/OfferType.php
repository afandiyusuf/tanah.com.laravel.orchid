<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Filters\Filterable;

class OfferType extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = ['name'];
}
