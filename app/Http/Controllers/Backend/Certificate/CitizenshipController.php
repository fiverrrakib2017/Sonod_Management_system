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
class CitizenshipController extends Controller
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
        return view('Backend.Pages.Citizenship_centificate.index',compact('district','division','upzila','union','post_office','village'));
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
        }
        $object->save();
        return response()->json(['success' =>true, 'message'=> 'Saved successfully']);
    }
}
