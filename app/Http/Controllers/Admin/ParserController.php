<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsParser;

class ParserController extends Controller
{
    protected array $newsSources = [
        'https://lenta.ru/rss',
        'https://habr.com/ru/rss/all/all/',
        'https://news.mail.ru/rss'
    ];

    public function create() {
        return view('admin.parser.create');
    }

    public function store(NewsParser $parser) {
        $parser->run($this->newsSources);
        return redirect()->route('admin.parser.create')->with('success', __('Parse complete'));
    }
}
