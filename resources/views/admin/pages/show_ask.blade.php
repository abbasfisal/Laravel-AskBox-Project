@extends('admin.layouts.dash' ,['title'=>'AskBox'])


@section('content')

    <div class="m-auto  col-12">
        <div class="col-6  ">
            <a href="{{route('create.askbox')}}" class="btn btn-primary">
                Create New AskQuestion Box
            </a>
        </div>
        <br>


        @if(session()->has('message'))

            <span class="success alert-success badge-pill">
                    {{session('message')}}
            </span>
        @endif
    </div>
    {{-- askbox list--}}
    <div class="col-12 m-auto">

        <table class="table col-12 table-hover">
            <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Title</b></td>
                <td><b>Tags</b></td>
                <td><b>Action</b></td>
            </tr>
            </thead>

            <tbody>
            @php $i=0 @endphp
            @foreach($asks as $ask)
                <tr>
                    <td>{{$i +=1}}</td>
                    <td>
                        {!!  $ask->title!!}
                    </td>
                    <td>

                        @forelse($ask->categories as $category)
                            <span class="badge badge-info">
                                {{$category->title}}
                            </span>
                        @empty
                            empty
                        @endforelse
                    </td>
                    <td>

                        <a href="{{route('edit.askbox',$ask->id)}}" class="btn  ripple ">
                            <i class="fas fa-edit" style="color:#2196f3   !important;">edit</i>
                        </a>


                        <a href="{{route('destroy.askbox',$ask->id)}}" class="btn ripple  ">
                            <i class="fas fa-trash-alt " style="color:#ff5252  !important;">delete</i>
                        </a>

                        <a href="{{route('showsingle.ask' , $ask->id)}}">view</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot></tfoot>

        </table>

    </div>
    {{--/askbox list--}}





@endsection
