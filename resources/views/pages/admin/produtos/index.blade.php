<x-app>
    <div class="container mt-4">
        <h2>Produtos Cadastrados</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.produtos.create') }}" class="btn btn-primary">Cadastrar Novo Produto</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>
                        @if($p->imagem)
                            <img src="{{ asset('storage/'.$p->imagem) }}" alt="{{ $p->nome }}" style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <span class="text-muted" style="font-size: 0.8rem;">Sem imagem</span>
                        @endif
                    </td>
                    <td>{{ $p->nome }}</td>
                    <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhum produto cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app>