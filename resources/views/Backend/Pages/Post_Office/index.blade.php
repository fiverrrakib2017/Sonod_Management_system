@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')
<section class="content-header">
    <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i>নতুন পোস্ট অফিস যুক্ত করুন</button>
</section>         

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4 col-sm-3">
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
                    <div class="col-md-4 col-sm-3">
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
                    <div class="col-md-4 col-sm-3">
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
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">নতুন পোস্ট অফিস যুক্ত করুন
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.post_office.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label>বিভাগ: </label>
                        <select id="divisionSelect" name="division_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($division as $item)
                            <option value="{{$item->id}}">{{$item->division_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>জেলা: </label>
                        <select required="" id="districtSelect" name="district_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($district as $item)
                            <option value="{{$item->id}}">{{$item->district_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>উপজেলা: </label>
                        <select required="" id="upzilaSelect" name="upzila_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
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
                        <label>পোস্ট অফিস নাম (বাংলা ):</label>
                        <input name="name" placeholder="নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>পোস্ট অফিস নাম (ইংরেজী)</label>
                        <input name="ename" placeholder="নাম ইংরেজিতে লিখুন" class="form-control" type="text" required="">
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
              <h4 class="modal-title">পোস্ট অফিস আপডেট করুন
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.post_office.update')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id">
                @csrf
                <div class="form-group">
                        <label>বিভাগ: </label>
                        <select id="divisionSelect" name="division_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($division as $item)
                            <option value="{{$item->id}}">{{$item->division_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>জেলা: </label>
                        <select required="" id="districtSelect" name="district_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($district as $item)
                            <option value="{{$item->id}}">{{$item->district_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>উপজেলা: </label>
                        <select required="" id="upzilaSelect" name="upzila_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
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
                        <label>পোস্ট অফিস নাম (বাংলা ):</label>
                        <input name="name" placeholder="নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>পোস্ট অফিস নাম (ইংরেজী)</label>
                        <input name="ename" placeholder="নাম ইংরেজিতে লিখুন" class="form-control" type="text" required="">
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
            <form action="{{route('admin.post_office.delete')}}" method="post" enctype="multipart/form-data">
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
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#datatable1').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.post_office.all_data') }}",
            type: 'GET',
            data: function(d) {
                d.division_id = $('#search_division_id').val();
                d.district_id  = $('#search_zila_id').val();
                d.upzila_id  = $('#search_upzila_id').val();
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

            { data: 'post_office_name_bn' },
            { data: 'post_office_name_en' },
           
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
});

  $(document).on('change','#divisionSelect',function(){
    var divisionId = $(this).val();
    var _prev_url = '{{ route("admin.zila.get_zila", ":id") }}';
    var url = _prev_url.replace(':id', divisionId);
    if (divisionId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#districtSelect').empty();
                $('#districtSelect').append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $('#districtSelect').append('<option value="' + value.id + '">' + value.district_name_bn + '</option>');
                });
            }
        });
    } else {
        $('#districtSelect').empty();
        $('#districtSelect').append('<option>---নির্বাচন করুন---</option>');
    }
  });
  $(document).on('change','#districtSelect',function(){
    var Id = $(this).val();
    var _prev_url = '{{ route("admin.upzila.get_upzila", ":id") }}';
    var url = _prev_url.replace(':id',Id);
    if (Id) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#upzilaSelect').empty();
                $('#upzilaSelect').append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $('#upzilaSelect').append('<option value="' + value.id + '">' + value.upozila_name_bn + '</option>');
                });
            }
        });
    } else {
        $('#upzilaSelect').empty();
        $('#upzilaSelect').append('<option>---নির্বাচন করুন---</option>');
    }
  });
  $(document).on('change','#search_division_id',function(){
    var divisionId = $(this).val();
    var _prev_url = '{{ route("admin.zila.get_zila", ":id") }}';
    var url = _prev_url.replace(':id', divisionId);
    if (divisionId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#search_zila_id').empty();
                $('#search_zila_id').append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $('#search_zila_id').append('<option value="' + value.id + '">' + value.district_name_bn + '</option>');
                });
            }
        });
    } else {
        $('#search_zila_id').empty();
        $('#search_zila_id').append('<option>---নির্বাচন করুন---</option>');
    }
  });
  $(document).on('change','#search_zila_id',function(){
    var zilaId = $(this).val();
    var _prev_url = '{{ route("admin.upzila.get_upzila", ":id") }}';
    var url = _prev_url.replace(':id', zilaId);
    if (zilaId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#search_upzila_id').empty();
                $('#search_upzila_id').append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $('#search_upzila_id').append('<option value="' + value.id + '">' + value.upozila_name_bn + '</option>');
                });
            }
        });
    } else {
        $('#search_upzila_id').empty();
        $('#search_upzila_id').append('<option>---নির্বাচন করুন---</option>');
    }
  });

  /** Handle edit button click**/
  $('#datatable1 tbody').on('click', '.edit-btn', function () {
      var id = $(this).data('id');
      var editUrl = '{{ route("admin.post_office.edit", ":id") }}';
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
                $('#editModal input[name="name"]').val(response.data.post_office_name_bn);
                $('#editModal input[name="ename"]').val(response.data.post_office_name_en);
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
  $('#DivdeleteModal form').submit(function(e){
    e.preventDefault();
    /*Get the submit button*/
    var submitBtn =  $('#DivdeleteModal form').find('button[type="submit"]');

    /* Save the original button text*/
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
      success: function (response) {
        if (response.success) {
          $('#DivdeleteModal').modal('hide');
          toastr.success(response.message);
          $('#datatable1').DataTable().ajax.reload( null , false);
        }
      },

      error: function (xhr, status, error) {
         /** Handle  errors **/
         toastr.error(xhr.responseText);
      },
      complete: function () {
        submitBtn.html(originalBtnText);
        }
    });
  });




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