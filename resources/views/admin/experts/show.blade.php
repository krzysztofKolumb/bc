@extends('admin.app')

@section('content')

<div>
@livewire('expert-edit', ['expert' => $expert])
</div>

@endsection