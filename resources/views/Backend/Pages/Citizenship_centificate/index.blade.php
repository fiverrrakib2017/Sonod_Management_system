@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')
<section class="content-header">
    <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> নতুন নাগরিকত্ব সনদ আবেদন করুন</button>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-body">
                    <div class="box" style="border-top: none;">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-bordered table-striped">
                                    <thead class="data-table-head">
                                        <tr class="data-table-head-row">
                                            <th>ক্রমিক নং </th>
                                            <th> নাম</th>
                                            <th> পিতার নাম</th>
                                            <th> মাতার নাম</th>
                                            <th> গ্রাম</th>
                                            <th> ডাকঘর</th>
                                            <th> ইউনিয়ন</th>
                                            <th> উপজেলা</th>
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
      <!-- Citizenship Certification Add Modal Start -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> নাগরিকত্ব সনদ আবেদন করুন
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('admin.citizenship_certificate.store') }}" method="POST" enctype="multipart/form-data">@csrf
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
                                        @foreach ($upzila as $item)
                                            <option value="{{$item->id}}">{{$item->upozila_name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>পোস্ট অফিস: </label>
                                    <select required="" id="post_office_id" name="post_office_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option>---নির্বাচন করুন---</option>
                                         @foreach ($post_office as $item)
                                            <option value="{{$item->id}}">{{$item->post_office_name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> নাম (বাংলা ):</label>
                                    <input name="name_bn" placeholder=" নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label> পিতার নাম (বাংলা ):</label>
                                    <input name="father_name_bn" placeholder=" নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label> মাতার নাম (বাংলা ):</label>
                                    <input name="mother_name_bn" placeholder=" নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                                </div>
                                <div class="row">
                                    <div class="col-md-7 col-sm-7">
                                        <div class="form-group">
                                            <label>পরিচয়পত্র/জন্ম নিবন্ধন:</label>
                                            <input name="nid_or_birthd_certificate" placeholder="Write the NID in English  "
                                                class="form-control" type="number" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div class="form-group">
                                            <label>জন্ম তারিখ: </label>
                                            <input name="birth_date" class="form-control" type="date" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                    <label>পৌরসভা/ইউনিয়ন: </label>
                                    <select required="" id="union_id" name="union_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option>---নির্বাচন করুন---</option>
                                        @foreach ($union  as $item)
                                        <option value="{{$item->id}}">{{$item->union_name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>গ্রাম: </label>
                                            <select required="" id="village_id" name="village_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option>---নির্বাচন করুন---</option>
                                                @foreach ($village  as $item)
                                                    <option value="{{$item->id}}">{{$item->village_name_bn}}</option>
                                                @endforeach
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
                                    <label>নাম (ইংরেজী ):</label>
                                    <input name="name_en" placeholder="Write the Name in English  " class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>পিতার নাম (ইংরেজী):</label>
                                    <input name="father_name_en" placeholder=" পিতার নাম ইংরেজীতে লিখুন" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>মাতার নাম (ইংরেজী):</label>
                                    <input name="mother_name_en" placeholder="মাতার নাম ইংরেজীতে লিখুন" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label> ছবি (Optional): </label>
                                    <input name="photo" class="form-control" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="btn btn-block btn-primary">সংরক্ষন</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!--Add Modal End -->

      <!--Edit Modal Start -->
      <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> নাগরিকত্ব সনদ আবেদন করুন
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('admin.citizenship_certificate.update') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>বিভাগ: </label>
                                <input type="hidden" name="id" class="d-none">
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
                                    @foreach ($upzila as $item)
                                        <option value="{{$item->id}}">{{$item->upozila_name_bn}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>পোস্ট অফিস: </label>
                                <select required="" id="post_office_id" name="post_office_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option>---নির্বাচন করুন---</option>
                                     @foreach ($post_office as $item)
                                        <option value="{{$item->id}}">{{$item->post_office_name_bn}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label> নাম (বাংলা ):</label>
                                <input name="name_bn" placeholder=" নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label> পিতার নাম (বাংলা ):</label>
                                <input name="father_name_bn" placeholder=" নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label> মাতার নাম (বাংলা ):</label>
                                <input name="mother_name_bn" placeholder=" নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <label>পরিচয়পত্র/জন্ম নিবন্ধন:</label>
                                        <input name="nid_or_birthd_certificate" placeholder="Write the NID in English  "
                                            class="form-control" type="number" required="">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <label>জন্ম তারিখ: </label>
                                        <input name="birth_date" class="form-control" type="date" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <label>পৌরসভা/ইউনিয়ন: </label>
                                <select required="" id="union_id" name="union_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option>---নির্বাচন করুন---</option>
                                    @foreach ($union  as $item)
                                    <option value="{{$item->id}}">{{$item->union_name_bn}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>গ্রাম: </label>
                                        <select required="" id="village_id" name="village_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option>---নির্বাচন করুন---</option>
                                            @foreach ($village  as $item)
                                                <option value="{{$item->id}}">{{$item->village_name_bn}}</option>
                                            @endforeach
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
                                <label>নাম (ইংরেজী ):</label>
                                <input name="name_en" placeholder="Write the Name in English  " class="form-control" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>পিতার নাম (ইংরেজী):</label>
                                <input name="father_name_en" placeholder=" পিতার নাম ইংরেজীতে লিখুন" class="form-control" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>মাতার নাম (ইংরেজী):</label>
                                <input name="mother_name_en" placeholder="মাতার নাম ইংরেজীতে লিখুন" class="form-control" type="text" required>
                            </div>
                            <div class="form-group">
                                <label> ছবি (Optional): </label>
                                <input name="photo" class="form-control" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-block btn-primary">পরিবর্তন করুন </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!--  Edit Modal End -->

      <div id="DivdeleteModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form action="{{route('admin.citizenship_certificate.delete')}}" method="post" enctype="multipart/form-data">
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
                url: "{{ route('admin.citizenship_certificate.all_data') }}",
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
                { data: 'name_en' },
                { data: 'father_name_en' },

                { data: 'mother_name_en' },
                { data: 'village.village_name_en' },

                { data: 'post_office.post_office_name_en' },

                { data: 'union.union_name_en' },

                { data: 'upzila.upozila_name_en' },

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
      var editUrl = '{{ route("admin.citizenship_certificate.edit", ":id") }}';
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
                $('#editModal select[name="village_id"]').val(response.data.village_id);
                $('#editModal select[name="word_no"]').val(response.data.ward);

                $('#editModal input[name="name_bn"]').val(response.data.name_bn);
                $('#editModal input[name="name_en"]').val(response.data.name_en);



                $('#editModal input[name="father_name_en"]').val(response.data.father_name_en);
                $('#editModal input[name="father_name_bn"]').val(response.data.father_name_bn);

                $('#editModal input[name="mother_name_en"]').val(response.data.mother_name_en);
                $('#editModal input[name="mother_name_bn"]').val(response.data.mother_name_bn);

                $('#editModal input[name="nid_or_birthd_certificate"]').val(response.data.nid_or_birth);
                $('#editModal input[name="birth_date"]').val(response.data.birth_date);


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
    _delete();


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
