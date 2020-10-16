@extends ('layout')

@section ('content')
    
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    @forelse ($articles as $article)
                    <h2>{{ $article->title }}</h2>
                    <li class="first">
                        <h3>
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h3>
                        <p>
                            {{ $article->excerpt }}
                        </p>
                    </li>
                    @empty
                        <p>No relevant articles here.</p>
                    @endforelse
                </div>       
            </div>
        </div>
    </div>
@endsection