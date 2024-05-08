<h1>Duvida {{ $support->id }}</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
    {{-- <input type="hidden" value="PUT" name="_method"> --}}

    @csrf()
    @method('put')

    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">
        {{ $support->body }}
    </textarea>
    <button type="submit">Enviar</button>
</form>