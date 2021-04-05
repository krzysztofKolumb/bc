<div>
    <form action="" method="POST">
    @csrf

        <textarea id="textarea" name="content"></textarea>

        @error('content')
        <div>{{ $message }}</div>
        @enderror

        <button type="submit">Zapiszzzzzzzzzzz</button>
    </form> 
</div>