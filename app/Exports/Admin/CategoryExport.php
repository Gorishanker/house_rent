<?php

namespace App\Exports\Admin;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoryExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $request, $categoryService;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->categoryService = new CategoryService;
    }

    public function query()
    {
        $items = $this->categoryService->downloadCategoryReport();
        $items = $this->categoryService->search($this->request, $items);
        return $items;
    }

    public function headings(): array
    {
        return [
            'Category Id',
            'Name',
            'Slug',
            'Status',
            'Created Date',
            'Updated Date'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
