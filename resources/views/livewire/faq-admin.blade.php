<div>
  <header>
    <div class="wrapper flex">
      <h2>FAQ</h2>
      <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowy FAQ</button>
    </div>
  </header>

<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Pytanie</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($faqs as $faq)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td class="th-flex">{{ $faq->question }}</td>
                <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$faq->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$faq->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<div class="modal fade" wire:ignore.self id="faq-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FAQ</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="faq-form">
      <div class="modal-body">
            @csrf
            <label for="faq-question" class="col-form-label">Pytanie:</label>
            <input type="text" wire:model.defer="faq.question" name="question" class="form-control" id="faq-question" required>
            @error('faq.question')
            <div>{{ $message }}</div>
            @enderror

            <label for="answear-editor" class="col-form-label">Odpowiedź:</label>
            <textarea id="answear-editor" wire:model.defer="faq.answear" name="answear" height="400px"></textarea>
            @error('faq.answear')
            <div>{{ $message }}</div>
            @enderror
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
    </div>
    </form> 
    </div>
  </div>
</div>

        <div class="modal fade" wire:ignore.self id="faq-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć to pytanie?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
