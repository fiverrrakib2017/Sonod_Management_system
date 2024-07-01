
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> সনদ ব্যবস্থাপনা | Sonod Management </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/jquery-jvectormap-1.2.2.css')}}">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/AdminLTE.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dataTables.bootstrap.min.js')}}"></script>
    <!--datepicker-->
    <script src="{{asset('backend/assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-timepicker.min.js')}}"></script>
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">Admin</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">সনদ ব্যবস্থাপনা</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header><!-- Left side column. contains the logo and sidebar -->
     <aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend/assets/images/admin_img/avatar.png')}}" class="img-circle" alt="user Image">
            </div>
            <div class="pull-left info">
                <p>Supper Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="#">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i> <span>ড্যাশবোর্ড</span>
                    <span class="pull-right-container">
                        <i class="pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span> ব্যবহারকারী ব্যক্তি </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" SA>
                    <li><a href="{{ route('another') }}"><i class="fa fa-circle-o"></i> নতুন ব্যবহারকারী ব্যক্তি</a>
                    </li>
                    <li><a href="view_all_users.php"><i class="fa fa-circle-o"></i> সকল ব্যবহারকারী ব্যক্তি তালিকা </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-edit"></i> <span>এরিয়া</span> <span class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span> </a>
                <ul class="treeview-menu" SA>
                    <li><a href="divisions.php"><i class="fa fa-circle-o"></i> বিভাগ </a></li>
                    <li><a href="districts.php"><i class="fa fa-circle-o"></i> জেলা </a></li>
                    <li><a href="upazila.php"><i class="fa fa-circle-o"></i>  উপজেলার </a></li>
                    <li><a href="unions.php"><i class="fa fa-circle-o"></i>  পৌরসভা/ইউনিয়ন </a></li>
                    <li><a href="postoffice.php"><i class="fa fa-circle-o"></i> ডাকঘর </a></li>
                    <li><a href="village.php"><i class="fa fa-circle-o"></i> গ্রাম </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span> বাড়ী </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
            <ul class="treeview-menu">
                <li>
                    <a href="add_house.php"><i class="fa fa-circle-o"></i> নতুন বাড়ী </a>
                </li>
                <li>
                    <a href="view_all_house.php"><i class="fa fa-circle-o"></i> সকল বাড়ী তালিকা </a>
                </li>
            </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-university"></i> <span> প্রতিষ্ঠান </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="add_institute.php"><i class="fa fa-circle-o"></i> প্রতিষ্ঠান তথ্য যোগ করুন </a></li>
                    <li><a href="view_all_institute.php"><i class="fa fa-circle-o"></i> সকল প্রতিষ্ঠান তালিকা </a> </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-th"></i> 
                    <span> একই নাম প্রত্যয়ন </span>  
                    <span class="pull-right-container"> 
                        <i class="fa fa-angle-down pull-right"></i> 
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="add_similar_name_certification.php">
                            <i class="fa fa-circle-o"></i>একই নাম প্রত্যয়ন আবেদন
                        </a>
                    </li>
                    <li>
                        <a href="view_similar_name_certification.php">
                            <i class="fa fa-circle-o"></i>সকল একই নাম প্রত্যয়ন তালিকা</a>
                        </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-th"></i> <span> অবিবাহিত সনদ </span> <span
                        class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span></a>
                <ul class="treeview-menu">
                    <li><a href="add_unmarried_certification.php"><i class="fa fa-circle-o"></i>অবিবাহিত সনদ আবেদন </a></li>
                    <li><a href="view_unmarried_certification.php"><i class="fa fa-circle-o"></i>সকল অবিবাহিত সনদ তালিকা</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-th"></i> <span> মৃত্যু সনদ </span> <span
                        class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span></a>
                <ul class="treeview-menu">
                    <li><a href="add_death_certification.php"><i class="fa fa-circle-o"></i> মৃত্যু সনদ আবেদন</a></li>
                    <li><a href="view_death_certification.php"><i class="fa fa-circle-o"></i> সকল মৃত্যু সনদ তালিকা</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-th"></i> <span> নাগরিকত্ব সনদ </span> <span
                        class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="add_citizenship_certification.php"><i class="fa fa-circle-o"></i> নাগরিকত্ব সনদ আবেদন</a></li>
                    <li><a href="view_citizenship_certification.php"><i class="fa fa-circle-o"></i> সকল নাগরিকত্ব সনদ তালিকা</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-th"></i> <span> বাণিজ্য লাইসেন্স </span> <span
                        class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span></a>
                <ul class="treeview-menu">
                    <li><a href="add_tradelicense_certificate.php"><i class="fa fa-circle-o"></i>বাণিজ্য লাইসেন্স আবেদন</a></li>
                    <li><a href="view_tradelicense_certificate.php"><i class="fa fa-circle-o"></i>সকল বাণিজ্য লাইসেন্স তালিকা</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-th"></i> <span> ওয়ারিশ সনদ </span> <span
                        class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span></a>
                <ul class="treeview-menu">
                    <li><a href="add_heir_certificate.php"><i class="fa fa-circle-o"></i>ওয়ারিশ সনদ আবেদন </a></li>
                    <li><a href="view_heir_certificate.php"><i class="fa fa-circle-o"></i> সকল ওয়ারিশ সনদ তালিকা</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>নতুন কর </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="add_tax.php"><i class="fa fa-circle-o"></i> নতুন করের হার </a></li>
                    <li><a href="add_tax_payment_union.php"><i class="fa fa-circle-o"></i> নতুন করের পেমেন্ট </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-copy"></i> <span> রিপোর্ট </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="village_tax_list.php"><i class="fa fa-circle-o"></i>গ্রামের কর তালিকা</a>
                    </li>
                    <li><a href="daily_report.php"><i class="fa fa-circle-o"></i>প্রতিদিনের কর রিপোর্ট</a></li>
                    <li><a href="village_payment_tax_report.php"><i class="fa fa-circle-o"></i>গ্রামের কর পেমেন্ট রিপোর্ট</a></li>
                    <li><a href="village_due_tax_report.php"><i class="fa fa-circle-o"></i>গ্রামের কর বাকি রিপোর্ট</a></li>
                    <li><a href="family_report.php"><i class="fa fa-circle-o"></i>পরিবারের সদস্য রিপোর্ট</a></li>
                    <li><a href="union_register_tax_report.php"><i class="fa fa-circle-o"></i>ইউনিয়ন নিবন্ধন রিপোর্ট</a></li>
                    <li><a href="village_bill_report.php"><i class="fa fa-circle-o"></i>বিল রিপোর্ট</a>
                    </li>
                    <li><a href="tax_top_shit.php"><i class="fa fa-circle-o"></i>ইউনিয়ন (ওয়ার্ড ভিত্তিক) টপ শিট
                        </a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comment"></i> <span> এসএমএস </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="sendSingleSMs.php"><i class="fa fa-circle-o"></i>সেন্ড সিঙ্গেল এসএমএস
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>        <div class="content-wrapper">
                    
@inertia
           
        </div>

   


<script>
    $(document).on("click", ".modal-info", function() {
        var id = $(this).data('id');
        console.log(id);
        $.get('?c=tax&m=ajax_tax', {'id': id}, function(result) {
            console.log(result.tax_rate);
            $('.result').val(result.tax_rate);
            $('.id').val(result.id);
        }, 'json');

    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#viewAllHouse').DataTable( {
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        } );
    } );
</script>

        <footer class="main-footer text-center">
            <strong >Copyright by Md Zohurul Islam &copy; 2023-2024</strong>
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('backend/assets/js/icheck.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('backend/assets/js/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend/assets/js/adminlte.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/assets/js/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap  -->
    <!--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
    <!-- SlimScroll -->
    <!--<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        //Date picker
        $('#datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
        $('#datepicker_2').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    </script>
    <!--datatable-->
    <script>
        $(function () {
            $('#datatable').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
</body>
</html>