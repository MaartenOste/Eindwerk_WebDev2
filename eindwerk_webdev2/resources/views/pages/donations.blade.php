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
    <h1 class="pagetitle">
        @lang('header.donations')
        <a href="{{ route('donations.create') }}" class="btn btn-danger">donate now!</a>
    </h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Message</th>
          </tr>
        </thead>
        @foreach ($donations as $donation)
        <tr>
            <td>{{$donation->name}}</td>
            <td>€ {{$donation->amount}}</td>
            <td>{{$donation->message}}</td>
        </tr>
        </tbody>
        @endforeach
        <tbody>
      </table>
</div>

@endsection
