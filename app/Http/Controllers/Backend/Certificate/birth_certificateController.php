<?php

namespace App\Http\Controllers\Backend\Certificate;

use App\Http\Controllers\Controller;
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

        $query = Citizenship_certificate::with('zila','upzila' , 'union','post_office','village')->when($search, function ($query) use ($search) {

            $query->where('name_bn', 'like', "%$search%")
                  ->orWhere('name_en', 'like', "%$search%")
                  ->orWhere('name_bn', 'like', "%$search%")
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
       // return $request->all();exit;
        $this->validation($request);
        $object=new Citizenship_certificate();
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
        $object->save();
        return response()->json(['success' =>true, 'message'=> 'Saved successfully']);
    }
    public function edit($id){
        $data = Citizenship_certificate::find($id);
        if (!$data) {
            return response()->json(['error' => 'Not found']);
        }
        return response()->json(['success'=>true,'data' => $data]);
    }
    public function update(Request $request){

        /*Validate the incoming request data*/
        $this->validation($request);
        $object =Citizenship_certificate::find($request->id);
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
        $object = Citizenship_certificate::find($request->id);

        if (!$object) {
            return response()->json(['error' => 'Not found']);
        }
        // Delete the Data
        $object->delete();

        return response()->json(['success' =>true, 'message'=> 'Deleted successfully']);
    }
}
