<div>
<br>
<h1>{{ $expert->degree->name }} {{ $expert->firstname}} {{ $expert->lastname}}</h1>
<h4 class="subtitle">{{ $expert->profession->name }}</h4>
@if($hasPhoto==true)
<img class="" width="300px" src="{{url('storage/photos/' . $expert->photo)}}" > 
@endif
<br><br><br>


<h4>Dane Podstawowe</h4>
<br>

 <div class="accordion accordion-flush"  id="accordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" 
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      Imię, nazwisko, tytuł, zawód
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" wire:ignore.self aria-labelledby="flush-headingOne" 
            data-bs-parent="#accordion">
        <div class="accordion-body">
        <form>
            <fieldset>
            <div class="row mb-3">
            <label for="inputFirstName" class="col-sm-3 col-form-label">Imię*</label>
            <div class="col-sm-9">
                <input type="text" wire:model="expert.firstname" class="form-control" id="inputFirstName" required>
                @error('expert.firstname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="row mb-3">
                    <label for="inputLastName" class="col-sm-3 col-form-label">Nazwisko*</label>
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
            </fieldset>
            <div class="btn-container">
            <button type="button" class="btn btn-primary" wire:click.self="update()">Zapisz zmiany</button>
            </div>
        </form>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Zdjęcie
      </button>
    </h2>
    <div id="flush-collapseTwo" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordion">
      <div class="accordion-body">
        <div class="row mb-3">
            <!-- <legend class="col-form-label col-sm-3 pt-0">Zdjęcie</legend> -->
            <div class="col-sm-9">
            @if($hasPhoto == false )
            <div wire:loading wire:target="file">Trwa ładowanie zdjęcia...</div>
                <br>
                <div class="input-group mb-3">
                <input type="file" wire:model="file" class="form-control" accept="image/*" id="inputGroupFile01">
                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
                @if ($file)
                <div class="row mb-3">
                    <label for="inputFileName" class="col-sm-3 col-form-label"></label>
                    <div>
                        <img width="250px" src="{{ $file->temporaryUrl() }}">
                        <button type="submit" wire:click.prevent="delete()" class="btn btn-primary">Usuń</button> 
                    </div>    
                </div>
                <div class="row mb-3">
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
                <div class="btn-container">
                    <button type="button" class="btn btn-primary" wire:click.self="updatePhoto">Zapisz zdjęcie</button>
                </div>
                @endif

            @else
                <img class="" width="300px" src="{{url('storage/photos/' . $expert->photo)}}" > 
                <br><br>
                <div class="row mb-3">
                    <label for="inputFileName" class="col-sm-3 col-form-label">Nazwa pliku</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" wire:model="file_name_new" id="inputFileName">
                    @error('file_name_new') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                <div class="btn-container">
                    <button type="button" wire:click="deletePhoto" class="btn btn-primary">
                        Usuń zdjęcie
                    </button>
                    <button type="button" wire:click.prevent="changePhotoName" class="btn btn-primary">
                        Zmień nazwę
                    </button>
                </div>
                </div>
            @endif    
            </div>
        </div>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Specjalizacje
      </button>
    </h2>
    <div id="flush-collapseThree" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordion">
      <div class="accordion-body">
            <div class="row mb-3">
                <!-- <legend class="col-form-label col-sm-3 pt-0">Specjalizacje*</legend> -->
                <div class="col-sm-9">
                    <div class="container-flex">
                        @foreach($specialties as $index => $specialty)
                        <div class="form-check" wire:key="{{ $loop->index }}">
                            <input class="form-check-input" wire:model="specs.{{$specialty->id}}" type="checkbox" id="spec-{{ $specialty->id }}" value="{{ $specialty->id }}">
                            <label class="form-check-label" for="spec-{{ $specialty->id }}">
                            {{ $specialty->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @error('specs') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="btn-container">
                <button type="button" class="btn btn-primary" wire:click.self="updateSpecialties()">Zapisz zmiany</button>
            </div>
        </div>
    </div>
  </div>
  <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTeam">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-team" aria-expanded="false" aria-controls="flush-team">
            Zespół
        </button>
        </h2>
        <div id="flush-team" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="flush-headingTeam" data-bs-parent="#accordion">
        <div class="accordion-body">
                <div class="row mb-3">
                    <!-- <legend class="col-form-label col-sm-3 pt-0">Zespół</legend> -->
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" {{ $disabled }} wire:focusout="updatePages()" wire:model="ePages.1" id="page-1" value="1">
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
                    <div class="btn-container">
                        <button type="button" class="btn btn-primary" wire:click.self="updatePages()">Zapisz zmiany</button>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="accordion-schedule">
        <h2 class="accordion-header" id="flush-headingSchedule">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-schedule" aria-expanded="false" aria-controls="flush-schedule">
            Grafik przyjęć
        </button>
        </h2>
        <div id="flush-schedule" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="flush-headingSchedule" data-bs-parent="#accordion">
            <div class="accordion-body">
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
            <div class="btn-container">
                <button type="button" class="btn btn-primary" wire:click.self="updateSchedule()">Zapisz zmiany</button>
            </div>
            </div>
        </div>
  </div>
  <div class="accordion-metadata">
        <h2 class="accordion-header" id="flush-headingMetadata">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-Metadata" aria-expanded="false" aria-controls="flush-Metadata">
            Metadane strony
        </button>
        </h2>
        <div id="flush-Metadata" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="flush-headingMetadata" data-bs-parent="#accordion">
            <div class="accordion-body">
            <div class="row mb-3">
                <label for="page_meta_title" class="col-sm-2 col-form-label">Tytuł strony</label>
                <div class="col-sm-9">
                    <input class="form-control" wire:model="page.meta_title" id="page_meta_title" rows="3">
                    @error('page.meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Opis strony</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model="page.meta_description" id="page_meta_description" rows="3">
                        {{ $page->meta_description }}
                    </textarea>
                    @error('page.meta_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="btn-container">
                <button type="button" class="btn btn-primary" wire:click.self="updateMetadata()">Zapisz zmiany</button>
            </div>
            </div>
        </div>
  </div>
</div>

</div>
