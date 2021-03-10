<?php

namespace Tests\Unit;

use App\Models\NewsExport;
use Tests\TestCase;

class NewsExportTest extends TestCase
{
    protected NewsExport $newsExport;

    public function setUp(): void{
        parent::setUp();
        $this->newsExport = new NewsExport([]);
    }

    public function testHeadingsReturnArray() {
        $this->assertIsArray( $this->newsExport->headings() );
    }

    public function testHeadingsReturnCorrectItems() {
        $this->assertEquals(
            [
                "title",
                "news_category_id",
                "text",
                "id"
            ],
            $this->newsExport->headings()
        );
    }

    public function testArrayReturnArray() {
        $this->assertIsArray( $this->newsExport->array() );
    }

    public function testArrayReturnSameArrayAsPushed() {
        $case1Payload = [];
        $case2Payload = [1,2,3,4,5];

        $case1 = new NewsExport($case1Payload);
        $case2 = new NewsExport($case2Payload);

        $this->assertEquals( $case1Payload, $case1->array() );
        $this->assertEquals( $case2Payload, $case2->array() );
    }
}
