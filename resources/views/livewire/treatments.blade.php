<div>
<header>
    <div class="wrapper flex">
    <h2>Zabiegi | Cennik</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowy zabieg</button>
    </div>
</header>

<div class="wrapper flex">
    <select class="form-select" wire:model="clinic_id">
        <!-- <option value="all" selected>Wszystkie</option> -->
        @foreach($clinics as $clinic)
        <option value="{{ $clinic->id }}" required>{{ $clinic->name }}</option>
        @endforeach
    </select>
    <div>
        <a href="{{ route('admin-clinics') }}">Poradnie, pracownie, programy</a>
    </div>
</div>

<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Nazwa zabiegu</th>
            <th class="th-flex" scope="col">Cena (pln)</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($treatments as $treatment)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td class="th-flex"><h6>{{ $treatment->name }}</h6></td>
                <td class="th-flex">{{ $treatment->price }}</td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( {{$treatment->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                    <button type="button" wire:click="selectedItem( {{$treatment->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                    </button>
                    <!-- <button type="button" wire:click="selectedItem( {{$treatment->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$treatment->id}} , 'delete' )" class="btn btn-outline-danger">Usuń</button> -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Treatment Modal -->
    <div class="modal fade" wire:ignore.self id="treatment-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Zabieg</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3">
                    <label for="treatmentName" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="treatment.name" class="form-control" id="treatmentName" required>
                    @error('treatment.name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="treatmentPrice" class="col-form-label">Cena*</label>
                    <input type="text" wire:model="treatment.price" class="form-control" id="treatmentPrice" required>
                    @error('treatment.price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Poradnia | Pracownia*</label>
                    <select class="form-select mb-3" id="clinicId" name="clinic" wire:model="treatment.clinic_id">
                        <option selected>Wybierz</option>
                        @foreach($clinics as $clinic)
                        <option value="{{ $clinic->id }}" required>{{ $clinic->name }}</option>
                        @endforeach
                    </select>
                    @error('treatment.clinic_id') <span class="text-danger">{{ $message }}</span> @enderror
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

        <!-- Treatment Delete Modal -->
        <div class="modal fade" wire:ignore.self id="treatment-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć ten zabieg?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
