@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')
<section class="content-header">
    <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> জন্ম  তথ্য  সনদ আবেদন করুন</button>
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
                                            <th>ক্রমিক নং</th>
                                            <th>নাম</th>
                                            <th>এনআইডি নম্বর</th>
                                            <th>পিতার/স্বামীর নাম</th>
                                            <th>মাতার নাম</th>
                                            <th>ইউনিয়ন</th>
                                            <th>গ্রাম</th>
                                            <th>ওয়ার্ড</th>
                                            <th>প্রদানের তারিখ</th>
                                            <th>একশন</th>
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
    <!-- Birth Certification Add Modal Start -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> জন্ম তথ্য সনদ আবেদন করুন
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.birth_certificate.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>নাম</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>এনআইডি</label>
                            <input type="text" name="nid" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>পিতার নাম</label>
                            <input type="text" name="father_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>মাতার নাম</label>
                            <input type="text" name="mother_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ইউনিয়ন</label>
                            <input type="text" name="union" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>গ্রাম</label>
                            <input type="text" name="village" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ওয়ার্ড</label>
                            <input type="text" name="ward_no" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>প্রদানের তারিখ</label>
                            <input type="date" name="provide_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">সাবমিট করুন</button>
                    </form>
                </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!--Add Modal End -->
    <!-- Birth Certification Edit Modal Start -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> জন্ম তথ্য সনদ আপডেট করুন
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.birth_certificate.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>নাম</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>এনআইডি</label>
                            <input type="text" name="nid" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>পিতার নাম</label>
                            <input type="text" name="father_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>মাতার নাম</label>
                            <input type="text" name="mother_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ইউনিয়ন</label>
                            <input type="text" name="union" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>গ্রাম</label>
                            <input type="text" name="village" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ওয়ার্ড</label>
                            <input type="text" name="ward_no" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>প্রদানের তারিখ</label>
                            <input type="date" name="provide_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">সাবমিট করুন</button>
                    </form>
                </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!--Add Modal End -->

      <div id="DivdeleteModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form action="{{route('admin.birth_certificate.delete')}}" method="post" enctype="multipart/form-data">
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
    import  {_delete} from "{{asset('Backend/assets/js/Custom.js')}}";
    </script>
<script type="module">


    $(document).ready(function() {
        var table = $('#datatable1').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.birth_certificate.all_data') }}",
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
                { data: 'name' },
                { data: 'nid' },
                { data: 'father_name' },
                { data: 'mother_name' },

                { data: 'union' },
                { data: 'village' },

                { data: 'ward_no' },
                { data: 'provide_date' },


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
      var editUrl = '{{ route("admin.birth_certificate.edit", ":id") }}';
      var url = editUrl.replace(':id', id);
      $.ajax({
          type: 'GET',
          url: url,
          success: function (response) {
              if (response.success) {
                $('#editModal').modal('show');
                $('#editModal input[name="id"]').val(response.data.id);

                $('#editModal input[name="name"]').val(response.data.name);
                $('#editModal input[name="nid"]').val(response.data.nid);
                $('#editModal input[name="father_name"]').val(response.data.father_name);
                $('#editModal input[name="mother_name"]').val(response.data.mother_name);
                $('#editModal input[name="union"]').val(response.data.union);
                $('#editModal input[name="village"]').val(response.data.village);
                $('#editModal input[name="ward_no"]').val(response.data.ward_no);
                $('#editModal input[name="provide_date"]').val(response.data.provide_date);

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
