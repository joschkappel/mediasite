<?php

namespace App\Http\Livewire\Project;


use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Project;
use Illuminate\Support\Facades\Log;


class ProjectDatatable extends DataTableComponent
{
    protected $model = Project::class;
    public string $tableName = 'projects';
    public array $projects = [];
    public Project $selected_project;

    public function photoIndex($project_id)
    {
        $this->selected_project = Project::find($project_id);
        $this->emit('showPhotos', $this->selected_project);
    }
    public function mount()
    {
        $this->selected_project = new Project;
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
                if ($this->selected_project->id == $row->id) {
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
