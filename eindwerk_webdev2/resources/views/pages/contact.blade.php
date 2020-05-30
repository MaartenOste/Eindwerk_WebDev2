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
    <div class="row">
        <div class="col-12">
            <h1 class="pagetitle">
                @if (app()->getlocale() == 'en')
                    {{$page->en_title}}
                @elseif (app()->getlocale() == 'nl')
                    {{$page->nl_title}}
                @endif
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <blockquote>
                <i>
                    @if (app()->getlocale() == 'en')
                        {!!$page->en_intro!!}
                    @elseif (app()->getlocale() == 'nl')
                        {!!$page->nl_intro!!}
                    @endif
                </i>
            </blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('contact')}}" method="post">
                @csrf
                <div class="form-group">
                <input class="w-100" type="text" name="name" id="name" placeholder="{{__('contact.name')}}">
                </div>
                <div class="form-group">
                    <input class="w-100" type="email" name="email" id="email" placeholder="{{__('contact.email')}}">
                </div>
                <div class="form-group">
                    <input class="w-100" type="text" name="subject" id="subject" placeholder="{{__('contact.subject')}}">
                </div>
                <div class="form-group">
                    <textarea class="w-100" name="content" id="content" cols="30" rows="10"></textarea>
                </div>
                <button type="submit">@lang('contact.send')</button>
            </form>
        </div>
    </div>
</div>
@endsection
