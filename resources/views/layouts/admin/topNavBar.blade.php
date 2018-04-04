<!--LOGO-->

    @include('layouts.admin.logo')

<!-- END LOGO-->

<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">Sanath</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="/backend/profile" title="Profile" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="/backend/index/logout" title="Sign out" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>