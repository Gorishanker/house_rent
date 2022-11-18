<?php

namespace App\Imports\Admin;

use App\Models\Category;
use App\Services\CategoryService;
use App\Services\HelperService;
use App\Services\ManagerLanguageService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CategoryImport implements ToCollection, WithStartRow
{
    protected $mls, $productService, $helperService, $productModel;

    public function __construct()
    {
        $this->mls = new ManagerLanguageService('flash');
        $this->categoryService = new CategoryService();
        $this->helperService = new HelperService();
        $this->categoryModel = new Category();
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // dd($rows);
        $data = [];
        $i = 0;
        // dd($rows);
        foreach ($rows as $row) {
            // if ($row[0] == null) continue;
            // if ($row[1] == null) continue;
            // if ($row[2] == null) continue;
            // if ($row[3] == null) continue;
            // if ($row[4] == null) continue;
            /**
             *         'title','name','quantity', 'price','is_active', 'slug',
             */

            $data[$i]['name'] = $row[0];
            $data[$i]['slug'] = $this->helperService->createSlug($this->categoryModel, 'slug', $row[1]);
            // $data[$i]['slug'] = $row[1];
            // $data[$i]['quantity'] = $row[2];
            // $data[$i]['price'] = $row[3];

            if (($row[2] == 'Active') || ($row[2] ==  'active') || ($row[4] ==  '2')) {
                $data[$i]['is_active'] = 1;
            } else {
                $data[$i]['is_active'] = 0;
            }

            $data[$i]['created_at'] = $this->helperService->getCurrentDateTime();
            $i++;
        }
        $category = $this->categoryService->insert($data);
    }
}
