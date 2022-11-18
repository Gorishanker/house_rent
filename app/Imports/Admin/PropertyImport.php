<?php

namespace App\Imports\Admin;

use App\Models\Property;
use App\Services\HelperService;
use App\Services\ManagerLanguageService;
use App\Services\PropertyService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PropertyImport implements ToCollection, WithStartRow
{
    protected $mls, $productService, $helperService, $productModel;

    public function __construct()
    {
        $this->mls = new ManagerLanguageService('flash');
        $this->propertyService = new PropertyService();
        $this->helperService = new HelperService();
        $this->propertyModel = new Property();
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

            $data[$i]['title'] = $row[0];
            $data[$i]['rent'] = $row[1];
            $data[$i]['address'] = $row[2];
            $data[$i]['size'] = $row[3];
            $data[$i]['room_category'] = $row[4];
            $data[$i]['additional_facilities'] = $row[5];
            $data[$i]['apt_overview'] = $row[6];
            $data[$i]['features'] = $row[7];
            $data[$i]['slug'] = $row[0];



            if (($row[8] == 'Active') || ($row[8] ==  'active') || ($row[8] ==  '1')) {
                $data[$i]['is_active'] = 1;
            } else {
                $data[$i]['is_active'] = 0;
            }
            // $data[$i]['slug'] = $this->helperService->createSlug($this->propertyModel, 'slug', $row[1]);
            $data[$i]['created_at'] = $this->helperService->getCurrentDateTime();
            $i++;
        }
        $products = $this->propertyService->insert($data);
    }
}
