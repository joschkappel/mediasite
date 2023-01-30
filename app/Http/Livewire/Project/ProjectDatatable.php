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
        $project = Project::find($project_id);
        if ($project) {
            $this->selected_project = $project;
            $this->emit('showPhotos', $this->selected_project);
        }
    }
    public function mount()
    {
        $this->selected_project = new Project;
    }
    public function delete(Project $project)
    {

        foreach ($project->photos as $p) {
            $p->delete();
        }
        $project->delete();
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
            Column::make('Delete')
                ->unclickable()
                ->label(
                    fn ($row, Column $column)  => '<div>
    <button type="button" class="text-red-600 shadow-md focus:ring-0 active:shadow-lg transition duration-150 ease-in-out flex align-center" wire:click="delete(' . $row->id . ')">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
</svg>

     </button></div>'
                )
                ->html(),
        ];
    }
}
