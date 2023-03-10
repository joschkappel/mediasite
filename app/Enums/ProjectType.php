<?php

namespace App\Enums;

use Ramsey\Uuid\Type\Integer;

enum ProjectType: int
{
    case PHOTOS =  0;
    case BOOK = 1;
    case EXHIBITION = 2;


    public function description(): string
    {
        return __('projecttype.' . $this->name . '.description');
    }

    static public function getFilterOptions(): array
    {
        $options = collect();
        foreach (self::cases() as $opt) {
            $options->put($opt->value, $opt->description());
        }
        return $options->toArray();
    }
}
