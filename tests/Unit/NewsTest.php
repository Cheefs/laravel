<?php

namespace Tests\Unit;

use App\Models\News;
use Tests\TestCase;

class NewsTest extends TestCase
{
    protected News $news;

    public function setUp(): void{
        parent::setUp();
        $this->news = new News();
    }

    public function testFindAll() {
        $this->assertIsArray( $this->news->findAll() );
    }

    public function testFindByToThrowTypeError() {
        $this->expectException(\TypeError::class);

        $this->news->findBy(1, 2);
        $this->news->findBy('1', '1');
        $this->news->findBy(null, 1);
        $this->news->findBy(1, null);
    }

    public function testFindOneToThrowTypeError() {
        $this->expectException(\TypeError::class);
        $this->news->findOne('-');
        $this->news->findOne([]);
        $this->news->findOne(null);
        $this->news->findOne($this->news);
    }

    public function testGetLastInsertId() {
        $this->assertEquals( 1, $this->news->getLastInsertId() );
    }
}
