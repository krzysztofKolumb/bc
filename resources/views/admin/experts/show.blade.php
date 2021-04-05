@extends('admin.app')

@section('content')

@livewire('expert-edit', ['expert' => $expert])

<br>
<br>
<h4>Profil</h4>
<br>
<div class="accordion accordion-flush" id="accordion-profile">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOneProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneProfile" aria-expanded="false" aria-controls="flush-collapseOneProfile">
        Specjalizacje
      </button>
    </h2>
    <div id="flush-collapseOneProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingOneProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <div>
          <form class="form-expert-profile" id="form-expert-specialties" action="" method="POST">
          @csrf
              <div>
                  <textarea class="form-control" name="content" id="textarea-expert-specialties" rows="3">
                  {{ $expert->specialties_desc }}
                  </textarea>
              </div>
              <input type="hidden" name="id" value="{{ $expert->id }}">
              <input type="hidden" name="category" value="specialties_desc" >
              @error('content')
              <div>{{ $message }}</div>
              @enderror
              <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
              </div>
          </form> 
          </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwoProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwoProfile" aria-expanded="false" aria-controls="flush-collapseTwoProfile">
        Edukacja
      </button>
    </h2>
    <div id="flush-collapseTwoProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingTwoProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <div>
      <form class="form-expert-profile-tm" id="form-expert-education" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-education" name="content" height="400px">
            {{ $expert->education }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="education" >

            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
            </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThreeProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThreeProfile" aria-expanded="false" aria-controls="flush-collapseThreeProfile">
        Doświadczenie
      </button>
    </h2>
    <div id="flush-collapseThreeProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingThreeProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <form class="form-expert-profile-tm" id="form-expert-experience" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-experience" name="content" height="400px">
            {{ $expert->experience }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="experience" >
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFourProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFourProfile" aria-expanded="false" aria-controls="flush-collapseFourProfile">
        Certyfikaty
      </button>
    </h2>
    <div id="flush-collapseFourProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingFourProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <form class="form-expert-profile-tm" id="form-expert-certificates" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-certificates" name="content" height="400px">
            {{ $expert->certificates }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="certificates" >
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
       </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFiveProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFiveProfile" aria-expanded="false" aria-controls="flush-collapseFiveProfile">
        Nagrody i Wyróżnienia
      </button>
    </h2>
    <div id="flush-collapseFiveProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingFiveProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <form class="form-expert-profile-tm" id="form-expert-awards" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-awards" name="content" height="400px">
            {{ $expert->awards }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="awards" >
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
       </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSixProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSixProfile" aria-expanded="false" aria-controls="flush-collapseSixProfile">
        Leczone Choroby
      </button>
    </h2>
    <div id="flush-collapseSixProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingSixProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <form class="form-expert-profile-tm" id="form-expert-help" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-help" name="content" height="400px">
            {{ $expert->help }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="help" >
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
       </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSevenProfile">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSevenProfile" aria-expanded="false" aria-controls="flush-collapseSevenProfile">
        Inne
      </button>
    </h2>
    <div id="flush-collapseSevenProfile" class="accordion-collapse collapse" aria-labelledby="flush-headingSevenProfile" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <form class="form-expert-profile-tm" id="form-expert-other" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-other" name="content" height="400px">
            {{ $expert->other }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="other" >
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
       </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingConsultations">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseConsultations" aria-expanded="false" aria-controls="flush-collapseConsultations">
        Konsultacje
      </button>
    </h2>
    <div id="flush-collapseConsultations" class="accordion-collapse collapse" aria-labelledby="flush-headingConsultations" data-bs-parent="#accordion-profile">
      <div class="accordion-body">
      <form class="form-expert-profile-tm" id="form-expert-consultations" action="" method="POST">
            @csrf
            <textarea id="textarea-expert-consultations" name="content" height="400px">
            {{ $expert->consultations }}
            </textarea>
            <input type="hidden" name="id" value="{{ $expert->id }}">
            <input type="hidden" name="category" value="consultations" >
            @error('content')
            <div>{{ $message }}</div>
            @enderror
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form> 
       </div>
    </div>
  </div>
  </div>
</div>

@endsection