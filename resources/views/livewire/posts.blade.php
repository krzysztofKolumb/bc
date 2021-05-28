<div>
  <header>
  <div class="wrapper flex">
    <h2>Aktualności</h2>
    <button type="button" class="btn btn-primary" wire:click="openModal">Nowy wpis</button>
  </div>
  </header>

<table class="table">
    <thead>
        <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Tytuł</th>
            <th class="th-flex" scope="col">Data utworzenia</th>
            <th class="th-options" scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
            <td class="th-flex">{{ $post->title }}</td>
            <td class="th-flex">{{ $post->created_at }}</td>
            <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$post->id}} , 'update' )" title="Edytuj">
                    <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$post->id}} , 'delete' )" title="Usuń">
                    <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>
                <!-- <button type="button" wire:click="selectedItem( {{$post->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                <button type="button" wire:click="selectedItem( {{$post->id}} , 'delete' )" class="btn btn-outline-danger">Usuń</button>
             -->
              </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $posts->render() }}


<div class="modal fade" wire:ignore.self id="post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="post-form">
      <div class="modal-body">
            @csrf
            <label for="post-title" class="col-form-label">Tytuł:</label>
            <input type="text" wire:model.defer="post.title" name="title" class="form-control" id="post-title" required>
            @error('post.title')
            <div>{{ $message }}</div>
            @enderror
              <br>
            <label for="textarea-new-post" class="col-form-label">Treść:</label>
            <textarea id="textarea-post" wire:model.defer="post.content" name="content" height="400px">
            </textarea>
            @error('post.content')
            <div>{{ $message }}</div>
            @enderror
            <input type="hidden" name="post_id" class="form-control" required>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
      </div>
    </div>
    </form> 

  </div>
</div>

<div class="modal fade" wire:ignore.self id="post-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Czy na pewno chcesz trwale usunąć ten post?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" wire:click="delete" class="btn btn-primary">Usuń</button>
      </div>
    </div>
  </div>
</div>

</div>
