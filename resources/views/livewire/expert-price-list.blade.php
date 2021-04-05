<div>

    <div class="accordion accordion-flush"  id="accordion-expert-price-list">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingExpertPriceListConsultation">
            <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" 
                    data-bs-target="#flush-collapseExpertPriceListConsultation" aria-expanded="false" aria-controls="flush-collapseOne">
            Konsultacje
            </button>
            </h2>
            <div id="flush-collapseExpertPriceListConsultation" class="accordion-collapse collapse" wire:ignore.self aria-labelledby="flush-headingExpertPriceListConsultation" 
                    data-bs-parent="#accordion">
                <div class="accordion-body">

                    <div class="row mb-3">
                    <label for="inputFirstName" class="col-sm-3 col-form-label">Konsultuje w zakresie:*</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="expert.firstname" class="form-control" id="inputFirstName" required>
                        @error('expert.firstname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    <div class="row mb-3">
                    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Wizyta</th>
            <th scope="col">Czas trwania (min.)</th>
            <th scope="col">Cena (pln)</th>
            <th scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($consultations as $index => $consultation)
            <tr wire:key="consultation-{{$consultation->id}}">
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    <input type="text" wire:model="consultations.{{ $index }}.name" class="form-control" id="inputConsultationName" required>
                    @error('consultations.{{ $index }}.name') <span class="text-danger">{{ $message }}</span> @enderror</td>
                <td>
                    <p>pierwszorazowa</p>
                    <p>podstawowa</p>
                </td>
                <td>
                    <div>
                        <input type="text" wire:model="consultations.{{ $index }}.first_duration" class="form-control" id="inputFirstConsultationDuration" required>
                            @error('consultations.{{ $index }}.first_duration') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input type="text" wire:model="consultations.{{ $index }}.duration" class="form-control" id="inputConsultationDuration" required>
                            @error('consultations.{{ $index }}.duration') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>                
                </td>
                <td>
                    <div>
                        <input type="text" wire:model="consultations.{{ $index }}.first_price" class="form-control" id="inputFirstConsultationFirstPrice" required>
                            @error('consultations.{{ $index }}.first_price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input type="text" wire:model="consultations.{{ $index }}.price" class="form-control" id="inputConsultationPrice" required>
                            @error('consultations.{{ $index }}.price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>                
                </td>
                <td>
                    <button type="button" wire:click="selectedItem( {{$consultation->id}} , 'update' )" class="btn btn-primary">Edycja</button>
                    <button type="button" wire:click="selectedItem( {{$consultation->id}} , 'delete' )" class="btn btn-danger">Usuń</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

                    </div>


                    <button type="button" class="btn btn-primary" wire:click.self="update()">Zapisz</button>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-expert-tests">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-expert-tests" aria-expanded="false" aria-controls="flush-expert-tests">
                Badania
            </button>
            </h2>
            <div id="flush-expert-tests" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="flush-expert-tests" data-bs-parent="#accordion">
                <div class="accordion-body">

                </div>
            </div>
        </div>
    </div>
</div>
