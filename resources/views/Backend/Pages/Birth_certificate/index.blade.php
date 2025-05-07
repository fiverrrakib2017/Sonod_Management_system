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
                                            <th>ক্রমিক নং</th>
                                            <th>নাম</th>
                                            <th>কার্ড নং</th>
                                            <th>এনআইডি নম্বর</th>
                                            <th>পিতার/স্বামীর নাম</th>
                                            <th>মাতার নাম</th>
                                            <th>ইউনিয়ন</th>
                                            <th>গ্রাম</th>
                                            <th>ওয়ার্ড</th>
                                            <th>মোবাইল নম্বর</th>
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


    $(document).ready(function() {
        var table = $('#datatable1').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                //url: "{{ route('admin.citizenship_certificate.all_data') }}",
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
