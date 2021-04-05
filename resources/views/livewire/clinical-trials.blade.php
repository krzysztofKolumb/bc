<div>
  @if($clinicalTrial)
    <h2>{{ $clinicalTrial->title}}</h2>
    <div>{!! $clinicalTrial->content !!}</div>
  @endif

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-clinical-trial">
  Nowy
</button>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Kategoria</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clinicalTrials as $trial)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $trial->title }}</td>
            <td>{{ $trial->clinicalTrialCategory->title }}</td>
            <td>
                <a href="{{ route('admin-clinical-trials-show', $trial->id) }}" class="btn btn-primary" tabindex="-1" role="button">Edytuj</a>
                <button type="button" wire:click="selectedItem( {{$trial->id}} , 'delete' )" class="btn btn-danger">Usuń</button>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>




<div class="modal fade" wire:ignore.self id="modal-new-clinical-trial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Badanie kliniczne</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="new-clinical-trial-form" action="" method="POST">
            @csrf
            <label for="clinical-trial-title" class="col-form-label">Tytuł:</label>
            <input type="text" name="title" class="form-control" id="clinical-trial-title" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror
            <label class="col-form-label">Kategoria:</label>
            <select class="form-select mb-3" id="CTcategory" name="category">
                <option selected>Kategoria</option>
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<div class="modal fade" wire:ignore.self id="delete-clinical-trial-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Czy na pewno chcesz usunąć to badanie?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
          <button type="button" wire:click="delete" class="btn btn-primary">Usuń</button>
      </div>
    </div>
  </div>
</div>









</div>
