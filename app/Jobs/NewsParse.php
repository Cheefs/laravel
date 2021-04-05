<?php

namespace App\Jobs;

use App\Services\XMLParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link) {
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(XMLParserService $parserService) {
        $parserService->run($this->link);
    }
}
