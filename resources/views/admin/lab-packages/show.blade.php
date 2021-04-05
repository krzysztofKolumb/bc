@extends('admin.app')

@section('content')

<h2>Pakiet laboratoryjny</h2>
<br>
<h4 id="lab-package-title">{{ $labPackage->title }}</h4>

<br><br>

<form id="lab-package-update-form" action="" method="POST">
    @csrf
    <label for="lab-package-title" class="col-form-label">Tytuł:</label>
    <input type="text" name="title" class="form-control" id="lab-package-title" required value="{{ $labPackage->title }}">
    @error('title')
    <div>{{ $message }}</div>
    @enderror

    <label for="lab-package-price" class="col-form-label">Cena (pln):</label>
    <input type="text" name="price" class="form-control" id="lab-package-price" required value="{{ $labPackage->price }}">
    @error('price')
    <div>{{ $message }}</div>
    @enderror

    <label for="textarea-new-lab-package" class="col-form-label">Opis:</label>
    <textarea id="lab-package-update-editor" name="content" height="400px">
    {{ $labPackage->content }}
    </textarea>
    @error('content')
    <div>{{ $message }}</div>
    @enderror
    <input type="hidden" name="package_id" required value="{{ $labPackage->id }}">
    <div>
        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </div>
</form> 
@endsection