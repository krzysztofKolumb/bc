<div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-specialty-modal">Nowy</button>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mamo">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" wire:ignore.self id="mamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <label for="textarea-clinical-trial" class="col-form-label">Opis:</label>
            <textarea id="textarea-mamo" name="content" height="400px">
            </textarea>
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="button" id="mamo-btn" class="btn btn-primary">Zapisz</button>
            </div>
              </div>
    </div>
  </div>
</div>









<ul class="list-group list-group-flush">
@foreach($specialties as $specialty)
        <li class="list-group-item flex">
            <h6>{{ $specialty->name }} ({{ $specialty->experts->count() }})</h6>
            <div>
                @foreach($specialty->experts as $expert)
                <p>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</p>
                @endforeach
            </div>
            <div>
              <button type="button" wire:click="selectedItem( {{$specialty->id}} , 'update' )" class="btn btn-primary">Edycja</button>
              <button type="button" wire:click="selectedItem( {{$specialty->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
            </div>
        </li>
    @endforeach
</ul>

<!-- Modal New Specialty -->
<div class="modal fade" wire:ignore.self id="new-specialty-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowa specjalizacja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
              <button type="button" wire:click="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
              <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
          </div>
    </div>
  </div>
</div>

<!-- Edit Specialty Modal -->
<div class="modal fade" wire:ignore.self id="edit-specialty-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edycja specjalizacji</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <div class="row mb-3">
            <label for="specialtyName" class="col-sm-3 col-form-label">Nazwa*</label>
            <div class="col-sm-9">
                <input type="text" wire:model="current.name" class="form-control" id="specialtyName" required>
                @error('current.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="submit" wire:click="updateSpecialty" class="btn btn-primary">Zapisz</button>
    </div>
    </div>
  </div>
</div>

<!-- Modal Specialty Delete Modal -->
<div class="modal fade" wire:ignore.self id="delete-specialty-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Usuwanie specjalizacji</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz usunać specjalizację?</h4>
        @else
        <h4>Nie możesz usunąć specjalizacji ponieważ przypisana jest do min. 1 specjalisty</h4>
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
