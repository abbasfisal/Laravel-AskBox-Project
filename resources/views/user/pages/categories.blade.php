@extends('user.layouts.dashboard')
@section('content')


    <div class="flex justify-between items-center relative md:mb-4 mb-3">
        <div class="flex-1">
            <h2 class="text-2xl font-semibold"> Categories
            </h2>

        </div>


    </div>


    <div class="grid md:grid-cols-4 grid-cols-2 gap-3 mt-5">

        @forelse($categories as $category)
            <div>
                <a href="{{route('asks.by.category.user' , $category->id)}}">
                    <div
                        class="bg-green-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                        <img src="{{$category->image}}" class="w-full h-full absolute object-cover inset-0"/>
                        <!-- overly-->
                        <div
                            class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full">

                        </div>

                        <div
                            class="absolute bottom-0 w-full p-3 text-white  flex items-center">
                            <div class="flex-1">
                                <div class="text-lg"> {{$category->title}}</div>

                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8l4 4-4 4M8 12h7"/></svg>
                        </div>
                    </div>
                </a>
            </div>

        @empty
            empty
        @endforelse

    </div>
    <div class="mt-5 form-group">
        {{$categories->links()}}
    </div>



@endsection
