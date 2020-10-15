@extends ('layout')

@section ('content')
    
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    @foreach ($articles as $article)
                    <h2>{{ $article->title }}</h2>
                    <li class="first">
                        <h3>
                            <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                        </h3>
                        <p>
                            {{ $article->excerpt }}
                        </p>
                    </li>
                    @endforeach
                </div>       
            </div>
        </div>
    </div>
@endsection