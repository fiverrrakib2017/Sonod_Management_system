<?php

namespace App\Http\Controllers\Backend\Zila;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Services\ValidationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZilaController extends Controller
{
    protected  $newInstance; 
    public function __construct(ValidationService $ValidationService)
    {
        $this->newInstance=$ValidationService; 
    }
    private function validation($request){
        $rules = [
            'division_id' => 'required|integer',
            'district_name' => 'required|string|max:255',
            'ename' => 'required|string|max:255',
        ];

        $validation = $this->newInstance->check($request, $rules);
        if ($validation !== true) {
            return $validation;
        }
    }
    public function index(){
       $division= Division::latest()->get();
        return view('Backend.Pages.Zila.index',compact('division'));
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id','district_name_bn', 'district_name_en', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];
    
        $object = District::with('division')->when($search, function ($query) use ($search) {
            $query->where('district_name_bn', 'like', "%$search%")
                  ->orWhere('district_name_en', 'like', "%$search%")
                  ->orWhereHas('division', function ($query) use ($search) {
                      $query->where('division_name_bn', 'like', "%$search%")
                            ->orWhere('division_name_en', 'like', "%$search%");
                  });
        });
        
    
        $total = $object->count();
        $items = $object->orderBy($orderByColumn, $orderDirection)
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
    
    public function store(Request $request){
        /*Validate the incoming request data*/
        $this->validation($request);
        // Create a new  instance
        $object = new District();
        $object->division_id = $request->division_id;
        $object->district_name_bn = $request->district_name;
        $object->district_name_en = $request->ename;
        $object->save();

        return response()->json(['success' =>true, 'message'=> 'Added Successfully']);
    }
    public function edit($id){
        $data = District::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]); 
    }
    public function update(Request $request){
        /*Validate the incoming request data*/
        $this->validation($request);
        $object= District::find($request->id);
        $object->division_id = $request->division_id;
        $object->district_name_bn = $request->district_name;
        $object->district_name_en = $request->ename;
        $object->save();

        return response()->json(['success' =>true, 'message'=> 'Update successfully']);
    }
    public function delete(Request $request){
        $country = District::find($request->id);

        if (!$country) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $country->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']); 
    }
}
