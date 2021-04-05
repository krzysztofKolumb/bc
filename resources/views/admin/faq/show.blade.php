@extends('admin.app')

@section('content')

<h2>FAQ</h2>
<br>
<h4 id="faq-question">{{ $faq->question }}</h4>

<br><br>

<form id="faq-form-update" action="" method="POST">
        @csrf
        <label for="faq-question" class="col-form-label">Pytanie:</label>
        <input type="text" name="question" class="form-control" id="faq-question" value="{{ $faq->question }}" required>
        @error('question')
        <div>{{ $message }}</div>
        @enderror
        <label for="answear-editor" class="col-form-label">Odpowiedź:</label>
        <textarea id="editor-faq-update" name="answear" height="400px">{{ $faq->answear }}</textarea>
        <input type="hidden" name="faq_id" value="{{ $faq->id }}" required>
        @error('answear')
        <div>{{ $message }}</div>
        @enderror
        <div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </div>
    </form> 
@endsection