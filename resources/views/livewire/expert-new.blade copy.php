<div class="livewire-wrapper">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="text-center form-wrapper">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <!-- <h2 id="heading">Nowy specjalista</h2> -->
                <!-- <p>Fill all form field to go to next step</p> -->

                <form id="msform" wire:submit.prevent="submit" enctype="multipart/form-data">

                    <!-- <ul id="progressbar">
                        <li class="active" id="personal"><strong>Dane podstawowe</strong></li>
                        @if($step > 0) <li id="payment" class="active"><strong>Zdjęcie</strong></li>
                        @else <li id="payment"><strong>Zdjęcie</strong></li>@endif
                        @if($step > 1) <li id="payment" class="active"><strong>Grafik</strong></li>
                        @else <li id="payment"><strong>Grafik</strong></li>@endif
                        @if($step > 2) <li id="confirm" class="active"><strong>Koniec</strong></li>
                        @else <li id="confirm"><strong>Koniec</strong></li>@endif
                    </ul> -->
                    <!-- <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                     <br>
                      <!-- fieldsets -->

                    @if($step == 0)
                    <fieldset id="stepOne">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Dane Podstawowe:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Krok 1 - 4</h2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputFirstName" class="col-sm-3 col-form-label">Imię*</label>
                                <div class="col-sm-9">
                                <input type="text" wire:model="expert.firstname" class="form-control" id="inputFirstName" required>
                                @error('expert.firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputLastName"  class="col-sm-3 col-form-label">Nazwisko*</label>
                                <div class="col-sm-9">
                                <input type="text" wire:model="expert.lastname" class="form-control" id="inputLastName" required>
                                @error('expert.lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3" >
                                <legend class="col-form-label col-sm-3 pt-0">Tytuł/Stopień*</legend>
                                <div class="col-sm-9">
                                @foreach($degrees as $degree)
                                <div class="form-check">
                                    <input class="form-check-input" wire:model="expert.degree_id" name="degree" required type="radio" id="degree-{{$degree->id}}" value="{{ $degree->id }}">
                                    <label class="form-check-label" for="degree-{{$degree->id}}">
                                    {{ $degree->name }}
                                    </label>
                                </div>
                                @endforeach
                                @error('expert.degree_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Zawód*</legend>
                                <div class="col-sm-9">
                                @foreach($professions as $profession)
                                <div class="form-check">
                                    <input class="form-check-input" name="profession" required type="radio" wire:model="expert.profession_id" id="profession-{{ $profession->id }}" value="{{ $profession->id }}">
                                    <label class="form-check-label" for="profession-{{ $profession->id }}">
                                    {{ $profession->name }}
                                    </label>
                                </div>
                                @endforeach
                                @error('expert.profession_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Specjalizacje*</legend>
                                <div class="col-sm-9">
                                <div class="container-flex">
                                @foreach($specialties as $specialty)
                                <div class="form-check">
                                    <input class="form-check-input" wire:model="specs.{{ $specialty->id }}" type="checkbox" id="spec-{{ $specialty->id }}" value="{{ $specialty->id }}">
                                    <label class="form-check-label" for="spec-{{ $specialty->id }}">
                                    {{ $specialty->name }}
                                    </label>
                                </div>
                                @endforeach
                                </div>
                                </div>
                                @error('specs') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Zespół</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" {{ $disabled }} wire:model="ePages.1" id="page-1" value="1">
                                        <label class="form-check-label" for="page-1">
                                            Strona główna
                                        </label>
                                    </div>
                                    @foreach($pages as $page)
                                    @if($page->id > 1)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model="ePages.{{ $page->id }}" id="page-{{ $page->id }}" value="{{ $page->id }}">
                                        <label class="form-check-label" for="page-{{ $page->id }}">
                                            {{ $page->title }}
                                        </label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endif

                    @if($step == 1)
                    <fieldset id="stepTwo">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Zdjęcie:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Krok 2 - 4</h2>
                                </div>
                            </div>
                            <div wire:loading wire:target="file">Trwa ładowanie zdjęcia...</div>
                            <br>
                            @if ($file)
                            <div class="row mb-3">
                                <label for="inputFileName" class="col-sm-3 col-form-label"></label>
                                <div>
                                    <img width="250px" src="{{ $file->temporaryUrl() }}">
                                    <button type="submit" wire:click.prevent="delete()" class="btn btn-primary">Usuń</button> 
                                </div>    
                            </div>
                            <div class="row mb-3">
                                <!-- <label for="inputFileName" class="col-sm-3 col-form-label">Wybrany plik</label> -->
                                <div>
                                    <p>{{ $file->getClientOriginalName() }}</p>
                                </div> 
                            </div>
                            <div class="row mb-3">
                                <label for="inputFileName" class="col-sm-2 col-form-label">Zapisz jako:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputFileName" wire:model="expert.photo" value="{{ $file->getClientOriginalName() }}">
                                @error('expert.photo') <span class="text-danger">{{ $message }}</span> @enderror
                                @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @endif
                            <div class="input-group mb-3">
                                <input type="file" wire:model="file" class="form-control" accept="image/*" id="inputGroupFile01">
                                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </fieldset>
                    @endif

                    @if($step == 2)
                    <fieldset id="stepThree">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Grafik przyjęć:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Krok 3 - 4</h2>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <label for="mon" class="col-sm-2 col-form-label">Poniedziałki</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" wire:model="schedule.mon" id="mon" >
                                @error('schedule.mon') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tue"  class="col-sm-2 col-form-label">Wtorki</label>
                                <div class="col-sm-3">
                                <input type="text" wire:model="schedule.tue" class="form-control" id="tue">
                                @error('schedule.tue') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="wed" class="col-sm-2 col-form-label">Środy</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" wire:model="schedule.wed" id="wed" >
                                @error('schedule.wed') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="thu"  class="col-sm-2 col-form-label">Czwartki</label>
                                <div class="col-sm-3">
                                <input type="text" wire:model="schedule.thu" class="form-control" id="thu">
                                @error('schedule.thu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fri" class="col-sm-2 col-form-label">Piątki</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control" wire:model="schedule.fri" id="fri" >
                                @error('schedule.fri') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sat"  class="col-sm-2 col-form-label">Soboty</label>
                                <div class="col-sm-3">
                                <input type="text" wire:model="schedule.sat" class="form-control" id="sat">
                                @error('schedule.sat') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="info"  class="col-sm-2 col-form-label">Uwagi</label>
                                <div class="col-sm-10">
                                <input type="text" wire:model="schedule.info" class="form-control" id="info">
                                @error('schedule.info') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endif

                    @if($step > 2)
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <!-- <div class="col-7">
                                    <h2 class="fs-title">Koniec:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Krok 4 - 4</h2>
                                </div> -->
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="text-center">
                                    <h3>Dodałeś nowego eksperta!</h3>
                                    <h5 class="purple-text text-center">Przejdź do profilu {{ $expert->degree->name }} {{ $expert->firstname }} {{ $expert->lastname }}</h5>
                                    <a href="{{ route('admin-expert-profile', $expert) }}" class="btn btn-primary" tabindex="-1" role="button">Profil</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endif
                    <div class="mt-2">
                        @if($step> 0 && $step<=2)
                        <button type="button" wire:click="decreaseStep" class="btn btn-secondary mr-3">Cofnij</button>
                        @endif

                        @if($step <= 2)
                        <button type="submit" class="btn btn-primary">Dalej</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
