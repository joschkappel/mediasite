<?php

namespace App\Http\Livewire\Project;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class PhotoDatatable extends DataTableComponent
{
    public  $project;
    public string $tableName = 'photos';
    public array $photos = [];

    protected $listeners = [
        'showPhotos' => 'showPhotosForProject'
    ];

    public function showPhotosForProject(Project $project)
    {
        $this->project = $project;
        parent::setBuilder($this->builder());
        parent::render();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['photos.id as id'])
            ->setPaginationDisabled()
            ->setSearchDisabled()
            ->setColumnSelectDisabled()
            ->setEmptyMessage(__('Please select a project to get the photos'));;
        // ->setDebugEnabled();

    }


    public function builder(): Builder
    {
        if ($this->project == null) {
            $this->project = new Project();
        }
        return Photo::query()->where('project_id', $this->project->id);
    }


    public function columns(): array
    {
        return [
            Column::make("Name")
                ->sortable(),
            BooleanColumn::make("Active")
                ->sortable(),
            BooleanColumn::make("Show on Main", 'show_on_main')
                ->sortable(),
            ImageColumn::make("Thumbnail")
                ->location(
                    fn ($row) => $row->thumbnail
                ),
            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit Metadata for "' . $row->name . '"')
                        ->location(fn ($row) => route('photo.edit', ['photo' => $row->id]))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-blue-500 hover:no-underline',
                            ];
                        }),
                ]),
        ];
    }
}
