<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="{{url('/')}}">
            <span class="smini-visible"><i class="fa fa-circle-notch text-primary"></i></span>
            <span class="smini-hide font-size-h5 tracking-wider">Air<span class="font-w400">Vels</span></span>
        </a>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{request::segment(1)=='dashboard'?"active":""}}"
                        href="{{url('dashboard')}}">
                        <i class="nav-main-link-icon fa fa-chart-area"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
               
               
                <li class="nav-main-item {{request::segment(1)=='category'||request::segment(1)=='country'||request::segment(1)=='destination'?'open':''}}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-truck"></i><span class="nav-main-link-name">Attribute</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(1)=='category'?"active":""}}" href="{{url('category')}}">
                                <span class="nav-main-link-name">Category</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(1)=='country'?"active":""}}" href="{{url('country')}}">
                                <span class="nav-main-link-name">Country</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(1)=='destination'?"active":""}}" href="{{url('destination')}}">
                                <span class="nav-main-link-name">Destination</span>
                            </a>
                        </li>
                    </ul>
                </li>
              
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-chart-line"></i>
                        <span class="nav-main-link-name">Report</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_forms_elements.html">
                                <span class="nav-main-link-name">Elements</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-main-item">
                    <a class="nav-main-link {{request::segment(1)=='integration'?"active":""}}"
                        href="{{url('integration')}}">
                        <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                        <span class="nav-main-link-name">Integration</span>
                    </a>
                </li> --}}

                <li class="nav-main-item {{request::segment(1)=='people'||request::segment(1)=='role'?'open':''}}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-cubes"></i>
                        <span class="nav-main-link-name">People</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(2)=='admin'?"active":""}}" href="{{url('people/admin')}}">
                                <span class="nav-main-link-name">Admin</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(2)=='user'?"active":""}}" href="{{url('people/user')}}">
                                <span class="nav-main-link-name">User</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(1)=='role'?"active":""}}" href="{{url('role')}}">
                                <span class="nav-main-link-name">Role</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link {{request::segment(1)=='settings'?"active":""}}" href="{{url('settings')}}">
                        <i class="nav-main-link-icon fa fa-cogs"></i>
                        <span class="nav-main-link-name">Settings</span>
                    </a>
                </li>

                <li class="nav-main-item {{request::segment(1)=='logs'?"open":""}}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-history"></i>
                        <span class="nav-main-link-name">logs</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(1).'/'.request::segment(2)=='logs/system'?"active":""}}"
                                href="{{url('logs/system')}}">
                                <i class="nav-main-link-icon fa fa-desktop"></i>
                                <span class="nav-main-link-name">System</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{request::segment(1).'/'.request::segment(2)=='logs/email'?"active":""}}"
                                href="{{url('logs/email')}}">
                                <i class="nav-main-link-icon fa fa-envelope"></i>
                                <span class="nav-main-link-name">Email</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{url('/')}}">
                        <i class="nav-main-link-icon  fa fa-question-circle"></i>
                        <span class="nav-main-link-name">Helps</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{url('logout')}}">
                        <i class="nav-main-link-icon  fa fa-sign-out-alt"></i>
                        <span class="nav-main-link-name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>