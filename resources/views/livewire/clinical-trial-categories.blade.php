<div>
<header>
  <div class="wrapper flex">
    <h2>Badania Kliniczne | Kategorie</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowa kategoria</button>
  </div>
</header>

<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex th-name" scope="col">Nazwa</th>
            <th class="th-flex" scope="col">Liczba badań</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}.</th>
                <td><h6 class="th-flex th-name">{{ $category->title }}</h6></td>
                <td>{{ $category->clinicalTrials->count() }}</td>
                <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$category->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$category->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>
                  <!-- <button type="button" wire:click="selectedItem( {{$category->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button> -->
                  <!-- <button>
                  <img width="35px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button> -->
                  <!-- <button type="button" wire:click="selectedItem( {{$category->id}} , 'delete' )" class="btn btn-outline-danger" title="Usuń">Usuń</button> -->
                </td>
            </tr>
        @endforeach
        </tbody>
  </table>

      <!-- Clinical Trial Category Modal -->
    <div class="modal fade" wire:ignore.self id="ct-category-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kategoria</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
            @if($action=='create')
            <button type="button" wire:click="cancel" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
            <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
            @elseIf($action=='update')
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
            <button type="submit" wire:click="update" class="btn btn-primary">Zapisz zmiany</button>
            @endif
        </div>
        </div>
    </div>
    </div>

<!-- Modal Specialty Delete Modal -->
<div class="modal fade" wire:ignore.self id="ct-category-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Usuwanie specjalizacji</h5> -->
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz trwale usunąć kategorię?</h4>
        @else
        <h4>Nie możesz usunąć kategorii ponieważ przypisana jest do min. 1 badania.</h4>
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
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
