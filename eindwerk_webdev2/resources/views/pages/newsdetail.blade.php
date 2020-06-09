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
<div class="container">
    <div class="detailheader">
        <div class="left-component">
            <h1>
                @if (app()->getlocale() == 'en')
                    {{$news->en_title}}
                @elseif (app()->getlocale() == 'nl')
                    {{$news->nl_title}}
                @endif
            </h1>
            <p class="intro">
                @if (app()->getlocale() == 'en')
                    {!!$news->en_intro!!}
                @elseif (app()->getlocale() == 'nl')
                    {!!$news->nl_intro!!}
                @endif
            </p>
        </div>
        <div class="right-component">
            <img class="main-image" src="{{ asset('storage/'. $news->image) }}" alt="image">
        </div>
    </div>

    <p class="detailcontent">
        @if (app()->getlocale() == 'en')
            {!!$news->en_content!!}
        @elseif (app()->getlocale() == 'nl')
            {!!$news->nl_content!!}
        @endif
    </p>
</div>

@endsection
