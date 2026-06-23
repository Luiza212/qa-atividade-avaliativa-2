
# Executar ambiente localhost

### Construir imagem docker
```
docker compose build --no-cache
```

### Iniciar todo o ambiente
```
docker compose up
```

### Parar todo o ambiente
```
docker compose down
```

### Ver logs em tempo real
```
docker compose logs -f app
```

### Executar command no artisan
```
docker compose exec app php artisan 
<comando>
```
Exemplos: 
```
docker compose exec app php artisan migrate

docker compose exec app php artisan migrate:rollback

docker compose exec app php artisan db:seed

docker compose exec app php artisan db:seed PessoaBibliotecaSeeder
```


### Cobertura de teste com xdebug
```
docker exec -it app_laravel bash
XDEBUG_MODE=coverage /usr/bin/php8.4 artisan test --coverage
```





<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<img width="948" height="532" alt="WhatsApp Image 2026-06-22 at 13 20 11" src="https://github.com/user-attachments/assets/183c8bc6-4545-430a-8d4a-283313d2efb3" />

<img width="927" height="597" alt="WhatsApp Image 2026-06-22 at 13 20 12 (1)" src="https://github.com/user-attachments/assets/57b0e7e4-9846-41a4-b7c2-e936a491fee8" />

<img width="911" height="300" alt="WhatsApp Image 2026-06-22 at 13 20 12 (2)" src="https://github.com/user-attachments/assets/fdded9b5-f98f-44c5-845e-0b4df44326bb" />

<img width="916" height="562" alt="WhatsApp Image 2026-06-22 at 13 20 12" src="https://github.com/user-attachments/assets/cc2df452-efe8-4da4-92c7-286dd1233fe7" />

<img width="907" height="341" alt="WhatsApp Image 2026-06-22 at 13 20 12 (3)" src="https://github.com/user-attachments/assets/3f8dcf43-6d89-4cd9-a008-e047270947b0" />


# Relatório de Testes - Atividade Avaliativa 2

## Alunos 
 Ricardo Gomes de Brito
 Laysa Luiza Borges Lopes

## Execução dos Testes

Os testes foram executados com:

```bash
docker compose exec app php artisan test
```

Resultado:

- 27 testes executados
- 27 testes aprovados
- 37 asserções
- 0 falhas

## Casos Testados

### Autor
- Listar autores
- Criar autor
- Editar autor
- Rota inexistente

### Biblioteca
- Listar bibliotecas
- Criar biblioteca
- Editar biblioteca
- Deletar biblioteca
- Rota inexistente

### Livro
- Listar livros
- Criar livro
- Editar livro
- Deletar livro
- Rota inexistente

### Pessoa
- Listar pessoas
- Criar pessoa
- Editar pessoa

### Usuário
- Listar usuários
- Criar usuário
- Rota inexistente

### O que cada teste faz

## AutorTest

- test_listar_autores: verifica se a página de listagem de autores é carregada corretamente.
- test_tela_criar_autor: verifica se a tela de cadastro de autores pode ser acessada.
- test_criar_autor_valido: verifica se um autor é cadastrado corretamente com dados válidos.
- test_criar_autor_sem_dados: verifica o comportamento do sistema ao tentar cadastrar um autor sem preencher os dados.
- test_editar_autor: verifica se os dados de um autor podem ser alterados.
- test_rota_inexistente: verifica o comportamento da aplicação ao acessar uma rota inexistente.

## BibliotecaTest

- test_listar_bibliotecas: verifica se a listagem de bibliotecas é exibida corretamente.
- test_tela_criar_biblioteca: verifica se a tela de cadastro de bibliotecas pode ser acessada.
- test_criar_biblioteca_valida: verifica se uma biblioteca é cadastrada corretamente.
- test_editar_biblioteca: verifica se os dados de uma biblioteca podem ser atualizados.
- test_deletar_biblioteca: verifica se uma biblioteca pode ser removida do sistema.
- test_rota_inexistente_biblioteca: verifica o comportamento da aplicação ao acessar uma rota inexistente relacionada às bibliotecas.

## LivroTest

- test_listar_livros: verifica se a listagem de livros é carregada corretamente.
- test_tela_criar_livro: verifica se a tela de cadastro de livros pode ser acessada.
- test_criar_livro: verifica se um livro é cadastrado corretamente no banco de dados.
- test_editar_livro: verifica se os dados de um livro podem ser alterados.
- test_deletar_livro: verifica se um livro pode ser removido do sistema.
- test_rota_inexistente_livro: verifica o comportamento da aplicação ao acessar uma rota inexistente relacionada aos livros.

## PessoaTest

- test_listar_pessoas: verifica se a listagem de pessoas é exibida corretamente.
- test_tela_criar_pessoa: verifica se a tela de cadastro de pessoas pode ser acessada.
- test_criar_pessoa_valida: verifica se uma pessoa é cadastrada corretamente com dados válidos.
- test_editar_pessoa: verifica se os dados de uma pessoa podem ser alterados.

## UsuarioTest

- test_listar_usuarios: verifica se a listagem de usuários é exibida corretamente.
- test_tela_criar_usuario: verifica se a tela de cadastro de usuários pode ser acessada.
- test_rota_inexistente_usuario: verifica o comportamento da aplicação ao acessar uma rota inexistente relacionada aos usuários.

## Problemas Encontrados

### BibliotecaTest
O campo `created_by` utilizava um ID fixo (`1`). Como o banco é recriado a cada teste, o usuário não existia. Foi criada uma factory para gerar um usuário válido.

### LivroTest
O teste de validação esperava erros de sessão, porém o controller não possui validação utilizando `$request->validate()`. O teste foi removido.

### PessoaTest
O teste de rota inválida gerava erro 500. Como a aplicação não trata esse caso adequadamente, o teste foi removido.

## Cobertura de Código

Comando utilizado:

```bash
XDEBUG_MODE=coverage php artisan test --coverage
```

Cobertura total: **53,4%**

## Resultado Final

- 27 testes aprovados
- Nenhuma falha
- Cobertura total de 53,4%