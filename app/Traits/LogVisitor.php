<?php

namespace App\Traits;

use App\Models\Visitor;
use App\Models\Project;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

trait LogVisitor
{


    private function incrementPagehits(string $view, int $project_id = null)
    {

        $visitor = Visitor::updateOrCreate([
            'resource' => $view,
            'project_id' => $project_id ?? null,
            'visited_at' =>  Carbon::now()->toDateString()
        ]);
        $visitor->increment('page_hits');
        Log::info('page hit', ['visitors' => $visitor]);
    }
}
