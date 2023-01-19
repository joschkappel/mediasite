<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Project;


class ProjectIndex extends DataTableComponent
{
    protected $model = Project::class;

    /*     public $columnSearch = [
        'name' => null,
        'email' => null,
    ];
 */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSearchDisabled()
            ->setPaginationDisabled()
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('There are no projects yet'));
        // ->setDebugEnabled();
    }
    public function columns(): array
    {
        return [
            Column::make("Name")
                ->sortable(),
            Column::make("Type", 'type')
                ->sortable()
                ->format(
                    fn ($value, $row, Column $column) => $value->description()
                ),
            BooleanColumn::make("Active")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->format(
                    fn ($value, $row, Column $column) => $value->isoFormat('l')
                ),
        ];
    }
}
