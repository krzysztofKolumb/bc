<div>
<header>
  <div class="wrapper flex">
    <h2>Badania kliniczne</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowe badanie</button>
  </div>
</header>

<div class="wrapper flex flex-submenu">
    <div class="select-wrapper">
    <select class="form-select" wire:model="category_id">
        <option value="all" selected>Wszystkie</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" required>{{ $category->title }}</option>
        @endforeach
    </select>
    </div>
    <div>
        <a href="{{ route('admin-clinical-trials-categories') }}">Kategorie</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Badanie</th>
            <th class="th-flex" scope="col">Kategoria</th>
            <th class="th-options" scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clinicalTrials as $trial)
        <tr>
            <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
            <td class="th-flex">{{ $trial->title }}</td>
            <td class="th-flex">{{ $trial->clinicalTrialCategory->title }}</td>
            <td class="th-options">
                <button type="button" wire:click="selectedItem( {{$trial->id}} , 'update' )" title="Edytuj">
                      <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                </button>
                <button type="button" wire:click="selectedItem( {{$trial->id}} , 'delete' )" title="Usuń">
                      <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="modal fade" wire:ignore.self id="clinical-trial-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Badanie kliniczne</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="new-clinical-trial-form" action="" method="POST">
      <div class="modal-body bcg">
            @csrf
            <label for="clinical-trial-title" class="col-form-label">Tytuł:</label>
            <input type="text" wire:model.defer="clinicalTrial.title" name="title" class="form-control" id="clinical-trial-title" required>
            @error('clinicalTrial.title')
            <div>{{ $message }}</div>
            @enderror
            <br>
            <div>
            <label class="col-form-label form-label-static">Kategoria:</label>
            <select class="form-select mb-3" required wire:model.defer="clinicalTrial.clinical_trial_category_id" id="CTcategory" name="category">
                <option value="">Kategoria</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('clinicalTrial.clinical_trial_category_id')
            <div>{{ $message }}</div>
            @enderror
            </div>
            <div>
            <label for="textarea-clinical-trial" class="col-form-label">Treść:</label>
            <label class="error-msg" id="textarea-tm-error" class="col-form-label"></label>
            <textarea class="form-control" wire:model.defer="clinicalTrial.content" id="textarea-new-clinical-trial" name="content" rows="8" cols="10">
            </textarea>
            @error('clinicalTrial.content') 
            <div>{{ $message }}</div>
            @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </form> 
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="clinical-trial-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <h4>Czy na pewno chcesz trwale usunąć to badanie?</h4>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
          <button type="button" wire:click="delete" class="btn btn-primary">Usuń</button>
      </div>
    </div>
  </div>
</div>









</div>
