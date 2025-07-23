<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | GradeUp</title>
    <link rel="stylesheet" href="../templates/login.css">
    <link rel="icon" href="../View/img/A+.png">
</head>
<body>
    <main>
        <div class="login_box">
            
            <div class="logo_storytelling">
                <figure class="logo_a">
                    <img src="../View/img/A+.png" alt="A+ vermelho">
                </figure>
                
                <figure class="logo_gradeup">
                    <img src="../View/img/logo.png" alt="Logo GradeUp">
                </figure>
                <h1>Bem vindo novamente</h1>
            </div>
            
                <div class="form_box">
                    <form>
                        <label for="userEmail">
                            <p>Email</p>
                        </label>
                            <input type="email" name="userEmail" id="userEmail" placeholder="Digite o seu E-mail">
                            <h2 class="msg_erro">Preencha os campos</h2>
                        
                        <label for="password">
                            <p>Senha</p>
                        </label>
                            <input type="email" name="password" id="password" placeholder="Digite sua senha">
                            <h2 class="msg_erro">Preencha os campos</h2>
                            <button type="submit">Entrar</button>
                    </form>
                </div>
                    
            
            
            <p class="inscreva-se">Ainda não tem uma conta? <span>Inscreva-se</span></p>
        </div>
    </main>

    <script src="../View/js/login.js"></script>
</body>
</html>