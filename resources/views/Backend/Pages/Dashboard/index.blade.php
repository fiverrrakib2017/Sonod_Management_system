@extends('Backend.Layout.App')
@section('title','Dashboard | Admin Panel')

@section('content')
  <section class="content-header">
    <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-district-add"><i class="fa fa-pencil"></i> নতুন জেলা যুক্ত করুন</button>
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
                    </div>
                    <div class="box-body" style="">
                        <div class="box" style="border-top: none;">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="viewAllHouse"
                                    class="table table-bordered table-striped table-responsive">
                                    <thead class="data-table-head">
                                        <tr class="data-table-head-row">
                                            <th>ক্রমিক নং </th>
                                            <th>জেলার নাম</th>
                                            <th>জেলার নাম (ইংরজিতে)</th>
                                            <th>বিভাগ </th>
                                            <th>ডিলিট/পরিবর্তন </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>বরিশাল</td>
                                            <td>Barisal</td>
                                            <td>বরিশাল</td>
                                            <td>
                                                <a href="#">
                                                    <button type="button" class="btn bg-primary btn-flat " data-toggle="modal" data-target="#modal-district-edit"><i class="fa fa-edit"></i>
                                                    </button>
                                                </a>

                                                <a href="?c=district&m=delete_district&id=1">
                                                    <button onclick="alert('Are you Sure Want to Delete?')"
                                                        type="button" class="btn bg-red btn-flat "><i
                                                            class="fa fa-remove"></i></button></a>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
  <script type="text/javascript"> 
    $(document).ready(function(){
           
    });

  </script>
@endsection