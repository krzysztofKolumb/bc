@extends('admin.app')

@section('content')

<h2>Badania kliniczne</h2>
<br>

@livewire('clinical-trials')


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-clinical-trial">
  Nowy
</button> -->

<br><br>

<!-- <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Kategoria</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($trials as $trial)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $trial->title }}</td>
            <td>{{ $trial->clinicalTrialCategory->title }}</td>
            <td>
                <a href="{{ route('admin-clinical-trials-show', $trial->id) }}" class="btn btn-primary" tabindex="-1" role="button">Edytuj</a>
                <button type="submit" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="{{ $trial->id }}">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table> -->



<!-- Modal -->
<!-- <div class="modal fade" id="modal-new-clinical-trial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-clinical-trial-tm" id="new-clinical-trial-form" action="" method="POST">
            @csrf
            <label for="clinical-trial-title" class="col-form-label">Tytuł:</label>
            <input type="text" name="title" class="form-control" id="clinical-trial-title" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror
            <label class="col-form-label">Kategoria:</label>
            <select class="form-select mb-3" name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" required>{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category')
            <div>{{ $message }}</div>
            @enderror

            <label for="textarea-clinical-trial" class="col-form-label">Opis:</label>
            <textarea id="textarea-new-clinical-trial" name="content" height="400px">
            </textarea>
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form> 
    </div>
    </div>
  </div>
</div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Czy na pewno chcesz usunąć to badanie?
      </div>
      <div class="modal-footer">
      <form id="form-clinical-trial-delete" method="POST">
            @csrf
            <input type="hidden" name="id" value="10">
            <input type="hidden" name="action" value="delete">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
            <button type="submit" class="btn btn-primary">Usuń</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

@endsection