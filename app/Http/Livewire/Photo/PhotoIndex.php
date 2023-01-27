<?php

namespace App\Http\Livewire\Photo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Photo;
use App\Models\Project;
use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Log;


class PhotoIndex extends DataTableComponent
{
    protected $model = Photo::class;

    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['photos.id as id', 'photos.name as name'])
            ->setFilterLayoutSlideDown()
            ->setHideBulkActionsWhenEmptyEnabled();
        // ->setDebugEnabled();
    }

    public function columns(): array
    {
        return [
            LinkColumn::make("Name")
                ->title(fn ($row) => $row->name)
                ->location(fn ($row) => route('photo.edit', ['photo' => $row]))
                ->attributes(function ($row) {
                    return [
                        'class' => 'underline text-blue-500 hover:no-underline',
                    ];
                })
                ->sortable()
                ->searchable(),
            Column::make("Project", 'project.name')
                ->sortable()
                ->searchable(),
            Column::make("Project-type", 'project.type')
                ->format(
                    fn ($value, $row, Column $column) => ProjectType::from($value)->description()
                )
                ->sortable()
                ->searchable(),
            BooleanColumn::make("On Main", 'show_on_main')
                ->sortable(),
            BooleanColumn::make("Active")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable()
                ->format(
                    fn ($value, $row, Column $column) => $value->isoFormat('l')
                ),
            ImageColumn::make("Thumbnail")
                ->location(
                    fn ($row) => $row->thumbnail
                ),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
            'showOnMain' => 'Show on Main',
            'removeFromMain' => 'Remove from Main',
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
    public function showOnMain()
    {
        Photo::whereIn('id', $this->getSelected())->update(['show_on_main' => true]);

        $this->clearSelected();
    }
    public function removeFromMain()
    {
        Photo::whereIn('id', $this->getSelected())->update(['show_on_main' => false]);

        $this->clearSelected();
    }

    public function delete()
    {
        $photos = Photo::whereIn('id', $this->getSelected())->get();

        foreach ($photos as $photo) {
            $photo->clearMediaCollection();
            $photo->delete();
        }

        $this->clearSelected();
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Active')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('photos.active', true);
                    } elseif ($value === '0') {
                        $builder->where('photos.active', false);
                    }
                }),
            SelectFilter::make('Show on Main')
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('show_on_main', true);
                    } elseif ($value === '0') {
                        $builder->where('show_on_main', false);
                    }
                }),
            MultiSelectFilter::make('Projects')
                ->options(
                    Project::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn ($project) => $project->name)
                        ->toArray()
                )
                ->filter(function (Builder $builder, array $values) {
                    if (count($values) > 0) {
                        $builder->whereIn('project_id', $values);
                    }
                }),
            SelectFilter::make('Project Type')
                ->options(ProjectType::getFilterOptions())
                ->filter(function (Builder $builder, string $value) {
                    if ($value >= '0') {
                        $builder->where('projects.type', $value);
                    }
                }),
        ];
    }
}
