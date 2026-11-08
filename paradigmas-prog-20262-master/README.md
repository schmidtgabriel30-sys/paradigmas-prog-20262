### Setup do projeto

## Clonar repositório

```bash
git clone https://github.com/rafaelrotto/paradigmas-prog-20262.git
```

## Entrar na pasta do projeto
```bash
cd /paradigmas-prog-20262
```

## Instalar dependências

```bash
composer install --ignore-platform-reqs
```

## Copiar dados da env

```bash
cp .env.example .env
```


## Modificar dados do banco de dados na env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=paradigmas-prog
DB_USERNAME=root
DB_PASSWORD=
```

## Rodar migrations
```bash
php artisan migrate
```

## Rodar aplicação
```bash
php artisan serve --port=8010
```
