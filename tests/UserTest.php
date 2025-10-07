<?php

use Controller\UserController;
use Model\User;
use PHPUnit\Framework\TestCase;

// Importações necessárias para o Allure
use Qameta\Allure\Allure;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\DisplayName;
use Qameta\Allure\Attribute\Feature;
use Qameta\Allure\Attribute\Severity;
use Qameta\Allure\Attribute\Story;
use Qameta\Allure\Model\Severity as AllureSeverity;

#[Feature('Autenticação de Usuário')]
#[DisplayName('Testes do Controlador de Usuário')]
class UserTest extends TestCase
{
    private $userController;
    private $mockUserModel;

    public function setUp(): void
    {
        $_SESSION = [];
        $this->mockUserModel = $this->createMock(User::class);
        $this->userController = new UserController($this->mockUserModel);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Deve registrar um novo usuário com sucesso')]
    #[Description('Verifica se um usuário pode ser criado com dados válidos e o método de registro retorna verdadeiro.')]
    #[Story('Registro de Usuário')]
    #[Severity(AllureSeverity::CRITICAL)]
    public function it_should_register_users_with_valid_credentials()
    {
        Allure::runStep(function () {
            $this->mockUserModel->method('registerUser')->willReturn(true);
        }, 'Passo 1: Configurar o mock para simular sucesso no registro');

        $userResult = Allure::runStep(
            fn() => $this->userController->createUser('Beatriz Mota', 'beatriz@example.com', '12345', 'SESI', 654321),
            'Passo 2: Chamar o método de criação de usuário'
        );

        Allure::runStep(function () use ($userResult) {
            $this->assertTrue($userResult);
        }, 'Passo 3: Verificar se o resultado é verdadeiro');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Não deve registrar um usuário com email duplicado')]
    #[Description('Verifica se o sistema impede o registro quando o email fornecido já existe na base de dados.')]
    #[Story('Registro de Usuário')]
    #[Severity(AllureSeverity::CRITICAL)]
    public function it_should_not_register_already_registered_email()
    {
        Allure::runStep(function () {
            $this->mockUserModel->method('registerUser')->willReturn(false);
        }, 'Passo 1: Configurar o mock para simular falha por email duplicado');

        $userResult = Allure::runStep(
            fn() => $this->userController->createUser('Beatriz Santos', 'beatriz@example.com', '54321', 'SENAI', 123456),
            'Passo 2: Tentar criar um usuário com email já existente'
        );
        
        Allure::runStep(function () use ($userResult) {
            $this->assertFalse($userResult, 'Este email já foi cadastrado por outro usuário');
        }, 'Passo 3: Verificar se o resultado é falso');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Deve realizar o login com credenciais válidas')]
    #[Description('Simula um login bem-sucedido, verificando se a função retorna verdadeiro e se os dados do usuário são armazenados na sessão.')]
    #[Story('Login de Usuário')]
    #[Severity(AllureSeverity::BLOCKER)]
    public function it_should_be_able_to_sign_in()
    {
        Allure::runStep(function () {
            $this->mockUserModel->method('getUser_Email')->willReturn([
                'id' => 1,
                'user_fullname' => 'Pedro Emanoel',
                'email' => 'pedro@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
            ]);
        }, 'Passo 1: Configurar o mock com dados de um usuário existente');

        $userResult = Allure::runStep(fn() => $this->userController->login('pedro@example.com', '123456'), 'Passo 2: Executar a tentativa de login');

        Allure::runStep(function () use ($userResult) {
            $this->assertTrue($userResult);
            $this->assertEquals(1, $_SESSION['id']);
            $this->assertEquals('Pedro Emanoel', $_SESSION['user_fullname']);
            $this->assertEquals('pedro@example.com', $_SESSION['email']);
        }, 'Passo 3: Verificar o sucesso do login e os dados da sessão');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Não deve realizar o login com credenciais inválidas')]
    #[Description('Verifica se o sistema nega o acesso quando a senha ou o email estão incorretos.')]
    #[Story('Login de Usuário')]
    #[Severity(AllureSeverity::CRITICAL)]
    public function it_shouldnt_login_with_invalid_credentials()
    {
        Allure::runStep(function () {
            $this->mockUserModel->method('getUser_Email')->willReturn([
                'id' => 1,
                'user_fullname' => 'Pedro Emanoel',
                'email' => 'pedro@example.com',
                'password' => password_hash('senha-correta', PASSWORD_DEFAULT),
            ]);
        }, 'Passo 1: Configurar o mock para retornar um usuário qualquer');
        
        $userResult = Allure::runStep(fn() => $this->userController->login('pedro@example.com', 'senha-errada'), 'Passo 2: Tentar logar com a senha errada');
        
        Allure::runStep(function () use ($userResult) {
            $this->assertFalse($userResult, 'Email ou senha incorretos');
        }, 'Passo 3: Verificar se o login falhou');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Deve verificar corretamente o status de "logado"')]
    #[Description('Testa a função isLoggedIn para garantir que ela retorna verdadeiro quando um ID de usuário existe na sessão.')]
    #[Story('Sessão de Usuário')]
    #[Severity(AllureSeverity::NORMAL)]
    public function It_should_verify_if_is_logged_in()
    {
        Allure::runStep(function () {
            $_SESSION['id'] = 1;
        }, 'Passo 1: Simular uma sessão ativa');
        
        $userResult = Allure::runStep(fn() => $this->userController->isLoggedIn(), 'Passo 2: Chamar o método de verificação');

        Allure::runStep(function () use ($userResult) {
            $this->assertTrue($userResult);
        }, 'Passo 3: Validar o resultado');
    }
}