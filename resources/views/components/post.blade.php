@props(['post' => $post])

<div class="mb-4">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">
        {{$post->user->name}}
        <span class="text-gray-600 text-xs">{{$post->created_at->diffForHumans()}}</span>
    </a>
    <p class="mb-1">{{$post->body}}</p>

    @can('delete', $post)
        {{--delete post user authentication--}}
        <form action="{{route('posts.destroy', $post)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500 text-xs">Delete</button>
        </form>
    @endcan

    <div class="flex items-center">
        @auth()
            @if(!$post->likedBy(auth()->user()))
                <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500 text-xs">Like</button>
                </form>
            @else
                <form action="{{route('posts.unlike', $post)}}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500 text-xs">Unlike</button>
                </form>
            @endif
        @endauth
        <span class="text-xs">{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>
