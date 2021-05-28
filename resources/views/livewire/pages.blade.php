<div>
<header class="flex bcg border-b">
    <div class="wrapper flex">
        @if($page->id == 1)
        <h2>Strona główna</h2>
        @else
        <h2>{{ $page->title }}</h2>
        @endif
    </div>
</header>

<section>
    <ul class="sections-list wrapper">
        @foreach($page->sections as $section)
        <li>
            <article>
                <header class="main-header flex">
                    <h3># {{$section->name}}</h3>
                    @if( count($section->articles) > 0)
                    <button type="button" wire:click="createArticle( {{$section->id}} )" class="btn btn-primary">Dodaj część</button>
                    @endif
                </header>
                <div class=" part part-1 flex">
                    <div class="part-wrapper">
                        <div class="flex-s">
                            <h3>Tytuł: </h3>
                            <p>{{$section->title}}</p>
                        </div>
                        <div class="flex-s">
                            <h3>Podtytuł: </h3>
                            <p>{{$section->subtitle}}</p>
                        </div>
                        <div class="flex-s">
                            <h3>Nagłówek: </h3>
                            <p>{{$section->header}}</p>
                        </div>
                        @if(count($section->articles)  < 1 )
                        <div class="flex-s">
                            <h3>Opis: </h3>
                            <p>{{$section->content}}</p>
                        </div>
                        @endif
                    </div>
                    <div>
                        <button type="button" wire:click="selectedItem( {{$section->id}} , 'section' )" title="Edytuj">
                            <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                        </button>
                    </div>
                </div>
                @foreach($section->articles as $article)
                <div class="part">
                    <div>
                        <header class="flex part-header">
                            <div><h4>Opis | Część {{$loop->iteration}}</h4></div>
                            @if($loop->iteration > 1)
                            <button type="button" wire:click="openDeleteModal( {{$article->id}}, 'delete-article', '' )" title="Usuń">
                                <img width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                            </button>  
                            @endif
                        </header>
                        <div class="part-flex">
                            <div class="part-content">
                                <h3>Układ: </h3>
                                <div>{{$article->layout->name}}</div>
                            </div>
                            <div> 
                                <button type="button" wire:click="selectedItem( {{$article->id}} , 'layout' )" title="Edytuj">
                                    <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                                </button>
                            </div>
                        </div>

                        <div class="part-flex">
                            <div class="part-content">
                                <h3>Tekst: </h3>
                                <div class="text">{!! $article->content !!}</div>
                            </div>
                            <div>
                                <button type="button" wire:click="selectedItem( {{$article->id}} , 'text' )" title="Edytuj">
                                    <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                                </button>
                            </div>
                        </div>

                        <div class="part-flex">
                            <div class="part-content">
                                <h3>Obrazy: </h3>
                                <div class="part-img">
                                <ul class="part-gallery">
                                    @if($article->layout->size == 1)

                                        @if($article->img_1)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_1 )}}">
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_1')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button> 
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_1')">Usuń</button> -->
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_1')">Dodaj</button>
                                        </li>
                                        @endif

                                    @endif

                                    @if($article->layout->size == 2)

                                        @if($article->img_1)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_1 )}}">
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_1')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button>  
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_1')">Usuń</button> -->
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_1')">Dodaj</button>
                                        </li>
                                        @endif
                                        @if($article->img_2)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_2 )}}">
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_2')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button>  
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_2')">Usuń</button> -->
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_2')">Dodaj</button>
                                        </li>
                                        @endif

                                    @endif

                                    @if($article->layout->size > 2)

                                        @if($article->img_1)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_1 )}}">
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_1')">Usuń</button> -->
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_1')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button>  
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_1')">Dodaj</button>
                                        </li>
                                        @endif
                                        @if($article->img_2)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_2 )}}">
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_2')">Usuń</button> -->
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_2')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button>  
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_2')">Dodaj</button>
                                        </li>
                                        @endif

                                        @if($article->img_3)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_3 )}}">
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_3')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button>  
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_3')">Usuń</button> -->
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_3')">Dodaj</button>
                                        </li>
                                        @endif
                                        @if($article->img_4)
                                        <li>
                                            <img src="{{url('storage/img/' . $article->img_4 )}}">
                                            <button type="button" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_4')" title="Usuń">
                                                <img class="icon-img" width="30px" src="{{url('storage/img/icon-trash.png')}}" >
                                            </button>
                                            <!-- <button type="button" class="btn btn-primary" wire:click="openDeleteModal({{$article->id}}, 'delete-img', 'img_4')">Usuń</button> -->
                                        </li>
                                        @else
                                        <li>
                                            <button type="button" class="btn btn-primary" wire:click="addPicture({{$article->id}}, 'img_4')">Dodaj</button>
                                        </li>
                                        @endif

                                    @endif

                                </ul>
                                </div>
                            </div>
                            <div>
                                <button type="hidden"></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </article>
        </li>
        @endforeach
        <li>
            <article>
                <header class="main-header flex">
                    <h3># Metadane</h3>
                </header>
                <div class=" part part-1 flex">
                    <div class="part-wrapper">
                        <div class="flex-s">
                            <h3>Tytuł strony:</h3>
                            <p>{{ $page->meta_title }}</p>
                        </div>
                        <div class="flex-s">
                            <h3>Opis strony: </h3>
                            <p>{{ $page->meta_description }}</p>
                        </div>
                    </div>
                    <div>
                        <button data-toggle="modal" data-target="#metadata-modal" type="button" title="Edytuj">
                            <img width="30px" src="{{url('storage/img/icon-edit.png')}}" >
                        </button>
                    </div>
                </div>
            </article>
        </li>
    </ul>
</section>

  <div class="modal fade" wire:ignore.self id="section-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $modal_title }}</h5>
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
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Nagłówek:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model="section.header" id="section_header" rows="3">
                        {{ $section->header }}
                    </textarea>
                    @error('section.header') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @if( $itemsNo < 1 )
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Opis:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model="section.content" id="section_content" rows="6">
                        {{ $section->content }}
                    </textarea>
                    @error('section.content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary" wire:click="update('section')">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="article-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form id="article-form">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modal_title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <div>
                        <textarea class="form-control editor" name="content" wire:model.defer="article.content" id="textarea_article" rows="6">
                            {{ $article->content }}
                        </textarea>
                        @error('article.content') <span class="text-danger">{{ $message }}</span> @enderror
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

<div class="modal fade" wire:ignore.self id="layout-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Układ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

            <div class="layouts-list">
                @foreach($layouts as $layout)
                <div class="form-check">
                    <input class="form-check-input" wire:model="article.layout_id" name="layout" id="layout-{{$layout->id}}" value="{{$layout->id}}" required type="radio">
                    <label class="form-check-label" for="layout-{{$layout->id}}"><p>{{$layout->name}}</p></label>
                </div>
                @endforeach
                @error('article.layout_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
                <button type="submit" wire:click="updateLayout" class="btn btn-primary">Zapisz</button>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Dodaj zdjęcie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <div class="file-input">
                    <input type="file" wire:model="file" id="file" accept="image/*" name="file" class="file">
                    <label for="file">Wybierz plik</label>
                </div>
                @if($name)<p>{{ $name }}</p>@endif
                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                @error('unique') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="documentTitle" class="col-form-label">Nazwa*</label>
                <input type="text" wire:model="file_name" class="form-control" id="documentTitle" required>
                @error('file_name') <span class="text-danger" id="name-error">{{ $message }}</span> @enderror
                @error('uniqueName') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Anuluj</button>
            <button type="submit" wire:click="savePicture" class="btn btn-primary">Zapisz</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($action == 'delete-article')
                <h4>Czy na pewno chcesz trwale usunąć zaznaczoną część?</h4>
                @endif
                @if($action == 'delete-img')
                <h4>Czy na pewno chcesz trwale usunąć ten obraz?</h4>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anuluj</button>
                @if($action == 'delete-article')
                <button type="submit" wire:click="deleteArticle" class="btn btn-primary">Usuń</button>
                @endif
                @if($action == 'delete-img')
                <button type="submit" wire:click="deleteImg" class="btn btn-primary">Usuń</button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Metadane -->
<div class="modal fade" wire:ignore.self id="metadata-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Metadane</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
                <label for="meta_title" class="col-sm-2 col-form-label">Tytuł strony</label>
                <div class="col-sm-9">
                    <input class="form-control" wire:model="meta_title" id="meta_title" rows="3">
                    @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Opis strony</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model.defer="meta_description" id="p_meta_description" rows="3">
                        {{ $meta_description }}
                    </textarea>
                    @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
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

  <!-- <div class="modal fade" wire:ignore.self id="section-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $modal_title }}</h5>
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
            <div class="row mb-3">
                <label for="tue" class="col-sm-2 col-form-label">Nagłówek:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" wire:model="section.header" id="section_header" rows="3">
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
</div> -->

<!-- <div class="modal fade" wire:ignore.self id="section-modal-editor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $modal_title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form id="section-form">
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="section_title" class="col-sm-2 col-form-label">Tytuł:</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="title" wire:model.defer="section.title" id="section_title" rows="3">
                        @error('section.title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="section_subtitle" class="col-sm-2 col-form-label">Podtytuł:</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="subtitle" wire:model.defer="section.subtitle" id="section_subtitle" rows="3">
                        @error('section.subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tue" class="col-sm-2 col-form-label">Nagłówek:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="header" wire:model.defer="section.header" id="section_header" rows="3">
                            {{ $section->header }}
                        </textarea>
                        @error('section.header') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <label for="tue">Treść:</label>
                    <div>
                        <textarea class="form-control editor" name="content" wire:model.defer="section.content" id="textarea_section" rows="6">
                            {{ $section->content }}
                        </textarea>
                        @error('section.content') <span class="text-danger">{{ $message }}</span> @enderror
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
</div> -->


</div>
