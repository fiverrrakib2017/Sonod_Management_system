<header class="main-header">
            <!-- Logo -->
            <a href="{{route('admin.dashboard')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">সনদ ব্যবস্থাপনা</span>
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
                            <a href="{{route('admin.logout')}}">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>