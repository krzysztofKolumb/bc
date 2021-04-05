<div>

<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowy pracownik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- <div class="modal-body"> -->
      <div class="modal-body">
            <form class="form-livewire">
            <div class="row mb-3">
                <label for="firstName" class="col-sm-3 col-form-label">Imię*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="employee.firstname" class="form-control" id="firstName" required>
                @error('employee.firstname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="lastName"  class="col-sm-3 col-form-label">Nazwisko*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="employee.lastname" class="form-control" id="lastName" required>
                @error('employee.lastname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="employee-description" class="col-sm-3 col-form-label">Opis*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="employee.description" class="form-control" id="employee-description" required>
                @error('employee.description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Zawód*</legend>
                <div class="col-sm-9">
                    @foreach($professions as $profession)
                    <div class="form-check">
                        <input class="form-check-input" name="profession" required type="radio" wire:model="employee.profession_id" id="professionn-{{ $profession->id }}" value="{{ $profession->id }}">
                        <label class="form-check-label" for="professionn-{{ $profession->id }}">
                        {{ $profession->name }}
                        </label>
                    </div>
                    @endforeach
                    @error('employee.profession_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="new-employee-photo" class="col-sm-3 col-form-label">Zdjęcie</label>
                <div class="col-sm-9">
                    <input type="file" wire:model="file" class="form-control" accept="image/*" id="new-employee-photo">
                        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="cancelAddModel" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
              <button type="submit" wire:click="addEmployee" class="btn btn-primary">Zapisz</button>
          </div>
    </div>


</div>
