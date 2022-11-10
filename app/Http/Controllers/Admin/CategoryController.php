<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryImage;
// use App\Models\Product;
use App\Services\CategoryService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
// use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService, $mls, $index_view, $upload_image_directory, $index_route_name, $detail_view, $edit_view;
    public function __construct()
    {
         //services
         $this->categoryService = new CategoryService();
         $this->index_view = 'admin.category.index';
         $this->create_view = 'admin.category.create';
         $this->upload_image_directory = 'files/categories';
         $this->index_route_name = 'admin.categories.index';
         $this->detail_view = 'admin.category.details';
         $this->edit_view = 'admin.category.edit';
         //mls is used for manage language content based on keys in messages.php
         $this->mls = new ManagerLanguageService('messages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        if ($request->ajax()) {
            $items = $this->categoryService->datatable();
            $items = CategoryService::search($request, $items);
            return datatables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->create_view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryService->create($input);

        $category_images = [];

        if ($request->hasFile('category_images')) {
            $images = FileService::multipleImageUploader($request, 'category_images', $this->upload_image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $category_images[$i]['category_id'] = $category->id;
                $category_images[$i]['name'] = $images[$i];
            }
            CategoryImage::insert($category_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'category', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // dd($category);
        return view($this->detail_view, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);

        return view($this->edit_view, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $input = $request->all();
        $category->update($input);

        if ($request->hasFile('category_images')) {
            $images = FileService::multipleImageUploader($request, 'category_images', $this->upload_image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $category_images[$i]['product_id'] = $category->id;
                $category_images[$i]['name'] = $images[$i];
            }
            CategoryImage::insert($category_images);
        }

        return redirect()->back()
            ->with('success', $this->mls->messageLanguage('updated', 'category', 1));
    }

}