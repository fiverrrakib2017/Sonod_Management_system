@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')
<section class="content-header">
    <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> নতুন বাড়ী যুক্ত করুন</button>
</section>         

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">বিভাগ</label>
                            <select id="search_division_id" class="form-control" required="">
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($division as $item)
                                  <option value="{{$item->id}}">{{$item->division_name_bn}}</option>   
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">জেলা</label>
                            <select id="search_zila_id" class="form-control" required="">
                                <option value="">---নির্বাচন করুন---</option>
                                <!-- @foreach ($district as $item)
                                  <option value="{{$item->id}}">{{$item->district_name_bn}}</option>   
                                @endforeach -->
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">উপজেলা</label>
                            <select id="search_upzila_id" class="form-control" required="">
                                <option value="">---নির্বাচন করুন---</option>
                                <!-- @foreach ($upzila as $item)
                                  <option value="{{$item->id}}">{{$item->upozila_name_bn}}</option>   
                                @endforeach -->
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">ইউনিয়ন</label>
                            <select id="search_union_id" class="form-control" required="">
                                <option value="">---নির্বাচন করুন---</option>
                                <!-- @foreach ($upzila as $item)
                                  <option value="{{$item->id}}">{{$item->upozila_name_bn}}</option>   
                                @endforeach -->
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box" style="border-top: none;">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-bordered table-striped">
                                    <thead class="data-table-head">
                                        <tr class="data-table-head-row">
                                            <th>ক্রমিক নং </th>
                                            <th>জেলার নাম</th>
                                            <th>জেলার নাম (ইংরজিতে)</th>
                                            <th>উপজেলা নাম</th>
                                            <th>উপজেলা নাম (ইংরজিতে)</th>
                                            <th>ইউনিয়ন নাম</th>
                                            <th>ইউনিয়ন নাম (ইংরজিতে)</th>
                                            <th>পোস্ট অফিস</th>
                                            <th>পোস্ট অফিস (ইংরেজিতে)</th>
                                            <th>গ্রাম</th>
                                            <th>গ্রাম (ইংরেজিতে)</th>
                                            <th>বাড়ী</th>
                                            <th>বাড়ী (ইংরেজিতে)</th>
                                            <th>ডিলিট/পরিবর্তন </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data rows will be here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
      <!--Add Modal Start -->
      <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">নতুন বাড়ী যুক্ত করুন
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.house.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-6">                        
                        <div class="form-group">
                            <label>বিভাগ: </label>
                            <select required="" id="division_id" name="division_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>---নির্বাচন করুন---</option>
                                @foreach ($division as $item)
                                    <option value="{{$item->id}}">{{$item->division_name_bn}}</option>   
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>উপজেলা: </label>
                            <select required="" id="upzila_id" name="upzila_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>---নির্বাচন করুন---</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>পোস্ট অফিস: </label>
                            <select required="" id="post_office_id" name="post_office_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>---নির্বাচন করুন---</option>
                                
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label>বাড়ীর নাম (বাংলা ):</label>
                            <input name="house_name_bn" placeholder="বাড়ীর নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label>বাড়ীর মালিক (বাংলা)</label>
                            <input name="house_owner_bn" placeholder="বাড়ীর মালিক বাংলাতে লিখুন" class="form-control" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label>পিতা/স্বামী (বাংলা)</label>
                            <input name="father_husband_name_bn" placeholder="পিতা/স্বামী বাংলাতে লিখুন" class="form-control" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label> জাতীয় পরিচয়পত্র/জন্ম সনদ</label>
                            <input name="nid" placeholder="জাতীয় পরিচয়পত্র/জন্ম সনদ লিখুন" class="form-control" type="number" required="">
                        </div>                        
                        <div class="form-group">
                            <label>টয়লেট </label><br>
                            <label>
                                <input type="radio" name="toilet" value="1" class="minimal-red"
                                    checked="">পাকা &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="toilet" value="2" class="minimal-red">কাচা
                                &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="toilet" value="3" class="minimal-red">নাই
                                &nbsp;
                            </label>
                        </div>
                        <div class="form-group">
                            <label>বাৎসরিক বাড়ি ভাড়া </label>
                            <input name="yearly_rent" class="form-control" type="text"
                                placeholder="বাৎসরিক বাড়ি ভাড়া">
                        </div>
                        <div class="form-group">
                            <label>বাস করার ধরণ </label><br>
                            <label>
                                <input type="radio" name="live_type" value="1" class="minimal-red"
                                    checked="">নিজের &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="live_type" value="2"
                                    class="minimal-red">ভাড়া &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="live_type" value="3"
                                    class="minimal-red">উভয়ই &nbsp;
                            </label>
                        </div>                        
                        <div class="form-group">
                            <label>ইনস্টিটিউট এর ধরণ </label>
                            <input class="form-control" type="text" disabled=""
                                placeholder="আবাসিক  ">
                            <input name="institute_type" class="form-control" type="hidden"
                                value="1">
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>জেলা: </label>
                            <select required="" id="district_id" name="district_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>---নির্বাচন করুন---</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>পৌরসভা/ইউনিয়ন: </label>
                            <select required="" id="union_id" name="union_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>---নির্বাচন করুন---</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">                     
                                <div class="form-group">
                                    <label>গ্রাম: </label>
                                    <select required="" id="village_id" name="village_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option>---নির্বাচন করুন---</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-6">                
                                <div class="form-group">
                                    <label>ওয়ার্ড: </label>
                                    <select required="" name="word_no" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option>---নির্বাচন করুন---</option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="1">5</option>
                                        <option value="1">6</option>
                                        <option value="1">7</option>
                                        <option value="1">8</option>
                                        <option value="1">9</option>
                                    </select>
                                </div> 
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label>বাড়ীর নাম (ইংরেজী)</label>
                            <input name="house_name_en" placeholder="বাড়ীর নাম ইংরেজিতে লিখুন" class="form-control" type="text" required="">
                        </div>                                               
                        <div class="form-group">
                            <label>বাড়ীর মালিক (ইংরেজী)</label>
                            <input name="house_owner_en" placeholder="বাড়ীর মালিক ইংরেজিতে লিখুন" class="form-control" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label>পিতা/স্বামী (ইংরেজী)</label>
                            <input name="father_husband_name_en" placeholder="পিতা/স্বামী ইংরেজিতে লিখুন" class="form-control" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label>বাড়ির মালিকের পেশা </label>
                            <select name="occupation"
                                class="form-control select2 select2-hidden-accessible"
                                style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="">পেশা নির্বাচন করুন </option>
                                <option value="1">কৃষক </option>
                                <option value="2">ব্যবসায়ী </option>
                                <option value="3">সরকারী চাকুরীজীবী </option>
                                <option value="4">চাকুরীজীবী </option>
                                <option value="5">অন্যান্য </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>বাড়ির ধরণ </label>
                            <select name="house_type"
                                class="form-control select2 select2-hidden-accessible"
                                style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="">--- নির্বাচন করুন ---</option>
                                <option value="পাকা ঘর">পাকা ঘর </option>
                                <option value="আধা পাকা">আধা পাকা </option>
                                <option value="কাঁচা ঘর ">কাঁচা ঘর  </option>
                                <option value="চৌচালা">চৌচালা </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>পূর্ববর্তী বকেয়া</label>
                            <input name="previous_due" class="form-control" type="text"
                                placeholder="পূর্ববর্তী  বকেয়া">
                        </div>
                    </div>
                </div>                   
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success">সংরক্ষন করুন</button>
                    </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!--modal-dialog -->
      </div>    
      <!--Add Modal End -->
    
      <!--Edit Modal Start -->
      <div class="modal fade" id="editModal">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">বাড়ী  আপডেট করুন
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.village.update')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id">
                @csrf
                <div class="form-group">
                        <label>বিভাগ: </label>
                        <select id="division_id" name="division_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($division as $item)
                            <option value="{{$item->id}}">{{$item->division_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>জেলা: </label>
                        <select required="" id="district_id" name="district_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($district as $item)
                            <option value="{{$item->id}}">{{$item->district_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>উপজেলা: </label>
                        <select required="" id="upzila_id" name="upzila_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($upzila as $item)
                            <option value="{{$item->id}}">{{$item->upozila_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ইউনিয়ন: </label>
                        <select required="" id="unionSelect" name="union_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($union as $item)
                            <option value="{{$item->id}}">{{$item->union_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>পোস্ট অফিস: </label>
                        <select required="" name="post_office_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($post_office as $item)
                            <option value="{{$item->id}}">{{$item->post_office_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>গ্রাম নাম (বাংলা ):</label>
                        <input name="name" placeholder="গ্রামের নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>গ্রাম নাম (ইংরেজী)</label>
                        <input name="ename" placeholder="গ্রামের নাম ইংরেজিতে লিখুন" class="form-control" type="text" required="">
                    </div>                   
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success">সংরক্ষন করুন</button>
                    </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--  Edit Modal End -->

      <div id="DivdeleteModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form action="{{route('admin.village.delete')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="fa fa-trash"></i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <input type="hidden" name="id" value="">
                    <a class="close" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></a>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </div>
            </form>
        </div>
      </div>
@endsection


@section('script')
<script type="module">
    import  {_LoadZila,_LoadUpzila,_LoadUnion,_LoadPostOffice,_LoadVillage,_delete} from "{{asset('Backend/assets/js/Custom.js')}}";
    /*Filter To Get The Table Data Start*/
    $(document).on('change','#search_division_id',function(){
        var getZilaRoute = '{{ route("admin.zila.get_zila", ":id") }}';
        _LoadZila($(this).val(), '#search_zila_id',getZilaRoute);
    });
    $(document).on('change','#search_zila_id',function(){
        var GetUpzilaRoute = '{{ route("admin.upzila.get_upzila", ":id") }}';
        var zilaId = $(this).val();
        _LoadUpzila(zilaId, '#search_upzila_id',GetUpzilaRoute);
    });
    $(document).on('change','#search_upzila_id',function(){
        var GetUnionRoute = '{{ route("admin.union.get_union", ":id") }}';
        _LoadUnion($(this).val(), '#search_union_id',GetUnionRoute);
    });
    /*Filter To Get The Table Data Start*/

    $(document).ready(function() {
        var table = $('#datatable1').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.house.all_data') }}",
                type: 'GET',
                data: function(d) {
                    d.division_id = $('#search_division_id').val();
                    d.district_id  = $('#search_zila_id').val();
                    d.upzila_id  = $('#search_upzila_id').val();
                    d.union_id  = $('#search_union_id').val();
                },
                beforeSend: function(request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                }
            },
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page'
            },
            columns: [
                { data: 'id' },
                { data: 'zila.district_name_bn' },
                { data: 'zila.district_name_en' },

                { data: 'upzila.upozila_name_bn' },
                { data: 'upzila.upozila_name_en' },

                { data: 'union.union_name_bn' },
                { data: 'union.union_name_en' },

                { data: 'post_office.post_office_name_bn' },
                { data: 'post_office.post_office_name_en' },
                { data: 'house_name_bn' },
                { data: 'house_name_en' },
            
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn btn-primary btn-sm mr-3 edit-btn" data-id="${row.id}"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm mr-3 delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="${row.id}"><i class="fa fa-trash"></i></button>`;
                    }
                }
            ],
            order: [
                [0, "desc"]
            ]
        });

        $('#search_division_id').change(function() {
        $('#datatable1').DataTable().ajax.reload( null , false);
        });
        $('#search_zila_id').change(function() {
        $('#datatable1').DataTable().ajax.reload( null , false);
        });
        $('#search_upzila_id').change(function() {
        $('#datatable1').DataTable().ajax.reload( null , false);
        });
        $('#search_union_id').change(function() {
        $('#datatable1').DataTable().ajax.reload( null , false);
        });
    });
    
  /** Handle edit button click**/
  $('#datatable1 tbody').on('click', '.edit-btn', function () {
      var id = $(this).data('id');
      var editUrl = '{{ route("admin.village.edit", ":id") }}';
      var url = editUrl.replace(':id', id);
      $.ajax({
          type: 'GET',
          url: url,
          success: function (response) {
              if (response.success) {
                $('#editModal').modal('show');
                $('#editModal input[name="id"]').val(response.data.id);
                $('#editModal select[name="division_id"]').val(response.data.division_id);
                $('#editModal select[name="district_id"]').val(response.data.district_id);
                $('#editModal select[name="upzila_id"]').val(response.data.upozila_id );
                $('#editModal select[name="union_id"]').val(response.data.union_id );
                $('#editModal select[name="post_office_id"]').val(response.data.post_office_id);
                $('#editModal input[name="name"]').val(response.data.village_name_bn);
                $('#editModal input[name="ename"]').val(response.data.village_name_en);
              } else {
                toastr.error("Error fetching data for edit!");
              }
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
            toastr.error("Error fetching data for edit!");
          }
      });
    });




  /** Handle Delete button click**/
    $('#datatable1 tbody').on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        $('#DivdeleteModal').modal('show');
        $("input[name*='id']").val(id);
    });



    /** Handle form submission for delete **/
    //_delete();


    /*Add Modal To Get The Dependency*/
   
    $(document).on('change','#division_id',function(){
        var getZilaRoute = '{{ route("admin.zila.get_zila", ":id") }}';
        _LoadZila($(this).val(), '#district_id',getZilaRoute);
    });
    $(document).on('change','#district_id',function(){
        var GetUpzilaRoute = '{{ route("admin.upzila.get_upzila", ":id") }}';
        var zilaId = $(this).val();
        _LoadUpzila(zilaId, '#upzila_id',GetUpzilaRoute);
    });
    $(document).on('change','#upzila_id',function(){
        var GetUnionRoute = '{{ route("admin.union.get_union", ":id") }}';
        _LoadUnion($(this).val(), '#union_id',GetUnionRoute);
    });
    $(document).on('change','#union_id',function(){
        var route = '{{ route("admin.post_office.get_post_office", ":id") }}';
        _LoadPostOffice($(this).val(), '#post_office_id',route);
    });
    $(document).on('change','#post_office_id',function(){
        var route = '{{ route("admin.village.get_village", ":id") }}';
        _LoadVillage($(this).val(), '#village_id',route);
    });
    /*Filter To Get The Table Data Start*/

  /** Store The data from the database table **/
  $('#addModal form').submit(function(e){
    e.preventDefault();

    var form = $(this);
    var url = form.attr('action');
    var formData = form.serialize();
    /** Use Ajax to send the delete request **/
    $.ajax({
      type:'POST',
      'url':url,
      data: formData,
      success: function (response) {
        if (response.success) {
            $('#addModal ').modal('hide');
            $('#addModal form')[0].reset();
            toastr.success(response.message);
            $('#datatable1').DataTable().ajax.reload( null , false);
        }
      },

      error: function (xhr, status, error) {
         /** Handle  errors **/
        if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
                toastr.error(value[0]); 
            });
        }
      }
    });
  });




  /** Update The data from the database table **/
  $('#editModal form').submit(function(e){
    e.preventDefault();

    var form = $(this);
    var url = form.attr('action');
    var formData = form.serialize();

    /*Get the submit button*/
    var submitBtn = form.find('button[type="submit"]');

    /*Save the original button text*/
    var originalBtnText = submitBtn.html();

    /*Change button text to loading state*/
    submitBtn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>`);

    var form = $(this);
    var url = form.attr('action');
    var formData = form.serialize();
    /** Use Ajax to send the delete request **/
    $.ajax({
      type:'POST',
      'url':url,
      data: formData,
      beforeSend: function () {
        form.find(':input').prop('disabled', true);
      },
      success: function (response) {
        if (response.success) {
            submitBtn.html(originalBtnText);
            $('#editModal').modal('hide');
            $('#editModal form')[0].reset();
            toastr.success(response.message);
            $('#datatable1').DataTable().ajax.reload( null , false);
        }
      },

      error: function (xhr, status, error) {
        if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
                toastr.error(value[0]);
            });
        } else {
            toastr.error("An error occurred. Please try again.");
        }
      },
      complete: function () {
        submitBtn.html(originalBtnText);
          form.find(':input').prop('disabled', false);
        }
    });
  });
  
  
</script>

@endsection