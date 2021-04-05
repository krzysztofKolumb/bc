<div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-lab-package">
  Nowy
</button>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Cena (pln)</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($packages as $package)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $package->title }}</td>
            <td>{{ $package->price }}</td>
            <td>
                <a href="{{ route('admin-lab-packages-show', $package->id) }}" class="btn btn-primary" tabindex="-1" role="button">Edytuj</a>
                <button type="button" wire:click="openDeleteModal( {{$package->id}} )" class="btn btn-danger">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade" wire:ignore.self id="modal-new-lab-package" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pakiet laboratoryjny</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="new-lab-package-form" action="" method="POST">
            @csrf
            <label for="lab-package-title" class="col-form-label">Tytuł:</label>
            <input type="text" name="title" class="form-control" id="lab-package-title" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror

            <label for="lab-package-price" class="col-form-label">Cena (pln):</label>
            <input type="text" name="price" class="form-control" id="lab-package-price" required>
            @error('price')
            <div>{{ $message }}</div>
            @enderror

            <label for="textarea-new-lab-package" class="col-form-label">Opis:</label>
            <textarea id="textarea-new-lab-package" name="content" height="400px">
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

<div class="modal fade" wire:ignore.self id="delete-lab-package-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Czy na pewno chcesz usunąć ten pakiet?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="button" wire:click="delete" class="btn btn-primary">Usuń</button>
      </div>
    </div>
  </div>
</div>


</div>
