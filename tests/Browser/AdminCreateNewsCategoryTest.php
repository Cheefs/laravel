<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminCreateNewsCategoryTest extends DuskTestCase
{
    public function setUp(): void{
        parent::setUp();

        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testFormView() {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.news.create')
                ->assertSee(__('Title'))
                ->assertSee(__('Category'))
                ->assertSee(__('Text'))
                ->assertSee( __('Is Private'))
                ->assertSee(__('Create'));
        });
    }

    public function testTitleValidation() {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.news.category.create')
                ->type('title', '')
                ->type('slug', 'etewtwtwetwt wt wet wet ')
                ->press(__('Create'))
                ->assertSee(__('Field Title is required'));

            $browser->type('title', '234')
                ->press(__('Create'))
                ->assertSee(__('Title to short'));

            $browser->type('title', 'etewtwtwetwt wt wet wet etewtwtwetwt wt wet wet etewtwtwetwt wt wet wet')
                ->press(__('Create'))
                ->assertSee(__('Title to long'));
        });
    }

    public function testSlugValidation() {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.news.category.create')
                ->type('title', 'TEST')
                ->type('slug', '')
                ->press(__('Create'))
                ->assertSee(__('Field Slug is required'));

            $browser->type('slug', 'etewtwtwetwt wt wet wet etewtwtwetwt wt wet wet etewtwtwetwt wt wet wet')
                ->press(__('Create'))
                ->assertSee(__('Slug to long'));
        });
    }

    public function testAddNewCategoryNews() {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.news.category.create')
                ->type('title', 'TEST')
                ->type('slug', 'test')
                ->press(__('Create'))
                ->assertSee(__('News Category created!'));
        });
    }
}
