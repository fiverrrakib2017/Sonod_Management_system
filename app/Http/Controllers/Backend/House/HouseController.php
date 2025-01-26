<?php

namespace App\Http\Controllers\Backend\House;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\District;
use App\Models\Upozila;
use App\Models\Union;
use App\Models\House;
use App\Models\Post_office;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Services\ValidationService;

class HouseController extends Controller
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
            'post_office_id' => 'required|exists:post_offices,id',
            'village_id' => 'required|exists:villages,id',
            'word_no' => 'required|string',
            'house_name' => 'required|string',
            'house_owner' => 'required|string',
            'ename' => 'required|string',
            'nid' => 'required|string',
            'toilet' => 'required|string',
            'yearly_rent' => 'nullable|string',
            'live_type' => 'required|string',
            'institute_type' => 'required|string',
            'house_name_en' => 'required|string',
            'house_owner_en' => 'required|string',
            'occupation' => 'nullable|string',
            'house_type' => 'nullable|string',
            'previous_due' => 'nullable|string',
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
        $post_office=Post_office::latest()->get();
        $village=Village::latest()->get();
        return view('Backend.Pages.House.index',compact('district','division','upzila','union','post_office','village'));
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id','district_name_bn', 'district_name_en', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];

        $query = House::with('zila','upzila' , 'union','post_office','village')->when($search, function ($query) use ($search) {

            $query->where('house_name_bn', 'like', "%$search%")
                  ->orWhere('house_name_en', 'like', "%$search%")

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
                  })
                  ->orWhereHas('post_office', function ($query) use ($search) {
                      $query->where('post_office_name_bn', 'like', "%$search%")
                            ->orWhere('post_office_name_en', 'like', "%$search%");
                  })
                  ->orWhereHas('village', function ($query) use ($search) {
                      $query->where('village_name_bn', 'like', "%$search%")
                            ->orWhere('village_name_en', 'like', "%$search%");
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
    public function store(Request $request){
        /*Validate the incoming request data*/
        $this->validation($request);

        $house = new House();
        $house->division_id = $request->division_id;
        $house->district_id = $request->district_id;
        $house->upozila_id = $request->upzila_id;
        $house->union_id = $request->union_id;
        $house->post_office_id = $request->post_office_id;
        $house->village_id = $request->village_id;

        $house->ward = $request->word_no;
        $house->house_name_bn = $request->house_name_bn;
        $house->house_name_en = $request->house_name_en;

        $house->house_owner_bn = $request->house_owner_bn;
        $house->house_owner_en = $request->house_owner_en;

        $house->father_husband_name_bn = $request->father_husband_name_bn;
        $house->father_husband_name_en = $request->father_husband_name_en;

        $house->nid_birth = $request->nid;
        $house->toilet = $request->toilet;
        $house->annual_house_rent = $request->yearly_rent;
        $house->live_type = $request->live_type;
        $house->type_of_institute = $request->institute_type;


        $house->occupation = $request->occupation;
        $house->house_type = $request->house_type;
        $house->previous_due = $request->previous_due;
        $house->save();

        return response()->json(['success' =>true, 'message'=> 'Added Successfully']);
    }
    public function edit($id){
        $data = House::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]);
    }
    public function update(Request $request){

        /*Validate the incoming request data*/
        $this->validation($request);
        $house =House::find($request->id);
        $house->division_id = $request->division_id;
        $house->district_id = $request->district_id;
        $house->upozila_id = $request->upzila_id;
        $house->union_id = $request->union_id;
        $house->post_office_id = $request->post_office_id;
        $house->village_id = $request->village_id;

        $house->ward = $request->word_no;
        $house->house_name_bn = $request->house_name_bn;
        $house->house_name_en = $request->house_name_en;

        $house->house_owner_bn = $request->house_owner_bn;
        $house->house_owner_en = $request->house_owner_en;

        $house->father_husband_name_bn = $request->father_husband_name_bn;
        $house->father_husband_name_en = $request->father_husband_name_en;

        $house->nid_birth = $request->nid;
        $house->toilet = $request->toilet;
        $house->annual_house_rent = $request->yearly_rent;
        $house->live_type = $request->live_type;
        $house->type_of_institute = $request->institute_type;


        $house->occupation = $request->occupation;
        $house->house_type = $request->house_type;
        $house->previous_due = $request->previous_due;
        $house->save();

        return response()->json(['success' =>true, 'message'=> 'Update successfully']);
    }
    public function delete(Request $request){
        $object = House::find($request->id);

        if (!$object) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $object->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']);
    }

}
