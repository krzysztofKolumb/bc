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
            <th scope="col">Nazwa</th>
            <th scope="col">Czas oczekiwania (dzień)</th>
            <th scope="col">Cena podstawowa (pln)</th>
            <th scope="col">Cena BC (pln)</th>
            <th scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $test->name }}</td>
                <td>{{ $test->load_time }}</td>
                <td>{{ $test->regular_price }}</td>
                <td>{{ $test->special_price }}</td>
                <td>
                    <button type="button" wire:click="selectedItem( {{$test->id}} , 'update' )" class="btn btn-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$test->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Lab Test Modal -->
    <div class="modal fade" wire:ignore.self id="lab-test-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Badanie laboratoryjne</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3">
                    <label for="labTestName" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="test.name" class="form-control" id="labTestName" required>
                    @error('test.name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="labTestLoadTime" class="col-form-label">Czas oczekiwania*</label>
                    <input type="text" wire:model="test.load_time" class="form-control" id="labTestLoadTime" required>
                    @error('test.load_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="labTestRegularPrice" class="col-form-label">Cena podstawowa*</label>
                    <input type="text" wire:model="test.regular_price" class="form-control" id="labTestRegularPrice" required>
                    @error('test.regular_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="labTestSpecialPrice" class="col-form-label">Cena dla pacjentów BC*</label>
                    <input type="text" wire:model="test.special_price" class="form-control" id="labTestSpecialPrice" required>
                    @error('test.special_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Kategoria*</label>
                    <select class="form-select mb-3" id="labCategory" name="category" wire:model="test.lab_test_category_id">
                        <option selected>Wybierz</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" required>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('test.lab_test_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        </div>
 
            <div class="modal-footer">
                @if($action=='create')
                <button type="button" wire:click="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="update" class="btn btn-primary">Zapisz zmiany</button>
                @endif
            </div>
        </div>
    </div>
    </div>

    <!-- Delete Lab Test Modal -->
    <div class="modal fade" wire:ignore.self id="delete-lab-test-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz usunąć badanie?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
