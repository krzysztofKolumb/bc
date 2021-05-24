<div>
<header>
<div class="wrapper flex">
  <h2>Rekomendacje</h2>
  <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowa rekomendacja</button>
</div>
</header>
<div class="wrapper">
    <label class="form-label">Rekomendujący: </label>
    <select class="form-select" wire:model="author_id">
        <option value="" selected>Wybierz</option>
        @foreach($experts as $expert)
        <option value="{{ $expert->id }}" required>{{ $expert->lastname }} {{ $expert->firstname }}</option>
        @endforeach
    </select>
</div>
<div class="wrapper">
    <label class="form-label">Rekomendowany: </label>
    <select class="form-select" wire:model="recivier_id">
        <option value="" selected>Wybierz</option>
        @foreach($experts as $expert)
        <option value="{{ $expert->id }}" required>{{ $expert->lastname }} {{ $expert->firstname }}</option>
        @endforeach
    </select>
</div>
<br><br>

<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Rekomendujący</th>
            <th class="th-flex" scope="col">Rekomendowany</th>
            <th class="th-flex" scope="col">Rekomendacja</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recommendations as $recommendation)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}.</th>
                <td><h6 class="th-flex">{{ $recommendation->expert->firstname }} {{ $recommendation->expert->lastname }}</h6></td>
                <td><h6 class="th-flex">{{ $recommendation->recommended_expert->firstname }} {{ $recommendation->recommended_expert->lastname }}</h6></td>
                <td class="th-flex">{{ $recommendation->content }}</td>
                <td class="th-options">
                <button type="button" wire:click="selectedItem( {{$recommendation->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$recommendation->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>

                  <!-- <button type="button" wire:click="selectedItem( {{$recommendation->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button> -->
                  <!-- <button>
                  <img width="35px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button> -->
                  <!-- <button type="button" wire:click="selectedItem( {{$recommendation->id}} , 'delete' )" class="btn btn-outline-danger" title="Usuń">Usuń</button> -->
                  

                </td>
            </tr>
        @endforeach
        </tbody>
  </table>

  <!-- Modal Recommendation -->
<div class="modal fade" wire:ignore.self id="recommendation-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rekomendacja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <div>
                <label class="form-label">Rekomendujący: </label>
                <select class="form-select" wire:model.defer="recommendation.expert_id">
                    <option value="" selected>Wybierz</option>
                    @foreach($experts as $expert)
                    <option value="{{ $expert->id }}" required>{{ $expert->lastname }} {{ $expert->firstname }}</option>
                    @endforeach
                </select>
                @error('recommendation.expert_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <br>
            <div>
                <label class="form-label">Rekomendowany: </label>
                <select class="form-select" wire:model.defer="recommendation.recommended_expert_id">
                    <option value="" selected>Wybierz</option>
                    @foreach($experts as $expert)
                    <option value="{{ $expert->id }}" required>{{ $expert->lastname }} {{ $expert->firstname }}</option>
                    @endforeach
                </select>
                @error('recommendation.recommended_expert_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-3">
                <label for="recommendationContent" class="col-sm-3 col-form-label">Treść*</label>
                <div class="col-sm-12">
                    <textarea class="form-control" wire:model.defer="recommendation.content" rows="10" id="recommendationContent" required></textarea>
                    @error('recommendation.content') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
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

    <!-- Modal  -->
    <div class="modal fade" wire:ignore.self id="recommendation-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h5>Czy na pewno chcesz trwale usunąć rekomendację?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
        </div>
    </div>
    </div>


</div>
