<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Admin\PropertyExport;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Validator;
use App\Imports\Admin\PropertyImport;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
// use App\Services\ProductService;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class PropertyController extends Controller
{
    protected $propertyService,$create_view,$index_route_name,$mls,$upload_image_directory;
    public function __construct()
    {
        $this->propertyService = new PropertyService();
        $this->index_view = 'admin.property.index';
        $this->create_view = 'admin.property.create';
        $this->index_route_name = 'admin.properties.index';
        $this->edit_view = 'admin.property.edit';
        $this->mls = new ManagerLanguageService('messages');
        $this->upload_image_directory = 'files/properties';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $items = $this->propertyService->datatable();
            $items = PropertyService::search($request, $items);
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
    public function store(Request $request)
    {

        $input = $request->all();
        // dd($input);
        $property = $this->propertyService->create($input);

        $property_images = [];

        if ($request->hasFile('property_images')) {
            $images = FileService::multipleImageUploader($request, 'property_images', $this->upload_image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $property_images[$i]['property_id'] = $property->id;
                $property_images[$i]['name'] = $images[$i];
            }
            PropertyImage::insert($property_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'property', 1));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        // dd($category);

        return view($this->edit_view, compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $input = $request->all();
        $property->update($input);

        if ($request->hasFile('property_images')) {
            $images = FileService::multipleImageUploader($request, 'property_images', $this->upload_image_directory);
            // dd($images);
            $property_images = [];
            for ($i = 0; $i < count($images); $i++) {
                $property_images[$i]['property_id'] = $property->id;
                $property_images[$i]['name'] = $images[$i];
            }
            PropertyImage::insert($property_images);
        }

        return redirect()->back()
            ->with('success', $this->mls->messageLanguage('updated', 'property', 1));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $result = $property->delete();

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('property_deleted'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Property has not deleted'),
                'status_name' => 'error'
            ]);
        }
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('deleted', 'property', 1));
    }


    public function deleteImage($id)
    {
        $property_image = PropertyImage::find($id);
        $remove_image = FileService::removeImage($property_image, 'name', 'files/properties');
        dd($remove_image);
        if ($remove_image) {
            $result = $property_image->delete();
            if ($result) {

                return response()->json([
                    'status' => 1,
                    'title' => $this->mls->onlyNameLanguage('deleted_title'),
                    'message' => $this->mls->onlyNameLanguage('image_deleted'),
                    'status_name' => 'success'
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'title' => $this->mls->onlyNameLanguage('deleted_title'),
                    'message' => $this->mls->onlyNameLanguage('image_not_deleted'),
                    'status_name' => 'error'
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('image_not_deleted'),
                'status_name' => 'error'
            ]);
        }
    }

    public function export(Request $request)
    {
        return (new PropertyExport($request))->download($request->export == 'excel' ? 'properties.xlsx' : 'properties.csv');
    }





    public function add_property(Request $request)
    {

    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'rent' => 'required',
            'address' => 'required',
            'size' => 'required',
            'room_category' => 'required',
            'additional_facilities' => 'required',
            'apt_overview' => 'required',
            'features' => 'required',
        ]);
        if ($validator->passes()) {
             $input = $request->all();
        // dd($input);
        $property = $this->propertyService->create($input);

                return response()->json(['success'=>'Added new records.']);

                // return response()->json(['success'=>'Added new records.']);

                }
        else {
            return response()->json(['error'=>$validator->errors()]);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $test = Excel::import(new PropertyImport, $request->file);
        if (session()->has('error')) {
            return back()->with('error', session()->get('error'));
        } else {
            return back()->with('success', $this->mls->onlyNameLanguage('all_good_title'));
        }
    }

    public function downloadImportFormatFile()
    {
        $url = '/property_import_format.xlsx';
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
