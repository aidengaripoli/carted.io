<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartsTest extends TestCase
{
    use RefreshDatabase;

    protected $cart;

    protected function setUp()
    {
        parent::setUp();

        $this->cart = create('Cart');
    }

    /** @test */
    public function it_can_make_a_path_string()
    {
        $this->assertEquals(
            "/carts/{$this->cart->id}",
            $this->cart->path()
        );
    }
}
