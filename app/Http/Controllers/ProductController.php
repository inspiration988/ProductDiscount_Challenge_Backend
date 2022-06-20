<?php

namespace App\Http\Controllers;

use App\Helpers\ProductResource;
use App\Repositories\ProductRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/**
 * Class ProductnController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    public $perPage = 5 ;
    /** @var  ProductRepository */
    private $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }



    /**
     * Display a list of products.
     * GET|HEAD /index
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(isset($request->price)){

            $requestedPrice = $request->price ;
            $this->productRepository->lessThan($requestedPrice);
        }

       

        $page = $request->input('page',1);
        $start = ($page-1)*$this->perPage;

        // $x = $this->productRepository->getCollection()->skip($start)->take($this->perPage);
        // dd($x);
    return Response::success('Product Lists retrieved successfully' ,ProductResource::collection(
        $this->productRepository
        ->getCollection()
        ->skip($start)
        ->take($this->perPage)) );

    }

}
