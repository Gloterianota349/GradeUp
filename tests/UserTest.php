<?php

require_once __DIR__ . '/../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

use Controller\UserController;

use Model\User;

class UserTest extends TestCase{
    private $userController;

    private $mockUserModel;

    public function setUp(): void {
        $_SESSION = [];
        $this->mockUserModel = $this->createMock(User::class);
        $this->userController = new UserController($this->mockUserModel);
    }

    #[\PHPUnit\Framework\Attributes\Test]
        public function it_should_register_users_with_valid_credentials() {
        $this->mockUserModel->method('registerUser')->willReturn(True);
        $userResult = $this->userController->createUser( 'Beatriz Mota', ' beatriz@example.com', '12345', 'SESI', 654321);
        $this->assertTrue($userResult);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_not_register_already_registered_email() {
        $this->mockUserModel->method('registerUser')->willReturn(false);

        $userResult = $this->userController->createUser(
            'Beatriz Santos',
            'beatriz@example.com',
            '54321',
            ' SENAI',
            123456
        );
        $this->assertFalse($userResult, 'Este email já foi cadastrado por outro usuário');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_sign_in(){
        $this -> mockUserModel -> method('getUser_Email') -> willReturn([
            'id' => 1,
            'user_fullname' => 'Pedro Emanoel',
            'email' => 'pedro@example.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
        ]);

        $userResult = $this -> userController -> login('pedro@example.com', '123456');
        
        $this->assertTrue($userResult);
        $this -> assertEquals(1, $_SESSION['id']);
        $this -> assertEquals('Pedro Emanoel', $_SESSION['user_fullname']);
        $this -> assertEquals('pedro@example.com', $_SESSION['email']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_shouldnt_login_with_invalid_credentials(){
        $this -> mockUserModel -> method('getUser_Email') -> willReturn ([
            'id' => 1,
            'user_fullname' => 'Pedro Emanoel',
            'email' => 'pedro@example.com',
            'password' => password_hash('123436', PASSWORD_DEFAULT),
        ]);

        $userResult = $this -> userController -> login('beatriz@example.com', '123456');
        $this->assertFalse($userResult, 'Email ou senha incorretos');
    }


    #[\PHPUnit\Framework\Attributes\Test]
    public function It_should_verify_if_is_logged_in(){
        $_SESSION['id'] = 1;
        $userResult = $this -> userController -> isLoggedIn();

        $this -> assertTrue($userResult);
    }
}

?>

