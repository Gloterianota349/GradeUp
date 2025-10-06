<?php

require_once __DIR__ . '/../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

use Controller\UserController;

use Model\User;

class LoginTest extends TestCase{
    private $userController;

    private $mockUserModel;

    public function setUp(): void {
        $_SESSION = [];
        $this->mockUserModel = $this->createMock(User::class);
        $this->userController = new UserController($this->mockUserModel);
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
        $this->assertFalse($userResult);
    }


    #[\PHPUnit\Framework\Attributes\Test]
    public function It_should_verify_if_is_logged_in(){
        $_SESSION['id'] = 1;
        $userResult = $this -> userController -> isLoggedIn();

        $this -> assertTrue($userResult);
    }
}

?>

