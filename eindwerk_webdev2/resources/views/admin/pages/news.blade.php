
@extends('admin.adminlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <a href="{{route('news.create')}}" class="btn btn-warning">add news</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Visible</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        @foreach ($news as $post)
        <tr>
        <th scope="row">{{$post->id}}</th>
            <td>{{$post->en_title}}</td>
            <td>
                <form action="{{ route('news.softdelete')}}" method="POST" id="softdelete{{$post->id}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="checkbox" id="{{$post->id}}" onclick="event.preventDefault();
                    document.getElementById('softdelete{{$post->id}}').submit();" name="visible" value="{{$post->id}}"
                    @if($post->visible)
                        checked
                    @endif
                    >
                </form>
            </td>
            <td class="d-flex">
                <a href="{{ route('admin.pages.news.detail', $post->id)}}"><i class="fas fa-pencil-alt" ></i>
                </a>
                <form class="ml-3" action="{{ route('news.delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
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
