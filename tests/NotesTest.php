<?php

use Controller\NotesController;
use Model\Notes;
use PHPUnit\Framework\TestCase;

// Importações necessárias para o Allure
use Qameta\Allure\Allure;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\DisplayName;
use Qameta\Allure\Attribute\Feature;
use Qameta\Allure\Attribute\Severity;
use Qameta\Allure\Attribute\Story;
use Qameta\Allure\Model\Severity as AllureSeverity;

#[Feature('Gerenciamento de Notas')]
#[DisplayName('Testes do Controlador de Notas')]
class NotesTest extends TestCase
{
    private $notesController;
    private $mockNotesModel;

    protected function setUp(): void
    {
        $this->mockNotesModel = $this->createMock(Notes::class);
        $this->notesController = new NotesController($this->mockNotesModel);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Deve calcular a média e o status APROVADO com sucesso')]
    #[Description('Este teste verifica se o cálculo da média está correto e se o status de aprovação é retornado corretamente quando a média é igual ou superior à nota mínima.')]
    #[Story('Cálculo de Média')]
    #[Severity(AllureSeverity::CRITICAL)]
    public function it_should_be_able_to_calculate_media_and_approval()
    {
        // 1. Defina as variáveis localmente
        $note1 = 7.0;
        $note2 = 8.0;
        $note3 = 9.0;
        $min_note = 8.0;

        // 2. (Opcional, mas recomendado) Registre os parâmetros no Allure
        Allure::parameter('Nota 1', $note1);
        Allure::parameter('Nota 2', $note2);
        Allure::parameter('Nota 3', $note3);
        Allure::parameter('Nota Mínima', $min_note);

        // 3. Execute o cálculo em um passo
        $notesResult = Allure::runStep(
            fn() => $this->notesController->calculateMedia($note1, $note2, $note3, $min_note),
            'Passo 1: Executar o cálculo da média'
        );

        // 4. Verifique os resultados em outro passo
        Allure::runStep(
            function () use ($notesResult) {
                $this->assertArrayHasKey('media', $notesResult);
                $this->assertArrayHasKey('Aprovation', $notesResult);
                $this->assertEquals(8, $notesResult['media']);
                $this->assertEquals("APROVADO", $notesResult['Aprovation']);
            },
            'Passo 2: Verificar os resultados'
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Não deve calcular a média com entradas negativas')]
    #[Story('Validação de Entradas')]
    #[Severity(AllureSeverity::NORMAL)]
    public function it_shouldnt_be_able_to_calculate_media_and_approval_with_invalid_inputs()
    {
        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(-7, 8, 9, 8);
            $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Testando com a primeira nota negativa');

        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(7, -8, 9, 8);
            $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Testando com a segunda nota negativa');

        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(7, 8, -9, 8);
            $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Testando com a terceira nota negativa');

        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(7, 8, 9, -8);
            $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Testando com a nota mínima negativa');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Não deve calcular a média com entradas nulas')]
    #[Story('Validação de Entradas')]
    #[Severity(AllureSeverity::NORMAL)]
    public function it_shouldnt_be_able_to_calculate_media_and_approval_with_empty_inputs()
    {
        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(null, 8, 9, 8);
            $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Testando com a primeira nota nula');

        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(7, null, 9, 8);
            $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Testando com a segunda nota nula');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName("Deve retornar o status de aprovação correto (Aprovado/Reprovado)")]
    #[Story('Cálculo de Média')]
    #[Severity(AllureSeverity::CRITICAL)]
    public function it_should_be_able_to_get_approval()
    {
        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(7, 8, 9, 8);
            $this->assertEquals('APROVADO', $notesResult['Aprovation']);
            $this->assertStringNotContainsString('As notas devem conter valores válidos', $notesResult['Aprovation']);
        }, 'Verificando o status "APROVADO"');

        Allure::runStep(function () {
            $notesResult = $this->notesController->calculateMedia(7, 8, 9, 9);
            $this->assertEquals('REPROVADO', $notesResult['Aprovation']);
        }, 'Verificando o status "REPROVADO"');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[DisplayName('Deve ser capaz de salvar a média calculada')]
    #[Story('Persistência de Dados')]
    #[Severity(AllureSeverity::CRITICAL)]
    public function it_should_be_able_to_save_media()
    {
        $notesResult = Allure::runStep(fn() => $this->notesController->calculateMedia(7, 8, 9, 8), 'Passo 1: Calcular a média primeiro');

        $this->assertStringNotContainsString('As notas devem conter valores válidos', $notesResult['Aprovation']);

        Allure::runStep(function () use ($notesResult) {
            $this->mockNotesModel->expects($this->once())
                ->method('createMedia')
                ->with($this->equalTo(7), $this->equalTo(8), $this->equalTo(9), $this->equalTo(8))
                ->willReturn(true);

            $result = $this->notesController->saveMedia(7, 8, 9, 8, $notesResult['media']);
            $this->assertTrue($result);
        }, 'Passo 2: Configurar mock e salvar os dados');
    }
}