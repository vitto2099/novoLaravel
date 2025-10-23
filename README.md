#  Projeto de Gestão Empresarial

> Sistema de gerenciamento empresarial desenvolvido com Laravel e MySQL para a disciplina de Desenvolvimento Web II

##  Sobre o Projeto

Este projeto implementa a camada de persistência de dados de um sistema de gestão empresarial completo, incluindo:

- Models e Migrations para clientes e produtos
- Formulário de cadastro com integração ViaCEP
- Área administrativa com upload de imagens
- Validação e testes com Tinker

---

##  Estrutura do Banco de Dados

### Configuração Inicial

Configure o arquivo `.env` com as credenciais do MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

Execute as migrations:
```bash
php artisan migrate
```

###  Tabela: Clientes

| Campo | Tipo | Observação |
|-------|------|------------|
| nome | string | - |
| sobrenome | string | - |
| cpf | string | único |
| email | string | único |
| cep | string | - |
| logradouro | string | - |
| bairro | string | - |
| cidade | string | - |
| uf | string | 2 caracteres |

**Model:** `Cliente.php`

###  Tabela: Produtos

| Campo | Tipo | Observação |
|-------|------|------------|
| nome | string | - |
| descricao | text | - |
| preco | decimal | - |
| imagem | string | caminho da imagem |

**Model:** `Produto.php`

---

##  Cadastro de Clientes

### Formulário

**Localização:** `resources/views/pages/cadastro.blade.php`

O formulário utiliza Bootstrap para estilização:
- Classes: `form-control`, `form-label`, `mb-3`
- Layout responsivo e intuitivo

###  Integração com ViaCEP

O sistema preenche automaticamente os campos de endereço ao digitar o CEP:
```javascript
// Evento onblur no campo CEP
// Preenche: logradouro, bairro, cidade, uf
```

**Troubleshooting:** Se o preenchimento não funcionar, limpe o cache:
```bash
php artisan view:clear
```

### Validações Implementadas

- ✔️ CPF único no banco de dados
- ✔️ Email único no banco de dados
- ✔️ Todos os campos obrigatórios preenchidos
- ✔️ Formato válido de CEP

### Testando com Tinker
```bash
php artisan tinker
```
```php
// Listar todos os clientes
App\Models\Cliente::all();

// Buscar cliente específico
App\Models\Cliente::find(1);
```

---

##  Área Administrativa

### Listagem de Clientes

**Rota:** `/admin/clientes`  
**View:** `resources/views/pages/admin/clientes/index.blade.php`

Tabela estilizada com:
- `table`
- `table-striped`
- `table-hover`

###  Cadastro de Produtos

**Rota:** `/admin/produtos/create`

#### Upload de Imagens
```bash
# Criar link simbólico para storage público
php artisan storage:link
```

**Diretório de armazenamento:** `storage/app/public/products`

#### Validações de Upload

- Tipos permitidos: jpg, jpeg, png
- Tamanho máximo configurável
- Validação de dados obrigatórios

### Exibição Pública de Produtos

**Rota:** `/produtos/{id}`  
**View:** `resources/views/pages/produtos/show.blade.php`

Exibição com Bootstrap Cards incluindo:
-  Imagem do produto
-  Nome e descrição
-  Preço formatado


## Rotas Disponíveis

| Descrição | URL |
|-----------|-----|
| Cadastro de Cliente | `http://127.0.0.1:8000/cadastro` |
| Listar Clientes | `http://127.0.0.1:8000/admin/clientes` |
| Cadastrar Produto | `http://127.0.0.1:8000/admin/produtos/create` |
| Listar Produtos | `http://127.0.0.1:8000/admin/produtos` |


## Referências e Fontes

### Integração ViaCEP
- [MatheusAlvarez/API-ViaCEP](https://github.com/MatheusAlvarez/API-ViaCEP) - Referência para consumo da API
- [viniciussanchez/viacep](https://github.com/viniciussanchez/viacep) - Estrutura de retorno da API
- [Exemplo JavaScript ViaCEP](https://viacep.com.br/exemplo/javascript/) - Base para o preenchimento automático

### Documentação Laravel
- [Validation](https://laravel.com/docs/10.x/validation) - Validações de formulário
- [File Storage](https://laravel.com/docs/10.x/filesystem) - Upload e armazenamento de arquivos

### Tutoriais em Vídeo
- [File Upload in Laravel](https://www.youtube.com/watch?v=xN-CF7dzeyM) - Upload com validação
- [Configurar MySQL no Laravel](https://www.youtube.com/watch?v=MvTQyeuKuCw) - Configuração do `.env`

### Ferramentas
- [Laravel Tinker Guide](https://magecomp.com/blog/laravel-tinker/) - Testes via Tinker


## 🛠️ Comandos Úteis
```bash
# Limpar cache de views
php artisan view:clear

# Executar migrations
php artisan migrate

# Criar link simbólico do storage
php artisan storage:link

# Abrir Tinker
php artisan tinker
```

##  Problemas Conhecidos e Soluções

### Views não atualizando
**Solução:**
```bash
php artisan view:clear
```

### Imagens não aparecem
**Solução:**
```bash
php artisan storage:link
```