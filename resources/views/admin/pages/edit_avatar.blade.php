@extends('admin.layouts.app' ,['title'=>'Avatar'])


@section('content')
    <div class="col-7 m-auto ">
        <form action="{{route('update.avatar' , $avatar->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- file upload -->
                {{--========== file manager--}}
                <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                    <input id="thumbnail" contenteditable="false" class="form-control" type="text" name="filepath">
                    <br>
                </div>
                @error('filepath')
                <label class="aslert alert-danger badge-pill">{{$message}}</label>
                @enderror

                <img id="holder" style="margin-top:15px;max-height:100px;">
                <script>
                    var route_prefix = "{{route('unisharp.lfm.show')}}";
                    $('#lfm').filemanager('image', {prefix: route_prefix});
                </script>

                <br>
            <div class="input-group mb-3  ">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-success ">
                        <i class="fas fa-save"></i> Update avatar image
                    </button>
                </div>


            </div>



            <div class="form-group text-center">
                <img src="{{'http://127.0.0.1:8000'.$avatar->image}}" alt="">
            </div>


        </form>
    </div>


@endsection
