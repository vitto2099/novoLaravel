<x-app>
    <div class="container mt-4">
        <h2>Clientes</h2>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Nome</th><th>Email</th><th>CPF</th><th>Cidade</th><th>UF</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->nome }} {{ $c->sobrenome }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->cpf }}</td>
                    <td>{{ $c->cidade }}</td>
                    <td>{{ $c->uf }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app>