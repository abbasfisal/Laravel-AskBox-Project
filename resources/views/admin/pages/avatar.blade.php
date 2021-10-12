@extends('admin.layouts.app' ,['title'=>'Category'])
@section('content')
    <div class="col-7 m-auto ">
        <form action="{{route('store.avatar')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <b>add new avatar</b><br><br>
            </div>
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


            <!-- Button text input  -->
            <div class="input-group mb-3  ">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-success ">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
                <!-- /btn-group -->


            </div>
            @error('title')
            <span id="terms-error" class="error invalid-feedback" style="display: inline;">
               <b>{{$message}}</b>
            </span>
            @enderror

            @if(session()->has('message'))
                <h5 id="terms-error" class="success alert-success badge-pill" style="display: inline;">
                    {{session('message')}}
                </h5>

            @endif


        </form>
    </div>

    {{-- category list--}}
    <div class="col-11  m-auto">
        <br>
        <br>
        <table class="table table-hover  col-11 ">
            <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Avatar</b></td>
                <td><b>Action</b></td>
            </tr>
            </thead>

            <tbody>
            @php $i=0 @endphp
            @foreach($avatars as $avatar)
                <tr>
                    <td>{{$i +=1}}</td>

                    <td>
                        <img width="100px" height="100px"
                             class="rounded"
                             src="{{'http://127.0.0.1:8000'. $avatar->image}}" alt="">
                    </td>
                    <td>

                        <a href="{{route('edit.avatar',$avatar->id)}}" class="btn  ripple ">
                            <i class="fas fa-edit" style="color:#2196f3   !important;">edit</i>
                        </a>


                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
        <div class="">
            {{$avatars->links()}}
        </div>
    </div>
    {{--/category list--}}
@endsection

