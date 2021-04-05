<div>
    
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-ct-categories-modal">Nowy</button>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Liczba badań</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->clinicalTrials->count() }}</td>
            <td>
                <button type="button" wire:click="selectedItem( {{$category->id}} , 'update' )" class="btn btn-primary">Edycja</button>
                <button type="button" wire:click="selectedItem( {{$category->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>


      <!-- New Clinical Trial Category Modal -->
    <div class="modal fade" wire:ignore.self id="new-ct-categories-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kategoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row mb-3">
                    <label for="ct-title" class="col-sm-3 col-form-label">Nazwa*</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="category.title" class="form-control" id="ct-title" required>
                        @error('category.title') <span class="text-danger">{{ $message }}</span> @enderror
                        @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div> 
            </div>
                <div class="modal-footer">
                <button type="button" wire:click="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </div>
    </div>


    <!-- Edition Clinical Trial Category Modal -->
    <div class="modal fade" wire:ignore.self id="edit-ct-categories-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kategoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row mb-3">
                    <label for="ct-title" class="col-sm-3 col-form-label">Nazwa*</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="selected.title" class="form-control" id="ct-title" required>
                        @error('selected.title') <span class="text-danger">{{ $message }}</span> @enderror
                        @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div> 
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="update" class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </div>
    </div>

<!-- Modal Specialty Delete Modal -->
<div class="modal fade" wire:ignore.self id="delete-ct-categories-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Usuwanie specjalizacji</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz usunąć kategorię?</h4>
        @else
        <h4>Nie można usunąć kategorii ponieważ przypisana jest do min. 1 badania</h4>
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        @if($canDelete==true)
        <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
        @else
        <button type="submit" wire:click="delete" disabled class="btn btn-primary">Usuń</button>
        @endif
    </div>
    </div>
  </div>
</div>










</div>
