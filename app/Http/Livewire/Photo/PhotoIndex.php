<?php

namespace App\Http\Livewire\Photo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Photo;
use Livewire\Component;

class PhotoIndex extends DataTableComponent
{
    protected $model = Photo::class;
    public $myParam = 'Default';

    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setHideBulkActionsWhenEmptyEnabled()
            ;
            // ->setDebugEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Name")
                ->sortable()
                ->searchable(),
            Column::make("Tags")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Active")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable(),
            ImageColumn::make("Thumbnail")
                ->location(
                    fn($row) => $row->thumbnail
                ),
            ButtonGroupColumn::make('Actions')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Edit Metadata for "' . $row->name . '"')
                        ->location(fn($row) => route('photo.edit', ['photo'=>$row->id]))
                        ->attributes(function($row) {
                            return [
                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                ]),
            ];
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
            'delete' => 'Delete',
        ];
    }

    public function activate()
    {
        Photo::whereIn('id', $this->getSelected())->update(['active' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Photo::whereIn('id', $this->getSelected())->update(['active' => false]);

        $this->clearSelected();
    }

    public function delete()
    {
        $photos = Photo::whereIn('id', $this->getSelected())->get();

        foreach ($photos as $photo){
            $photo->clearMediaCollection();
            $photo->delete();
        }

        $this->clearSelected();

    }
}
