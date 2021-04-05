@extends('layouts.page')

@section('title')
{{ $expert->page->title }}
@endsection

@section('main')
<h1>{{ $expert->firstname }} {{ $expert->lastname }}</h1>

<ul>
    @foreach($expert->specialties as $specialty)
            <li>
                <h4>{{ $specialty->name }} </h4>
            </li>
    @endforeach
</ul>


@endsection