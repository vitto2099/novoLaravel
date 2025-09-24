<x-app :pageTitle="$pageTitle">
    <h1>Formulário de Contato</h1>
    <p>Tem alguma dúvida ou sugestão? Preencha o formulário abaixo.</p>

    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Sua Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    </form>
</x-app>