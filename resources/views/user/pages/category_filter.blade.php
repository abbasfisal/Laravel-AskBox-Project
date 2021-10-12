@extends('user.layouts.dashboard')

@section('content')

    <div class="mcontainer">
        <div class="lg:flex lg:space-x-10">

            <!-- ================ Asks ============================ -->
            <div class="lg:w-2/3">
                <div class="my-5 flex justify-between pb-3">
                    <h2 class="text-2xl font-semibold">
                        Filter By {{$filter_title}}
                    </h2>
                </div>

                <div class="divide-y -mt-3 card px-5 py-2 ">
                    @forelse($asks as $ask)

                        <div class="flex lg:flex-row flex-col lg:space-x-4 py-4 relative w-full">

                            {{--image--}}
                            <a href="#">
                                <div class="lg:w-60 w-full h-40 overflow-hidden rounded-lg relative shadow-sm">
                                    <img src="{{$ask->image}}" alt=""
                                         class="w-full h-full absolute inset-0 object-cover">

                                </div>
                            </a>
                            {{-- /image--}}

                            <div class="flex-1 relative">
                                <h2 class="text-xl font-semibold leading-6 lg:mt-0 mt-4">

                                    {!! $ask->title !!}
                                </h2>
                                <p class="leading-6 line-clamp-2 mt-2">

                                </p>

                                <div class="flex space-x-2 items-center text-sm pt-1 text-sm">
                                    <div> {{$ask->created_at->diffForHumans()}}</div>
                                    <div>
                                        <a href="{{route('singleAsk.user',$ask->id)}}">
                                            <i><b>Read More...</b></i>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                @foreach($ask->categories as $category)
                                    <span
                                        class="bg-blue-100 font-semibold px-2.5 py-1 rounded-full text-blue-500 text-xs m-1">
                                        {{$category->title}}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                    @empty
                        no data
                    @endforelse
                </div>
                <!--=== pagination === -->

                @if($asks->hasPages())
                    <div class="flex justify-center mt-6">
                        <span
                            class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                            {{$asks->links()}}
                        </span>
                    </div>
                @endif
            <!--=== end pagination === -->
                <br>
            </div>
            <!-- ================ End Asks ============================ -->


            <!-- right side bar - categories -->
        @include('user.layouts.partials._rightSideCategories')

        <!-- ======= end right side bar - categories -->
        </div>
    </div>


@endsection
