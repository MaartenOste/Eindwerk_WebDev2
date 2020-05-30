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
                Donate
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <blockquote>
                <i>
                    Fill in the form to donate.
                </i>
            </blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('donations.pay')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">@lang('contact.name')</label>
                    <input class="w-100" type="text" name="name" id="name" placeholder="{{__('contact.name')}}">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input class="w-100" type="email" name="email" id="email" placeholder="{{__('contact.email')}}">
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="name">How much would you like to donate?</label>
                    <div>
                        € <input class="ml-3" type="number" name="amount" id="amount" min="0" placeholder="0" step="1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="visible">Display on website?</label>
                    <input type="checkbox" value="1" name="visible" id="visible" checked>
                </div>
                <div class="form-group">
                    <label for="message">Add a message to your donation</label>
                    <textarea class="w-100" name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <button type="submit">@lang('contact.send')</button>
            </form>
        </div>
    </div>
</div>
@endsection
