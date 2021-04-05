<!-- <div>
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
</div> -->

<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>

    <ul>
        @foreach($employees as $employee)
            <li>{{ $employee->lastname }}</li>
        @endforeach
    </ul>
</div>
