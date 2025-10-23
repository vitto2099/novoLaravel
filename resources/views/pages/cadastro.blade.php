<x-app>
    <div class="container mt-4">
        <h2>Cadastro de Cliente</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('cadastro.store') }}" method="POST" id="form-cadastro">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome</label>
                    <input name="nome" class="form-control" value="{{ old('nome') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sobrenome</label>
                    <input name="sobrenome" class="form-control" value="{{ old('sobrenome') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">CPF</label>
                    <input name="cpf" class="form-control" value="{{ old('cpf') }}" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">CEP</label>
                    <input id="cep" name="cep" class="form-control" value="{{ old('cep') }}" required onblur="buscarCep(this.value)">
                </div>
                <div class="col-md-9 mb-3">
                    <label class="form-label">Logradouro</label>
                    <input id="logradouro" name="logradouro" class="form-control" value="{{ old('logradouro') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bairro</label>
                    <input id="bairro" name="bairro" class="form-control" value="{{ old('bairro') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Cidade</label>
                    <input id="cidade" name="cidade" class="form-control" value="{{ old('cidade') }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">UF</label>
                    <input id="uf" name="uf" class="form-control" value="{{ old('uf') }}">
                </div>
            </div>

            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    {{-- Este bloco envia o script do ViaCEP para o @stack('scripts') no layout --}}
    @push('scripts')
    <script>
    async function buscarCep(cep) {
        cep = cep.replace(/\D/g,'');
        if (!cep) return;
        try {
            const res = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            if (!res.ok) throw new Error('Erro na requisição ViaCEP');
            const data = await res.json();
            if (data.erro) {
                console.warn('CEP não encontrado');
                return;
            }
            document.getElementById('logradouro').value = data.logradouro || '';
            document.getElementById('bairro').value = data.bairro || '';
            document.getElementById('cidade').value = data.localidade || '';
            document.getElementById('uf').value = data.uf || '';
        } catch (err) {
            console.error("Erro ao buscar CEP:", err);
        }
    }
    </script>
    @endpush

</x-app>