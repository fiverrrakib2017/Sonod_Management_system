@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')
<section class="content-header">
    {{-- <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> জন্ম  তথ্য  সনদ আবেদন করুন</button> --}}
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
                                <table id="datatable1"  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="data-table-head">
                                        <tr class="data-table-head-row">
                                            <th>ক্রমিক নং</th>
                                            <th>বিভাগ</th>
                                            <th>জেলা</th>
                                            <th>উপজেলা</th>
                                            <th>ইউনিয়ন</th>

                                            <th>জন্ম নিবন্ধন নং</th>
                                            <th> জন্ম তারিখ</th>

                                            <th>নাম</th>
                                            <th>পিতার/স্বামীর নাম</th>
                                            <th>মাতার নাম</th>
                                            <th>গ্রাম</th>
                                            <th>ওয়ার্ড নং</th>
                                            <th>প্রদানের তারিখ</th>
                                            <th>দেখুন </th>
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







  <!--View Modal Start -->
      <div class="modal fade" id="viewModal">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">জন্ম সনদ বিস্তারিত</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></h4>
            </div>
            <div class="modal-body">
               <table class="table table-bordered">
                <tr><th>বিভাগ</th><td id="division_name"></td></tr>
                <tr><th>জেলা</th><td id="zila_name"></td></tr>
                <tr><th>উপজেলা</th><td id="upzila_name"></td></tr>
                <tr><th>ইউনিয়ন</th><td id="union_name"></td></tr>

                <tr><th>জন্ম নিবন্ধন নং</th><td id="birth_no"></td></tr>
                <tr><th>জন্ম তারিখ</th><td id="birth_date"></td></tr>

                <tr><th>নাম</th><td id="name"></td></tr>
                <tr><th>পিতার নাম</th><td id="father_name"></td></tr>
                <tr><th>মাতার নাম</th><td id="mother_name"></td></tr>
                <tr><th>গ্রাম</th><td id="village_name"></td></tr>
                <tr><th>ওয়ার্ড নং</th><td id="ward_no"></td></tr>
                <tr><th>প্রদান তারিখ</th><td id="provide_date"></td></tr>
            </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!--modal-dialog -->
      </div>
      <!--view Modal End -->
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
                { data: 'division.division_name_bn' },
                { data: 'zila.district_name_bn' },
                { data: 'upzila.upozila_name_bn' },
                { data: 'union.union_name_bn' },

                { data: 'birth_no'},
                { data: 'birth_date'},

                { data: 'name'},
                { data: 'father_name'},
                { data: 'mother_name' },

                { data: 'village' },

                { data: 'ward_no' },
                { data: 'provide_date' },


                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn btn-success btn-sm mr-3 view-btn" data-id="${row.id}"><i class="fa fa-eye"></i></button>`;
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
        $(document).on('click', '.view-btn', function() {
            var id = $(this).data('id');
            var viewUrl = '{{ route("admin.birth_certificate.view", ":id") }}';
            var url = viewUrl.replace(':id', id);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    if (response.success) {
                        $('#viewModal').modal('show');
                        $('#viewModal #division_name').text(response.data.division.division_name_bn);
                        $('#viewModal #zila_name').text(response.data.zila.district_name_bn);
                        $('#viewModal #upzila_name').text(response.data.upzila.upozila_name_bn);
                        $('#viewModal #union_name').text(response.data.union.union_name_bn);

                        $('#viewModal #birth_no').text(response.data.birth_no);
                        $('#viewModal #birth_date').text(response.data.birth_date);
                        $('#viewModal #name').text(response.data.name);
                        $('#viewModal #father_name').text(response.data.father_name);
                        $('#viewModal #mother_name').text(response.data.mother_name);
                        $('#viewModal #village_name').text(response.data.village);
                        $('#viewModal #ward_no').text(response.data.ward_no);
                        $('#viewModal #provide_date').text(response.data.provide_date);
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

</script>

@endsection
