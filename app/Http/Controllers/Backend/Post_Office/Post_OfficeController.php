<?php

namespace App\Http\Controllers\Backend\Post_Office;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Post_office;
use App\Models\Union;
use App\Models\Upozila;
use App\Services\ValidationService;

class Post_OfficeController extends Controller
{
    protected  $newInstance; 
    public function __construct(ValidationService $ValidationService)
    {
        $this->newInstance=$ValidationService; 
    }
    private function validation($request){
        $rules = [
           'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'upzila_id' => 'required|exists:upozilas,id',
            'union_id' => 'required|exists:unions,id',
            'name' => 'required|string|max:255',
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
        $union=Union::latest()->get();
        return view('Backend.Pages.Post_Office.index',compact('district','division','upzila','union'));
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id','district_name_bn', 'district_name_en', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];
    
        $query = Post_office::with('zila','upzila' , 'union')->when($search, function ($query) use ($search) {

            $query->where('post_office_name_bn', 'like', "%$search%")
                  ->orWhere('post_office_name_en', 'like', "%$search%")

                  ->orWhereHas('zila', function ($query) use ($search) {
                      $query->where('district_name_bn', 'like', "%$search%")
                            ->orWhere('district_name_en', 'like', "%$search%");
                  })
                  ->orWhereHas('upzila', function ($query) use ($search) {
                      $query->where('upozila_name_bn', 'like', "%$search%")
                            ->orWhere('upozila_name_en', 'like', "%$search%");
                  })
                  ->orWhereHas('union', function ($query) use ($search) {
                      $query->where('union_name_bn', 'like', "%$search%")
                            ->orWhere('union_name_en', 'like', "%$search%");
                  });
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

        $object = new Post_office();
        $object->division_id=$request->division_id;
        $object->district_id=$request->district_id;
        $object->upozila_id=$request->upzila_id;
        $object->union_id=$request->union_id;

        $object->post_office_name_bn=$request->name;
        $object->post_office_name_en=$request->ename;
        $object->save();

        return response()->json(['success' =>true, 'message'=> 'Added Successfully']);
    }
    public function edit($id){
        $data = Post_office::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]); 
    }
    public function update(Request $request){
        /*Validate the incoming request data*/
        $this->validation($request);
        $object =Post_office::find($request->id);
        $object->division_id=$request->division_id;
        $object->district_id=$request->district_id;
        $object->upozila_id=$request->upzila_id;
        $object->union_id=$request->union_id;

        $object->post_office_name_bn=$request->name;
        $object->post_office_name_en=$request->ename;
        $object->save();

        return response()->json(['success' =>true, 'message'=> 'Update successfully']);
    }
    public function delete(Request $request){
        $object = Post_office::find($request->id);

        if (!$object) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $object->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']); 
    }
    // public function get_upzila($id){
    //     $object = Upozila::where('district_id', $id)->get();
    //     return response()->json($object);
    // }
}