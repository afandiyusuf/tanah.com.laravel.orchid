<?php

namespace App\Orchid\Screens;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;

use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use App\Models\OfferType;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Button;

class OfferTypeScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'offerTypes' => OfferType::latest()->get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Offer Types';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Offer Type')
                ->icon('bs.plus')
                ->modal('offerTypeModal')
                ->method('create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('offerTypes', [
                TD::make('name'),
                TD::make('Actions')
                    ->alignRight()
                    ->render(function (OfferType $offerType){
                        return
                            Button::make('Delete Task')
                            ->confirm('After deleting, the offer type will be gone forever.')
                            ->method('delete', ['offerType' => $offerType->id]);
                    })
            ]),

            Layout::modal('offerTypeModal', Layout::rows([
                Input::make('offerType.name')
                    ->title('Name')
                    ->placeholder('Enter offer type name')
            ]))->title('Create Offer Type')->applyButton('Create')
        ];
    }
    public function loadOfferType(OfferType $offerType){
        return $offerType;
    }
    public function create(Request $request){
        $request->validate([
            'offerType.name' => 'required|max:255',
        ]);
        $offerType = new OfferType();
        $offerType->name = $request->input('offerType.name');
        $offerType->save();
    }

    public function delete(OfferType $offerType){
        $offerType->delete();
    }
}
