<h1>Listagem de Suportes</h1>

<a href="{{ route('supports.create') }}">Criar Duvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    {{--  <a href="{{ route('admin.supports.edit', $support->id) }}">Editar</a>
                    <a href="{{ route('admin.supports.destroy', $support->id) }}">Excluir</a> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>