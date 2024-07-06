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
                <a href="index.php">
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