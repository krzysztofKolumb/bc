<div>
<header>
  <div class="wrapper flex">
    <h2>Personel</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal"><i class="bi bi-person-plus-fill"></i> Nowy pracownik</button>
  </div>
</header>
<div class="wrapper flex flex-submenu">
    <div class="select-wrapper">
    <select class="form-select" wire:model="profession_id">
        <option value="all" selected>Wszyscy</option>
        @foreach($professions as $profession)
        <option value="{{ $profession->id }}" required>{{ $profession->team }} ({{count($profession->employees)}})</option>
        @endforeach
    </select>
    </div>
</div>

<table class="table align-middle">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Imię i Nazwisko</th>
            <th class="th-flex" scope="col">Zawód</th>
            <th class="th-flex" scope="col">Zdjęcie</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td><h6 class="th-flex">{{ $employee->firstname }} {{ $employee->lastname }}</h6></td>
                <td> {{ $employee->profession->name }}</td>
                <td>
                    @if($employee->photo)
                    <button type="button" class="btn btn-link" wire:click="selectedItem( {{$employee->id}} , 'deletePicture' )">Usuń</button>
                    @else
                    <button type="button" class="btn btn-link" wire:click="selectedItem( {{$employee->id}} , 'addPicture' )">Dodaj</button>
                    @endif
                </td>
                <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$employee->id}} , 'update' )" title="Edytuj">
                          <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                    <button type="button" wire:click="selectedItem( {{$employee->id}} , 'delete' )" title="Usuń">
                          <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<!-- Employee Modal -->
<div class="modal fade" wire:ignore.self id="employee-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pracownik</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form>
            @if($selected_photo)
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                <img class="" width="300px" src="{{url('storage/photos/' . $selected_photo)}}" > 
                <!-- <button type="submit" wire:click.prevent="deletePhoto" class="btn btn-primary">Usuń zdjęcie</button> -->
                </div>
            </div>
            @endif
            <div class="row mb-3">
                <label for="employeeFirstName" class="col-sm-3 col-form-label">Imię*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="employee.firstname" class="form-control" id="employeeFirstName" required>
                @error('employee.firstname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="employeeLastName"  class="col-sm-3 col-form-label">Nazwisko*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="employee.lastname" class="form-control" id="employeeLastName" required>
                @error('employee.lastname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="employeeDescription" class="col-sm-3 col-form-label">Opis*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="employee.description" class="form-control" id="employeeDescription" required>
                @error('employee.description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Zawód*</legend>
                <div class="col-sm-9">
                    @foreach($professions as $profession)
                    <div class="form-check">
                        <input class="form-check-input" name="profession" required type="radio" wire:model="employee.profession_id" id="employeeProfession-{{ $profession->id }}" value="{{ $profession->id }}">
                        <label class="form-check-label" for="employeeProfession-{{ $profession->id }}">
                        {{ $profession->name }}
                        </label>
                    </div>
                    @endforeach
                    @error('employee.profession_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            </form>
            </div>
            <div class="modal-footer">
                @if($action=='create')
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="addEmployee" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="saveChanges" class="btn btn-primary">Zapisz zmiany</button>
                @endif
            </div>
    </div>
  </div>
</div>

<!-- Picture Modal -->
<div class="modal fade" wire:ignore.self id="picture-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zdjęcie</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form>
            <div class="row mb-3">
                <label for="inputFileName" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                      <div class="file-loading" wire:loading wire:target="file">Trwa ładowanie zdjęcia...</div>
                </div>
              </div>
            <div class="mb-12">
                <div class="col-sm-12">
                @if($file)
                <div class="mb-12">
                    <div><img class="new-img" width="300px" src="{{ $file->temporaryUrl() }}"></div>    
                </div>
                @endif
                  <div class="file-input">
                      <input type="file" wire:model="file" id="file" accept="image/*" name="file" class="file">
                      <label for="file">Wybierz plik</label>
                  </div>
                  @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <br>
            </div>
            <div class="mb-3">
                <label for="inputFileName" class="col-sm-12 col-form-label">Zapisz jako:</label>
                <div class="col-sm-12">
                    <input wire:model="file_name" type="text" class="form-control" id="inputFileName" >
                    @error('file_name') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                @if($file || $file_name)
                <button type="submit" wire:click="addPicture" class="btn btn-primary">Zapisz</button>
                @else
                <button type="submit" wire:click="addPicture" disabled class="btn btn-primary">Zapisz</button>
                @endif
            </div>
    </div>
  </div>
</div>

<!-- Picture Modal -->
<div class="modal fade" wire:ignore.self id="picture-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zdjęcie</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <h5 class="center">Czy na pewno chcesz trwale usunąć to zdjęcie?</h5><br><br>
            <div class="col-sm-12">
                <img class="block" width="200px" src="{{url('storage/photos/' . $selected_photo)}}" > 
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="deletePhoto" class="btn btn-primary">Usuń</button>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete-employee-modal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personel</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Czy na pewno chcesz trwale usunąć tego pracownika?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click="delete">Usuń</button>
      </div>
    </div>
  </div>
</div>

</div>
