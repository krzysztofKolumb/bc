<div>
<header class="flex">
  <h2>Eksperci</h2>
  <a href="{{ route('admin-experts-create') }}" class="btn btn-primary btn-new" tabindex="-1" role="button"><i class="bi bi-person-plus-fill"></i> Nowy</a>
</header>
<br><br>
<div>
    <select class="form-select" wire:model="profession_id">
        <option value="all" selected>Wszyscy</option>
        @foreach($professions as $profession)
        <option value="{{ $profession->id }}" required>{{ $profession->team }} ({{count($profession->experts)}})</option>
        @endforeach
    </select>
</div>
<br><br>

<!-- <ul class="experts-list">
    <li></li>
</ul> -->

<table class="table align-middle">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Ekspert</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($experts as $expert)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td><h6 class="th-flex">{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h6></td>
                <td class="th-options">
                    <a href="{{ route('admin-expert-profile', $expert) }}" class="btn btn-outline-primary btn-lg" tabindex="-1" title="Profil" role="button"><i class="bi bi-person-fill"></i></a>
                    <button type="button" wire:click="selectedItem( {{$expert->id}} , 'delete' )" class="btn btn-outline-danger btn-lg" title="Usuń"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

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
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
