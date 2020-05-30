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
<div class="row">
    <div class="col-12">
      <div class="card mb-3" style="max-width: 100vw;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ asset('images/newsimages/streamer.jpg')}}" class="card-img" alt="streamer">
          </div>
          <div class="col-md-8 home-card">
            <div class="card-body mt-4 text-white">
                @if (app()->getlocale() == 'en')
                    {!!$page->en_content!!}
                @elseif (app()->getlocale() == 'nl')
                    {!!$page->nl_content!!}
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
