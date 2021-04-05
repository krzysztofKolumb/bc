@extends('admin.app')


@section('content')
<section class="content">
<nav>
<a href="{{ route('admin-experts-create') }}" class="btn btn-primary" tabindex="-1" role="button">Nowy ekspert</a>
<!-- <a href="{{ route('admin-experts-create') }}">Nowy Ekspert</a> -->
</nav>

</section>

@endsection