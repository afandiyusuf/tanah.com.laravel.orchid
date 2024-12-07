<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;

class AppUserResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\AppUser::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Name')
                ->placeholder('Enter name'),

            Input::make('email')
                ->title('Email')
                ->placeholder('Enter email'),

            Input::make('password')
                ->title('Password')
                ->placeholder('Enter password'),

            Input::make('phone')
                ->title('Phone')
                ->placeholder('Enter phone'),

            Input::make('address')
                ->title('Address')
                ->placeholder('Enter address'),

            Input::make('google_id')
                ->title('Google ID')
                ->placeholder('Enter google id'),
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
            TD::make('name'),
            TD::make('email'),
            TD::make('phone'),
            TD::make('address'),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
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
            Sight::make('name'),
            Sight::make('email'),
            Sight::make('phone'),
            Sight::make('address'),
            Sight::make('google_id'),
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

    public function actions(): array{
        return [];
    }
}
