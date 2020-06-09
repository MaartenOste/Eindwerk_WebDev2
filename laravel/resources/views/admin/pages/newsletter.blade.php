@extends('admin.adminlayout')

@section('content')
<div class="container">
    <form action="{{ route('newsletter.save')}}" class="d-flex flex-column" method="POST">
        @csrf
        <label for="apikey">Apikey: </label>
        <input type="text" name="apikey" id="apikey" value="{{$apikey}}">
        <label for="listid" class="mt-3">Listid: </label>
        <input type="text" name="listid" id="listid" value="{{$listid}}">
        <input type="submit" value="update" class="w-25 mt-5">
    </form>
</div>

@endsection
