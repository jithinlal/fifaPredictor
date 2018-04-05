<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <div class="wrapper">
        <header class="main-header">           
            <!--TOP NAV BAR-->

                @include('layouts.admin.topNavBar')

            <!-- END TOP NAV BAR-->
        </header>

        <aside class="main-sidebar">      
            <!--SIDE NAV BAR-->

                @include('layouts.admin.sideNavBar')  

             <!--END SIDE NAV BAR-->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <!--PAGE HEADING-->

                    @include('layouts.admin.heading')  

                <!--END PAGE HEADING-->

                <!--BREADCRUMB-->

                    @include('layouts.admin.breadcrumb')  

                <!--END BREADCRUMB-->


            </section>

            <!-- Main content -->
            <section class="content">  

                <!--FLASH-->

                    @include('layouts.admin.flash')             

                <!--END FLASH-->

                <!--FORM ERROR-->

                    @include('layouts.admin.form_error')             

                <!--END FORM ERROR-->

                <!--CONTENT-->
                 <div class="container">
                    @yield('content')
        
                </div>
                <!--END CONTENT-->

            </section>
        </div>

        <!--FOOTER-->

            @include('layouts.admin.footer')  

        <!--END FOOTER-->    

    </div>
        
    
    <!--SCRIPTS-->

            @include('layouts.admin.script')  

    <!--END SCRIPTS-->   

</body>