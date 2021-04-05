<div>
    <div class="row mb-4">
        <div class="col-md-12">
          <div class="float-right mt-5">
              <input wire:model="search" class="form-control" type="text" placeholder="Search Users...">
          </div>
        </div>
    </div>

    <div class="row">
        @if ($experts->count())
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <a wire:click.prevent="sortBy('firstname')" role="button" href="#">
                            Name
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('lastname')" role="button" href="#">
                            Email
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('education')" role="button" href="#">
                            Address
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('help')" role="button" href="#">
                            Age
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created at
                        </a>
                    </th>
                    <th>
                        Delete
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experts as $expert)
                    <tr>
                        <td>{{ $expert->firstname }}</td>
                        <td>{{ $expert->lastname }}</td>
                        <td>{{ $expert->education }}</td>
                        <td>{{ $expert->help }}</td>
                        <td>
                        <button class="btn btn-sm btn-danger" wire:click.prevent="addNew({{ $expert->id }})">
                         Usuń
                        </button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-dark">
                            Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-warning">
                Your query returned zero results.
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col">
        </div>
    </div>

<div class="modal fade" id="form" wire.ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Czy na pewno chcesz usunąć {{ $expert_id }} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="delete()">Usuń</button>
      </div>
    </div>
  </div>
</div>



    







</div>

