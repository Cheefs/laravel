@php
    $links = [
        ['route' => 'home', 'name' => __('Home') ],
        ['route' => 'admin.index', 'name' => __('Admin') ],
        ['route' => 'news.index', 'name' => __('News') ],
        ['route' => 'news.category', 'name' => __('News Category`s') ],
        ['route' => 'news.download', 'name' => __('News download') ],
    ];

    if(isset($current) && $current) {
        $links[] = $current;
    }
@endphp
@include('layouts.menu', ['links' => $links])
