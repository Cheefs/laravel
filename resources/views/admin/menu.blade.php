@php
    $links = [
        ['route' => 'home', 'name' => __('Home') ],
        ['route' => 'admin.index', 'name' => __('Admin') ],
        ['route' => 'admin.users', 'name' => __('Users') ],
        ['route' => 'admin.news.index', 'name' => __('News') ],
        ['route' => 'admin.parser.create', 'name' => __('News parser') ],
        ['route' => 'admin.news.category.index', 'name' => __('News Category`s') ],
        ['route' => 'admin.resources.index', 'name' => __('Resources') ],
    ];
    if(isset($current) && $current) {
        $links[] = $current;
    }
@endphp

@include('layouts.menu', ['links' => $links])
