@extends('admin.app')

@section('content')

<h2>Aktualności</h2>
<br>
<h4 id="post-update-title">{{ $post->title }}</h4>
<h6 id="post-update-title">{{ $post->created_at }}</h6>


<br><br>

<form id="post-update-form" action="" method="POST">
    @csrf
    <label for="post-title" class="col-form-label">Tytuł:</label>
    <input type="text" name="title" class="form-control" id="post-title" required value="{{ $post->title }}">
    @error('title')
    <div>{{ $message }}</div>
    @enderror

    <label for="textarea-post" class="col-form-label">Opis:</label>
    <textarea id="textarea-post-update" name="content" height="400px">
    {{ $post->content }}
    </textarea>
    @error('content')
    <div>{{ $message }}</div>
    @enderror
    <input type="hidden" name="post_id" required value="{{ $post->id }}">
    <div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </div>
</form> 
@endsection