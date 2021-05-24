<div>
<header>
    <div class="wrapper flex">
    <h2>Zabiegi | Poradnie</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowa poradnia</button>
    </div>
</header>

<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Nazwa</th>
            <th class="th-flex center" scope="col">Liczba zabiegów</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clinics as $clinic)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td width="400px" class="th-flex"><h6>{{ $clinic->name }}<h6></td>
                <td class="th-flex center">{{ $clinic->treatments->count() }}</td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( {{$clinic->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                    <button type="button" wire:click="selectedItem( {{$clinic->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                    </button>
                    <!-- <button type="button" wire:click="selectedItem( {{$clinic->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$clinic->id}} , 'delete' )" class="btn btn-outline-danger">Usuń</button> -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Clinic Modal -->
    <div class="modal fade" wire:ignore.self id="clinic-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pracownia | Poradnia</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3">
                    <label for="clinicName" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="clinic.name" class="form-control" id="clinicName" required>
                    @error('clinic.name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        </div>
 
            <div class="modal-footer">
                @if($action=='create')
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
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
    <div class="modal fade" wire:ignore.self id="clinic-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($canDelete===true)
                <h4>Czy na pewno chcesz trwale usunąć pracownię | poradnię?</h4>
                @else
                <h4>Nie można usunąć pracowni | poradni ponieważ przypisana jest do przynajmniej 1 badania.</h4>
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
