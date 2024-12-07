<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use App\Models\PropertyType;
use App\Models\OfferType;
use Illuminate\Support\Str;
use Orchid\Screen\Sight;

class ListingResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Listing::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            TextArea::make('description')
                ->title('Description')
                ->maxLength(240)
                ->rows(5)
                ->placeholder('Enter description'),

            Select::make('property_type_id')
                ->title('Property Type')
                ->options(PropertyType::all()->pluck('name', 'id')),

            Select::make('offer_type_id')
                ->title('Offer Type')
                ->options(OfferType::all()->pluck('name', 'id')),

            Input::make('price')
                ->title('Price')
                ->placeholder('Enter price'),

            Input::make('contact_name')
                ->title('Contact Name')
                ->placeholder('Enter contact name'),

            Input::make('phone')
                ->title('Phone')
                ->placeholder('Enter phone'),

            Input::make('area (m2)')
                ->title('Area')
                ->placeholder('Enter area'),

            Input::make('created_by')
                ->title('Created By')
                ->value(auth()->id())
                ->readonly(),

        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('description')
                ->render(function ($model) {
                    return Str::limit($model->description, 100);
                }),

            TD::make('property_type_id')
                ->render(function ($model) {
                    return $model->propertyType->name;
                }),

            TD::make('offer_type_id')
                ->render(function ($model) {
                    return $model->offerType->name;
                }),

            TD::make('price')
                ->render(function ($model) {
                    return number_format($model->price, 0, ',', ' ');
                }),


            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            TD::make('area')
                ->render(function ($model) {
                    return $model->area . ' m2';
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('description'),
            Sight::make('property_type_id'),
            Sight::make('offer_type_id'),
            Sight::make('price'),
            Sight::make('area'),
            Sight::make('created_at'),
            Sight::make('updated_at'),

        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

}
