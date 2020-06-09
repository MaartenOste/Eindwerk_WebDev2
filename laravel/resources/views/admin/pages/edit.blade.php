@extends('admin.adminlayout')

@section('scripts')
<script>
    tinymce.init({
      selector: '.contentarea',
      plugins: "link",
      fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt 42pt 76pt",
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Edit page
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('pages.save')}}" method="POST">
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
                @csrf
                <input type="hidden" name="id" value="{{$page->id}}">
                <div class="input-group d-flex flex-column mt-3">
                    <label for="visible">Visible:</label>
                    <select name="visible" id="visible">
                        <option value="0" @if($page->visible == 0) selected @endif>not visible</option>
                        <option value="1"@if($page->visible == 1) selected @endif> visible</option>
                    </select>
                </div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="template">Template:</label>
                    <select name="template" id="template">
                        <option value="fullwidth"  @if($page->template == 'fullwidth') selected @endif>fullwidth</option>
                        <option value="contact"  @if($page->template == 'contact') selected @endif>contact</option>
                        <option value="home" @if($page->template == 'home') selected @endif>home</option>
                    </select>
                </div>
                <div class="langtitle mt-3 p-2 w-100 bg-primary text-white">en</div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="en_title">Title:</label>
                    <input type="text" name="en_title" id="en_title" value="{{$page->en_title}}" size="100">
                </div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="en_intro">Intro:</label>
                    <textarea name="en_intro" id="en_intro" cols="100" rows="5">{{$page->en_intro}}</textarea>
                </div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="en_content">Content:</label>
                    <textarea class="contentarea" name="en_content" id="en_content" cols="100" rows="10">{{$page->en_content}}</textarea>
                </div>
                <div class="langtitle p-2 w-100 mt-3 bg-primary text-white">nl</div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="nl_title">Title:</label>
                    <input type="text" name="nl_title" id="nl_title" value="{{$page->nl_title}}" size="100">
                </div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="nl_intro">Intro:</label>
                    <textarea name="nl_intro" id="nl_intro" cols="100" rows="5">{{$page->nl_intro}}</textarea>
                </div>
                <div class="input-group d-flex flex-column mt-3">
                    <label for="nl_content">Content:</label>
                    <textarea class="contentarea" name="nl_content" id="nl_content" cols="100" rows="10">{{$page->nl_content}}</textarea>
                </div>
                <input type="submit" class="btn btn-success mt-3 mb-5" value="update">

                    </form>
        </div>
    </div>

</div>

@endsection
