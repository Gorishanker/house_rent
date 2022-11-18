<?php

namespace App\Services;

use App\Models\Category;
// use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class CategoryService
{
    protected $product_image_directory;

    public function __construct()
    {
        $this->product_image_directory = 'files/categories';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Category
     */
    public static function create(array $data)
    {
        $data = Category::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Category $category
     * @return Category
     */
    public static function update(array $data, Category $category)
    {
        $data = $category->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Category
     */
    public static function getById($id)
    {
        $data = Category::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Category
     * @return bool
     */
    public static function delete(Category $category)
    {
        $data = $category->delete();
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - Category Id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = Category::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Category with states, countries
     */
    public static function datatable()
    {
        $data = Category::orderBy('created_at', 'desc');
        return $data;
    }

    public static function search(Request $request, $items)
    {
        if (isset($request->name)) {
            $items = $items->where('name', 'like', "%{$request->name}%");
        }
        if (isset($request->category_id)) {
            $items = $items->where('id', $request->category_id);
        }
        // if (isset($request->status)) {
        //     $items = $items->where('is_active', $request->status);
        // }
        return $items;
    }


    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Product
     */
    public static function insert(array $data)
    {
        $data = Category::insert($data);
        return $data;
    }

    /**
     * Get data for download Report from storage.
     *
     * @return Product
     */
    public static function downloadCategoryReport()
    {
        $data = Category::query()
            ->select(
                'id',
                'name',
                'slug',
                DB::raw("(CASE WHEN (is_active = 1) THEN 'Active' ELSE 'Inactive' END) as status"),
                DB::raw("(DATE_FORMAT(created_at,'%d-%M-%Y')) as created_date"),
                DB::raw("(DATE_FORMAT(updated_at,'%d-%M-%Y')) as updated_date"),
            )->orderBy('created_at', 'desc');
        return $data;
    }

}


