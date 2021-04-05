<div>

<!-- <div>
    <button type="button" class="btn btn-primary" wire:click="openModal">Nowy</button>
</div> -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#faq-modal">
  Nowy
</button>

<table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Pytanie</th>
            <th scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($faqs as $faq)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $faq->question }}</td>
                <td>
                    <a href="{{ route('admin-faq-show', $faq->id) }}" class="btn btn-primary" tabindex="-1" role="button">Edytuj</a>
                    <button type="button" wire:click="openDeleteModal( {{$faq->id}} )" class="btn btn-danger">Usuń</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<div class="modal fade" wire:ignore.self id="faq-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="faq-form" action="" method="POST">
            @csrf
            <label for="faq-question" class="col-form-label">Pytanie:</label>
            <input type="text" name="question" class="form-control" id="faq-question" required>
            @error('question')
            <div>{{ $message }}</div>
            @enderror

            <label for="answear-editor" class="col-form-label">Odpowiedź:</label>
            <textarea id="answear-editor" name="answear" height="400px"></textarea>
            @error('answear')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
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

        <div class="modal fade" wire:ignore.self id="faq-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć to pytanie?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
