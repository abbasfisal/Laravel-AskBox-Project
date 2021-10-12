@include('user.layouts.partials._headTag')

<div id="wrapper">

    <!-- NavBar -->
@include('user.layouts.partials._navbar')

<!-- left sidebar -->

@include('user.layouts.partials._leftSideMenue')


<!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">

            @yield('content')

        </div>

    </div>

</div>
@include('user.layouts.partials._script')
