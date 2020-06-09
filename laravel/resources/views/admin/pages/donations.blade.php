
@extends('admin.adminlayout')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Message</th>
            <th scope="col">Visible</th>
          </tr>
        </thead>
        @foreach ($donations as $donation)
        <tr>
        <th scope="row">{{$donation->id}}</th>
            <td>{{$donation->name}}</td>
            <td>{{$donation->amount}}</td>
            <td>{{$donation->message}}</td>
            <td><input type="checkbox" id="{{$donation->id}}" onclick="return false;"
                @if($donation->visible)
                    checked
                @endif
                >
            </td>
          </tr>
        </tbody>
        @endforeach
        <tbody>

      </table>
</div>
@endsection
