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
use Illuminate\Support\Facades\Log;


class ProjectIndex extends DataTableComponent
{
    protected $model = Project::class;

    public function photoIndex($project_id)
    {
        $project = Project::find($project_id);
        $this->emit('showPhotos', $project->id);
        $this->emit('refreshDatatables');
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSearchDisabled()
            ->setPaginationDisabled()
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('There are no projects yet'))
            ->setAdditionalSelects(['projects.id as id', 'projects.name as name'])
            ->setTrAttributes(function ($row, $index) {
                Log::info('this is th row', ['row' => $row]);
                if ($index % 2 === 0) {
                    return [
                        'default' => true,
                        'class' => 'bg-gray-200',
                        'wire:click' => 'photoIndex( ' . $row->id . ' )',
                    ];
                }

                return [
                    'default' => true,
                    'wire:click' => 'photoIndex( ' . $row->id . ' )'
                ];
            }); //->setDebugEnabled();
    }
    public function columns(): array
    {
        return [
            LinkColumn::make('Name')
                ->title(fn ($row) => $row->name)
                ->location(fn ($row) => route('project.edit', $row))
                ->attributes(fn ($row) => [
                    'class' => 'underline text-blue-500 hover:no-underline',
                ])
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
