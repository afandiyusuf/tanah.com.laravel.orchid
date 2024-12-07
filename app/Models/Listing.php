<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;


class Listing extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = ['description', 'property_type_id', 'offer_type_id', 'price', 'contact_name', 'phone', 'area', 'created_by'];

    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function offerType(): BelongsTo
    {
        return $this->belongsTo(OfferType::class);
    }



}
