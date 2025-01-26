<?php

namespace App\Http\Controllers\Backend\Certificate;

use App\Http\Controllers\Controller;
use App\Models\Citizenship_certificate;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Inheritance_certificate;
use App\Models\Inheritance_item;
use App\Models\Post_office;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Village;
use App\Services\ValidationService;
class Inheritance_certificate_controller extends Controller
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
        ];

        $validation = $this->newInstance->check($request, $rules);
        if ($validation !== true) {
            return $validation;
        }
    }
    public function index()
    {
        $division= Division::latest()->get();
        $district= District::latest()->get();
        $upzila=Upozila::latest()->get();
        $union=Union::latest()->get();
        $post_office=Post_office::latest()->get();
        $village=Village::latest()->get();
        return view('Backend.Pages.Inheritance_certificate.index',compact('district','division','upzila','union','post_office','village'));
    }
    public function all_data(Request $request){
        $search = $request->search['value'];
        $columnsForOrderBy = ['id', 'created_at'];
        $orderByColumn = $columnsForOrderBy[$request->order[0]['column']];
        $orderDirection = $request->order[0]['dir'];

        $query = Inheritance_certificate::with('zila','upzila' , 'union','post_office','village')->when($search, function ($query) use ($search) {

            $query->where('name_en', 'like', "%$search%")
                  ->orWhere('father_name_bn', 'like', "%$search%")
                  ->orWhere('father_name_en', 'like', "%$search%")

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
    public function store(Request $request)
{
    /*Validate the request*/
    $this->validation($request);

    $certificate = new Inheritance_certificate();
    $certificate->division_id = $request->division_id;
    $certificate->district_id = $request->district_id;
    $certificate->upozila_id = $request->upzila_id;
    $certificate->union_id = $request->union_id;
    $certificate->post_office_id = $request->post_office_id;
    $certificate->village_id = $request->village_id;
    $certificate->ward = $request->word_no;

    $certificate->name_bn = $request->name_bn;
    $certificate->name_en = $request->name_en;

    $certificate->father_name_bn = $request->father_name_bn;
    $certificate->father_name_en = $request->father_name_en;

    $certificate->mother_name_bn = $request->mother_name_bn;
    $certificate->mother_name_en = $request->mother_name_en;

    $certificate->nid_or_birth = $request->nid_or_birthd_certificate;
    $certificate->birth_date = $request->birth_date;

    // Handle photo upload
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/photos/'), $image_name);
        $certificate->photo = 'uploads/photos/' . $image_name;
    } else {
        $certificate->photo = 'uploads/photos/default.png';
    }

    $certificate->investigation_person_name = $request->investigation_person_name;
    $certificate->application_name_bn = $request->application_name_bn;
    $certificate->application_name_en = $request->application_name_en;

    $certificate->save();

    if ($request->sub_name_en && is_array($request->sub_name_en)) {
        foreach ($request->sub_name_en as $key => $value) {
            $item = new Inheritance_item();
            $item->inheritance_certificate_id = $certificate->id;
            $item->name_bn = $request->sub_name_bn[$key] ?? null;
            $item->name_en = $value;
            $item->relation_en = $request->sub_name_relation_en[$key] ?? null;
            $item->relation_bn = $request->sub_name_relation_bn[$key] ?? null;
            $item->save();
        }
    }


    return response()->json(['success' => true, 'message' => 'Saved successfully']);
}

    public function edit($id){
        $data = Inheritance_certificate::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]);
    }
    public function update(Request $request){

        /*Validate the incoming request data*/
        $this->validation($request);
        $object =Inheritance_certificate::find($request->id);
        $object->division_id = $request->division_id;
        $object->district_id = $request->district_id;
        $object->upozila_id = $request->upzila_id;
        $object->union_id = $request->union_id;
        $object->post_office_id = $request->post_office_id;
        $object->village_id = $request->village_id;
        $object->ward = $request->word_no;

        $object->name_bn = $request->name_bn;
        $object->name_en = $request->name_en;

        $object->father_name_bn = $request->father_name_bn;
        $object->father_name_en = $request->father_name_en;

        $object->mother_name_bn = $request->mother_name_bn;
        $object->mother_name_en = $request->mother_name_en;

        $object->nid_or_birth = $request->nid_or_birthd_certificate;
        $object->birth_date = $request->birth_date;
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/photos/'),$image_name);
            $object->photo = 'uploads/photos/'.$image_name;
        }else{
            $object->photo = 'uploads/photos/default.png';
        }
        $object->update();

        return response()->json(['success' =>true, 'message'=> 'Update successfully']);
    }
    public function delete(Request $request){
        $object = Inheritance_certificate::find($request->id);

        if (!$object) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $object->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']);
    }
}
