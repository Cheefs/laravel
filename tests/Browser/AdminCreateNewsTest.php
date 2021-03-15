<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminCreateNewsTest extends DuskTestCase
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
            $browser->visitRoute('admin.news.create')
                ->type('title', '')
                ->type('text', 'etewtwtwetwt wt wet wet ')
                ->select('news_category_id')
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

    public function testTextValidation() {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.news.create')
                ->type('title', 'TEST')
                ->type('text', '')
                ->select('news_category_id')
                ->press(__('Create'))
                ->assertSee(__('Field News text is required'));

            $browser->type('text', '234')
                ->press(__('Create'))
                ->assertSee(__('News text to short'));
        });
    }

    public function testAddNewNews() {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin.news.create')
                ->type('title', 'TEST')
                ->type('text', 'etewtwtwetwt wt wet wet ')
                ->select('news_category_id')
                ->press(__('Create'))
                ->assertSee(__('News created!'));
        });
    }
}
