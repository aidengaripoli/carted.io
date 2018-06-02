<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCartsTest extends TestCase
{
    use RefreshDatabase;

    protected $cart;

    protected function setUp()
    {
        parent::setUp();

        $this->cart = create('Cart');
    }

    /** @test */
    public function authenticated_users_can_view_all_carts()
    {
        $this->signIn();

        $this->get('/carts')
            ->assertSee($this->cart->name);
    }

    /** @test */
    public function unauthenticated_users_can_not_view_all_carts()
    {
        $this->withExceptionHandling()
            ->get('/carts')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_view_a_single_cart()
    {
        $this->signIn();

        $this->get($this->cart->path())
            ->assertSee($this->cart->name);
    }

    /** @test */
    public function unauthenticated_users_can_not_view_a_single_cart()
    {
        $this->withExceptionHandling()
            ->get($this->cart->path())
            ->assertRedirect('/login');
    }
}
