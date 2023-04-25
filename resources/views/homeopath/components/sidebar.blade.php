<div class="row">
    

<nav id="sidebar">
    <div class="container1 sidebar">
        <div class="row ml-0">
            <div class=" leftside">
                <a href="{{ route('index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="{{ route('social.index') }}" style="padding: 11px 0px;"><img src="{{asset('uploads/img/mflogo_short.png')}}" style="width: 24px;"> </a>
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
                    <li class="list-group-item @routeis('homeopath.dashboard') show @endrouteis">
                        <a href="{{ route('homeopath.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home</a>
                        </li>
                    <li class="list-group-item @routeis('homeopath.services.index') show @endrouteis">
                        <a href="{{ route('homeopath.services.index') }}">
                        <i class="fa fa-server"></i>
                            Services</a>
                            {{-- <p>2</p> --}}
                    </li>
                    <li class="list-group-item @routeis('homeopath.settings.index') show @endrouteis">
                        <a href="{{ route('homeopath.settings.index') }}">
                        <i class="fa fa-gear"></i>
                                Settings</a>
                    </li>
                    <li class="list-group-item @routeis('homeopath.link.account') show @endrouteis">
                        <a href="{{ route('homeopath.link.account') }}">
                        <i class="fa fa-money"></i>
                            Link Account
                        </a>
                            {{-- <p>2</p> --}}
                    </li>
                    <li class="list-group-item @routeis('homeopath.resources.index') show @endrouteis">
                        <a href="{{ route('homeopath.resources.index') }}">
                        <i class="fa fa-book"></i>
                                Resources</a>
                    </li>
                    <li class="list-group-item @routeis('homeopath.finance.index') show @endrouteis">
                        <a href="{{ route('homeopath.finance.index') }}">
                        <i class="fa fa-usd"></i>
                                Finance</a>
                    </li>
                    <li class="list-group-item @routeis('homeopath.documents.index') show @endrouteis">
                        <a href="{{ route('homeopath.documents.index') }}">
                        <i class="fa fa-folder"></i>
                                Documents</a>
                    </li>
                    <li class="list-group-item @routeis('homeopath.customers.index') active @endrouteis">
                        <a href="{{ route('homeopath.customers.index') }}">
                        <i class="fa fa-users"></i>
                                Customers</a>
                    </li>

                    <li class="list-group-item @routeis('homeopath.appointments.index') active @endrouteis">
                        <a href="{{ route('homeopath.appointments.index') }}">
                        <i class="fa fa-calendar-check"></i>
                                Appointments</a>
                    </li>

                    <li class="list-group-item @routeis('homeopath.appointments.calendar') show @endrouteis">
                        <a href="{{ route('homeopath.appointments.calendar') }}">
                        <i class="fa fa-folder"></i>
                                Calendar</a>
                    </li>
                    <li class="list-group-item @routeis('homeopath.appointments.schedule') show @endrouteis">
                        <a href="{{ route('homeopath.appointments.schedule') }}">
                        <i class="fa fa-calendar-alt"></i>
                                My Schedule</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</div>