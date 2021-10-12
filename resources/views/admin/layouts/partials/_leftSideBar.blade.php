<div class="sidebar">
    <div class="sidebar_header">
        <img src="" alt="sss">
        <img src="" class="logo-icon" alt="">

        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></span>

    </div>

    <div class="sidebar_inner" data-simplebar>

        <ul>
            <li><a href="{{route('home.user')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="text-blue-600">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    <span> صفحه اصلی </span> </a>
            </li>
            <li><a href="{{route('create.category')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="text-yellow-500">
                        <path fill-rule="evenodd"
                              d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span>Category </span> </a>
            </li>


            <li><a href="{{route('show.askbox')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="text-red-500">
                        <path fill-rule="evenodd"
                              d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                              clip-rule="evenodd"/>
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
                    </svg>
                    <span> Ask Box</span></a>
            </li>


            <li>
                <a href="{{route('create.avatar')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="text-blue-500">
                        <path fill-rule="evenodd"
                              d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span>  Avatar </span></a>
            </li>

        </ul>

    </div>

</div>
