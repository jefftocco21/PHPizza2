<x-layout content="Hello There">

    @foreach ($posts as $post)
        
        <article class="{{$loop->even ? 'mb-6' : ''}}">
            <h1>
                <a href="/posts/{{$post->slug}}">
                {{$post->title}}
                </a>
            </h1>
            
            <div>{!! $post->excerpt !!}</div>
        </article>

    @endforeach

</x-layout>


<!-- Valid method as well
 @extends('components.layout')

@section('content')
    @foreach ($posts as $post)
        
        <article class="{{$loop->even ? 'mb-6' : ''}}">
            <h1>
                <a href="/posts/{{$post->slug}}">
                {{$post->title}}
                </a>
            </h1>
            
            <div>{!! $post->excerpt !!}</div>
        </article>

    @endforeach
@endsection
-->
