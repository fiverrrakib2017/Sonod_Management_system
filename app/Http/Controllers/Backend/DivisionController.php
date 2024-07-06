<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    public function index(){
        return view('Backend.Pages.Division.index');
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id', 'division_name_bn', 'division_name_en', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];
    
        $object = Division::when($search, function ($query) use ($search) {
            $query->where('division_name_bn', 'like', "%$search%")
                  ->orWhere('division_name_en', 'like', "%$search%");
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
        $validator = Validator::make($request->all(), [
            'division_name_bn' => 'required|string|max:255',
            'division_name_en' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create a new  instance
        $country = new Division();
        $country->division_name_bn = $request->division_name_bn;
        $country->division_name_en = $request->division_name_en;
        $country->save();

        return response()->json(['success' =>true, 'message'=> 'Added Successfully']);
    }
    public function edit($id){
        $data = Division::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]); 
    }
    public function update(Request $request){
        /*Validate the incoming request data*/
        $validator = Validator::make($request->all(), [
            'division_name_bn' => 'required|string|max:255',
            'division_name_en' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $country= Division::find($request->id);
        $country->division_name_bn = $request->division_name_bn;
        $country->division_name_en = $request->division_name_en;
        $country->save();

        return response()->json(['success' => 'Update Successfully']);
    }
    public function delete(Request $request){
        $country = Division::find($request->id);

        if (!$country) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $country->delete();

        return response()->json(['success' => 'Deleted successfully']); 
    }
}
