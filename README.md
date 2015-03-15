# CakePHPUsers
Plugin Users (Usuários) para CakePHP

## Como utilizar o CakePHPUsers

Clone o projeto dentro da pasta `app/Plugin` do projeto no qual você estiver trabalhando:

* git clone `https://github.com/MarceloCorreaSilva/CakePHPUsers.git` Users

Abra seu arquivo `app/Config/bootstrap.php` e insira o seguinte código:

```
CakePlugin::load('Users', array('bootstrap' => true, 'routes' => true));
```

Acesse o endereço do plugin dentro do seu projeto:

* `http://your-app-url/users`

Você será redirecionado para a janela de configuração e instalação da base de dados, verifique se seus diretórios tem permissão de escrita e se você informou os dados referentes a conexão com a base de dados.

Siga as instruções, para a criação das tabelas na base de dados, e você será redirecionado para a página de login:

* `http://your-app-url/users/login`
