<div>
<header>
<div class="wrapper flex">
    <h2>Materiały do pobrania</h2>
    <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowy dokument</button>
</div>
</header>

<div class="wrapper flex">
    <select class="form-select" wire:model="category_id">
        <option value="all" selected>Wszystkie</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" required>{{ $category->name }}</option>
        @endforeach
    </select>
    <div>
        <a href="{{ route('admin-file-categories') }}">Kategorie</a>
    </div>
</div>

<table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Dokument</th>
            <th class="th-flex" scope="col">Kategoria</th>
            <th class="th-flex" scope="col">Format</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <!-- <td class="th-flex"><h6>{{ $file->title }}</h6></td> -->
                <td class="th-flex"><h6>{{ Str::beforeLast($file->title, '.') }}</h6></td>

                <td class="th-flex">{{ $file->fileCategory->name }}</td>
                <td class="th-flex">{{ $file->type }}</td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( {{$file->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$file->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>
                    <!-- <button type="button" wire:click="selectedItem( {{$file->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$file->id}} , 'delete' )" class="btn btn-outline-danger">Usuń</button>
                 -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- file Modal -->
    <div class="modal fade" wire:ignore.self id="file-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Dokument</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            @if($action=='create')
            <div class="mb-3">
                <div class="file-input">
                    <input type="file" wire:model="newFile" id="file" accept=".pdf,.doc,.docx" name="newFile" class="file">
                    <label for="file">Wybierz plik</label>
                </div>
                @if($name)<p>{{ $name }}</p>@endif
                @error('newFile') <span class="text-danger">{{ $message }}</span> @enderror
                @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @endif
                <div class="mb-3">
                    <label for="documentTitle" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="file.title" class="form-control" id="documentTitle" required>
                    @error('file.title') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                    @error('uniqueName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Kategoria*</label>
                    <select class="form-select mb-3" id="fileCategoryId" name="fileCategory" wire:model="file.file_category_id">
                        <option selected>Wybierz</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" required>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('file.file_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        </div>
 
            <div class="modal-footer">
                @if($action=='create')
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="update" class="btn btn-primary">Zapisz zmiany</button>
                @endif
            </div>
        </div>
    </div>
    </div>

        <!-- file Delete Modal -->
    <div class="modal fade" wire:ignore.self id="file-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć ten dokument?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>
</div>
