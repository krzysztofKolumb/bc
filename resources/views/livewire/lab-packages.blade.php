<div>
<header>
  <div class="wrapper flex">
      <h2>Pakiety laboratoryjne i diagnostyczne | Cennik</h2>
      <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowy pakiet</button>
  </div>
</header>

<table class="table">
    <thead>
        <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Nazwa</th>
            <th class="th-flex center" scope="col">Cena (PLN)</th>
            <th class="th-options" scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($packages as $package)
        <tr>
            <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
            <td class="th-flex"><h6>{{ $package->title }}</h6></td>
            <td class="th-flex center">{{ $package->price }}</td>
            <td class="th-options">
                <button type="button" wire:click="selectedItem( {{$package->id}} , 'update' )" title="Edytuj">
                    <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                </button>
                <button type="button" wire:click="selectedItem( {{$package->id}} , 'delete' )" title="Usuń">
                    <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                </button>
                <!-- <button type="button" wire:click="selectedItem( {{$package->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                <button type="button" wire:click="selectedItem( {{$package->id}} , 'delete' )" class="btn btn-outline-danger">Usuń</button> -->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade" wire:ignore.self id="lab-package-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pakiet laboratoryjny</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="lab-package-form" action="" method="POST">
            @csrf
            <label for="lab-package-title" class="col-form-label">Tytuł:</label>
            <input type="text" wire:model.defer="package.title" name="title" class="form-control" id="lab-package-title" required>
            @error('package.title')
            <div>{{ $message }}</div>
            @enderror

            <label for="lab-package-price" class="col-form-label">Cena (pln):</label>
            <input type="text" wire:model.defer="package.price" name="price" class="form-control" id="lab-package-price" required>
            @error('package.price')
            <div>{{ $message }}</div>
            @enderror

            <label for="textarea-new-lab-package" class="col-form-label">Opis:</label>
            <textarea wire:model.defer="package.content" id="textarea-lab-package" name="content" height="400px">
            </textarea>
            @error('package.content')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form> 
    </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="lab-package-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <h4>Czy na pewno chcesz trwale usunać ten pakiet?</h4>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
        <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
    </div>
    </div>
  </div>
</div>


</div>
