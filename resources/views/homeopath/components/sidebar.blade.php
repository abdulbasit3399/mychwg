<div class="row">
    

<nav id="sidebar">
    <div class="container1 sidebar">
        <div class="row ml-0">
            <div class=" leftside">
                <i class="fa fa-home" aria-hidden="true"></i>
                <i class="fa fa-home" aria-hidden="true"></i>
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="rightside">
                <i class="fa fa-times sidebarCollapse" aria-hidden="true"></i>
                {{-- <a href="#"><img src="{{asset('uploads/img/mflogo.png')}}" width="137"></a> --}}
                <a href="#"><img src="{{ asset($setting['logo']) ?? ''}}" width="137"></a>
                <div class="container1 image_container">
                    <div class="row d-flex">
                        <div class="col-md-3 col-sm-3 col-3 p1-0">
                            <img src="{{ asset(Auth::user()->avatar) }}" width="40px" class="rounded" />
                        </div>
                        <div class="col-md-9 col-sm-9 col-9 image_name">
                            <h4>{{ Auth::User()->name ?? 'Administrator' }}</h4>
                            <p>{{ Auth::User()->roles[0]->name ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item show">
                        <a href="#">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home</a>
                        </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            Appointments</a>
                            <p>2</p>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                Calender</a>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                                Customers</a>
                            <p>2</p>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                                Resources</a>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                Finance</a>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                                Services</a>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                                Settings</a>
                            </li>
                    <li class="list-group-item">
                        <a href="#">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                my Schedule</a>
                            </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</div>