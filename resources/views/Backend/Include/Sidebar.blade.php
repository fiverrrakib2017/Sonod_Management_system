<section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('Backend/assets/images/avatar.png')}}" class="img-circle" alt="user Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::guard('admin')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="#">
                <a href="{{route('admin.dashboard')}}">
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
                    <li><a href="add_user.php"><i class="fa fa-circle-o"></i> নতুন ব্যবহারকারী ব্যক্তি</a>
                    </li>
                    <li><a href="view_all_users.php"><i class="fa fa-circle-o"></i> সকল ব্যবহারকারী ব্যক্তি তালিকা </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-edit"></i> <span>এরিয়া</span> <span class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span> </a>
                <ul class="treeview-menu" SA>
                    <li><a href="{{route('admin.division.index')}}"><i class="fa fa-circle-o"></i> বিভাগ </a></li>
                    <li><a href="districts.php"><i class="fa fa-circle-o"></i> জেলা </a></li>
                    <li><a href="upazila.php"><i class="fa fa-circle-o"></i>  উপজেলা </a></li>
                    <li><a href="unions.php"><i class="fa fa-circle-o"></i>  পৌরসভা/ইউনিয়ন </a></li>
                    <li><a href="postoffice.php"><i class="fa fa-circle-o"></i> ডাকঘর </a></li>
                    <li><a href="village.php"><i class="fa fa-circle-o"></i> গ্রাম </a></li>
                    <li><a href="house.php"><i class="fa fa-circle-o"></i> বাড়ী </a></li>
                    <li><a href="institute.php"><i class="fa fa-circle-o"></i> প্রতিষ্ঠান </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-file"></i> <span>সকল সনদ</span> <span class="pull-right-container"> <i class="fa fa-angle-down pull-right"></i> </span> </a>
                <ul class="treeview-menu" SA>
                    <li><a href="citizenship_certification.php"><i class="fa fa-circle-o"></i> নাগরিকত্ব সনদ</a></li>
                    <li><a href="tradelicense_certification.php"><i class="fa fa-circle-o"></i> ট্রেড লাইসেন্স</a></li>
                    <li><a href="similar_name_certification.php"><i class="fa fa-circle-o"></i>একই নাম প্রত্যয়ন</a></li>
                    <li><a href="unmarried_certification.php"><i class="fa fa-circle-o"></i>অবিবাহিত সনদ </a></li>
                    <li><a href="heir_certification.php"><i class="fa fa-circle-o"></i> ওয়ারিশ সনদ </a></li>
                    <li><a href="death_certification.php"><i class="fa fa-circle-o"></i> মৃত্যু সনদ </a></li>
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
        </ul>
    </section>