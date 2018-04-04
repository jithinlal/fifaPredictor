<head>

    <!-- META-->

        @include('layouts.admin.meta')

    <!-- END META-->

    <!-- TITLE-->

        <title>
             @section('title')
               WCP :: 
             @show  
        </title>

    <!--END TITLE-->    

    <!-- STYLES-->

        @include('layouts.admin.style')
        
    <!--END STYLES-->    

    <!--CUSTOM STYLES-->
        @yield('customStyles')
    <!--END CUSTOM STYLES-->

</head>