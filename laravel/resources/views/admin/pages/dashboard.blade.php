@extends('admin.adminlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <a href="{{route('pages.create')}}" class="btn btn-warning">add page</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Intro</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        @foreach ($pages as $page)
        <tr>
            <td>{{$page->en_title}}</td>
            <td>
                @if( Str::length($page->en_intro) > 50)
                    {{ substr(strip_tags($page->en_intro),0, 50) . '...' }}
                @else
                    {{ strip_tags($page->en_intro) }}
                @endif
            </td>
            <td class="d-flex">
                <a href="{{route('pages.edit', $page->id)}}" class="btn btn-success">edit</a>
                <form class="ml-3" action="{{ route('pages.delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="page_id" value="{{$page->id}}">
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </td>
          </tr>
        </tbody>
        @endforeach
        <tbody>
      </table>
</div>

@endsection
