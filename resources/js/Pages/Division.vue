<template>
    <section class="content-header">
                <button type="button" data-id="1" class="btn-success modal-info btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-division-add"><i class="fa fa-pencil"></i> নতুন বিভাগ যুক্ত করুন</button>
    </section>         
    <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
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
                                                    <th>বিভাগ নাম</th>
                                                    <th>বিভাগ নাম (ইংরজিতে)</th>
                                                    <th>ডিলিট/পরিবর্তন </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>বরিশাল</td>
                                                    <td>Barisal</td>
                                                    <td>
                                                        <a href="#">
                                                            <button type="button" class="btn btn-success bg-primary btn-flat " data-toggle="modal" data-target="#modal-division-edit"><i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>

                                                        <a href="#">
                                                            <button type="button" class="btn bg-red btn-flat "><i class="fa fa-remove"></i></button>
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
</template>

<script>

</script>

<style>

</style>