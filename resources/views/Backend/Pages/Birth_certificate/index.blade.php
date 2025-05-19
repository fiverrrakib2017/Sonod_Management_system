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

                <div class="box-body">
                    <div class="box" style="border-top: none;">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-bordered table-striped">
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
@endsection


@section('script')

<script type="module">

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


</script>

@endsection
