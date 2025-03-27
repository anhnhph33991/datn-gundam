<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Toastr;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    private const PATH_VIEW = 'admin.subcategories.';

    public function index()
    {

        $subCategories = SubCategory::query()
            ->latest()->paginate(10);

        if ($subCategories->currentPage() > $subCategories->lastPage()) {
            return redirect()->route('admin.sub-categories.index', parameters: ['page' => $subCategories->lastPage()]);
        }

        return view(self::PATH_VIEW . __FUNCTION__, compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::query()
            ->latest()
            ->get();


        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {

        $data = $request->except(['status', 'is_active']);
        $data['status'] = $request->boolean('status', false);
        $data['is_active'] = $request->boolean('is_active', false);
        $data['slug'] = Str::slug($request->name, '-') . '-' .  time();

        SubCategory::create($data);

        Toastr::success(null, 'Thao tác thành công');
        return redirect()->route('admin.sub-categories.index');
    }

    public function show(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::query()
            ->latest()
            ->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact(['subCategory', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $data = $request->except(['status', 'is_active']);
        $data['status'] = $request->boolean('status', false);
        $data['is_active'] = $request->boolean('is_active', false);
        $data['slug'] = Str::slug($request->name, '-') . '-' .  time();

        $subCategory->update($data);

        Toastr::success(null, 'Thao tác thành công');
        return redirect()->back();
    }
}
