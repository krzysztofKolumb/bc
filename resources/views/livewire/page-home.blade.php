<div>
<header class="flex">
    <h2>Strona główna</h2>
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

  <div class="modal fade" wire:ignore.self id="section-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $section->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <div class="row mb-3">
                <label for="section_title" class="col-sm-2 col-form-label">Tytuł:</label>
                <div class="col-sm-9">
                    <input class="form-control" wire:model="section.title" id="section_title" rows="3">
                    @error('section.title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="section_subtitle" class="col-sm-2 col-form-label">Podtytuł:</label>
                <div class="col-sm-9">
                    <input class="form-control" wire:model="section.subtitle" id="section_subtitle" rows="3">
                    @error('section.subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- <div class="row mb-3">
                <label for="section_header" class="col-sm-2 col-form-label">Nagłówek:</label>
                <div class="col-sm-9">
                    <input class="form-control" wire:model="section.header" id="section_header" rows="3">
                    @error('section.header') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div> -->
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Nagłówek:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model="section.header" id="section_geader" rows="3">
                        {{ $section->header }}
                    </textarea>
                    @error('section.header') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Treść:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model="section.content" id="section_content" rows="6">
                        {{ $section->content }}
                    </textarea>
                    @error('section.content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click="update">Zapisz</button>
      </div>
    </div>
  </div>
</div>

</div>
