@php
    $links = [
        ['route' => 'home', 'name' => __('Home') ],
        ['route' => 'news.index', 'name' => __('News') ],
        ['route' => 'news.category.index', 'name' => __('News Category`s') ]
    ];
    $user = Auth::user();
    if( $user && $user->is_admin) {
        $links[] = ['route' => 'admin.index', 'name' => __('Admin') ];
    }
@endphp
@include('layouts.menu', ['links' => $links])
