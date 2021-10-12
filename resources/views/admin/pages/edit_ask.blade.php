@extends('admin.layouts.app' ,['title'=>'Edit Ask Box'])


@section('content')

    <div class="m-auto  col-11">
        <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">edit Ask Question Box</h4>
            </div>

            @if(session()->has('message'))
                <h5 id="terms-error" class="success alert-success badge-pill" style="display: inline;">
                    {{session('message')}}
                </h5>
            @endif

            <div class="card-body">

                <form action="{{route('update.askbox' ,$ask->id )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group mb-3">
                        <label for="editor">Enter the Ask Question</label>
                        <textarea name="title" id="editor">{!! $ask->title !!}
                        </textarea>

                    </div>
                    <br>
                    @error('title')
                    <label class="aslert alert-danger badge-pill">{{$message}}</label>
                    @enderror


                    <div class="form-group">


                        <label for="dp">Select Tags</label>
                        <select id="dp" name="tags[]" multiple class="form-control">


                            @foreach($categories as $category)

                                <option
                                    @foreach($ask->categories as $c)
                                    {{$c->id ==$category->id ? 'selected': null }}
                                    @endforeach

                                    value="{{$category->id}}" name="{{$category->id}}">{{$category->title}}
                                </option>

                            @endforeach
                        </select>

                         @error('tags')
                         <label class="aslert alert-danger badge-pill">{{$message}}</label>
                         @enderror

                    </div>
                    <div class="form-group">
                        {{--========== file manager--}}
                        <div class="input-group">
                            <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> انتخاب تصویر شاخص
                                 </a>
                            </span>
                            <input id="thumbnail" contenteditable="false" class="form-control" type="text"
                                   name="filepath">
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
                    </div>
                    <br>
                    <img src="{{$ask->image}}" alt="" width="200" height="400">

                    <button type="submit" class="btn btn-success ripple w-100 ">
                        update
                    </button>

                </form>

            </div>
        </div>
    </div>





@endsection
