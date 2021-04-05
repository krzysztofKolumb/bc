@extends('layouts.app')
@section('content')
 <div>
    <h1>{{ $employee->degree->name }} {{ $employee->firstname }} {{ $employee->lastname }}</h1>
    <p>Tytył strony: {{ $employee->page->title }}</p>
    <p>Opis strony: {{ $employee->page->description }}</p>
    <p>Słowa kluczowe strony: {{ $employee->page->keywords }}</p>
    <P>Specjalizacje: 
    @foreach($employee->specialties as $specialty)
        <span>{{$specialty->name}}, </span>
    @endforeach
    </p>
 </div>
 <img src="{{url('storage/photos/kuchnia.jpg')}}" width="200px"/>

 @endsection

@section('title')
Zespół/{{ $employee->page->title }}
@endsection