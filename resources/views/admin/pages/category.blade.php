@extends('admin.layouts.dash' ,['title'=>'Category'])
@section('content')
    <div class="col-7 m-auto ">
        <form action="{{route('store.category')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <b>create new category</b><br><br>
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
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " dir="ltr">

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
    <br>

    {{-- category list--}}
    <div class="col-12  m-auto align-items-center justify-content-center">
        <table class="table col-12 table-hover  ">
            <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Title</b></td>
                <td><b>Image</b></td>
                <td><b>Action</b></td>
            </tr>
            </thead>

            <tbody>
            @php $i=0 @endphp
            @foreach($categories as $category)
                <tr>
                    <td>{{$i +=1}}</td>
                    <td>{{$category->title}}
                    </td>
                    <td>
                        <img width="100px" height="100px"
                             class="rounded"
                             src="{{'http://127.0.0.1:8000'. $category->image}}" alt="">
                    </td>
                    <td>

                        <a href="{{route('edit.category',$category->id)}}" class="btn  ripple ">
                            <i class="fas fa-edit" style="color:#2196f3   !important;">edit</i>
                        </a>


                        <a href="{{route('destroy.category',$category->id)}}" class="btn ripple  ">
                            <i class="fas fa-trash-alt " style="color:#ff5252  !important;">delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
        <div class="">
            {{$categories->links()}}
        </div>
    </div>
    {{--/category list--}}
@endsection

