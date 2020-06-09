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
    <form action="{{ route('newsletter.subscribe')}}" method="post">
        <div class="medium-12 columns text-danger">
            @if($errors->any())
            <div class="callout error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @csrf
        <div>
            <h2>Subscribe</h2>
            <i>
                @if (app()->getlocale() == 'en')
                    Fill in your e-mail to subscribe.
                    If you would like to unsubscribe, just fill it in again.
                @else
                    Vul je e-mailadres in om onze nieuwsbrief te ontvangen.
                    Als je deze niet langer wil ontvangen, vul hem dan gewoon nog eens in.
                @endif
            </i>
            <div class="d-flex flex-column">
                <label for="email">{{__('contact.email')}}
                </label>
                <input type="email" class="w-50" name="email" required>
                <input type="submit" class="w-25 mt-3" value="submit">
            </div>
        </div>
    </form>
    @if(isset($_GET['isSubscribed']))

        @if($_GET['isSubscribed'])
            <div class="newslettermessage mt-3">
                @if (app()->getlocale() == 'en')
                    <div class="text-danger">
                        You are now unsubscribed!
                    </div>
                @else
                    <div class="text-danger">
                        Je zal onze nieuwsbrief niet langer ontvangen!
                    </div>
                @endif
            </div>
        @else
            <div class="newslettermessage text-success mt-3">
                @if (app()->getlocale() == 'en')
                    <div class="text-succes">
                        You are now subscribed!
                    </div>
                @else
                    <div class="text-succes">
                        Je zal vanaf nu onze nieuwsbrief ontvangen!
                    </div>
                @endif
            </div>
        @endif
    @endif
</div>
@endsection
