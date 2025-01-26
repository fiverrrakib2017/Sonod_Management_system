<?php

namespace App\Http\Controllers\Backend\Institude;


use App\Http\Controllers\Controller;
use App\Services\ValidationService;
use App\Models\Division;
use App\Models\District;
use App\Models\Upozila;
use App\Models\Union;
use App\Models\House;
use App\Models\Post_office;
use App\Models\Village;
class Institude_controller extends Controller
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
        return view('Backend.Pages.Institute.index',compact('district','division','upzila','union','post_office','village'));
    }





}
