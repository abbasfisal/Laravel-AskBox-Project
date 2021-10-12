<div class="lg:w-1/3 w-full">
    <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card uk-sticky" style="">
        <div class="border-b flex items-center justify-between  p-4">
            <div>
                <h2 class="text-lg font-semibold">Categories</h2>
            </div>

        </div>

        <div class="p-3">
            <div class="flex flex-wrap gap-2">
                @forelse($categories as $category)
                    <a href="{{route('asks.by.category.user' , $category->id)}}" class="bg-gray-100 py-1.5 px-4 rounded-full"> {{$category->title}}</a>
                @empty
                    no category
                @endforelse
            </div>
        </div>

        <a href="{{route('categories.user')}}" class="border-t block text-center py-2"> See all </a>

    </div>
    <div class="uk-sticky-placeholder" style="height: 508px; margin: 0;" hidden=""></div>
</div>
