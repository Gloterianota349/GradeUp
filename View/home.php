<?php

session_start();
require_once '../vendor/autoload.php';

use Model\User;
use Model\Notes;
use Controller\NotesController;
use Controller\UserController;

$notes = new Notes();
$userModel = new User();
$mediaController = new NotesController($notesModel);
$userController = new UserController($userModel);

$mediaResult = null;
$userInfo = null;

// if(!$userController->isLoggedIn()) {
//     header('Location: ../index.php');
//     exit();
// }

$user_id = $_SESSION['id'];
$user_fullname = $_SESSION['user_fullname'];
$user_email = $_SESSION['email'];

$userInfo = $userController->getUserData($user_id, $user_fullname, $user_email);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['note1'], $_POST['note2'], $_POST['note3'], $_POST['min_note'])) {
        $note1 = $_POST['note1'];
        $note2 = $_POST['note2'];
        $note3 = $_POST['note3'];
        $min_note = $_POST['min_note'];

        $mediaResult = $mediaController->calculateMedia($note1, $note2, $note3, $min_note);

        if ($mediaResult['Aprovation'] != 'As notas devem conter valores válidos') {
            $mediaController->saveMedia($note1, $note2, $note3, $min_note, $mediaResult['media']);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../templates/home.css">
    <link rel="icon" href="../View/img/A+.png">
</head>

<body>
    <header>
        <div class="perfil">
            <div class="foto_perfil">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
            </div>
            <?php if ($userInfo): ?>
                <div class="dados_perfil">
                    <div class="nome">
                        <h2><?php echo $userInfo['user_fullname'] ?></h2>
                    </div>
                    <div class="email">
                        <h3><?php echo $userInfo['email'] ?></h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="sair">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                class="bi bi-box-arrow-right" viewBox="0 0 16 16" id="sair" style="cursor: pointer">
                <path fill-rule="evenodd"
                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                <path fill-rule="evenodd"
                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg>
        </div>
    </header>
    <main>
        <div class="titulo">
            <img src="../View/img/GradeUp.png" alt="" width="220" height="45">
            <h1>Insira as notas e tenha o seu trabalho facilitado pelo GradeUp!</h1>
        </div>
            <div class="container">
                <form class="form" id="form" method="POST">
                    <div class="input_notas">
                        <div class="form1" id="form1">
                            <div class="mb-3" style="font-weight: bold">
                                <label for="formGroupExampleInput" class="form-label">Nota 1</label>
                                <input type="text" name="note1" class="form-control" id="formGroupExampleInput1"
                                    placeholder="Digite a 1ª nota">
                            </div>
                            <div class="mb-3" style="font-weight: bold">
                                <label for="formGroupExampleInput2" class="form-label">Nota 2</label>
                                <input type="text" name="note2" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Digite a 2ª nota">
                            </div>
                            <div class="mb-3" style="font-weight: bold">
                                <label for="formGroupExampleInput2" class="form-label">Nota 3</label>
                                <input type="text" name="note3" class="form-control" id="formGroupExampleInput3"
                                    placeholder="Digite a 3ª nota">
                            </div>
                        </div>
                        <div class="nota_aprovacao">
                            <p>Mínimo para aprovação: </p>
                            <input type="text" name="min_note" class="form-control" id="formGroupExampleInput" placeholder="Nota Mínima">
                        </div>
                    </div>
                    <div class="divisor">
                        <button type="submit" style="border-radius: 999px; background-color: white; border: none;"><img src="../View/img/Igual.png" alt="" width="60" height="60" id="resultado"></button>
                    </div>
                </form>
                <div class="resultado">
                    <p>Média</p>
                    <?php if ($mediaResult): ?>
                            <h4 id="result_num"><?php echo $mediaResult['media'] ?? ''; ?></h4>
                        <div class="status">
                            <h5>Status: </h5>
                            <h6 id="statusTexto"> <?php echo $mediaResult['Aprovation']; ?> </h6>
                        </div>

                    <?php else: ?>
                        <i class="bi bi-calculator"></i>
                        <p>Preencha os dados ao lado para ver o resultado</p>
                    <?php endif; ?>
                </div>
            </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('sair').addEventListener('click', function () {
            window.location.href = "login.php";
        })

        // document.getElementById('resultado').addEventListener('click', function mostrarResultado() {
        //     nota1 = parseInt(document.getElementById('formGroupExampleInput1').value);
        //     nota2 = parseInt(document.getElementById('formGroupExampleInput2').value);
        //     nota3 = parseInt(document.getElementById('formGroupExampleInput3').value);
        //     media = (nota1 + nota2 + nota3) / 3;
        //     document.getElementById('result_num').textContent = media.toFixed(2);
        //     document.getElementById('form').reset();

        //     nota_minima = parseInt(document.getElementById("formGroupExampleInput").value);
            
        //     if (media >= nota_minima) {
        //         status = "APROVADO";
        //     } else if (media < nota_minima) {
        //         status = "REPROVADO";
        //     }

        //     if (status == "APROVADO") {
        //         document.getElementById("statusTexto").textContent = "APROVADO";
        //         document.getElementById("statusTexto").style.color = "#479F91";
        //     } else if (status == "REPROVADO") {
        //         document.getElementById("statusTexto").textContent = "REPROVADO";
        //         document.getElementById("statusTexto").style.color = "#FF530F";
        //     }
        // })

        document.getElementById('resultado').addEventListener('click', function mostrarResultado() {
            $text = document.getElementById('statusTexto').value;
            if ($text == "APROVADO") {
                document.getElementById("statusTexto").style.color = "#479F91";
            } else if ($text == "REPROVADO") {
                document.getElementById("statusTexto").style.color = "#FF530F";
            } else {
                document.getElementById("statusTexto").style.color = "#000000";
            }
        })
    </script>

</body>

</html>