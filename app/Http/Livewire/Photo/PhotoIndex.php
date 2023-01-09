<?php

namespace App\Http\Livewire\Photo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
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
        $this->setPrimaryKey('id');
            // ->setDebugEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
            ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Tags", "tags")
                ->sortable(),
            BooleanColumn::make("Active", "active")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
        ];
    }
}
