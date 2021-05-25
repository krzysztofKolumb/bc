<div>
<header class="flex">
    <div class="wrapper flex">
        <h2>Kontakt</h2>
    </div>
</header>

<section class="contact-section">

<table class="table table-borderless">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col"></th>
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="th-iteration" scope="row">1</th>
                <td class="th-flex">
                <ul class="contact-basic-info">
                    <li>
                        <p>Nazwa: </p>
                        <p>{{ $contact->name }}</p>
                    </li>
                    <li>
                        <p>Ulica: </p>
                        <p>{{ $contact->street }}</p>
                    </li>
                    <li>
                        <p>Miasto: </p>
                        <p>{{ $contact->city }}</p>
                    </li>
                    <li>
                        <p>Nr telefonu: </p>
                        <p>{{ $contact->phone }}</p>
                    </li>
                    <li>
                        <p>E-mail: </p>
                        <p>{{ $contact->email }}</p>
                    </li>
                    <li>
                        <p>Czynne pon.-pt: </p>
                        <p>{{ $contact->open_week }}</p>
                    </li>
                    <li>
                        <p>Czynne sobota:</p>
                        <p>{{ $contact->open_sat }}</p>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'basic', 'info' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">2</th>
                <td class="th-flex">
                <ul class="contact-basic-info">
                    <li>
                        <p>Facebook: </p>
                        <p>{{ $contact->facebook }}</p>
                    </li>
                    <li>
                        <p>Instagram: </p>
                        <p>{{ $contact->instagram }}</p>
                    </li>
                    <li>
                        <p>Zapisy on-line: </p>
                        <p>{{ $contact->online_registration }}</p>
                    </li>
                    <li>
                        <p>Wyniki on-line: </p>
                        <p>{{ $contact->online_test_results }}</p>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'basic', 'links' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <!-- <tr>
                <th class="th-iteration" scope="row">3</th>
                <td class="th-flex">
                <ul class="contact-basic-info">
                    <li>
                        <p>Mapa: </p>
                        <p>{{ $contact->map }}</p>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'basic', 'map' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr> -->
            <tr>
                <th class="th-iteration" scope="row">3</th>
                <td class="th-flex">
                <ul class="contact-desc">
                    <li>
                        <p class="field-1">Lokalizacja: </p>
                        <div>{!! $contact->location !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'editor', 'location' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">4</th>
                <td class="th-flex">
                <ul class="contact-desc">
                    <li>
                        <p class="field-1">Dojazd: </p>
                        <div>{!! $contact->access !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'editor', 'access' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">5</th>
                <td class="th-flex">
                <ul class="contact-desc">
                    <li>
                        <p class="field-1">Parking: </p>
                        <div>{!! $contact->parking !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'editor', 'parking' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">6</th>
                <td class="th-flex">
                <ul class="contact-desc">
                    <li>
                        <p class="field-1">Dane Przychodni: </p>
                        <div>{!! $contact->info !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'editor', 'info' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">7</th>
                <td class="th-flex">
                <ul class="contact-desc">
                    <li>
                        <p class="field-1">Uwagi i sugestie: </p>
                        <div>{!! $contact->suggestions !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="selectedItem( 'editor', 'suggestions' )" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<div class="modal fade" wire:ignore.self id="contact-modal" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kontakt</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @if($item =="info")
            <div class="row mb-3">
                <label for="contactName"  class="col-sm-3 col-form-label">Nazwa*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.name" class="form-control" id="contactName" required>
                @error('contact.name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="contactStreet"  class="col-sm-3 col-form-label">Ulica*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.street" class="form-control" id="contactStreet" required>
                @error('contact.street') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactCity"  class="col-sm-3 col-form-label">Miasto*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.city" class="form-control" id="contactCity" required>
                @error('contact.city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactPhone" class="col-sm-3 col-form-label">Telefon*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.phone" class="form-control" id="contactPhone" required>
                @error('contact.phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactEmail"  class="col-sm-3 col-form-label">E-mail*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.email" class="form-control" id="contactEmail" required>
                @error('contact.email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactOpenWeek"  class="col-sm-3 col-form-label">Czynne pon.-pt.*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.open_week" class="form-control" id="contactOpenWeek" required>
                @error('contact.open_week') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactOpenSat"  class="col-sm-3 col-form-label">Czynne sb.*</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.open_sat" class="form-control" id="contactOpenSat" required>
                @error('contact.open_sat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif
            @if($item =="links")
            <div class="row mb-3">
                <label for="contactFacebook" class="col-sm-3 col-form-label">Facebook</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.facebook" class="form-control" id="contactFacebook">
                @error('contact.facebook') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="contactInstagram" class="col-sm-3 col-form-label">Instagram</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.instagram" class="form-control" id="contactInstagram">
                @error('contact.instagram') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactOnlineReg" class="col-sm-3 col-form-label">Zapisy online</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.online_registration" class="form-control" id="contactOnlineReg">
                @error('contact.online_registration') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> 
            <div class="row mb-3">
                <label for="contactOnlineResults" class="col-sm-3 col-form-label">Wyniki online</label>
                <div class="col-sm-9">
                <input type="text" wire:model="contact.online_test_results" class="form-control" id="contactOnlineResults">
                @error('contact.online_test_results') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif  
        </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="update" class="btn btn-primary">Zapisz zmiany</button>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="contact-content-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form id="contact-form">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modal_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <div>
                        <textarea class="form-control editor" name="content" wire:model.defer="content" id="textarea_contact" rows="6">
                            {{ $content }}
                        </textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
  </div>
</div>

</div>
