<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

        <div class="sidebar-brand-icon rotate-n-15">

            <i class="fas fa-laugh-wink"></i>

        </div>

        <div class="sidebar-brand-text mx-3">CPM</div>

    </a>

    <!-- Divider -->

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <li class="nav-item @if($active == "") active @endif">

        <a class="nav-link" href="{{ url('/')}}">

        <i class="fas fa-fw fa-tachometer-alt"></i>

        <span>Dashboard</span></a>

    </li>

    <!-- Divider -->

    <hr class="sidebar-divider">

    <!-- Heading -->

<!--     <div class="sidebar-heading">

        Interface

    </div> -->

    <!-- Nav Item - Charts -->

    <!-- Nav Item - Utilities Collapse Menu -->

    <li class="nav-item d-none">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">

         <i class="fas fa-fw fa-desktop"></i>

        <span>Website Elements</span>

        </a>

        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="logo-list.php">Logo</a>

                <a class="collapse-item" href="slider-list.php">Home Sliders</a>

                <a class="collapse-item" href="about-list.php">About Us</a>

                <a class="collapse-item" href="socialmedialink-list.php">Social Media Links</a>

                <a class="collapse-item" href="contact-list.php">Contact Informations</a>

            </div>

        </div>

    </li>

    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "users") active @endif">

        @if($active == "users") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users">
        @endif

            <i class="fas fa-fw fa-users"></i>

            <span>Users</span>

        </a>

        @if($active == "users") 
        <div id="users" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="users" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('Admin/add-users')}}" @if($activetxt == "usersadd") style="background-color: #eaecf4;" @endif>Add Users</a>

                <a class="collapse-item" href="{{ url('Admin/users-list')}}" @if($activetxt == "userslist") style="background-color: #eaecf4;" @endif>Users List</a>

            </div>

        </div>

    </li>
    
    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "entity") active @endif">

        @if($active == "entity") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#entity" aria-expanded="true" aria-controls="entity">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#entity" aria-expanded="false" aria-controls="entity">
        @endif

            <i class="fas fa-fw fa-entity"></i>

            <span>entity</span>

        </a>

        @if($active == "entity") 
        <div id="entity" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="entity" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('Admin/add-entity')}}" @if($activetxt == "entityadd") style="background-color: #eaecf4;" @endif>Add entity</a>

                <a class="collapse-item" href="{{ url('Admin/entity-list')}}" @if($activetxt == "entitylist") style="background-color: #eaecf4;" @endif>entity List</a>

            </div>

        </div>

    </li>
    
    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "employee") active @endif">

        @if($active == "employee") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#employee" aria-expanded="true" aria-controls="employee">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employee" aria-expanded="false" aria-controls="employee">
        @endif

            <i class="fas fa-fw fa-employee"></i>

            <span>employee</span>

        </a>

        @if($active == "employee") 
        <div id="employee" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="employee" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('Admin/add-employee')}}" @if($activetxt == "employeeadd") style="background-color: #eaecf4;" @endif>Add employee</a>

                <a class="collapse-item" href="{{ url('Admin/employee-list')}}" @if($activetxt == "employeelist") style="background-color: #eaecf4;" @endif>employee List</a>

            </div>

        </div>

    </li>
    
    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "client") active @endif">

        @if($active == "client") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#client" aria-expanded="true" aria-controls="client">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#client" aria-expanded="false" aria-controls="client">
        @endif

            <i class="fas fa-fw fa-client"></i>

            <span>client</span>

        </a>

        @if($active == "client") 
        <div id="client" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="client" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('Admin/add-client')}}" @if($activetxt == "clientadd") style="background-color: #eaecf4;" @endif>Add client</a>

                <a class="collapse-item" href="{{ url('Admin/client-list')}}" @if($activetxt == "clientlist") style="background-color: #eaecf4;" @endif>client List</a>

            </div>

        </div>

    </li>

    
    

    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "assignment") active @endif">

        @if($active == "assignment") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#assignment" aria-expanded="true" aria-controls="assignment">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#assignment" aria-expanded="false" aria-controls="assignment">
        @endif

            <i class="fas fa-fw fa-assignment"></i>

            <span>assignment</span>

        </a>

        @if($active == "assignment") 
        <div id="assignment" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="assignment" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('Admin/add-assignment')}}" @if($activetxt == "assignmentadd") style="background-color: #eaecf4;" @endif>Add assignment</a>

                <a class="collapse-item" href="{{ url('Admin/assignment-list')}}" @if($activetxt == "assignmentlist") style="background-color: #eaecf4;" @endif>assignment List</a>

            </div>

        </div>

    </li>

    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "assignment_map") active @endif">

        @if($active == "assignment_map") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#assignment_map" aria-expanded="true" aria-controls="assignment_map">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#assignment_map" aria-expanded="false" aria-controls="assignment_map">
        @endif

            <i class="fas fa-fw fa-assignment_map"></i>

            <span>Assignment Mapping</span>

        </a>

        @if($active == "assignment_map") 
        <div id="assignment_map" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="assignment_map" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('Admin/add-assignment_map')}}" @if($activetxt == "assignment_mapadd") style="background-color: #eaecf4;" @endif>Add Assignment Mapping</a>

                <a class="collapse-item" href="{{ url('Admin/assignment_map-list')}}" @if($activetxt == "assignment_maplist") style="background-color: #eaecf4;" @endif>Assignment Mapping List</a>

            </div>

        </div>

    </li>
    
    <hr class="sidebar-divider">

    <li class="nav-item @if($active == "timesheet") active @endif">

        @if($active == "timesheet") 
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#timesheet" aria-expanded="true" aria-controls="timesheet">
        @else
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#timesheet" aria-expanded="false" aria-controls="timesheet">
        @endif

            <i class="fas fa-fw fa-timesheet"></i>

            <span>Timesheet</span>

        </a>

        @if($active == "timesheet") 
        <div id="timesheet" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @else
        <div id="timesheet" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        @endif

            <div class="bg-white py-2 collapse-inner rounded">

                <!-- <a class="collapse-item" href="{{ url('Admin/add-timesheet')}}" @if($activetxt == "timesheetadd") style="background-color: #eaecf4;" @endif>Add timesheet</a> -->

                <a class="collapse-item" href="{{ url('Admin/timesheet-list')}}" @if($activetxt == "timesheetlist") style="background-color: #eaecf4;" @endif>timesheet List</a>

                <a class="collapse-item" href="{{ url('Admin/add-bulk-timesheet')}}" @if($activetxt == "bulktimesheetadd") style="background-color: #eaecf4;" @endif>Bulk Timesheet</a>

            </div>

        </div>

    </li>


    <hr class="sidebar-divider">

    <!-- Divider -->

    <hr class="d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->

    <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle"></button>

    </div>

</ul>

<!-- End of Sidebar -->

