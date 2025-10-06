<?php

require_once __DIR__ . '/../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

use Controller\UserController;

use Model\User;
class CadastroTest extends TestCase{
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
    public function it_should_prevent_registration_with_an_already_registered_email(){

    }
}

?>