<div class="livewire-wrapper">

    <header>
    <div class="wrapper flex">
        <h2>{{ $expert->degree->name }} {{ $expert->firstname}} {{ $expert->lastname}}</h2>
    </div>
    </header>

    <section>
        <div class="expert-container-flex wrapper">
            <div class="expert-photo-container">
                <figure>
                    @if($expert->photo)
                    <img src="{{url('storage/photos/' . $expert->photo)}}" >
                    @else
                    <img src="{{url('storage/img/bcg.jpg')}}" >
                    @endif 
                </figure>
            </div>
            <div class="expert-basic-info-container">
                <ul class="expert-profile">
                    <li>
                        <div class="flex header">
                            <h2>Imię, nazwisko, tytuł, zawód</h2>
                            <button data-toggle="modal" data-target="#expert-basic-info-modal" type="button" class="btn btn-link">Edytuj</button>
                        </div>
                        <div class="content">
                            <p>Imię i Nazwisko: <span>{{ $expert->firstname }} {{ $expert->lastname }}</span></p>
                            <p>Tytuł/Stopień: <span>{{ $expert->degree->name }} </span></p>
                            <p>Zawód: <span>{{ $expert->profession->name }} </span></p>
                        </div>
                    </li>
                    <li>
                        <div class="header flex">
                            <h2>Specjalizacje</h2>
                            <button data-toggle="modal" data-target="#expert-specialties-modal" type="button" class="btn btn-link">Edytuj</button>
                        </div>
                        <div class="content">
                            <p>
                                @foreach($expert->specialties as $specialty)
                                @if ($loop->last)
                                {{ $specialty->name }}
                                @else
                                {{ $specialty->name }},
                                @endif
                                @endforeach
                            </p>
                        </div>
                    </li>
                    <li class="expert-section">
                        <div class="header flex">
                            <h2>Zdjęcie</h2>
                            @if($expert->photo)
                            <button data-toggle="modal" data-target="#expert-photo-delete-modal" type="button" class="btn btn-link">Usuń</button>
                            @else
                            <button data-toggle="modal" data-target="#expert-photo-add-modal" type="button" class="btn btn-link">Dodaj</button>
                            @endif
                        </div>
                        <div class="content content-photo">
                            @if($expert->photo)
                            <div class="flex">
                                <p>Nazwa pliku: <span>{{ $expert->photo}}</span></p>
                                <button data-toggle="modal" data-target="#expert-photo-name-edit-modal" type="button" class="btn btn-link">Edytuj</button>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li class="expert-section">
                        <div class="header flex">
                            <h2>Zespół</h2>
                            <button data-toggle="modal" data-target="#expert-team-pages-modal" type="button" class="btn btn-link">Edytuj</button>
                        </div>
                        <div class="content">
                            @foreach($expert->pages as $page)
                            @if($page->id == 1)
                            <p>Strona główna BodyClinic</p>
                            @else
                            <p>{{ $page->title }}</p>
                            @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="expert-section">
                        <div class="header flex">
                            <h2>Grafik</h2>
                            <button data-toggle="modal" data-target="#expert-schedule-modal" type="button" class="btn btn-link">Edytuj</button>
                        </div>
                        <div class="content">
                            @if($expert->schedule->mon)
                            <p><span>Poniedziałki: </span>{{ $expert->schedule->mon}}</p>
                            @endif
                            @if($expert->schedule->tue)
                            <p><span>Wtorki: </span>{{ $expert->schedule->tue}}</p>
                            @endif
                            @if($expert->schedule->wed)
                            <p><span>Środy: </span>{{ $expert->schedule->wed}}</p>
                            @endif
                            @if($expert->schedule->thu)
                            <p><span>Czwartki: </span>{{ $expert->schedule->thu}}</p>
                            @endif
                            @if($expert->schedule->fri)
                            <p><span>Piątki: </span>{{ $expert->schedule->fri}}</p>
                            @endif
                            @if($expert->schedule->sat)
                            <p><span>Soboty: </span>{{ $expert->schedule->sat}}</p>
                            @endif
                            @if($expert->schedule->info )
                            <p><span>Dodatkowe informacje: </span></p>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
      <div class="expert-description-container">
        <ul class="expert-profile wrapper">
          <li class="expert-section">
              <div class="header flex">
                  <h2>Cennik konsultacji</h2>
                  <button wire:click="selectedItem('consultations', '1')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                  @if($expert->consultations)
                      {!! $expert->consultations !!}
                  @else
                      <p>Brak opisu</p>
                  @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Informacje ogólne</h2>
                  <button wire:click="selectedItem('general_info', '2')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
              @if($expert->general_info)
                  {!! $expert->general_info !!}
              @else
                  <p>Brak opisu</p>
              @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Wykształcenie</h2>
                  <button wire:click="selectedItem('education', '3')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                @if($expert->education)
                {!! $expert->education !!}
                @else
                    <p>Brak opisu</p>
                @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Doświadczenie</h2>
                  <button wire:click="selectedItem('experience', '4')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                @if($expert->experience)
                {!! $expert->experience !!}
                @else
                    <p>Brak opisu</p>
                @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Certyfikaty</h2>
                  <button wire:click="selectedItem('certificates', '5')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                @if($expert->certificates)
                {!! $expert->certificates !!}
                @else
                    <p>Brak opisu</p>
                @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Nagrody i wyróżnienia</h2>
                  <button wire:click="selectedItem('awards', '6')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                @if($expert->awards)
                {!! $expert->awards !!}
                @else
                    <p>Brak opisu</p>
                @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Leczone choroby</h2>
                  <button wire:click="selectedItem('help', '7')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                @if($expert->help)
                {!! $expert->help !!}
                @else
                    <p>Brak opisu</p>
                @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Linki zewnętrzne</h2>
                  <button wire:click="selectedItem('links', '8')" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                @if($expert->links)
                {!! $expert->links !!}
                @else
                    <p>Brak opisu</p>
                @endif
              </div>
          </li>
          <li class="expert-section">
              <div class="header flex">
                  <h2>Metadane strony (widoczne w wyszukiwarkach)</h2>
                  <button data-toggle="modal" data-target="#expert-metadata-modal" type="button" class="btn btn-link">Edytuj</button>
              </div>
              <div class="content">
                  <p><span>Tytuł strony: </span>{{ $expert->page->meta_title}}</p>
                  <p><span>Opis strony: </span>{{ $expert->page->meta_description}}</p>
              </div>
          </li>
        </ul>
      </div>
    </section>

<!-- Modal IMIE, NAZWISKO, TYTUŁ, ZAWÓD -->
<div class="modal fade" wire:ignore.self id="expert-basic-info-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Imię, nazwisko, tytuł, zawód</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
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
                            <label class="form-check-label" for="degree-{{$degree->id}}">{{ $degree->name }}</label>
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
        </form>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click.self="updateBasicInfo">Zapisz zmiany</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal SPECJALIZACJE -->
<div class="modal fade" wire:ignore.self id="expert-specialties-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $expert->firstname }} {{ $expert->lastname }} | Specjalizacje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
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
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click.self="updateSpecialties">Zapisz zmiany</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ZDJĘCIE - USUŃ -->
<div class="modal fade" wire:ignore.self id="expert-photo-delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
                <h5>Czy na pewno chcesz trwale usunąć to zdjęcie?</h5>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click.self="deletePhoto">Tak, usuń</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ZDJĘCIE - DODAJ -->
<div class="modal fade" wire:ignore.self id="expert-photo-add-modal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zdjęcie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
            <div class="col-sm-12">
            @if($hasPhoto == false )
                <br>
                  <div class="file-loading" wire:loading wire:target="file">Trwa ładowanie zdjęcia...</div>
                <br>
                @if ($file)
                <div class="mb-12">
                    <div><img class="new-img" width="300px" src="{{ $file->temporaryUrl() }}"></div>    
                </div>
                @endif
                <br>
                <div class="mb-3">
                  <div class="file-input">
                      <input type="file" wire:model="file" id="file" accept="image/*" name="file" class="file">
                      <label for="file">Wybierz plik</label>
                  </div>
                  @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                @if ($file)
                <div class="mb-12">
                    <label for="inputFileName" class="col-sm-12 col-form-label">Zapisz jako:</label>
                    <div class="col-sm-12">
                        <input wire:model.defer="photo_default_name" type="text" class="form-control" id="inputFileName" >
                        @error('photo_default_name') <span class="text-danger">{{ $message }}</span> @enderror
                        @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif
            @endif    
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click.self="deletePrevPhoto" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        @if($file)
        <button type="button" class="btn btn-primary" wire:click.self="savePhoto">Zapisz zdjęcie</button>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Modal ZDJĘCIE - ZMIEN NAZWE -->
<div class="modal fade" wire:ignore.self id="expert-photo-name-edit-modal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zdjęcie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <label for="inputFileName" class="col-sm-3 col-form-label">Nazwa pliku</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" wire:model.defer="file_name_new" id="inputFileName">
                    @error('file_name_new') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="setFileNameNew" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click.self="updatePhotoName">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal W Zespole na Stronach -->
<div class="modal fade" wire:ignore.self id="expert-team-pages-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zespół</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
        <!-- <legend class="col-form-label col-sm-3 pt-0">Zespół</legend> -->
        <div class="col-sm-9">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" wire:model="ePages.1" id="page-1" value="1">
                <label class="form-check-label" for="page-1">
                    Strona główna BodyClinic
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
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click="updatePages">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Grafik -->
<div class="modal fade" wire:ignore.self id="expert-schedule-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Grafik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click="updateSchedule">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Metadane -->
<div class="modal fade" wire:ignore.self id="expert-metadata-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Metadane</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click="updateMetadata">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="editor-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <form id="editor-form">
                @csrf
                <div>
                    <label class="error-msg" id="textarea-tm-error" class="col-form-label"></label>
                    <textarea class="form-control editor" wire:model.defer="content" id="textarea-editor-mamo" name="content" rows="8" cols="10">
                    </textarea>
                    @error('content') 
                    <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

</div>
</div>