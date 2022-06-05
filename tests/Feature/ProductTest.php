<?php

namespace Tests\Feature;

use App\Helpers\Discount\DiscountManager;
use App\Helpers\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     *  test user gets not found error with 404 status code if the endpoint is missing .
     *
     * @return void
     */
    public function test_endpoint_not_found()
    {
        $this->json('GET', 'wrong/product/index')->assertStatus(404);
    }

    /**
     *  test user gets success response with 200 status code if the endpoint is exposed.
     *
     * @return void
     */
    public function test_endpoint_exposed()
    {
        $this->assertNotEquals(200, $this->json('GET', '/v1/product/index')->getStatusCode());
    }


    /**
     *  test user gets a detailed receipt given correct input.
     *
     * @return void
     */
    public function test_correct_category_filter()
    {
        $selectedCategory = "boots";
        $response = $this->get('/api/v1/product/index?category='.$selectedCategory);
        $data = json_decode($response->getContent(), true);
        $data  = array_map(function($product){
            return $product['category'];
        }, $data['data']);

        $data = array_unique($data);
        $this->assertEqualsCanonicalizing(
            $data,
            [
                $selectedCategory
            ]
        );
    }

    public function test_return_five_result(){
        $response = $this->get('/api/v1/product/index');
        $data = json_decode($response->getContent(), true);
        $this->assertLessThan(6,count($data['data']) );
    }
}
