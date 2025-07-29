<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="View/img/A+.png">
    <link rel="stylesheet" href="templates/index.css">
    <title>GradeUp</title>
</head>
<body>
    <main>
        <div class="box_inicial">

            <figure>
                <img src="View/img/calculadora.png" alt="Quatro círculos azuis com as quatros operações dentro de cada círculo">
            </figure>
            
            <h1>Grade<span>UP</span>, Cálculo inteligente para professores brilhantes.</h1>
            
            <div class="buttons">
                <button class="login">Login</button>
                
                <button class="cadastro">Cadastre-se</button>
            </div>
        </div>
    </main>

    <script>
        const btn_login = document.querySelector('.login');
        const btn_cadastro = document.querySelector('.cadastro');

        btn_login.addEventListener('click', () => {
            window.location.href = '../GradeUp/View/login.php';
        })

        btn_cadastro.addEventListener('click', () => {
            window.location.href = '../GradeUp/View/register.php';
        })
    </script>
</body>
</html>