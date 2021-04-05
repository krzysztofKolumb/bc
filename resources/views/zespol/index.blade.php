@extends('layouts.app')
@section('content')
<div class="blog-post">

<!-- <img src="{{url('storage/photos/kuchnia.jpg')}}" width="200px"/> -->
<!-- <img src="{{url('storage/photos/logo.png')}}"/> -->

<!-- <livewire:counter /> -->
<livewire:uploads />

<!-- <livewire:upload-photo /> -->



                <h3>Lekarze</h3>
                <ul class="list-group">
                    @foreach($employees as $employee)
                    @if ($employee->team_id === 1)
                    <li class="list-group-item">
                        <a href="{{ route('zespol.show', [$employee->slug]) }}">
                            <h4>{{ !empty($employee->degree->name) ? $employee->degree->name:'' }} {{ $employee->firstname }} {{ $employee->lastname }}</h4>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <h3>Dietetycy</h3>
                <ul class="list-group">
                    @foreach($employees as $employee)
                    @if ($employee->team_id === 2)
                    <li class="list-group-item"><h4>{{ !empty($employee->degree->name) ? $employee->degree->name:'' }} {{ $employee->firstname }} {{ $employee->lastname }}</h4>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <h3>Fizjoterapeuci</h3>
                <ul class="list-group">
                    @foreach($employees as $employee)
                    @if ($employee->team_id === 3)
                    <li class="list-group-item"><h4>{{ !empty($employee->degree->name) ? $employee->degree->name:'' }} {{ $employee->firstname }} {{ $employee->lastname }}</h4>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <h3>Psycholodzy</h3> 
                <ul class="list-group">
                    @foreach($employees as $employee)
                    @if ($employee->team_id === 4)
                    <li class="list-group-item"><h4>{{ !empty($employee->degree->name) ? $employee->degree->name:'' }} {{ $employee->firstname }} {{ $employee->lastname }}</h4>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <h3>Recepcja</h3> 
                <ul class="list-group">
                    @foreach($employees as $employee)
                    @if ($employee->team_id === 5)
                    <li class="list-group-item"><h4>{{ !empty($employee->degree->name) ? $employee->degree->name:'' }} {{ $employee->firstname }} {{ $employee->lastname }}</h4>
                    </li>
                    @endif
                    @endforeach
                </ul> 
            </div>
@endsection

@section('title')
{{ $title }}
@endsection

@livewireScripts
<script>
        // Livewire.on('fileUploaded', () => {
        //     $('#form-upload')[0].reset();
        // })

        Livewire.on('fileUploaded', ()=> {
    alert('A post was added with the id of: ');
    document.getElementById('form-upload').reset();

})

        // window.addEventListener('say-goodbye', event => {
        //         alert( event.detail.name );
        //     $('#form-upload')[0].reset();});

</script>  