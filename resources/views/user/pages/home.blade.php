@extends('user.layouts.dashboard')

@section('content')

    <div class="flex justify-between relative md:mb-4 mb-3">
        <div class="flex-1">
            <h2 class="text-2xl font-semibold"> Dashboard </h2>
        </div>
    </div>
    <br>
    <br>


    <div class="sm:my-6 my-3 flex items-center justify-between border-b pb-3">
        <div>
            <h2 class="text-xl font-semibold"> Categories </h2>
        </div>
        <a href="{{route('categories.user')}}" class="text-blue-500 sm:block hidden"> See all </a>
    </div>

    <div class="relative -mt-3" uk-slider="finite: true">

        <div class="uk-slider-container px-1 py-3">
            <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                @forelse($categories as $category )
                    <li>
                        <div class="rounded-md overflow-hidden relative w-full h-36">
                            <div
                                class="absolute w-full h-3/4 -bottom-12 bg-gradient-to-b from-transparent to-gray-800 z-10">
                            </div>
                            <img src="{{$category->image}}" class="absolute w-full h-full object-cover"
                                 alt="">
                            <div class="absolute bottom-0 w-full p-3 text-white z-20 font-semibold text-lg">
                                {{$category->title}}
                            </div>
                        </div>
                    </li>
                @empty
                    no Category

                @endforelse

            </ul>
        </div>

        <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
           href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
        <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
           href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

    </div>
    <br>
    <hr>
    <br>
    <br>
    <div>
        <h2 class="text-xl font-semibold">Random Questions </h2>
        <br>
    </div>
    <hr>
    <div class="grid md:grid-cols-2 divide divide-gray-200 gap-x-6 gap-y-4">
        @forelse($asks as $ask)

        <div class="flex items-center space-x-4">
            <div class="w-20 h-20 flex-shrink-0 rounded-md relative mb-3">
                <img src="{{$ask->image}}"
                     class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm" alt="">
            </div>
            <div class="flex-1 border-b pb-3">
                <a href="timeline-group.html" class="text-lg font-semibold capitalize">
                    {{$ask->title}}
                </a>


                <div class="flex items-center mt-2">
                    <img src="assets/images/avatars/avatar-2.jpg"
                         class="w-6 rounded-full border-2 border-gray-200 -mr-2" alt="">
                    <img src="assets/images/avatars/avatar-4.jpg"
                         class="w-6 rounded-full border-2 border-gray-200" alt="">
                    <div class="text-sm text-gray-500 ml-2"> {{$ask->created_at->diffForHumans()}}</div>
                </div>

            </div>

            <a href="{{route('singleAsk.user',$ask->id)}}" class="flex items-center justify-center h-9 px-3 rounded-md bg-blue-100 text-blue-500">
                Read More
            </a>
        </div>
        @empty
            No Asks
        @endforelse


    </div>


@endsection
