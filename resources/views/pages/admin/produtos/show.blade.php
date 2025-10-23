<x-app>
    <div class="container mt-4">
        <div class="card" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-4">
                    @if($produto->imagem)
                        <img src="{{ asset('storage/'.$produto->imagem) }}" class="img-fluid rounded-start" alt="{{ $produto->nome }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center" style="height:200px;">Sem imagem</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p class="card-text"><strong>R$ {{ number_format($produto->preco,2,',','.') }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>