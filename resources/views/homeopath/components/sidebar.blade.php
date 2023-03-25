<style>
    
.navbar {
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}
div.container1{
/*    background-color: #fff;*/
/*    box-shadow: 2px 2px 8px rgba(0,0,0,.1);*/
    display: block;
}
.container {
    width: 100% !important;
    padding-right: 14px !important;
    padding-left: 14px !important;
    margin-right: auto !important;
    margin-left: auto !important;
}
.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}
#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 999;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -400px;
}
#content {
    width: calc(100% - 400px);
    padding: 40px;
    min-height: 100vh;
    transition: all 0.3s;
    position: absolute;
    top: 0;
    right: 0;
}
#content.active {
    width: 100%;
}

.main {
    height: 100vh;
} 
.sidebar {
    height: 100vh;
}
.leftside {
    width: 12%;
    background-color: #254A51;
    height: 100vh;
    padding-top: 20px;
    display: flex;
    justify-content: start;
    flex-direction: column;
    align-items: center;
}
.rightside {
    width: 88%;
    background-color: #F9FEFD;
    height: 100vh;
    border-right: 2px solid #EAEDEC;
    border-bottom: 2px solid #EAEDEC;
    padding: 22px 22px 0 22px;
}
.rightside a {
    color: #000;
    text-transform: none;
    font-size: 30px;
    text-transform: uppercase;
    font-weight: 900;
}
.leftside i {
    color: #fff;
    font-size: 25px;
    margin: 10px 0;
}
.image_container {
    margin: 30px 0;
}
.image_name {
    display: flex;
    justify-content: flex-end;
    flex-direction: column;
    align-items: flex-start;
/*    padding-top: 26px;*/
}
.image_name h4 {
    font-weight: 700;
    font-size: 20px;
    line-height: 18px;
}
.image_name p {
    font-weight: 200;
    font-size: 13px;
    line-height: 13px;
    color: #A6A6A6;
}
.list-group .list-group-item {
    border: none;
    background: none;
    padding: 6px 0;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    align-items: center;
    margin: 5px 0;
}
.list-group .list-group-item p {
    width: fit-content;
    background-color: rgb(7, 153, 202);
    padding: 5px 11px;
    border-radius: 5px;
    margin: 0 5% 0 0;
    color: #fff;
}
.list-group .list-group-item a {
    width: 85%;
    font-size: 15px;
    font-weight: 600;
    color: #A6A6A6;
    text-transform: capitalize;
    display: flex;
    padding: 8px 17px;
    transition: 0.4s;
}
.list-group .list-group-item a i {
    width: 35px;
    font-size: 22px;
}
.list-group .show, .list-group .list-group-item:hover {
    background-color: #F4F4F4;
    border-radius: 5px;
}
.list-group .show a, .list-group .list-group-item:hover a {
    color: #000;
}
@media (max-width: 768px) {
    #sidebar {
       
        margin-left: -400px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #content {
        width: 100%;
    }
    #content.active {
        width: calc(100% - 400px);
    }
    #sidebarCollapse span {
        display: none;
    }
}
@media (max-width: 450px) {
    #sidebar {
        width: 300px;
        margin-left: -300px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #content {
        width: 100%;
    }
    #content.active {
        width: calc(100% - 300px);
    }
    #sidebarCollapse span {
        display: none;
    }
    .leftside {
        width: 12%;
    }
    .rightside {
        width: 88%;
    }
    .rightside a {
        font-size: 27px;
    }
    .leftside i {
        font-size: 20px;
    }
    .image_container {
        margin: 25px 0;
    }
    .image_name {
        padding-top: 22px;
    }
    .image_name h4 {
        font-size: 18px;
        line-height: 15px;
    }
    .image_name p {
        font-size: 12px;
        line-height: 12px;
    }
    .list-group .list-group-item {
        padding: 6px 0;
        margin: 5px 0;
    }
    .list-group .list-group-item p {
        padding: 4px 7px 3px 7px;
        border-radius: 3px;
        margin: 0 2% 0 0;
        font-size: 12px;
    }
    .list-group .list-group-item a {
        width: 90%;
        font-size: 13px;
        padding: 6px 15px;
        transition: 0.4s;
    }
    .list-group .list-group-item a i {
        width: 35px;
        font-size: 20px;
    }
}
</style>
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