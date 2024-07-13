<?php

namespace App\Http\Controllers\Backend\Upzila;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Upozila;
use App\Services\ValidationService;

class UpzilaController extends Controller
{
    protected  $newInstance; 
    public function __construct(ValidationService $ValidationService)
    {
        $this->newInstance=$ValidationService; 
    }
    private function validation($request){
        $rules = [
            'division_id' => 'required|integer',
            'district_id' => 'required|integer',
            'upzila_name' => 'required|string|max:255',
            'ename' => 'required|string|max:255',
        ];

        $validation = $this->newInstance->check($request, $rules);
        if ($validation !== true) {
            return $validation;
        }
    }
    public function index(){
        $division= Division::latest()->get();
        $district= District::latest()->get();
        $upzila=Upozila::latest()->get();
        return view('Backend.Pages.Upzila.index',compact('district','division','upzila'));
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id','district_name_bn', 'district_name_en', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];
    
        $query = Upozila::with('zila')->when($search, function ($query) use ($search) {
            $query->where('upozila_name_bn', 'like', "%$search%")
                  ->orWhere('upozila_name_en', 'like', "%$search%")
                  ->orWhereHas('zila', function ($query) use ($search) {
                      $query->where('district_name_bn', 'like', "%$search%")
                            ->orWhere('district_name_en', 'like', "%$search%");
                  });
        });
    
        // if ($request->has('division_id') && !empty($request->division_id)) {
        //     $query->where('division_id', $request->division_id);
        // }
    
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
    public function store(Request $request){
        /*Validate the incoming request data*/
        $this->validation($request);
        // Create a new  instance
        $object = new Upozila();
        $object->division_id = $request->division_id;
        $object->district_id = $request->district_id;
        $object->upozila_name_bn = $request->upzila_name;
        $object->upozila_name_en = $request->ename;
        $object->save();

        return response()->json(['success' =>true, 'message'=> 'Added Successfully']);
    }
    public function edit($id){
        $data = Upozila::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]); 
    }
    public function update(Request $request){
        /*Validate the incoming request data*/
        $this->validation($request);
        $object= Upozila::find($request->id);
        $object->division_id = $request->division_id;
        $object->district_id = $request->district_id;
        $object->upozila_name_bn = $request->upzila_name;
        $object->upozila_name_en = $request->ename;
        $object->save();

        return response()->json(['success' =>true, 'message'=> 'Update successfully']);
    }
    public function delete(Request $request){
        $country = Upozila::find($request->id);

        if (!$country) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $country->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']); 
    }
}