<?php

namespace Tests\Unit;

use App\Models\News;
use App\Models\NewsCategory;
use Tests\TestCase;

class NewsCategoryTest extends TestCase
{
    protected NewsCategory $category;

    public function setUp(): void{
        parent::setUp();
        $this->category = new NewsCategory((new News()));
    }

    public function testFindAll() {
        $this->assertIsArray( $this->category->findAll() );
    }

    public function testFindOneToThrow() {
        $this->expectException(\TypeError::class);
        $this->category->findOne('-');
        $this->category->findOne([]);
        $this->category->findOne(null);
        $this->category->findOne($this->category);
    }

    public function testFindByToThrowTypeError() {
        $this->expectException(\TypeError::class);

        $this->category->findBy(1, 2);
        $this->category->findBy('1', '1');
        $this->category->findBy(null, 1);
        $this->category->findBy(1, null);
    }

    public function testGetNewsShouldReturnArray() {
        $this->assertIsArray( $this->category->getNews(1) );
        $this->assertIsArray( $this->category->getNews(5) );
        $this->assertIsArray( $this->category->getNews(14) );
    }
}
