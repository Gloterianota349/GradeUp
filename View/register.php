<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../templates/register.css">
    <link rel="icon" href="../View/img/A+.png">
</head>
<body>
    <main>
        <div class="container">
        <div class="topo">
            <figure>
                <img src="../View/img/A+.png" alt="">
            </figure>
            
            <figure>
                <img src="../View/img/logo.png" alt="">
            </figure>

            <p>Cadastre-se para aproveitar nossos recursos</p>
        </div>

        <form>

            <div class="dadospessoais">
                <label for="Nome Completo"></label>
                <input type="text" id = "nomecompleto" class = "nomecompleto" name = "nomecompleto" placeholder = "Digite o seu nome completo">

                <label for="Email">E-mail</label>
                <input type="email" id = "email" class = "email" name = "email" placeholder = "Digite o seu E-mail">

                <label for="senha">Senha</label>
                <input type="text" id = "senha" class = "senha" name = "senha" placeholoder = "Digite sua senha">

                <label for="senhaconfirm">Confirmar senha</label>
                <input type="text" id = "senchaconfirm" class = "senhaconfirm" name = "senchaconfirm" placeholder = "confirme sua senha">
            </div>
           
            <div class="dadosinst">

                <label for="nomeinst">Nome da instituição</label>
                <input type="text" id = "nomeinst" class = "nomeinst" name = "nomeinst" placeholder = "Digite o nome da instituição de ensino">

                <label for="IP">Identificação Profissional - IP</label>
                <input type="number" id = "IP" Class = "IP" name = "IP" placeholder = "Digite o seu IP">
            </div>

            <button type = "submit">Entrar</button>

        </form>
        </div>      
    </main>
    
</body>
</html>