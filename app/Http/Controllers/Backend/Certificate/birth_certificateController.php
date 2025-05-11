<?php

namespace App\Http\Controllers\Backend\Certificate;

use App\Http\Controllers\Controller;
use App\Models\Birth_certificate;
use App\Models\Citizenship_certificate;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Post_office;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Village;
use App\Services\ValidationService;
class birth_certificateController extends Controller
{

    public function index()
    {

        return view('Backend.Pages.Birth_certificate.index');
    }
    public function upload()
    {

        return view('Backend.Pages.Birth_certificate.upload');
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];

        $query = Birth_certificate::when($search, function ($query) use ($search) {

            $query->where('name', 'like', "%$search%")
                  ->orWhere('nid', 'like', "%$search%")
                  ->orWhere('father_name', 'like', "%$search%")
                  ->orWhere('mother_name', 'like', "%$search%")
                  ->orWhere('provide_date', 'like', "%$search%");

                //   ->orWhereHas('zila', function ($query) use ($search) {
                //       $query->where('district_name_bn', 'like', "%$search%")
                //             ->orWhere('district_name_en', 'like', "%$search%");
                //   });
        });

        if ($request->has('division_id') && !empty($request->division_id)) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->has('district_id') && !empty($request->district_id)) {
            $query->where('district_id', $request->district_id);
        }
        if ($request->has('upzila_id') && !empty($request->upzila_id)) {
            $query->where('upozila_id', $request->upzila_id);
        }
        if ($request->has('union_id') && !empty($request->union_id)) {
            $query->where('union_id', $request->union_id);
        }

        $total = $query->count();
        $items = $query->orderBy($orderByColumn, $orderDirection)
                       ->skip($request->start)
                       ->take($request->length)
                       ->get();

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $items,
        ]);
    }
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'nid' => 'required|string|max:20',
            'father_name' => 'required',
            'mother_name' => 'required',
            'union' => 'required',
            'village' => 'required',
            'ward_no' => 'required',
        ]);
        $object=new Birth_certificate();
        $object->name=$request->name;
        $object->nid=$request->nid;
        $object->father_name=$request->father_name;
        $object->mother_name=$request->mother_name;
        $object->union=$request->union;
        $object->village=$request->village;
        $object->ward_no=$request->ward_no;
        $object->provide_date=$request->provide_date;
        $object->save();
        return response()->json(['success' =>true, 'message'=> 'Saved successfully']);
    }
      public function upload_csv_file(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');


        if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
            $isFirstRow = true;

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {

                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue;
                }
                Birth_certificate::create([
                    'name'         => $data[0] ?? '',
                    'nid'          => $data[1] ?? '',
                    'father_name'  => $data[2] ?? '',
                    'mother_name'  => $data[3] ?? '',
                    'union'        => $data[4] ?? '',
                    'village'      => $data[5] ?? '',
                    'ward_no'      => $data[6] ?? '',
                    'birth_date' => date('Y-m-d', strtotime($data[7])) ?? now(),
                    'provide_date' => date('Y-m-d', strtotime($data[8])) ?? now(),
                ]);
            }

            fclose($handle);
        }

        return back()->with('success', 'ডেটা সফলভাবে আপলোড হয়েছে।');
    }
    public function edit($id){
        $data = Birth_certificate::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]);
    }
    public function update(Request $request){

        /*Validate the incoming request data*/
      $request->validate([
            'name' => 'required|string|max:255',
            'nid' => 'required|string|max:20',
            'father_name' => 'required',
            'mother_name' => 'required',
            'union' => 'required',
            'village' => 'required',
            'ward_no' => 'required',
        ]);
        $object =Birth_certificate::find($request->id);
        $object->name=$request->name;
        $object->nid=$request->nid;
        $object->father_name=$request->father_name;
        $object->mother_name=$request->mother_name;
        $object->union=$request->union;
        $object->village=$request->village;
        $object->ward_no=$request->ward_no;
        $object->provide_date=$request->provide_date;
        $object->update();

        return response()->json(['success' =>true, 'message'=> 'Update successfully']);
    }
    public function delete(Request $request){
        $object = Birth_certificate::find($request->id);

        if (!$object) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $object->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']);
    }
}
