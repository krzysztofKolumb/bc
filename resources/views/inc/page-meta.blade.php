@section('meta_title')
{{ $page->meta_title }}
@endsection

@section('description')
{{ $page->meta_description }}
@endsection

@section('keywords')
{{ $page->keywords }}
@endsection

@section('title')
{{ $page->section->title }}
@endsection

@section('subtitle')
{{ $page->section->subtitle }}
@endsection

@section('name')
{{ $page->name }}
@endsection