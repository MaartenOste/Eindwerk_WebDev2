@extends('admin.adminlayout')

@section('scripts')
<script>
    tinymce.init({
      selector: '.contentarea'
    });
</script>
@endsection

@section('content')
<div class="container">
    <form action="{{ route('news.save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$news->id}}">
        <div class="input-group d-flex flex-column mt-3">
            <label for="visible">Visible:</label>
            <select name="visible" id="visible">
                <option value="0" @if($news->visible == 0) selected @endif>not visible</option>
                <option value="1"@if($news->visible == 1) selected @endif> visible</option>
            </select>
        </div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <div class="langtitle p-2 mt-3 w-100 bg-primary text-white">en</div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="en_title">Title:</label>
            <input type="text" name="en_title" id="en_title" value="{{$news->en_title}}" size="100">
        </div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="en_intro">Intro:</label>
            <textarea name="en_intro" id="en_intro" cols="100" rows="5">{{$news->en_intro}}</textarea>
        </div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="en_content">Content:</label>
            <textarea class="contentarea" name="en_content" id="en_content" cols="100" rows="10">{{$news->en_content}}</textarea>
        </div>
        <div class="langtitle p-2 w-100 mt-3 bg-primary text-white">nl</div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="nl_title">Title:</label>
            <input type="text" name="nl_title" id="nl_title" value="{{$news->nl_title}}" size="100">
        </div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="nl_intro">Intro:</label>
            <textarea name="nl_intro" id="nl_intro" cols="100" rows="5">{{$news->nl_intro}}</textarea>
        </div>
        <div class="input-group d-flex flex-column mt-3">
            <label for="nl_content">Content:</label>
            <textarea class="contentarea" name="nl_content" id="nl_content" cols="100" rows="10">{{$news->nl_content}}</textarea>
        </div>
        <input type="submit" class="btn btn-success mt-3 mb-5" value="update">
        <div class="medium-12 columns">
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
    </form>

</div>
@endsection
