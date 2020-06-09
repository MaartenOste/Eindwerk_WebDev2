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
    <h1 class="title">
        @if (app()->getlocale() == 'en')
            {{$page->en_title}}
        @elseif (app()->getlocale() == 'nl')
            {{$page->nl_title}}
        @endif
    </h1>
    <blockquote>
        <i>
            @if (app()->getlocale() == 'en')
                {!!$page->en_intro!!}
            @elseif (app()->getlocale() == 'nl')
                {!!$page->nl_intro!!}
            @endif
        </i>
    </blockquote>

    <div>
    @if (app()->getlocale() == 'en')
        {!!$page->en_content!!}
    @elseif (app()->getlocale() == 'nl')
        {!!$page->nl_content!!}
    @endif
    </div>
</div>
@endsection
