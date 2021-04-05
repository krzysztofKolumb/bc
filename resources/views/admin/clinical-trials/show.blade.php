@extends('admin.app')

@section('content')

<h2>Badania kliniczne</h2>
<br>
<h4 id="clinical-trial-title">{{ $clinicalTrial->title }}</h4>

<br><br>

<form class="form-clinical-trial-tm" id="clinical-trial-form" action="" method="POST">
        @csrf
        <label for="clinical-trial-title" class="col-form-label">Tytuł:</label>
        <input type="text" name="title" class="form-control" id="clinical-trial-title" value="{{ $clinicalTrial->title }}" required>
        @error('title')
            <div>{{ $message }}</div>
         @enderror
        <label class="col-form-label">Kategoria:</label>
        <select class="form-select mb-3" name="category">
            <!-- <option selected>Kategoria</option> -->
            @foreach($categories as $category)
            <option value="{{ $category->id }}" required {{ ( $category->id == $selectedID) ? 'selected' : '' }}>{{ $category->title }}</option>
            @endforeach
        </select>
        @error('category')
            <div>{{ $message }}</div>
        @enderror
        <label for="textarea-clinical-trial" class="col-form-label">Opis:</label>
        <textarea id="textarea-clinical-trial" name="content" height="400px">
            {{ $clinicalTrial->content }}
        </textarea>
        <input type="hidden" name="id" value="{{ $clinicalTrial->id }}">
        @error('content')
        <div>{{ $message }}</div>
        @enderror
        <div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </div>
    </form> 
@endsection