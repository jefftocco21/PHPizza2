<!doctype html>

<title>My Blog</title>
<link rel="stylesheet" href="app.css">

<body>
    <!--blade directive example-->
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
</body>

</html>