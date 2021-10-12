@extends('user.layouts.dashboard')

@section('content')

    <!-- Ask box-->
    <div class="card lg:w-3/4 p-4 bg-blue">
        <div class="text-center">
            <b> challange Day 🎉🎉🧨🧿</b>
        </div>

        <br>
        <div class="flex space-x-3">
            <img src="{{asset('images/avatars/avatar-2.jpg')}}" class="w-10 h-10 rounded-full">
            <div class="bg-blue-100 hover:bg-gray-200 flex-1 p-2 px-6 rounded-full">
                <strong> {!! $question->title !!}</strong>
            </div>
        </div>

        {{-- ========== ask box icons--}}
        <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
            <div class="flex items-center p-1.5 rounded-md">
                <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5  lg:block"
                     data-tippy-placement="top" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg" data-tippy="" data-original-title="Tooltip">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $question->created_at->diffForHumans() }}
            </div>


            <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                <a href="{{route('addlikes.askbox' , $question->id)}}">
                <span
                    {{$is_liked=$question->is_user_liked_questionBox()}}
                    class="
                    {{$is_liked == true ?
                     'bg-red-100 text-red-600' : ''}}
                        h-9 mr-2 p-2.5 rounded-full  w-9 -my-0.5
                        lg:block uil-heart "
                    uk-tooltip="title:like ; pos: bottom ;offset:7" stroke="currentColor">
                </span>
                </a>
                {{$is_liked == true ? 'liked' : 'like'}}
                | {{$question->likes_count() }} likes

            </div>

            <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                <svg class="bg-red-100 h-9 mr-2 p-1.5 rounded-full text-red-600 w-9 -my-0.5 hidden lg:block"
                     fill="fill" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Fealing /Activity
            </div>
        </div>
    </div>



    <br>
    <div class="lg:flex lg:space-x-10">
        <div class="lg:w-3/4 lg:px-20 space-y-7">

            <!-- --------------- USER COMMENT INPUT -------------------- -->
            <div class="card lg:mx-0 p-4" uk-toggle="target:#create-post-modal">
                <div class="flex space-x-3">
                    <img src="{{auth()->user()->image}}" class="w-10 h-10 rounded-full">
                    <input placeholder="What's Your Mind ? {{auth()->user()->name}}!"
                           class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
                </div>
                {{-- ========== ask box icons--}}
                <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                </div>
            </div>
            <!-- --------------- /USER COMMENT INPUT -------------------- -->

            <!-- --------------- COMMENTS -------------------- -->
            <div class="card lg:mx-0 uk-animation-slide-bottom-small">


                {{--image--}}
                <div uk-lightbox="">
                    <a href="">
                        <img src="{{url('').$question->image}}" alt="" class="max-h-96 w-full object-cover">
                    </a>
                </div>
                {{--end image--}}

                <div class="p-4 space-y-3">

                    <div class="flex space-x-4 lg:font-bold">

                        <a href="#" class="flex items-center space-x-2">
                            <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     width="22" height="22" class="dark:text-gray-100">
                                    <path fill-rule="evenodd"
                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>{{$question->comments()->count()}} Comment</div>
                        </a>


                    </div>
                    <div class="flex items-center space-x-3 pt-2">
                        <div class="flex items-center">

                        </div>
                        <div class="dark:text-gray-100">

                        </div>
                    </div>

                    <div class="border-t py-4 space-y-4 dark:border-gray-600">
                        <!--================================show  Comment -->
                        @forelse($comments as $commentItem)
                            @if($commentItem->is_admin ==true && $commentItem->comment_id ==null)

                                {{--admin comment without anay replay--}}
                                <div class="flex">
                                    <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                        <img src="{{$commentItem->adminReply->image}}" alt=""
                                             class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div>
                                        <div
                                            class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                            <p class="leading-6">
                                                <b>{{$commentItem->adminReply->name}}:</b>
                                                {{ $commentItem->text}}
                                            </p>

                                            {{--replay--}}
                                            @foreach($commentItem->comments as $replay)
                                                <br>
                                                @if($replay->is_admin == true)
                                                    {{--admin replayed a user comment--}}

                                                    <div class="flex">
                                                        <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                            <img src="{{$replay->adminReply->image}}" alt=""
                                                                 class="absolute h-full rounded-full w-full">
                                                        </div>
                                                        <div>
                                                            <div
                                                                class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                                <p class="leading-6">
                                                                    <u>{{$replay->adminReply->name}}:</u>
                                                                    {{ $replay->text}}
                                                                </p>
                                                                <div
                                                                    class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                @else

                                                    <div class="flex ">
                                                        <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                            <img src="{{$replay->user->image}}" alt=""
                                                                 class="absolute h-full rounded-full w-full">
                                                        </div>
                                                        <div>
                                                            <div
                                                                class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                                <p class="leading-6">
                                                                    <b>{{$replay->user->name}}:</b>
                                                                    {{ $replay->text}}
                                                                </p>
                                                                <div
                                                                    class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                @endif

                                            @endforeach

                                            <div
                                                class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                        </div>
                                        <div class="text-sm flex items-center space-x-3 mt-2 ml-5"
                                        >

                                            <a href="{{route('add.comment.like.user' , $commentItem->id)}}"
                                               class="text-red-600

                                               {{

                                                    $commentItem
                                                    ->is_user_liked_a_comment( \Illuminate\Support\Facades\Auth::id()) ==true ? 'bg-red-100 rounded' : ''
                                                }}
                                                   rounded"> &nbsp;
                                                <i class="uil-heart"></i>
                                                {{($commentItem->users_like_count() ==0?
                                                    ''
                                                    :$commentItem->users_like_count())
                                                    .'like' }}
                                            </a>

                                            <a href="#" uk-toggle="target:#show-comment-modal"
                                               onclick="hi('{{route('addreply.user' , [$commentItem->id  ,$question->id])}}')"
                                            >
                                                Reply
                                            </a>
                                            <span> {{$commentItem->created_at->diffForHumans()}} </span>
                                        </div>
                                    </div>
                                </div>
                                {{--/admin comment without anay replay--}}

                            @elseif($commentItem->is_admin ==false && $commentItem->comment_id == null)
                                <div class="flex">
                                    <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                        <img src="{{$commentItem->user->image}}" alt=""
                                             class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div>
                                        <div
                                            class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                            <p class="leading-6">
                                                <b>{{$commentItem->user->name}}:</b>
                                                {{ $commentItem->text}}
                                            </p>

                                            {{--replay--}}
                                            @foreach($commentItem->comments as $replay)
                                                <br>
                                                @if($replay->is_admin == true)
                                                    {{--admin replayed a user comment--}}

                                                    <div class="flex">
                                                        <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                            <img src="{{$replay->adminReply->image}}" alt=""
                                                                 class="absolute h-full rounded-full w-full">
                                                        </div>
                                                        <div>
                                                            <div
                                                                class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                                <p class="leading-6">
                                                                    <u>{{$replay->adminReply->name}}:</u>
                                                                    {{ $replay->text}}
                                                                </p>
                                                                <div
                                                                    class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                @else

                                                    <div class="flex ">
                                                        <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                            <img src="{{$replay->user->image}}" alt=""
                                                                 class="absolute h-full rounded-full w-full">
                                                        </div>
                                                        <div>
                                                            <div
                                                                class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                                <p class="leading-6">
                                                                    <b>{{$replay->user->name}}:</b>
                                                                    {{ $replay->text}}
                                                                </p>
                                                                <div
                                                                    class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                @endif

                                            @endforeach

                                            <div
                                                class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                        </div>
                                        <div class="text-sm flex items-center space-x-3 mt-2 ml-5"
                                        >

                                            <a href="{{route('add.comment.like.user' , $commentItem->id)}}"
                                               class="text-red-600
                                               {{
                                                    $commentItem
                                                    ->is_user_liked_a_comment(auth()->user()->id) ==true ? 'bg-red-100 rounded' : ''
                                                }}
                                                   "> &nbsp;
                                                <i class="uil-heart"></i>

                                                {{

                                                    ($commentItem->users_like_count() ==0?
                                                    ''
                                                    :$commentItem->users_like_count())
                                                     .'like'

                                                }}


                                            </a>
                                            <a href="#" uk-toggle="target:#show-comment-modal"
                                               onclick="hi('{{route('addreply.user' , [$commentItem->id  ,$question->id])}}')"
                                            >
                                                Reply </a>
                                            <span> {{$commentItem->created_at->diffForHumans()}} </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            no data
                        @endforelse


                    </div>
                </div>
            </div>
            <!-- --------------- /COMMENTS -------------------- -->

            <!-- --------------- PAGINATION -------------------- -->
            @if($comments->hasPages())
                <div class="flex justify-center mt-6">
                <span
                    class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                    {{$comments->links()}}</span>
                </div>
        @endif
        <!-- --------------- /PAGINATION-------------------- -->
        </div>
        <hr>

    </div>

    <script>
        function hi(route) {
            var reply_form = document.getElementById('reply-form-modal');
            reply_form.action = route;
        }
    </script>
@endsection




<!-- --------------- COMMENT MODAL -------------------- -->
<div id="create-post-modal" class="create-post is-story uk-modal" uk-modal>
    <div
        class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

        <!-- --------------- MODAL HEADER -------------------- -->
        <div class="text-center py-3 border-b">
            <h3 class="text-lg font-semibold"> post an answer ;) </h3>

            <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2 uk-icon uk-close" type="button"
                    uk-close="" uk-tooltip="title: Close ; pos: bottom ;offset:7" title="" aria-expanded="false">
                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"
                     data-svg="close-icon">
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
                </svg>
            </button>
        </div>
        <!-- --------------- /MODAL HEADER -------------------- -->

        <!-- --------------- MODAL INPUT TEXT -------------------- -->
        <form action="{{route('addcomment.user' , $question->id)}}" method="post">
            @csrf
            @method('post')

            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="{{auth()->user()->image}}"
                     class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                <textarea
                    name="comment"
                    class="uk-textare text-black shadow-none
                    focus:shadow-none text-xl font-medium resize-none"
                    rows="5" placeholder="What's Your Mind ? {{auth()->user()->name}}!"></textarea>
                </div>

            </div>
            <div class="flex text-center p-5">
                @error('comment')
                <b>{{$message}}</b>
                @enderror
            </div>

            <!-- modal form button -->
            <div class="flex items-center w-full justify-between border-t p-3">
                <div class="btn-group bootstrap-select mt-2 story">
                    <div class="flex space-x-2">

                        <a href="#"
                           class="bg-red-100 flex font-medium h-9 items-center
                        justify-center px-5 rounded-md text-red-600 text-sm">
                            cancle
                        </a>

                        <button type="submit" class="ripple">
                            send &nbsp;
                        </button>
                    </div>
                </div>
            </div>

        </form>
        <!-- --------------- /MODAL INPUT TEXT -------------------- -->

    </div>
</div>
<!-- --------------- /COMMENT MODAL-------------------- -->

<!-- --------------- LIKE & REPLAY A COMMENT MODAL -------------------- -->
<div id="show-comment-modal" class="create-post is-story uk-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body
     uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative
     shadow-2xl uk-animation-slide-bottom-small">

        <!-- --------------- MODAL HEADER TITLE CLOSE BUTTON -------------------- -->
        <div class="text-center py-3 border-b">
            <h3 class="text-lg font-semibold"> Reply </h3>
            <!-- close button -->
            <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2 uk-icon uk-close" type="button"
                    uk-close="" uk-tooltip="title: Close ; pos: bottom ;offset:7" title="" aria-expanded="false">
                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"
                     data-svg="close-icon">
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                    <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
                </svg>
            </button>
        </div>
        <!-- --------------- /MODAL HEADER TITLE CLOSE BUTTON -------------------- -->

        <form id="reply-form-modal" action="" method="post">
        @csrf
        @method('post')

        <!-- --------------- MODAL INPUT TEXT -------------------- -->
            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="{{auth()->user()->image}}"
                     class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                 <textarea
                     name="comment"
                     class="uk-textare text-black shadow-none
                    focus:shadow-none text-xl font-medium resize-none"
                     rows="5" placeholder=" REPLY {{auth()->user()->name}}">
                     {!! $question!!}
                 </textarea>


                </div>
            </div>
            <!-- --------------- /MODAL INPUT TEXT -------------------- -->

            <!-- --------------- MODAL BUTTON -------------------- -->
            <div class="flex items-center w-full justify-between border-t p-3">
                <div class="btn-group bootstrap-select mt-2 story">
                    <div class="flex space-x-2">
                        <a href="#" id="btncancel"
                           class="bg-red-100 flex font-medium h-9 items-center
                        justify-center px-5 rounded-md text-red-600 text-sm">
                            cancle
                        </a>

                        <button type="submit" class="ripple">
                            send &nbsp;
                        </button>
                    </div>
                </div>
            </div>
            <!-- --------------- /MODAL  BUTTON -------------------- -->
        </form>
    </div>

</div>
<!-- --------------- /LIKE & REPLAY A COMMENT MODAL -------------------- -->

