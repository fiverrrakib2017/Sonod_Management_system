@extends('Backend.Layout.App')
@section('title','সনদ ব্যবস্থাপনা | Sonod Management ')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">
                        <i class="fa fa-upload"></i> জন্ম সনদের ডেটা আপলোড করুন
                    </h3>
                </div>
                <div class="box-body">
                    {{-- Sample File Download --}}
                    <div class="text-right" style="margin-bottom: 15px;">
                        <a href="{{ asset('Backend/birth_certificate_sample.csv') }}" class="btn btn-info btn-sm" download>
                            <i class="fa fa-download"></i> স্যাম্পল ফাইল ডাউনলোড করুন
                        </a>
                    </div>

                    {{-- Upload Form --}}
                    <form action="{{ route('admin.birth_certificate.upload_file') }}" enctype="multipart/form-data" method="POST" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="file" class="col-sm-3 control-label">CSV ফাইল নির্বাচন করুন:</label>
                            <div class="col-sm-9">
                                <input type="file" name="file" accept=".csv" class="form-control" required>
                                <small class="text-muted">শুধুমাত্র .csv ফাইল আপলোড করুন</small>
                            </div>
                        </div>

                        <div class="form-group text-center" style="margin-top: 20px;">
                            <button class="btn btn-success">
                                <i class="fa fa-upload"></i> আপলোড করুন
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
