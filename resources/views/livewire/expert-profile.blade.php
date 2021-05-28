<div>
<!-- <h1>Matko {{ $expert->degree->name }} {{ $expert->firstname}} {{ $expert->lastname}}</h1>

<div class="accordion accordion-flush" wire:ignore id="accordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" 
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      Imię, nazwisko, tytuł, zawód
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" 
            data-bs-parent="#accordion">
        <div class="accordion-body">
            <div class="row mb-3">
            <label for="inputFirstName" class="col-sm-3 col-form-label">Imię*</label>
            <div class="col-sm-9">
                <input type="text" wire:model="expert.firstname" wire:focusout="update()" class="form-control" id="inputFirstName" required>
                @error('expert.firstname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="row mb-3">
                    <label for="inputLastName" class="col-sm-3 col-form-label">Nazwisko*</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="expert.lastname" wire:focusout="update()" class="form-control" id="inputLastName" required>
                        @error('expert.lastname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
            </div>
            <div class="row mb-3" >
                <legend class="col-form-label col-sm-3 pt-0">Tytuł/Stopień*</legend>
                    <div class="col-sm-9">
                        @foreach($degrees as $degree)
                        <div class="form-check">
                            <input class="form-check-input" wire:model="expert.degree_id" wire:focusout="update()" name="degree" required type="radio" id="degree-{{$degree->id}}" value="{{ $degree->id }}">
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
                        <input class="form-check-input" wire:focusout="update()" name="profession" required type="radio" wire:model="expert.profession_id" id="profession-{{ $profession->id }}" value="{{ $profession->id }}">
                        <label class="form-check-label" for="profession-{{ $profession->id }}">
                        {{ $profession->name }}
                        </label>
                    </div>
                    @endforeach
                    @error('expert.profession_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Zdjęcie
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordion">
      <div class="accordion-body">
        <div class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0">Zdjęcie</legend>
            <div class="col-sm-9">
            @if($expert->photo == null)
                <div class="input-group mb-3">
                    <input type="file" wire:model="file" class="form-control" accept="image/*" id="inputGroupFile01">
                    @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="row mb-3">
                    <label for="inputFileName" class="col-sm-2 col-form-label">Nazwa pliku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="expert.photo" id="inputFileName" value="{{ $expert->photo }}">
                        @error('expert.photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            @else
                <img class="" width="300px" src="{{url('storage/photos/' . $expert->photo)}}" > 

                <div class="row mb-3">
                    <label for="inputFileName" class="col-sm-2 col-form-label">Nazwa pliku</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="expert.photo" id="inputFileName">
                    @error('expert.photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row mb-3">
                <div>
                    <button type="button" wire:click.prevent="deletePhoto" class="btn btn-primary">
                        Usuń zdjęcie
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
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordion">
      <div class="accordion-body">
            <div class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Specjalizacje*</legend>
                <div class="col-sm-9">
                    <div class="container-flex">
                        @foreach($specialties as $index => $specialty)
                        <div class="form-check" wire:key="{{ $loop->index }}">
                            <input class="form-check-input" wire:focusout="updateSpecialties()" wire:model="specs.{{$specialty->id}}" type="checkbox" id="spec-{{ $specialty->id }}" value="{{ $specialty->id }}">
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
    </div>
  </div>
  <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTeam">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-team" aria-expanded="false" aria-controls="flush-team">
            Zespół
        </button>
        </h2>
        <div id="flush-team" class="accordion-collapse collapse" aria-labelledby="flush-headingTeam" data-bs-parent="#accordion">
        <div class="accordion-body">
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-3 pt-0">Zespół</legend>
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
                            <input class="form-check-input" type="checkbox" wire:focusout="updatePages()" wire:model="ePages.{{ $page->id }}" id="page-{{ $page->id }}" value="{{ $page->id }}">
                            <label class="form-check-label" for="page-{{ $page->id }}">
                                {{ $page->title }}
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="accordion-schedule">
        <h2 class="accordion-header" id="flush-headingSchedule">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-schedule" aria-expanded="false" aria-controls="flush-schedule">
            Grafik
        </button>
        </h2>
        <div id="flush-schedule" class="accordion-collapse collapse" aria-labelledby="flush-headingSchedule" data-bs-parent="#accordion">
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
            </div>
        </div>
  </div>
  <div class="accordion-education">
        <h2 class="accordion-header" id="flush-headingEducation">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-education" aria-expanded="false" aria-controls="flush-education">
            Edukacja
        </button>
        </h2>
        <div id="flush-education" class="accordion-collapse collapse" aria-labelledby="flush-headingEducation" data-bs-parent="#accordion">
            <div class="accordion-body">

            </div>
        </div>

      
    </div>
</div> -->

<!-- <x-text-editor/> -->

<!-- <tinymce-editor>
matko
</tinymce-editor> -->

<h1> ExpertProfileBlade {{ $expert->education }}</h1>

@push('scripts')
<script>
function setupEditor(editor) {
  editor.on('change', function () {
    alert(editor.getContent());
    $('#text').val(editor.getContent());
    // Livewire.find([1234]).set('expert.education',editor.getContent());
    // window.LivewireInstence.set('expert.education',editor.getContent());
    // Livewire.find($expert).set('expert.education',editor.getContent());
    // set('expert.education', editor.getContent());
  });
}

// function changeHandler(evt) {
//     alert('The ' + evt['type'] + ' event was fired.');
//   }


//   document.addEventListener('livewire:load', function () {
        // Get the value of the "count" property
        // Livewire.find([component-id]).count
        // Set the value of the "count" property

        // Call the increment component action

        // Run a callback when an event ("foo") is emitted from this component
        // @this.on('foo', () => {})
    // })



</script>
@endpush

<div>
    <form action="" method="POST">
    @csrf

        <textarea id="textarea" name="content">
        {{ $expert->education }}
        </textarea>

        @error('content')
        <div>{{ $message }}</div>
        @enderror

        <button type="submit">Zapisz</button>
    </form> 
</div>



                <!-- <div>
                        <div wire:id="1234" wire:model="expert.education">
                            <tinymce-editor setup="setupEditor" input="text">
                                    matko
                            </tinymce-editor>
                            <input id="text" name="content">
                            <button type="submit" wire:click.prevent="updateEdu()">Zapisz</button>
                            @error('expert.education') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                </div> -->

</div>















<!-- Modal -->
<div class="modal fade" id="exampleModal" wire:ignore tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
        <div class="row mb-3">
        <label for="FirstName" class="col-sm-3 col-form-label">Imię*</label>
        <div class="col-sm-9">
            <input type="text" wire:model="expert.firstname" class="form-control" id="FirstName" required>
            @error('expert.firstname') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
</div>
<div class="row mb-3">
        <label for="LastName" class="col-sm-3 col-form-label">Nazwisko*</label>
        <div class="col-sm-9">
            <input type="text" wire:model="expert.lastname" class="form-control" id="LastName" required>
            @error('expert.lastname') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
</div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="update()">Zapisz</button>
      </div>
    </div>
  </div>
</div>













</div>
