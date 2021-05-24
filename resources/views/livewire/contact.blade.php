<div>
<header class="flex">
    <div class="wrapper flex">
        <h2>Kontakt</h2>
    </div>
</header>

<section>

</section>



<table class="table table-borderless">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Dane kontaktowe</th>
            <!-- <th class="th-flex" scope="col">Wartość</th> -->
            <th class="th-options" scope="col">Opcje</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="th-iteration" scope="row">1</th>
                <td class="th-flex">
                <ul>
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
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">2</th>
                <td class="th-flex">
                <ul>
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
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">3</th>
                <td class="th-flex">
                <ul>
                    <li>
                        <p>Mapa: </p>
                        <p></p>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">4</th>
                <td class="th-flex">
                <ul>
                    <li>
                        <p>Lokalizacja: </p>
                        <div>{!! $contact->location !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">4</th>
                <td class="th-flex">
                <ul>
                    <li>
                        <p>Dojazd: </p>
                        <div>{!! $contact->access !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">5</th>
                <td class="th-flex">
                <ul>
                    <li>
                        <p>Parking: </p>
                        <div>{!! $contact->parking !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">6</th>
                <td class="th-flex">
                <ul>
                    <li>
                        <p>Dane Przychodni: </p>
                        <div>{!! $contact->info !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
            <tr>
                <th class="th-iteration" scope="row">7</th>
                <td class="th-flex">
                <ul>
                    <li>
                        <p>Uwagi i sugestie: </p>
                        <div>{!! $contact->suggestions !!}</div>
                    </li>
                </ul>
                </td>
                <td class="th-options">
                    <button type="button" wire:click="" title="Edytuj">
                        <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                    </button>
                </td>
            </tr>
        </tbody>
    </table>



</div>
