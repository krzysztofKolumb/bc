<div>

<div>
    <button type="button" class="btn btn-primary" wire:click="openModal">Nowy</button>
</div>

<table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Liczba zabiegów</th>
            <th scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clinics as $clinic)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $clinic->name }}</td>
                <td>{{ $clinic->treatments->count() }}</td>
                <td>
                    <button type="button" wire:click="selectedItem( {{$clinic->id}} , 'update' )" class="btn btn-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$clinic->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
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
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" wire:click="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($canDelete===true)
                <h4>Czy na pewno chcesz trwale usunąć pracownię | poradnię?</h4>
                @else
                <h4>Nie można usunąć pracownii | poradnii ponieważ przypisana jest do przynajmniej 1 badania</h4>
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
