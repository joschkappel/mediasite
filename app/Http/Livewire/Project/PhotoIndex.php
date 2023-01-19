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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class PhotoIndex extends DataTableComponent
{
    public $project;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPaginationDisabled()
            ->setSearchDisabled()
            ->setColumnSelectDisabled()
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setEmptyMessage(__('Please select a project to get the photos'));;
        // ->setDebugEnabled();

        $this->project = null;
    }

    public function builder(): Builder
    {
        if ($this->project != null) {
            return Photo::where('project_id', $this->project->id);
        } else {
            return Photo::whereNull('id');
        }
    }

    public function columns(): array
    {
        return [
            Column::make("Name")
                ->sortable(),
            BooleanColumn::make("Active")
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

        foreach ($photos as $photo) {
            $photo->clearMediaCollection();
            $photo->delete();
        }

        $this->clearSelected();
    }
}