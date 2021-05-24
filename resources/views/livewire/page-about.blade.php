<div>
<header class="flex">
    <h2>O nas</h2>
</header>
  <br><br><br>

  <table class="table">
        <thead>
            <tr>
            <th class="th-iteration" scope="col">#</th>
            <th class="th-flex" scope="col">Sekcja</th>
            <!-- <th class="th-flex" scope="col">Podtytuł</th> -->
            <!-- <th class="th-flex" scope="col">Tytuł</th> -->
            <th class="th-flex" scope="col"></th>
            <th class="th-options" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <th class="th-iteration" scope="row">{{$loop->iteration}}.</th>
                <td><h6 class="th-flex">{{ $section->name }}</h6></td>
                <!-- <td class="th-flex">{{ $section->subtitle }}</td> -->
                <!-- <td class="th-flex">{{ $section->description }}</td> -->
                <td class="th-flex">
                    <ul class="td-content">
                        <li>
                            <h3>Tytuł: </h3>
                            <div>{{ $section->title }}</div>
                        </li>
                        <li>
                            <h3>Podtytuł: </h3>
                            <div>{{ $section->subtitle }}</div>
                        </li> 
                        <li>
                            <h3>Nagłówek: </h3>
                            <div>{{ $section->header }}</div>
                        </li> 
                        <li>
                            <h3>Treść: </h3>
                            <div>{!! $section->content !!}</div>
                        </li> 
                    </ul>           
                </td>
                <td class="th-options">
                  <button type="button" wire:click="selectedItem( {{$section->id}} , 'update' )" class="btn btn-outline-primary">Edycja</button>
                </td>
            </tr>
        @endforeach
        </tbody>
  </table>

</div>
