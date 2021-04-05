<div>
<div>
    <button type="button" class="btn btn-primary" wire:click="openModal">Nowy</button>
</div>
<div>
Kategoria
    <select class="form-select" wire:model="category_id">
        <option value="all" selected>Wszystkie</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" required>{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Dokument</th>
            <th scope="col">Format</th>
            <th scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $file->title }}</td>
                <td>{{ $file->price }}</td>
                <td>
                    <button type="button" wire:click="selectedItem( {{$file->id}} , 'update' )" class="btn btn-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$file->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- file Modal -->
    <div class="modal fade" wire:ignore.self id="file-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Dokument</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input type="file" wire:model="document" wire:change="setDocumentName" name="document" class="form-control" accept=".pdf,.doc,.docx" id="inputGroupFileDocument">
                @error('document') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
                <div class="mb-3">
                    <label for="documentTitle" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="file.title" class="form-control" id="documentTitle" required>
                    @error('file.title') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć ten dokument?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>
</div>
