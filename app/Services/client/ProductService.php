<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductService
{
    public function getTopService(string $limit)
    {
        return Product::with(['category', 'tags', 'galleries', 'variants'])
            ->where([['is_hot_deal', 1], ['is_active', 1]])
            ->latest('id')
            ->limit($limit)
            ->get();
    }

    public function getPaginationService($perpage = 15)
    {
        return Product::with(['category', 'tags', 'galleries', 'variants'])
            ->where([['is_hot_deal', 1], ['is_active', 1]])
            ->latest('id')
            ->paginate($perpage);
    }

    public function getDetailService(string $slug)
    {
        return Product::with(['category.products', 'tags', 'galleries', 'variants'])
            ->where('slug',$slug)
            ->firstOrFail();
    }
}
