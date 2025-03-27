<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\ApiRequestJsonTrait;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    use ApiResponseTrait;
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     *  Lấy ra top 5 sản phẩn nổi bật
     */
    public function getTopProducts()
    {
        $products = $this->productService->getTopService(5);
        return $this->successResponse(
            $products,
            'Thao tác thành công !!!',
            Response::HTTP_OK
        );
    }
    /**
     *  Danh sách sản phẩm
     */
    public function getPagination()
    {
        $products = $this->productService->getPaginationService(15);
        return $this->successResponse(
            $products,
            'Thao tác thành công !!!',
            Response::HTTP_OK
        );
    }
    /**
     *  Chi tiết sản phẩm
     */
    public function productDetail(string $slug)
    {
        $product = $this->productService->getDetailService($slug);
        return $this->successResponse(
            $product,
            'Thao tác thành công !!!',
            Response::HTTP_OK
        );
    }

    
}
