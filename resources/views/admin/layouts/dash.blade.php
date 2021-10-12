@include('admin.layouts.partials._headTag')


<div id="wrapper">

    <!-- NavBar -->
   @include('admin.layouts.partials.navbar')

    <!-- left sidebar -->

    @include('admin.layouts.partials._leftSideBar')


<!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">

            @yield('content')

        </div>

    </div>

</div>




@include('admin.layouts.partials._script')
