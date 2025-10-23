<x-app>
    <div class="container mt-4">
        <h2>Novo Produto</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input name="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Preço</label>
                <input name="preco" class="form-control" value="{{ old('preco') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem</label>
                <input type="file" name="imagem" class="form-control">
            </div>
            <button class="btn btn-success">Salvar Produto</button>
        </form>
    </div>
</x-app>