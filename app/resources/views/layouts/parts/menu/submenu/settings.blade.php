@php
    declare(strict_types=1);
@endphp

<div
    data-kt-menu-trigger="click"
    class="{{ request()->routeIs('settings.*')
        ? 'menu-item menu-accordion show'
        : 'menu-item menu-accordion' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <span class="fa fa-cogs"></span>
        </span>
        <span class="menu-title">Настройки</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        @php
            $submenuList = [
                // [
                //     'route' => 'type-fighters',
                //     'label' => 'Типы бойцов',
                // ],
            ];

            $submenuList = array_map(function (array $submenu) {
                $route = "settings.{$submenu['route']}";

                return [
                    'activeRoute' => "$route.*",
                    'route' => "$route.index",
                    'label' => trans($submenu['label']),
                ];
            }, $submenuList);
        @endphp

        @foreach($submenuList as $submenu)
            <x-main-menu-item-children
                :active="request()->routeIs($submenu['activeRoute'])"
                :url="route($submenu['route'])"
                :label="$submenu['label']" />
        @endforeach
    </div>
</div>
