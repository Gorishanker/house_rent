<?php

namespace App\Exports\Admin;

use App\Services\PropertyService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PropertyExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $request, $propertyService;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->propertyService = new PropertyService;
    }

    public function query()
    {
        $items = $this->propertyService->downloadPropertyReport();
        $items = $this->propertyService->search($this->request, $items);
        return $items;
    }

    public function headings(): array
    {
        return [
            'Property-Id',
            'Title',
            'Rent',
            'Address',
            'Size',
            'Room Category',
            'Additional Features',
            'Apt Overview',
            'Features',
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
