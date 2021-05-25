<div>
<header>
  <div class="wrapper flex">
    <h2>Specjalizacje</h2>
    <button type="button" class="btn btn-primary" wire:click="openModal">Nowa specjalizacja</button>
  </div>
</header>
<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Nazwa</th>
            <th class="th-flex" scope="col">Liczba specjalistów</th>
            <th class="th-flex" scope="col">Specjaliści</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($specialties as $specialty)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}.</th>
                <td><h6 class="th-flex">{{ $specialty->name }}</h6></td>
                <td class="td-counts">{{ $specialty->experts->count() }}</td>
                <td>
                @foreach($specialty->experts as $expert)
                        @if ($loop->last)
                        <a href="{{ route('admin-expert-profile', $expert) }}">
                        {{ $expert->firstname }} {{ $expert->lastname }} 
                        </a>
                        @else
                        <a href="{{ route('admin-expert-profile', $expert) }}">
                        {{ $expert->firstname }} {{ $expert->lastname }},  
                        </a>
                        @endif
                @endforeach
                </td>
                <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$specialty->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$specialty->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>                  
                </td>
            </tr>
        @endforeach
        </tbody>
  </table>

<!-- Modal New Specialty -->
<div class="modal fade" wire:ignore.self id="specialty-modal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Specjalizacja</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <label for="specialtyName"  class="col-sm-3 col-form-label">Nazwa*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="specialty.name" class="form-control" id="specialtyName" required>
                @error('specialty.name') <span class="text-danger">{{ $message }}</span> @enderror
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
<div class="modal fade" wire:ignore.self id="specialty-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz trwale usunąć specjalizację?</h4>
        @else
        <h4>Specjalizacja przypisana jest do przynajmniej 1 eksperta. Nie możesz jej usunąć.</h4>
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
