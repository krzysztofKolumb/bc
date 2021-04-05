@extends('admin.app')

@section('content')

<h1>{{ $employee->firstname }} {{ $employee->lastname }}</h1>
<h4>{{ $employee->profession->name }}</h4>

@endsection