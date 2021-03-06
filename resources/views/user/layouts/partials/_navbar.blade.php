<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">

                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path
                                    d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path></svg>
                        </span>

                <div id="logo">
                    <a href="homepage.html">
                        <img src="{{asset('images/logo.png')}}" alt="">
                        <img src="{{asset('images/logo-mobile.png')}}" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>

            <!-- search icon for mobile -->
           {{-- <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <input value="" type="text" class="form-control"
                       placeholder="Search for Friends , Videos and more.." autocomplete="off">
                <div uk-drop="mode: click" class="header_search_dropdown">

                    <h4 class="search_title"> Recently </h4>
                    <ul>

                        <li>
                            <a href="#">
                                <img src="{{auth()->user()->image }}" alt="" class="list-avatar">
                                <div class="list-name"> Erica Jones</div>
                            </a>
                        </li>


                    </ul>

                </div>
            </div>
--}}
            <div class="right_side">

                <div class="header_widgets">
                   {{-- <a href="#" class="is_link"> Upgradse </a>
                    <a href="#" class="is_icon" uk-tooltip="title: Cart">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </a>
--}}
                    {{-- ============ shopping Car ===============================--}}
                    <div uk-drop="mode: click" class="header_dropdown dropdown_cart">

                        <div class="drop_headline">
                            <h4> My Cart </h4>
                            <a href="#" class="btn_action hover:bg-gray-100 mr-2 px-2 py-1 rounded-md underline">
                                Checkout </a>
                        </div>

                        <ul class="dropdown_cart_scrollbar" data-simplebar>
                            <li>
                                <div class="cart_avatar">
                                    <img src="{{auth()->user()->image }}" alt="">
                                </div>
                                <div class="cart_text">
                                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Wireless
                                        headphones
                                    </div>
                                    <p class="text-sm">Type Accessories </p>
                                </div>
                                <div class="cart_price">
                                    <span> $14.99 </span>
                                    <a class=""> Remove</a>
                                </div>
                            </li>

                        </ul>

                        <div class="cart_footer">
                            <p> Subtotal : $ 320 </p>
                            <h1> Total : <strong> $ 320</strong></h1>
                        </div>
                    </div>
                    {{-- ============ /shopping Car ===============================--}}

                    {{-- ============ Notification ===============================--}}
                    {{--badge --}}
                  {{--  <a href="#" class="is_icon" uk-tooltip="title: Notifications">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                        </svg>
                        <span>1</span>
                    </a>
                    --}}{{-- /badge--}}{{--
                    <div uk-drop="mode: click" class="header_dropdown">
                        <div class="dropdown_scrollbar" data-simplebar>
                            <div class="drop_headline">
                                <h4>Notifications </h4>
                                <div class="btn_action">
                                    <a href="#" data-tippy-placement="left" title="Notifications">
                                        <ion-icon name="settings-outline"></ion-icon>
                                    </a>
                                    <a href="#" data-tippy-placement="left" title="Mark as read all">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="drop_avatar">
                                            <img src="{{auth()->user()->image }}" alt="">
                                        </div>
                                        <span class="drop_icon bg-gradient-primary">
                                                     <i class="icon-feather-thumbs-up"></i>
                                                 </span>
                                        <div class="drop_text">
                                            <p>
                                                <strong>Adrian Mohani</strong> Like Your Comment On Video
                                                <span class="text-link">Learn Prototype Faster </span>
                                            </p>
                                            <time> 2 hours ago</time>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>--}}
                     {{-- ============ /Notifaction ===============================--}}

                <!-- Message****************** -->
               {{--     <a href="#" class="is_icon" uk-tooltip="title: Message">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span>4</span>
                    </a>
                    <div uk-drop="mode: click" class="header_dropdown is_message">
                        <div class="dropdown_scrollbar" data-simplebar>
                            <div class="drop_headline">
                                <h4>Messages </h4>
                                <div class="btn_action">
                                    <a href="#" data-tippy-placement="left" title="Notifications">
                                        <ion-icon name="settings-outline"
                                                  uk-tooltip="title: Message settings ; pos: left"></ion-icon>
                                    </a>
                                    <a href="#" data-tippy-placement="left" title="Mark as read all">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <input type="text" class="uk-input" placeholder="Search in Messages">
                            <ul>
                                <li class="un-read">
                                    <a href="#">
                                        <div class="drop_avatar">
                                            <img src="{{auth()->user()->image}}" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <strong> Stella Johnson </strong>
                                            <time>12:43 PM</time>
                                            <p> Alex will explain you how ... </p>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <a href="#" class="see-all"> See all in Messages</a>
                    </div>--}}
                <!-- /Message******************* -->

                    <a href="#">
                        <img src="{{auth()->user()->image}}" class="is_avatar" alt="">
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                        <a href="timeline.html" class="user">
                            <div class="user_avatar">
                                <img src="{{auth()->user()->image }}" alt="">
                            </div>
                            <div class="user_name">
                                <div> {{auth()->user()->name}}</div>
                                <span> {{auth()->user()->email}}</span>
                            </div>
                        </a>
                        <hr>

                        <a href="{{route('show.avatar.user')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/>
                                <circle cx="12" cy="10" r="3"/>
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                            Select Avatar
                        </a>

                        <a href="#" id="night-mode" class="btn-night-mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            </svg>
                            Night mode
                            <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                        </a>
                        <a href="{{route('logout.user')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Log Out
                        </a>


                    </div>

                </div>

            </div>
        </div>
    </div>
</header>
