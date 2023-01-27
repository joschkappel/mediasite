<div>
    @isset($project->id)
        <div class="text-bold text-2xl text-cyan-700">
            {{ $project->name }}
        </div>
        <div class="text-gray-700">
            {{ $project->info_time }}
        </div>
        <div class="">
            <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#tabs-info"
                        class="nav-link block font-medium text-xs leading-tight
                    uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3
                    my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent disabled"
                        id="tabe-info-tab" data-bs-toggle="pill" data-bs-target="#tabs-info" role="tab"
                        aria-controls="tabs-info" aria-selected="false">
                        Info
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-de"
                        class="nav-link block font-medium text-xs leading-tight
                    uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3
                    my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                        id="tabe-de-tab" data-bs-toggle="pill" data-bs-target="#tabs-de" role="tab"
                        aria-controls="tabs-de" aria-selected="true">
                        de
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-de"
                        class="nav-link block font-medium text-xs leading-tight
                uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3
                my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                        id="tabe-en-tab" data-bs-toggle="pill" data-bs-target="#tabs-en" role="tab"
                        aria-controls="tabs-en" aria-selected="false">
                        en</a>
                </li>
            </ul>
            <div class="tab-content" id="tabs-tabContent">

                <div class="tab-pane fade show active" id="tabs-de" role="tabpanel" aria-labelledby="tabs-de-tab">
                    {{ $project->info_de }}
                </div>
                <div class="tab-pane fade" id="tabs-en" role="tabpanel" aria-labelledby="tabs-en-tab">
                    {{ $project->info_en }}
                </div>
            </div>
        </div>
    @endisset
</div>
