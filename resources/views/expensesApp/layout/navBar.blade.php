<nav class="navbar sticky-top navbar-expand-lg bg-info navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" id="homePage" href="#" onclick="to_home()"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        {{--            <a class="navbar-link text-white" href="#"><i class="fa fa-envelope mx-1"></i> Contact</a>--}}
        {{--            <a class="navbar-link text-white" href="#"><i class="fa fa-cog mx-1" aria-hidden="true"></i> Settings</a>--}}

        <!-- Icons -->
        <ul class="navbar-nav d-flex flex-row me-1">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Profile </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#" onclick="to_profile()">My account</a>
                        <a class="dropdown-item" href="#" onclick="to_settings()">Settings</a>
                        <a class="dropdown-item" href="#" onclick="to_contact()">Contact</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="" onclick="logout()">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Container wrapper -->
</nav>
