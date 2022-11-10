<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyService
{
    protected $product_image_directory;

    public function __construct()
    {
        $this->product_image_directory = 'files/properties';
    }

    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Product
     */
    public static function create(array $data)
    {
        $data = Property::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Product
     */
    public static function insert(array $data)
    {
        $data = Product::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $id)
    {
        $data = Product::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Product $product
     */
    public static function getById($id)
    {
        $data = Product::find($id);
        return $data;
    }

    /**
     * Get data by $parameters.
     *
     * @param Array $parameters
     * @return Model
     */
    public static function getByParameters($parameters)
    {
        $data = Product::query();
        foreach ($parameters as $parameter) {
            $data = $data->where($parameter['column_name'], $parameter['value']);
        }
        return $data;
    }

    /**
     * Delete data by product.
     *
     * @param Product $product
     * @return bool
     */
    public static function delete(Product $product)
    {
        $data = $product->delete();
        return $data;
    }


    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Property::query();
        return $data;
    }

    public static function search(Request $request, $items)
    {
        if (isset($request->name)) {
            $items = $items->where('name', 'like', "%{$request->name}%");
        }
        if (isset($request->product_id)) {
            $items = $items->where('id', $request->product_id);
        }
        if (isset($request->status)) {
            $items = $items->where('is_active', $request->status);
        }
        return $items;
    }
}
