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
                <figure class="a">
                    <img src="../View/img/A+.png" alt="">
                </figure>

                <figure class="logo">
                    <img src="../View/img/logo.png" alt="">
                </figure>

                <p>Cadastre-se para aproveitar nossos recursos</p>
            </div>

            <form>
                <div class="formularios">

                    <div class="dadospessoais">
                        <label for="Nome Completo">Nome Completo</label>
                        <input type="text" id="nomecompleto" class="nomecompleto" name="nomecompleto"
                            placeholder="Digite o seu nome completo">
                            <p class="CampoObrigatorio">Todos os campos são obrigatórios</p>

                        <label for="Email">E-mail</label>
                        <input type="email" id="email" class="email" name="email" placeholder="Digite o seu E-mail">
                        <p class="CampoObrigatorio">Todos os campos são obrigatórios</p>

                        <label for="senha">Senha</label>
                        <input type="text" id="senha" class="senha" name="senha" placeholder="Digite a sua senha">
                        <p class="CampoObrigatorio">Todos os campos são obrigatórios</p>

                        <label for="senhaconfirm">Confirmar senha</label>
                        <input type="text" id="senchaconfirm" class="senhaconfirm" name="senchaconfirm" placeholder="confirme sua senha">
                        <p class="CampoObrigatorio">Todos os campos são obrigatórios</p>
                    </div>

                    <div class="dadosinst">

                        <label for="nomeinst">Nome da instituição</label>
                        <input type="text" id="nomeinst" class="nomeinst" name="nomeinst" placeholder="Digite o nome da instituição de ensino">
                        <p class="CampoObrigatorio">Todos os campos são obrigatórios</p>


                        <label for="IP">Identificação Profissional - IP</label>
                        <input type="number" id="IP" Class="IP" name="IP" placeholder="Digite o seu IP">
                        <p class="CampoObrigatorio">Todos os campos são obrigatórios</p>
                        <button type="submit">Cadastrar-se</button>
                    </div>

                    
                </div>
            </form>
    </main>
    <script src="../View/js/register.js"></script>
</body>

</html>