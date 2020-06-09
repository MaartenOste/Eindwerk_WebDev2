@extends('layout')

@section('routes')
    @if (app()->getlocale() == 'en')
        @foreach($pages as $onepage)
        @if($onepage->visible == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('page', $onepage->slug) }}">{{ $onepage->en_title }}</a>
            </li>
        @endif
        @endforeach
    @elseif (app()->getlocale() == 'nl')
        @foreach($pages as $onepage)
        @if($onepage->visible == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('page', $onepage->slug) }}">{{ $onepage->nl_title }}</a>
            </li>
        @endif
        @endforeach
    @endif
@endsection

@section('content')
    <h1 class="newsmargins">
        @lang('header.news')
    </h1>
      <div class="card-deck">
        @foreach($news as $post)
        @if($post->visible)

        <div class="col-6 newscol">
            <a class="card-link" href="{{ route('news.detail', $post->id) }}">
            <div class="card newscard">
                @if($post->image)
                <div class="imagecontainer">
                    <img class="card-img-top" src="{{ asset('storage/'. $post->image) }}" alt="Card image cap">
                </div>
                @endif
                <div class="card-body">
                    <h3 class="card-title">
                        @if (app()->getlocale() == 'en')
                            {!!$post->en_title!!}
                        @elseif (app()->getlocale() == 'nl')
                            {!!$post->nl_title!!}
                        @endif
                    </h3>
                    <p class="card-text">
                        @if (app()->getlocale() == 'en')
                            {!!$post->en_intro!!}
                        @elseif (app()->getlocale() == 'nl')
                            {!!$post->nl_intro!!}
                        @endif
                    </p>
                    <p class="card-text">
                        <small class="text-muted">created on {{$post->created_at->format('d M Y')}}</small>
                    </p>
                </div>
            </div>
        </a>
        </div>
        @endif
        @endforeach
      </div>
      <div class="pagenavigation">
        {{$news->links()}}
      </div>

@endsection
