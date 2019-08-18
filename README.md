# O que há neste repositório
Este repositório contem o código para um simples servidor para um bot do Telegram.
Este bot foi utilizado em um desafio para uma vaga de Desenvolvedor na empresa Rits Tecnologia.
O repositório principal é o [desafio-rits](https://github.com/daniel-san/desafio-rits).

# Como utilizar este código
Este código é um tanto específico para o meu caso, mas é facilmente adaptável.
A primeira coisa que precisa fazer é criar um bot pelo [BotFather](https://telegram.me/botfather), 
e obter com ele a chave de api do seu bot.
Feito isso, é necessário setar o webhook do seu bot, por exemplo, usando o seguinte comando:
```
curl -F "url=<webhook_url>" https://api.telegram.org/bot<api_key>/setWebhook
```
Com isso seu bot já está pronto para interagir com clientes e enviar mensagens.
O arquivo new-message.php tem um exemplo de como responder usuários por comandos enviados pelo chat.
