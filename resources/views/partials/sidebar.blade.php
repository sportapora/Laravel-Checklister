<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        @if (auth()->user()->is_admin)
            <li class="nav-title">{{ __('Admin') }}</li>

            <li class="nav-title">{{ __('Manage Checklists') }}</li>

            @foreach ($admin_menu as $group)
                <li class="nav-item nav-group show">
                    <a class="nav-link" href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                        <svg class="nav-icon" alt="CoreUI Logo">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                        </svg>
                        {{ $group->name }}
                    </a>
                    <ul class="nav-group-items">
                        @foreach ($group->checklists as $checklist)
                            <li class="nav-item">
                                <a class="nav-link" style="padding: .5rem .5rem .5rem 76px"
                                    href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}">
                                    <svg class="nav-icon" width="118" height="46" alt="CoreUI Logo">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}">
                                        </use>
                                    </svg>
                                    {{ $checklist->name }}
                                </a>
                            </li>
                        @endforeach

                        <li class="nav-item">
                            <a href="{{ route('admin.checklist_groups.checklists.create', $group) }}" class="nav-link"
                                style="padding: 1rem .5rem .5rem 76px">
                                <svg class="nav-icon" alt="CoreUI Logo">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-note-add') }}">
                                    </use>
                                </svg>

                                {{ __('New Checklist') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endforeach

            <li class="nav-item">
                <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link">
                    <svg class="nav-icon" alt="CoreUI Logo">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
                    </svg>
                    {{ __('New Checklist Group') }}
                </a>
            </li>

            <li class="nav-title">{{ __('Pages') }}</li>

            @foreach (\App\Models\Page::all() as $page)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pages.edit', $page) }}">
                        <i class="nav-icon cil-puzzle"></i> {{ $page->title }}
                    </a>
                </li>
            @endforeach

            <li class="nav-title">{{ __('Manage Data') }}</li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <svg class="nav-icon" alt="CoreUI Logo">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                    </svg>
                    {{ __('Users') }}
                </a>
            </li>
        @else
            @foreach ($user_menu as $group)
                <li class="nav-title">
                    {{ $group['name'] }}
                    @if ($group['is_new'])
                        <span class="badge badge-sm bg-info ms-auto">
                            NEW
                        </span>
                    @elseif ($group['is_updated'])
                        <span class="badge badge-sm bg-info ms-auto">
                            UPDATED
                        </span>
                    @endif
                </li>

                @foreach ($group['checklists'] as $checklist)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.checklist.show', $checklist['id']) }}">
                            <svg class="nav-icon" width="118" height="46" alt="CoreUI Logo">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}">
                                </use>
                            </svg>
                            {{ $checklist['name'] }}
                            @livewire('completed-tasks-counter', [
                                'tasks_count' => count($checklist['tasks']),
                                'completed_tasks' => count($checklist['user_tasks']),
                                'checklist_id' => $checklist['id'],
                            ])
                            @if ($checklist['is_new'])
                                <span class="badge badge-sm bg-info ms-auto">
                                    NEW
                                </span>
                            @elseif ($checklist['is_updated'])
                                <span class="badge badge-sm bg-info ms-auto">
                                    UPDATED
                                </span>
                            @endif
                        </a>
                    </li>
                @endforeach
            @endforeach
        @endif
    </ul>

    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
