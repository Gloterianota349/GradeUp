<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../templates/home.css">
</head>
<body>
    <header>
        <div class="perfil">
            <div class="foto_perfil">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
            </div>
            <div class="dados_perfil">
                <div class="nome">
                    <h2>Nome Example</h2>
                </div>
                <div class="email">
                    <h3>Email@example.com</h3>
                </div>
            </div>
        </div>
        <div class="sair">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
            </svg>
        </div>
    </header>
    <main>
        <div class="titulo">
            <img src="../templates/img/GradeUp.png" alt="" width="220" height="45">
            <h1>Insira as notas e tenha o seu trabalho facilitado pelo GradeUp!</h1>
        </div>
        <div class="container">
            <div class="input_notas">
                <div class="form">
                    <div class="mb-3" style="font-weight: bold">
                        <label for="formGroupExampleInput" class="form-label">Nota 1</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a 1ª nota">
                    </div>
                    <div class="mb-3" style="font-weight: bold">
                        <label for="formGroupExampleInput2" class="form-label">Nota 2</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a 2ª nota">
                    </div>
                    <div class="mb-3" style="font-weight: bold">
                        <label for="formGroupExampleInput2" class="form-label">Nota 3</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a 3ª nota">
                    </div>
                </div>
                <div class="nota_aprovacao">
                    <p>Mínimo para aprovação: </p>
                    <p style="opacity: 0.6; border: 0.1rem solid #A9A8A8; border-radius: 0.4rem; padding: 0.3rem">7</p>
                </div>
            </div>
            <div class="divisor">
                <img src="../templates/img/Igual.png" alt="" width="60" height="60">
            </div>
            <div class="resultado">
                <p>Média</p>
                <h4>9.3</h4>
                <div class="status">
                    <h5>Status: </h5>
                    <h6>Aprovado</h6>
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>