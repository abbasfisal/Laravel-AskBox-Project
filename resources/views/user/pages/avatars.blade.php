@extends('user.layouts.dashboard' ,['title'=>'avatar'])
@section('content')


    <div class="flex justify-between items-center relative md:mb-4 mb-3">
        <div class="flex-1">
            <h2 class="text-2xl font-semibold"> avatars
            </h2>

            @if(session('message'))
                <span>{{session('message')}}</span>
            @endif
        </div>

        <a href="#" uk-toggle=""
           class="flex items-center justify-center z-10 h-10 w-10 rounded-full bg-blue-600 text-white absolute right-0"
           data-tippy-placement="left" data-tippy="" data-original-title="Create New Album">

            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                      clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>


    <div class="grid md:grid-cols-4 grid-cols-2 gap-3 mt-5">

        @forelse($avatars as $avatar)
            <div>
                <a href="{{route('update.avatar.user' , $avatar->id)}}">
                    <div
                        class="bg-green-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                        <img src="{{$avatar->image}}" class="w-full h-full absolute object-cover inset-0"/>
                        <!-- overly-->


                    </div>
                </a>
            </div>

        @empty
            empty
        @endforelse

    </div>
    <div class="mt-5 form-group">
        {{$avatars->links()}}
    </div>



@endsection
