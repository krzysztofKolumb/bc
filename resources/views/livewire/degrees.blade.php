<div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-degree-modal">Nowy</button>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Liczba specjalistów</th>
        <th scope="col">Specjaliści</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($degrees as $degree)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $degree->name }}</td>
            <td>{{ $degree->experts->count() }}</td>
            <td>
            @foreach($degree->experts as $expert)
                <p>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</p>
            @endforeach
            </td>
            <td>
                <button type="button" wire:click="selectedItem( {{$degree->id}} , 'update' )" class="btn btn-primary">Edycja</button>
                <button type="button" wire:click="selectedItem( {{$degree->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

<!-- New Degree Modal -->
<div class="modal fade" wire:ignore.self id="new-degree-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowy tytuł | stopień</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <label for="degreeName" class="col-sm-3 col-form-label">Nazwa*</label>
                <div class="col-sm-9">
                    <input type="text" wire:model="degree.name" class="form-control" id="degreeName" required>
                    @error('degree.name') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Edit Degree Modal -->
<div class="modal fade" wire:ignore.self id="edit-degree-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tytuł | Stopień - Edycja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <div class="row mb-3">
            <label for="degreeName" class="col-sm-3 col-form-label">Nazwa*</label>
            <div class="col-sm-9">
                <input type="text" wire:model="current.name" class="form-control" id="degreeName" required>
                @error('current.name') <span class="text-danger">{{ $message }}</span> @enderror
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
<div class="modal fade" wire:ignore.self id="delete-degree-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Usuwanie specjalizacji</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz usunać tytuł | stopień?</h4>
        @else
        <h4>Nie możesz usunąć tytułu|stopnia ponieważ przypisany jest do min. 1 specjalisty</h4>
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
