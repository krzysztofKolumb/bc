@extends('admin.app')

@section('content')

<h2>Badania kliniczne</h2>
<h5>Kategorie</h5>
<br><br>

@livewire('clinical-trial-categories')


<!-- <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Liczba badań</th>
        <th scope="col">Opcje</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->clinicalTrials->count() }}</td>
            <td>
                <button type="submit" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="">Usuń</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table> -->

@endsection