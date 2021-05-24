<div>
    <header>
        <div class="flex wrapper">
            <h2>Zawody</h2>
            <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowy</button>
        </div>
    </header>

    <table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex th-name" scope="col">Zawód</th>
            <th class="th-flex" scope="col">Zespół</th>
            <th class="th-flex" scope="col">Liczba osób</th>
            <th class="th-flex" scope="col">Kategoria</th>
            <th class="th-flex" scope="col">W zespole</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($professions as $index => $profession)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}.</th>
                <td><h6 class="th-flex th-name">{{ $profession->name }}</h6></td>
                <td>{{ $profession->team }}</td>

                @if($profession->type == 1)
                <!-- <td>{{ $profession->team }} | {{ $profession->experts->count() }}</td> -->
                <td class="td-counts">{{ $profession->experts->count() }}</td>
                <td>Specjaliści</td>
                <td>
                @foreach($profession->experts as $expert)
                        @if ($loop->last)
                        {{ $expert->firstname }} {{ $expert->lastname }}
                        @else
                        {{ $expert->firstname }} {{ $expert->lastname }},
                        @endif
                @endforeach
                </td>
                @else
                <td class="td-counts">{{ $profession->employees->count() }}</td>
                <td>Personel</td>
                <td>
                @foreach($profession->employees as $employee)
                        @if ($loop->last)
                        {{ $employee->firstname }} {{ $employee->lastname }}
                        @else
                        {{ $employee->firstname }} {{ $employee->lastname }},
                        @endif
                @endforeach
                </td>
                @endif

                <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$profession->id}} , 'update' )" title="Edytuj">
                          <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                    <button type="button" wire:click="selectedItem( {{$profession->id}} , 'delete' )" title="Usuń">
                          <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                    </button>

                  <!-- <button type="button" wire:click="selectedItem( {{$profession->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button> -->
                  <!-- <button>
                  <img width="35px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button> -->
                  <!-- <button type="button" wire:click="selectedItem( {{$profession->id}} , 'delete' )" class="btn btn-outline-danger" title="Usuń">Usuń</button> -->
                  
                </td>
            </tr>
        @endforeach
        </tbody>
  </table>

    <!-- Profession Modal -->
<div class="modal fade" wire:ignore.self id="profession-modal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zawód</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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

<!-- Edit Degree Modal -->
<div class="modal fade" wire:ignore.self id="edit-profession-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zawód - Edycja</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="submit" wire:click="update" class="btn btn-primary">Zapisz</button>
    </div>
    </div>
  </div>
</div>

<!-- Modal Specialty Delete Modal -->
<div class="modal fade" wire:ignore.self id="profession-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Usuwanie specjalizacji</h5> -->
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        @if($canDelete===true)
        <h4>Czy na pewno chcesz usunąć wybrany zawód?</h4>
        @else
        <h4>Nie można usunąć tego zawodu ponieważ przypisany jest do min. 1 specjalisty</h4>
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
