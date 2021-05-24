<div>
<header>
<div class="wrapper flex">
    <h2>Materiały do pobrania | Kategorie</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowa kategoria</button>
</div>
</header>

<table class="table">
        <thead>
            <tr>
                <th class="th-iteration" scope="col">#</th>
                <th class="th-flex th-name" scope="col">Nazwa</th>
                <th class="th-flex center" scope="col">Liczba dokumentów</th>
                <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td width="400px" class="th-flex"><h6>{{ $category->name }}</h6></td>
                <td class="th-flex center">{{ $category->files->count() }}</td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( {{$category->id}} , 'update' )" title="Edytuj">
                            <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                    <button type="button" wire:click="selectedItem( {{$category->id}} , 'delete' )" title="Usuń">
                            <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                    </button>
                    <!-- <button type="button" wire:click="selectedItem( {{$category->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$category->id}} , 'delete' )" class="btn btn-outline-danger">Usuń</button> -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Clinic Modal -->
    <div class="modal fade" wire:ignore.self id="file-category-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kategoria</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3">
                    <label for="fileCategoryName" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="category.name" class="form-control" id="fileCategoryName" required>
                    @error('category.name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        </div>
 
            <div class="modal-footer">
                @if($action=='create')
                <button type="button" wire:click="cancel" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="update" class="btn btn-primary">Zapisz zmiany</button>
                @endif
            </div>
        </div>
    </div>
    </div>

    <!-- Clinic Delete Modal -->
    <div class="modal fade" wire:ignore.self id="file-category-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($canDelete===true)
                <h4>Czy na pewno chcesz trwale usunąć kategorię?</h4>
                @else
                <h4>Nie można usunąć kategorii ponieważ przypisana jest do przynajmniej 1 dokumentu.</h4>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
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
