<div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-post-modal">
  Nowy
</button>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Data utworzenia</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <a href="{{ route('admin-news-show', $post->id) }}" class="btn btn-primary" tabindex="-1" role="button">Edytuj</a>
                <button type="button" wire:click="openDeleteModal( {{$post->id}} )" class="btn btn-danger">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $posts->render() }}


<div class="modal fade" wire:ignore.self id="new-post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="new-post-form" action="" method="POST">
            @csrf
            <label for="post-title" class="col-form-label">Tytuł:</label>
            <input type="text" name="title" class="form-control" id="post-title" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror

            <label for="textarea-new-post" class="col-form-label">Opis:</label>
            <textarea id="textarea-new-post" name="content" height="400px">
            </textarea>
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <input type="hidden" name="post_id" class="form-control" required>
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

<div class="modal fade" wire:ignore.self id="delete-post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Czy na pewno chcesz trwale usunąć ten post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="button" wire:click="delete" class="btn btn-primary">Usuń</button>
      </div>
    </div>
  </div>
</div>

</div>
