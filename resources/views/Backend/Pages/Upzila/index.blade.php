@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')
<section class="content-header">
    <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> নতুন উপজেলা যুক্ত করুন</button>
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
                                <option value="1">ঢাকা</option>
                                <option value="2">চট্টগ্রাম</option>
                                <option value="3">রাজশাহী</option>
                                <option value="4">খুলনা</option>
                                <option value="5">সিলেট</option>
                                <option value="6">বরিশাল </option>
                                <option value="7">রংপুর </option>
                                <option value="8">ময়মনসিংহ </option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">জেলা</label>
                            <select id="search_division_id" class="form-control" required="">
                                <option value="">---নির্বাচন করুন---</option>
                                <option value="1">জামালপুর</option>
                                <option value="2">শেরপুর</option>
                                <option value="3">নেত্রকোনা</option>
                                <option value="8">ময়মনসিংহ </option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">উপজেলা</label>
                            <select id="search_division_id" class="form-control" required="">
                                <option value="">---নির্বাচন করুন---</option>
                                <option value="1">মেলান্দহ</option>
                                <option value="2">মাদারগঞ্জ</option>
                                <option value="3">জামালপুর সদর</option>
                                <option value="8">বকশিগঞ্জ</option>
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="box-body" style="">
                    <div class="box" style="border-top: none;">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datatable1"
                                class="table table-bordered table-striped table-responsive">
                                <thead class="data-table-head">
                                    <tr class="data-table-head-row">
                                        <th>ক্রমিক নং </th>
                                        <th>জেলার নাম</th>
                                        <th>জেলার নাম (ইংরজিতে)</th>
                                        <th>উপজেলা নাম</th>
                                        <th>উপজেলা নাম (ইংরজিতে)</th>
                                        <th>ডিলিট/পরিবর্তন </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
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
              <h4 class="modal-title">নতুন উপজেলা যুক্ত করুন
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
              <form action="{{route('admin.upzila.store')}}" method="POST" enctype="multipart/form-data">
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
                        </select>
                    </div>
                    <div class="form-group">
                        <label>উপজেলা নাম (বাংলা ):</label>
                        <input name="upzila_name" placeholder="উপজেলার নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>উপজেলা নাম (ইংরেজী)</label>
                        <input name="ename" placeholder="উপজেলার নাম ইংরেজিতে লিখুন" class="form-control" type="text" required="">
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
              <h4 class="modal-title">উপজেলা আপডেট করুন
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.upzila.update')}}" method="POST" enctype="multipart/form-data">
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
                        <select id="districtSelect" name="district_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option>---নির্বাচন করুন---</option>
                            @foreach ($district as $item)
                            <option value="{{$item->id}}">{{$item->district_name_bn}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>উপজেলা নাম (বাংলা ):</label>
                        <input name="upzila_name" placeholder="উপজেলার নাম বাংলাতে লিখুন" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>উপজেলা নাম (ইংরেজী)</label>
                        <input name="ename" placeholder="উপজেলার নাম ইংরেজিতে লিখুন" class="form-control" type="text" required="">
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
            <form action="{{route('admin.zila.delete')}}" method="post" enctype="multipart/form-data">
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
            url: "{{ route('admin.upzila.all_data') }}",
            type: 'GET',
            // data: function(d) {
            //     d.division_id = $('#searchDivision').val();
            // },
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
            { data: 'upozila_name_bn' },
            { data: 'upozila_name_en' },
           
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

    // $('#searchDivision').change(function() {
    //    // table.ajax.reload();
    //    $('#datatable1').DataTable().ajax.reload( null , false);
    // });
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

  /** Handle edit button click**/
  $('#datatable1 tbody').on('click', '.edit-btn', function () {
      var id = $(this).data('id');
      var editUrl = '{{ route("admin.upzila.edit", ":id") }}';
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
                $('#editModal input[name="upzila_name"]').val(response.data.upozila_name_bn);
                $('#editModal input[name="ename"]').val(response.data.upozila_name_en);
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