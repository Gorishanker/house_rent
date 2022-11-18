<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Admin\CategoryExport;
use App\Exports\Admin\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Imports\Admin\CategoryImport;
use App\Models\Category;
use App\Models\CategoryImage;
// use App\Models\Product;
use App\Services\CategoryService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
// use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

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
                $category_images[$i]['category_id'] = $category->id;
                $category_images[$i]['name'] = $images[$i];
            }
            CategoryImage::insert($category_images);
        }

        return redirect()->back()
            ->with('success', $this->mls->messageLanguage('updated', 'category', 1));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('category_deleted'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Category has not deleted'),
                'status_name' => 'error'
            ]);
        }
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('deleted', 'category', 1));
    }

    public function export(Request $request)
    {
        return (new CategoryExport($request))->download($request->export == 'excel' ? 'categories.xlsx' : 'categories.csv');
    }




    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $test = Excel::import(new CategoryImport, $request->file);
        if (session()->has('error')) {
            return back()->with('error', session()->get('error'));
        } else {
            return back()->with('success', $this->mls->onlyNameLanguage('all_good_title'));
        }
    }

    public function downloadImportFormatFile()
    {
        $url = '/category_import_format.xlsx';
        // $fileName = time() . '.xlsx';
        $filePath = public_path() . $url;
        $filename = '';
        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename="' . 'sasaee.xlsx' . '"'
        );

        return Response::download($filePath, $filename, $headers);
    }

}
