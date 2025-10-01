<x-app :pageTitle="$pageTitle">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mensagens Recebidas</h1>
        <span class="badge bg-primary rounded-pill">{{  }}</span>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mensagem</th>
                            <th scope="col">Recebido em</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <th scope="row">{{  }}</th>
                                <td>{{  }}</td>
                                <td>{{  }}</td>
                                <td>{{  }}</td>
                                <td>{{ }}</td>
                            </tr>
                      
                            <tr>
                                <td colspan="5" class="text-center">Nenhuma mensagem recebida ainda.</td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>