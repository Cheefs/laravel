@php
    $links = [
        ['route' => 'home', 'name' => __('Home') ],
        ['route' => 'admin.index', 'name' => __('Admin') ],
        ['route' => 'admin.users', 'name' => __('Users') ],
        ['route' => 'admin.news.index', 'name' => __('News') ],
        ['route' => 'admin.news.category.index', 'name' => __('News Category`s') ],
    ];
    if(isset($current) && $current) {
        $links[] = $current;
    }
@endphp

@include('layouts.menu', ['links' => $links])
