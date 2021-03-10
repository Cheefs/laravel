@php
    $links = [
        ['route' => 'home', 'name' => __('Home') ],
        ['route' => 'admin.index', 'name' => __('Admin') ],
        ['route' => 'admin.news.index', 'name' => __('News') ],
        ['route' => 'admin.news.category.index', 'name' => __('News Category`s') ],
        ['route' => 'admin.test1', 'name' => __('Test 1') ],
        ['route' => 'admin.test2', 'name' => __('Test 2') ],
    ];
    if(isset($current) && $current) {
        $links[] = $current;
    }
@endphp

@include('layouts.menu', ['links' => $links])
