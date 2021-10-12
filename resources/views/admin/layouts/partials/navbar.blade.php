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

            <div class="right_side">

                <div class="header_widgets">

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




                    <a href="#">
                        <img src="{{auth()->user()->image}}" class="is_avatar" alt="">
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                        <a href="timeline.html" class="user">
                            <div class="user_avatar">
                                <img src="{{auth('admin')->user()->image }}" alt="">
                            </div>
                            <div class="user_name">
                                <div> {{auth('admin')->user()->name}}</div>
                                <span> {{auth('admin')->user()->email}}</span>
                            </div>
                        </a>
                        <hr>


                        <a href="#" id="night-mode" class="btn-night-mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            </svg>
                            Night mode
                            <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                        </a>
                        <a href="{{route('admin.logout')}}">
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
