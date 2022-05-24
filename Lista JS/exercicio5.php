<!DOCTYPE html>
<html>
    <head>
        <title>Exercício 5</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="commonstyle.css">
        <style>

            .common {
                color: white;
                font-family: Arial;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .title-text {
                color: white;
                font-family: Arial;
                font-size: 50px;
                height: 200px;
                width: 100vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .conteudo {
                border-bottom: solid 1px white;
                border-top: solid 0 #555555;
                width: 230px;
                padding-left: 5px;
                padding-right: 5px;
                height: 30px;
                display: block;
            }

            #gtalk {
                width: 240px;
                height: auto;
                background-color: #333333;
                position: absolute;
                top: 250px;
                left: calc(50% - 115px);
                border: solid 2px white;
            }

            .nome {
                width: 200px;
                font-size: 15px;
            }

            .msg {
                width: 200px;
                font-size: 10px;
                color: #BBBBBB;
            }
            
        </style>
    </head>
    <body>
        <div class="exc-buttons-cont center">
            <a href="exercicio4.html"><div class="exc-button center">Exercício 4</div></a>
            <a href="exercicio6.php"><div class="exc-button center">Exercício 6</div></a>
        </div>
        <div class="title-text common">Chat</div>
        <div id="gtalk"></div>
        <script>

            buscaDadosAjax();

            var controle = setInterval(buscaDadosAjax, 1000 * 10);
            var uid = 23424334;

            function buscaDadosAjax() {
                fetch('ajax_gtalk.php').then(response => response.json()).then(dados => 
                {
                    if(uid == dados.uid) {
                        document.getElementById('gtalk').innerHTML = '';
                        for(var i = 0; i < 4; i++) {
                            document.getElementById('gtalk').innerHTML +=
                            `<div class="common conteudo">` +
                                `<img src="${dados.contacts[i].icon}" style="float: left; margin-top: 3px">` +
                                `<div style="float: right">` +
                                    `<p class="nome">${dados.contacts[i].name}</p>` +
                                    `<p class="msg">${dados.contacts[i].msg}</p>` +
                                `</div>` +
                            `</div>`;
                        }
                    }
                });
            }

        </script>
    </body>
</html>