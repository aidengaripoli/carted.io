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

    /** @test */
    public function it_has_a_seller()
    {
        $this->assertInstanceOf('App\User', $this->cart->seller);
    }

    /** @test */
    public function it_does_not_have_a_buyer_when_created()
    {
        $this->assertNull($this->cart->buyer);
    }

    /** @test */
    public function it_has_a_buyer_when_purchased()
    {
        $user = create('User');
        $this->signIn($user);

        $user->purchase($this->cart);

        $this->assertInstanceOf('App\User', $this->cart->buyer);
    }

    /** @test */
    public function it_is_active_when_created()
    {
        $this->assertTrue($this->cart->isActive());
    }

    /** @test */
    public function it_expires_after_ten_minutes()
    {
        $this->assertFalse($this->cart->hasExpired());

        $this->cart->created_at = $this->cart->created_at->subMinutes(10);

        $this->assertTrue($this->cart->hasExpired());
    }

    /** @test */
    public function it_is_inactive_when_purchased()
    {
        $this->assertTrue($this->cart->isActive());

        $user = create('User');
        $user->purchase($this->cart);

        $this->assertFalse($this->cart->isActive());
    }

    /** @test */
    public function it_is_inactive_when_expired()
    {
        $this->assertTrue($this->cart->isActive());

        $this->cart->created_at = $this->cart->created_at->subMinutes(10);

        $this->assertFalse($this->cart->isActive());
    }
}
