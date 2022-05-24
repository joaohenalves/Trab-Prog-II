<!DOCTYPE html>
<html>
    <head>
        <title>Exercício 6</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="commonstyle.css">
        <style>

            body {
                height: 150vh;
            }

            .centraliza {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #compose-button {
                width: 150px;
                height: 50px;
                background-color: rgb(238, 90, 4);
                color: white;
                font-family: Arial;
                font-style: bold;
                font-size: 20px;
                border-radius: 3px;
                border-style: solid;
                border-width: 1px;
                border-color: white;
                position: absolute;
                top: 30px;
                left: 30px;
                cursor: pointer;

            }

            #new-message {
                width: 500px;
                height: 600px;
                background-color: white;
                position: fixed;
                bottom: 2px;
                right: 2px;
                border-style: solid;
                border-width: 2px;
                border-color: gray;
                font-family: Arial;
                display: none;
            }

            #new-message-header {
                background-color: #333333;
                height: 30px;
                padding-left: 20px;
                padding-right: 20px;
                color: white;
                display: flex;
                align-items: center;
            }

            .window-button {
                width: 20px;
                height: 20px;
                cursor: pointer;
                position: absolute;
                right: 20px;
                font-weight: bold;
            }

            .window-button:hover {
                background-color: #444444;
            }

            input[type=text] {
                height: 50px;
                width: 478px;
                padding-left: 20px;
                border: initial;
                border-bottom: 1px solid #AAAAAA;

            }

            #message-text {
                height: 380px;
                width: 458px;
                border-color: #AAAAAA;
                font-family: Arial;
                padding: 20px;
            }

            #send-button {
                width: 120px;
                height: 35px;
                margin-left: 5px;
                background-color: rgb(0, 89, 255);
                color: white;
                cursor: pointer;
                border-radius: 3px;
            }

            #aviso-msg {
                width: 200px;
                height: 40px;
                font-family: Arial;
                font-size: 17px;
                position: fixed;
                bottom: 10px;
                right: 10px;
                background-color: white;
                border-radius: 5px;
                display: none;
            }

        </style>
    </head>
    <body>
        <a href="exercicio5.php"><div class="exc-button" style="left: calc(50% - 105px)">Exercício 5</div></a>
        <a href="exercicio7.html"><div class="exc-button" style="left: calc(50% + 5px)">Exercício 7</div></a>
        <div class="centraliza" id="compose-button" onclick="mostraNewMessage()">Compose</div>
        <div id="new-message">
            <div id="new-message-header">
                <p>New Message</p>
                <p class="window-button centraliza" onclick="escondeNewMessage()">X</p>
            </div>
            <input type="text" placeholder="Recipients" id="recipient">
            <input type="text" placeholder="Subject" id="subject">
            <textarea type="text" id="message-text"></textarea>
            <div class="centraliza" id="send-button" onclick="enviaMensagem()">Send</div>
        </div>
        <div class="centraliza" id="aviso-msg">Mensagem enviada!</div>
        <script>

            function enviaMensagem() {

                var message = {
                    recipient: document.getElementById('recipient').value,
                    subject: document.getElementById('subject').value,
                    message: document.getElementById('message-text').value,
                }

                console.log(message);

                fetch('post_mail.php', {
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(message),
                    method: 'POST'
                });

                escondeNewMessage();

                document.getElementById('aviso-msg').style.display = 'flex';
                setTimeout(removeAviso, 1000 * 5);

            }

            function escondeNewMessage() {
                document.getElementById('new-message').style.display = 'none';
            }

            function mostraNewMessage() {
                document.getElementById('new-message').style.display = 'block';
            }

            function removeAviso() {
                document.getElementById('aviso-msg').style.display = 'none';
            }

        </script>
    </body>
</html>