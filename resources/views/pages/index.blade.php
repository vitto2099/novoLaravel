<x-app>
    <div class="container mt-4">
        {{-- Um banner simples de boas-vindas --}}
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-8 px-0">
                <h1 class="display-4 fst-italic">Bem-vindo à nossa Loja</h1>
                <p class="lead my-3">Confira abaixo os nossos produtos mais recentes cadastrados por nossos administradores.</p>
            </div>
        </div>

        <h2 class="pb-2 border-bottom">Nossos Produtos</h2>

        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
            
            @forelse ($produtos as $produto)
                <div class="col">
                    <div class="card shadow-sm h-100">
                        
                        @if ($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="{{ $produto->nome }}">
                        @else
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Sem Imagem</text></svg>
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($produto->descricao, 100) }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="text-body-secondary fs-5 fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                                <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-outline-secondary">Ver Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Nenhum produto cadastrado no momento.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app>