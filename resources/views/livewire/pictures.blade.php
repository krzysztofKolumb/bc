<div>
<header class="flex">
    <div class="wrapper flex">
        <h2>Obrazy</h2>
        <button type="button" class="btn btn-primary" wire:click="openModal">Nowe zdjęcie</button>
    </div>
</header>
<div class="wrapper flex flex-submenu">
    <div class="select-wrapper">
    <select class="form-select" wire:model="page_id">
        <!-- <option value="all" selected>Wszystkie</option> -->
        <option value="10" required>Wnętrze Przychodni</option>
        <option value="9" required>Specjalizacje</option>
    </select>
</div>
</div>

  <table class="table table-borderless">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Obraz</th>
            <th class="th-flex" scope="col">Nazwa</th>
            <th class="th-flex" scope="col">Strona</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pictures as $picture)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td class="th-flex">
                    <img width="160px" src="{{url('storage/img/' . $picture->name)}}" >
                </td>
                <td class="th-flex">{{ $picture->name }}</td>
                <td class="th-flex">{{ $picture->page->title }}</td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( {{$picture->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                    <button type="button" wire:click="selectedItem( {{$picture->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" wire:ignore.self id="picture-modal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zdjęcie</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bcg">
            <div class="mb-3">
                <div class="file-input">
                    <input type="file" wire:model="file" id="file" accept="image/*" name="file" class="file">
                    <label for="file">Wybierz plik</label>
                </div>
                @if($name)<p>{{ $name }}</p>@endif
                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="documentTitle" class="col-form-label">Nazwa*</label>
                <input type="text" wire:model="file_name" class="form-control" id="documentTitle" required>
                @error('file_name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                @error('uniqueName') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" wire:model="picture.page_id">
                    <option selected>Wybierz galerię</option>
                    <option value="10" required>Wnętrze Przychodni</option>
                    <option value="9" required>Specjalizacje</option>
                </select>
                @error('picture.page_id') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
            </div>
        </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="picture-update-modal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zdjęcie</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <label for="pictureName" class="col-sm-3 col-form-label">Nazwa*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="name_new" class="form-control" id="pictureName" required>
                @error('name_new') <span class="text-danger">{{ $message }}</span> @enderror
                @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="update" class="btn btn-primary">Zapisz zmiany</button>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć ten obraz?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>


</div>
