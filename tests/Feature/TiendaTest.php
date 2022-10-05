<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Order;

class TiendaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    /** @test */
    public function confirm_order()
    {
        $this->withoutExceptionHandling();
        $data = [
            'customer_name' => "Jairo Yamarte",
            'customer_email' => "jairoyamarte@gmail.com",
            'customer_mobile' => "04122366453",
            'status' => "CREATED"
        ];

        $response = $this->Post('/order/confirm', $data, [OrderController::class,'confirm']);
        $response->assertStatus(200);
    }

    /** @test */
    public function create_order()
    {
        $this->withoutExceptionHandling();

        $data = [
            'customer_name' => "Jairo Yamarte",
            'customer_email' => "jairoyamarte@gmail.com",
            'customer_mobile' => "04122366453",
            'status' => "CREATED",
            'product_name' => "Jairo Yamarte",
            'product_price' => "$150,00"
        ];

        $response = $this->Post('/order/store', $data, [OrderController::class,'store']);
        $response->assertStatus(200);

        $this->assertCount(1,Order::all());

        $order = Order::first();

        $response->assertViewIs('order.confirm');

        //$response->assertViewHas('order', $order);
    }

    /** @test */
    public function list_order()
    {
        $this->withoutExceptionHandling();

        //$order = Order::all();
        Order::factory(2)->create();

        $this->
    }

    
}
