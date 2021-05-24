<div>
  <header>
  <div class="wrapper flex">
    <h2>Konsultacje | Cennik</h2>
  </div>
  </header>

  <table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Specjalista</th>
            <th class="th-flex" scope="col">Konsultacje</th>
            <th class="th-flex" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($experts as $expert)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td width="250px">
                <a href="{{ route('admin-expert-profile', $expert) }}">
                <h6 class="th-flex">{{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h6>
                </td></a>
                <td class="th-flex"> {!! $expert->consultations !!}</td>
                <td class="th-flex">
                <button type="button" wire:click="selectedItem( {{$expert->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                    <!-- <button type="button" wire:click="selectedItem( {{$expert->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button> -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" wire:ignore.self id="consultation-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konsultacje | {{ $title }}</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="consultation-form">
            @csrf
            <!-- <label for="textarea-new-post" class="col-form-label">Opis:</label> -->
            <textarea id="textarea-consultation" wire:model.defer="consultation" name="content" height="400px">
            </textarea>
            @error('consultation')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form> 
    </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>











</div>
