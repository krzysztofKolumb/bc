@extends('admin.app')


@section('content')
<section class="content">

    <ul class="home-panel-list">
        <li>
            <a href="{{ route('admin-experts') }}" type="button" class="btn btn-block btn-primary" data-dismiss="modal">Specjaliści</a>
            <a href="{{ route('admin-specialties')}}" type="button" class="btn btn-block btn-primary" data-dismiss="modal">Specjalizacje</a>
            <a href="{{ route('admin-news') }}" type="button" class="btn btn-block btn-outline-primary" data-dismiss="modal">Aktualności</a>
            <a href="{{ route('admin-contact') }}" type="button" class="btn btn-block btn-outline-primary" data-dismiss="modal">Kontakt</a>
        </li>
        <li>
            <div class="flex">
                <p>Specjaliści</p>
                <p>{{ count($experts) }} specjalistów</p>
            </div>
            <div class="flex">
                <p>Specjalizacje</p>
                <p> {{ count($specialties) }} specjalizacje</p>
            </div>
            <div class="flex">
                <p>Aktualności</p>
                <p>{{ count($posts) }} wpisy</p>
            </div>
            <div class="flex">
                <p>Badania kliniczne</p>
                <p>{{ count($trials) }} badań</p>
            </div>
        </li>
    </ul>

</section>
@endsection