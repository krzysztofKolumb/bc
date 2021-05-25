<div>
<header>
    <div class="wrapper flex">
        <h2>Specjaliści</h2>
        <button type="button" class="btn btn-primary" wire:click="openModal">Nowy Specjalista</button>
    </div>
</header>
<div class="wrapper flex">
    <select class="form-select" wire:model="profession_id">
        <option value="all" selected>Wszyscy</option>
        @foreach($professions as $profession)
        <option value="{{ $profession->id }}" required>{{ $profession->team }} ({{count($profession->experts)}})</option>
        @endforeach
    </select>
    <div>
        <a href="{{ route('admin-degrees') }}">Stopnie, tytuły</a> | 
        <a href="{{ route('admin-professions') }}">Zawody</a>
    </div>
</div>

<table class="table align-middle">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Specjalista</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($experts as $expert)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td><a href="{{ route('admin-expert-profile', $expert) }}">{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</a></td>
                <td class="th-options">
                <!-- <button type="button" wire:click="selectedItem( {{$expert->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button> -->
                  <a href="{{ route('admin-expert-profile', $expert) }}" title="Profil" role="button">
                    <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </a>
                  <button type="button" wire:click="selectedItem( {{$expert->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>

                    <!-- <a href="{{ route('admin-expert-profile', $expert) }}" class="btn btn-outline-primary btn-lg" tabindex="-1" title="Profil" role="button"><i class="bi bi-person-fill"></i></a>
                    <button type="button" wire:click="selectedItem( {{$expert->id}} , 'delete' )" class="btn btn-outline-danger btn-lg" title="Usuń"><i class="bi bi-trash"></i></button>
                 -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" wire:ignore.self id="expert-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Specjalista</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-card">
            <div class="row mb-3">
                <label for="inputFirstName" class="col-sm-3 col-form-label">Imię*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="expert.firstname" class="form-control" id="inputFirstName" required>
                @error('expert.firstname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputLastName"  class="col-sm-3 col-form-label">Nazwisko*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="expert.lastname" class="form-control" id="inputLastName" required>
                @error('expert.lastname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3" >
                <legend class="col-form-label col-sm-3 pt-0">Tytuł/Stopień*</legend>
                <div class="col-sm-9">
                @foreach($degrees as $degree)
                <div class="form-check">
                    <input class="form-check-input" wire:model="expert.degree_id" name="degree" required type="radio" id="degree-{{$degree->id}}" value="{{ $degree->id }}">
                    <label class="form-check-label" for="degree-{{$degree->id}}">
                    {{ $degree->name }}
                    </label>
                </div>
                @endforeach
                @error('expert.degree_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Zawód*</legend>
                <div class="col-sm-9">
                @foreach($professions as $profession)
                <div class="form-check">
                    <input class="form-check-input" name="profession" required type="radio" wire:model="expert.profession_id" id="profession-{{ $profession->id }}" value="{{ $profession->id }}">
                    <label class="form-check-label" for="profession-{{ $profession->id }}">
                    {{ $profession->name }}
                    </label>
                </div>
                @endforeach
                @error('expert.profession_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Specjalizacje*</legend>
                <div class="col-sm-9">
                <div class="container-flex">
                    @foreach($specialties as $specialty)
                    <div class="form-check">
                        <input class="form-check-input" wire:model="selected_specialties.{{ $specialty->id }}" type="checkbox" id="spec-{{ $specialty->id }}" value="{{ $specialty->id }}">
                        <label class="form-check-label" for="spec-{{ $specialty->id }}">
                        {{ $specialty->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @error('selected_specialties') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Zespół</legend>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="selected_pages.1" id="page-1" value="1">
                        <label class="form-check-label" for="page-1">
                            Strona główna
                        </label>
                    </div>
                    @foreach($pages as $page)
                    @if($page->id > 1)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="selected_pages.{{ $page->id }}" id="page-{{ $page->id }}" value="{{ $page->id }}">
                        <label class="form-check-label" for="page-{{ $page->id }}">
                            {{ $page->title }}
                        </label>
                    </div>
                    @endif
                    @endforeach
                    @error('selected_pages') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
            </div>
    </div>
  </div>
</div>






    <div class="modal fade" wire:ignore.self id="expert-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć tego eksperta?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
