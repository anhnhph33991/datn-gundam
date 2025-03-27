<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Traits\ApiResponseTrait;
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
     *  /api/v1/getTopProducts
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
     *  /api/v1/getPagination
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
     *  /api/v1/{slug}/productDetail
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
