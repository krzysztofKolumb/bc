<div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-profession-modal">Nowy</button>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Zawód</th>
        <th scope="col">Zespół | Liczba osób</th>
        <!-- <th scope="col">Liczba specjalistów</th> -->
        <th scope="col">Kategoria</th>
        <th scope="col">Członkowie zespołu</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($professions as $index => $profession)
        <tr>
            <th scope="row">{{$loop->iteration}}.</th>
            <td>{{ $profession->name }}</td>
            @if($profession->type == 1)
            <td>{{ $profession->team }} | {{ $profession->experts->count() }}</td>
            <!-- <td>{{ $profession->experts->count() }}</td> -->
            <td>Specjaliści</td>
            <td>
            @foreach($profession->experts as $expert)
                <p>{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</p>
            @endforeach
            </td>
            @else
            <td>{{ $profession->team }} | {{ $profession->employees->count() }}</td>
            <td>Personel</td>
            <td>
            @foreach($profession->employees as $employee)
                <p>{{ $employee->firstname }} {{ $employee->lastname }}</p>
            @endforeach
            </td>
            @endif
            <td>
                <button type="button" wire:click="selectedItem( {{$profession->id}} , 'update', {{$index}} )" class="btn btn-primary">Edycja</button>
                <button type="button" wire:click="selectedItem( {{$profession->id}} , 'delete', {{$index}} )" class="btn btn-danger">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

<!-- New Degree Modal -->
<div class="modal fade" wire:ignore.self id="new-profession-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nowy zawód</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <label for="professionName" class="col-sm-3 col-form-label">Nazwa zawodu*</label>
                <div class="col-sm-9">
                    <input type="text" wire:model="profession.name" class="form-control" id="professionName" required>
                    @error('profession.name') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <label for="professionTeam" class="col-sm-3 col-form-label">Nazwa zespołu*</label>
                <div class="col-sm-9">
                    <input type="text" wire:model="profession.team" class="form-control" id="professionTeam" required>
                    @error('profession.team') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Kategoria*</legend>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" name="type" required type="radio" wire:model="profession.type" id="type-expert" value="1">
                        <label class="form-check-label" for="type-expert">Specjaliści</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="type" required type="radio" wire:model="profession.type" id="type-personel" value="2">
                        <label class="form-check-label" for="type-personel">Personel</label>
                    </div>
                    @error('profession.type') <span class="text-danger">{{ $message }}</span> @enderror
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
<div class="modal fade" wire:ignore.self id="edit-profession-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zawód - Edycja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <div class="row mb-3">
            <label for="professionName" class="col-sm-3 col-form-label">Nazwa zawodu*</label>
            <div class="col-sm-9">
                <input type="text" wire:model="current.name" class="form-control" id="professionName" required>
                @error('current.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="professionTeamName" class="col-sm-3 col-form-label">Nazwa zespołu*</label>
            <div class="col-sm-9">
                <input type="text" wire:model="current.team" class="form-control" id="professionTeamName" required>
                @error('current.team') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Kategoria*</legend>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" name="type" required type="radio" wire:model="current.type" id="ed-type-expert" value="1">
                        <label class="form-check-label" for="ed-type-expert">Specjaliści</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="type" required type="radio" wire:model="current.type" id="ed-type-personel" value="2">
                        <label class="form-check-label" for="ed-type-personel">Personel</label>
                    </div>
                    @error('current.type') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- <div class="modal fade" wire:ignore.self id="edit-profession-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zawód - Edycja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <div class="row mb-3">
            <label for="professionName" class="col-sm-3 col-form-label">Nazwa zawodu*</label>
            <div class="col-sm-9">
                <input type="text" wire:model.defer="professions.{{$ix}}.name" class="form-control" id="professionName" required>
                @error('profession.{{ $ix }}.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="professionTeamName" class="col-sm-3 col-form-label">Nazwa zespołu*</label>
            <div class="col-sm-9">
                <input type="text" wire:model.defer="professions.{{$ix}}.team" class="form-control" id="professionTeamName" required>
                @error('professions.{{$ix}}.team') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Kategoria*</legend>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" name="type" required type="radio" wire:model.defer="professions.{{$ix}}.type" id="ed-type-expert" value="1">
                        <label class="form-check-label" for="ed-type-expert">Specjaliści</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="type" required type="radio" wire:model.defer="professions.{{$ix}}.type" id="ed-type-personel" value="2">
                        <label class="form-check-label" for="ed-type-personel">Personel</label>
                    </div>
                    @error('professions.{{$ix}}.type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="submit" wire:click="updateNew" class="btn btn-primary">Zapisz</button>
    </div>
    </div>
  </div>
</div> -->

<!-- Modal Specialty Delete Modal -->
<div class="modal fade" wire:ignore.self id="delete-profession-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Usuwanie specjalizacji</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz usunąć wybrany zawód?</h4>
        @else
        <h4>Nie można usunąć tego zawodu ponieważ przypisany jest do min. 1 specjalisty</h4>
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
