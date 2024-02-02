# API Usuario

Para começar, estamos usando Windows com XAMPP para essa API, quando baixar o projeto, verificar se o version do PHP carrega perfeitamente, URL "http://localhost/apiUsuarioSemFramework/version.php":

<img src="001.png" alt="">
 
Verificar o arquivo db.sql para criação da tabela "user" para testar:

<img src="002.png" alt="">

Informações:

<b>GET</b> /users: Retorna a lista de todos os usuários.<br>
<i>curl --location 'http://localhost/apiUsuarioSemFramework/users/' \
--data ''</i>

<b>GET</b> /users/{id}: Retorna os detalhes de um usuário específico.<br>
<i>curl --location 'http://localhost/apiUsuarioSemFramework/users/?id=1' \
--data ''</i>

<b>POST</b> /users: Cria um novo usuário.<br>
<i>curl --location --request POST 'http://localhost/apiUsuarioSemFramework/users/?email=gabriel.zinni%40includ.com&password=1234&name=Gabriel' \
--data ''</i>

<b>PUT</b> /users/{id}: Atualiza os dados de um usuário existente.<br>
<i>curl --location --request PUT 'http://localhost/apiUsuarioSemFramework/users/?id=1&email=gabriel.zinni%40includ.com&password=1234&name=Gabriel' \
--data ''</i>

<b>DELETE</b> /users/{id}: Remove um usuário existente.<br>
<i>curl --location --request DELETE 'http://localhost/apiUsuarioSemFramework/users/?id=7' \
--data ''</i>
