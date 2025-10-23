# Projeto Gestão Empresarial - Desenvolvimento Web II

## Descrição do Projeto

Este projeto tem como objetivo implementar a camada de persistência de dados de um sistema de gestão empresarial, utilizando **Laravel** e **MySQL**. Foram desenvolvidos:

- Models e Migrations para clientes e produtos;
- Formulário de cadastro de clientes integrado à API **ViaCEP**;
- Área administrativa para cadastro e listagem de produtos com upload de imagens;
- Testes com **Tinker** para validação dos dados persistidos.

---

## Parte 1: Estrutura do Banco de Dados (Models e Migrations)

### Configuração do Banco de Dados

- O arquivo `.env` foi configurado para conectar o Laravel a um banco de dados MySQL.
- Comando utilizado para criar as tabelas:  

```bash
php artisan migrate
Migration e Model de Clientes
Tabela clientes com os seguintes campos:

nome (string)

sobrenome (string)

cpf (string, único)

email (string, único)

cep (string)

logradouro (string)

bairro (string)

cidade (string)

uf (string, 2 caracteres)

Model correspondente: Cliente.php

Migration e Model de Produtos
Tabela produtos com os seguintes campos:

nome (string)

descricao (text)

preco (decimal)

imagem (string) – caminho da imagem do produto

Model correspondente: Produto.php

Parte 2: Cadastro de Clientes com Integração ViaCEP
Formulário de Cadastro
Local: resources/views/pages/cadastro.blade.php

Estilizado com Bootstrap (form-control, form-label, mb-3).

Integração ViaCEP
Ao digitar o CEP e sair do campo (onblur), os campos de logradouro, bairro, cidade e UF são preenchidos automaticamente via JavaScript.

Observação: O CEP agora funciona automaticamente após limpar o cache das views.

Controller e Lógica de Cadastro
Recebe os dados via POST.

Validações:

CPF e Email únicos na tabela clientes.

Campos obrigatórios preenchidos.

Salva os dados no banco e redireciona para a página de sucesso ou login.

Teste com Tinker
php artisan tinker

App\Models\Cliente::all();
App\Models\Cliente::find(1);
Parte 3: Área Administrativa - Cadastro e Listagem
Listagem de Clientes
Local: resources/views/pages/admin/clientes/index.blade.php

Tabela HTML estilizada com Bootstrap (table, table-striped, table-hover) exibindo todos os clientes cadastrados.

Cadastro de Produtos com Imagem
Formulário em: admin/produtos/create

Validação de dados e arquivo (tipo e tamanho).

Imagem salva em storage/app/public/products.

Caminho da imagem armazenado no campo imagem da tabela produtos.

Comando executado para disponibilizar publicamente as imagens:

bash
php artisan storage:link
Exibição de Produto na Área Pública
Controller busca o produto pelo id ou slug.

View: resources/views/pages/produtos/show.blade.php

Detalhes exibidos com Bootstrap Cards: imagem, nome, descrição e preço.

URLs de Teste
Cadastro de cliente: http://127.0.0.1:8000/cadastro

Lista de clientes: http://127.0.0.1:8000/admin/clientes

Cadastro de produto: http://127.0.0.1:8000/admin/produtos/create

Lista de produtos: http://127.0.0.1:8000/admin/produtos

Fontes de Pesquisa

https://github.com/MatheusAlvarez/API-ViaCEP
https://github.com/viniciussanchez/viacep

Documentação Oficial Laravel - Validation
https://laravel.com/docs/10.x/validation

Documentação Oficial Laravel - File Storage
https://laravel.com/docs/10.x/filesystem

File Upload in Laravel: Main Things You Need To Know
https://www.youtube.com/watch?v=xN-CF7dzeyM

Consumindo API ViaCEP com JavaScript
"Como usar ViaCEP com JavaScript" - https://viacep.com.br/exemplo/javascript/

Como configurar um banco de dados MySQL no Laravel
https://www.youtube.com/watch?v=MvTQyeuKuCw

LARAVEL 021 A IMPORTÂNCIA DAS CONFIGURAÇÕES NO ENV E NO DATABASE PHP
https://www.youtube.com/watch?v=MvTQyeuKuCw

Tinker
https://magecomp.com/blog/laravel-tinker/


Observações Finais
Alguns problemas nas views foram resolvidos limpando o cache:

bash
php artisan view:clear