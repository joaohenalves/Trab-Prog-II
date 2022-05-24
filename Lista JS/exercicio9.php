<!DOCTYPE html>
<html>
    <head>
        <title>Exercício 9</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="commonstyle.css">
        <style>

            .common {
                color: rgb(255, 187, 0);
                font-family: Arial;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .title-text {
                color: rgb(255, 187, 0);
                font-family: Arial;
                font-size: 50px;
                height: 200px;
                width: 100vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .conteudo {
                background-color: #333333;
                border: solid 1px #AAAAAA;
                border-radius: 5px;
                width: 700px;
                height: 30px;
                color: white;
            }

            #geral {
                width: 700px;
                height: auto;
                position: absolute;
                display: block;
                top: 250px;
                left: calc(50% - 350px);
            }

            #stop-button {
                width: 100px;
                height: 40px;
                position: absolute;
                top: 170px;
                left: calc(50% - 50px);
                font-weight: bold;
                font-size: 20px;
                border: solid 2px rgb(255, 187, 0);
                border-radius: 3px;
                cursor: pointer;
            }
            
        </style>
    </head>
    <body>
        <a href="exercicio8.html"><div class="exc-button" style="left: calc(50% - 105px)">Exercício 8</div></a>
        <a href="exercicio10.html"><div class="exc-button" style="left: calc(50% + 5px)">Exercício 10</div></a>
        <div class="title-text common">Informações carregadas via AJAX</div>
        <div id="stop-button" class="common" onclick="controlaCicloAjax()">Parar</div>
        <div id="geral"></div>
        <script>

            buscaDadosAjax();

            var controle = setInterval(buscaDadosAjax, 1000 * 10);
            var cliques = 0;

            function buscaDadosAjax() {
                fetch('ajax_dados.php').then(response => response.json()).then(dados => 
                {   
                    document.getElementById('geral').innerHTML +=
                    `<div class="common conteudo" id="id${dados.id}">${dados.conteudo}</div>`;
                });
            }

            function controlaCicloAjax() {
                cliques++;
                var botao = document.getElementById('stop-button');
                if(cliques % 2 != 0) {
                    clearInterval(controle);
                    botao.innerText = 'Continuar';
                } else {
                    controle = setInterval(buscaDadosAjax, 1000 * 10);
                    buscaDadosAjax();
                    botao.innerText = 'Parar';
                }
            }

        </script>
    </body>
</html>