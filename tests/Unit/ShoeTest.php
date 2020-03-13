<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ShoeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

    }

    public function getShoes()
    {
    	$shoe = factory(\App\Shoes::class)->create();
    	$response = $this->actingAs($shoe, 'api')->json('GET', '/gt-shoes');
    	
    	$response->assertStatus(200);

    	$response->assertJsonStructure(
    		[
    			[
    				'id',
    				'name',
    				'size',
    				'price',
    				'created_at',
    				'updated_at'
    			]
    		]
    	);
    }
}
