<div>

<header>
    <div class="wrapper flex">
        <h2>Badania Laboratoryjne | Cennik</h2>
        <button type="button" class="btn btn-primary btn-new" wire:click="openModal">Nowe badanie</button>
    </div>
</header>

<div class="wrapper flex flex-submenu">
    <div class="select-wrapper">
    <select class="form-select form-select-lab" wire:model="category_id">
        <option value="all" selected>Wszystkie</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" required>{{ $category->name }}</option>
        @endforeach
    </select>
    </div>
    <div>
        <a href="{{ route('admin-lab-test-categories') }}">Kategorie</a>
    </div>
</div>

    <table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex th-name" scope="col">Nazwa</th>
            <th class="th-flex center" scope="col">Czas oczekiwania (dzień)</th>
            <th class="th-flex center" scope="col">Cena podstawowa (pln)</th>
            <th class="th-flex center" scope="col">Cena z kartą BC (pln)</th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}</th>
                <td width="450px"><h6 class="th-flex">{{ $test->name }}</h6></td>
                <td class="center">{{ $test->load_time }}</td>
                <td class="center">{{ $test->regular_price }}</td>
                <td class="center">{{ $test->special_price }}</td>
                <td class="th-options">
                <button type="button" wire:click="selectedItem( {{$test->id}} , 'update' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                  </button>
                  <button type="button" wire:click="selectedItem( {{$test->id}} , 'delete' )" title="Usuń">
                        <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                  </button>
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
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bcg">
                <div class="mb-3">
                    <label for="labTestName" class="col-form-label">Nazwa*</label>
                    <input type="text" wire:model="test.name" class="form-control" id="labTestName" required>
                    @error('test.name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="labTestLoadTime" class="col-form-label">Czas oczekiwania (dni)*</label>
                    <input type="text" wire:model="test.load_time" class="form-control" id="labTestLoadTime" required>
                    @error('test.load_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="labTestRegularPrice" class="col-form-label">Cena podstawowa (PLN)*</label>
                    <input type="text" wire:model="test.regular_price" class="form-control" id="labTestRegularPrice" required>
                    @error('test.regular_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="labTestSpecialPrice" class="col-form-label">Cena dla pacjentów BC (PLN)*</label>
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
                <button type="button" wire:click="cancel" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="create" class="btn btn-primary">Zapisz</button>
                @elseIf($action=='update')
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
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
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Czy na pewno chcesz trwale usunąć to badanie?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="delete" class="btn btn-primary">Usuń</button>
            </div>
            </div>
        </div>
    </div>

</div>
