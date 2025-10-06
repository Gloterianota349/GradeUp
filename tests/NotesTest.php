<?php

use Controller\NotesController;

use PHPUnit\Framework\TestCase;

use Model\Notes;

class NotesTest extends TestCase {
    private $notesController;
    
    private $mockNotesModel;

    protected function setUp(): void {
        $this->mockNotesModel = $this->createMock (Notes::class);

        $this->notesController = new NotesController($this->mockNotesModel);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_calculate_media_and_approval() {
        $note1 = 7;
        $note2 = 8;
        $note3 = 9;
        $min_note = 8;

        $notesResult = $this->notesController->calculateMedia($note1, $note2, $note3, $min_note);

        $this->assertArrayHasKey('media', $notesResult);
        $this->assertArrayHasKey('Aprovation', $notesResult);

        $this->assertEquals(8, $notesResult['media']);
        $this->assertEquals("APROVADO", $notesResult['Aprovation']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_shouldnt_be_able_to_calculate_media_and_approval_with_invalid_inputs() {
        $notesResult = $this->notesController->calculateMedia(-7,8,9,8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7,-8,9,8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7,8,-9,8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7,8,9,-8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_shouldnt_be_able_to_calculate_media_and_approval_with_empty_inputs() {
        $notesResult = $this->notesController->calculateMedia(null, 8, 9, 8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7, null, 9, 8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7, 8, null, 8);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7, 8, 9, null);
        $this->assertEquals('As notas devem conter valores válidos', $notesResult['Aprovation']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_get_approval() {
        $notesResult = $this->notesController->calculateMedia(7, 8, 9, 8);
        $this->assertEquals('APROVADO', $notesResult['Aprovation']);

        $this->assertStringNotContainsString('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $notesResult = $this->notesController->calculateMedia(7, 8, 9, 9);
        $this->assertEquals('REPROVADO', $notesResult['Aprovation']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_save_media() {
        $notesResult = $this->notesController->calculateMedia(7, 8, 9, 8);

        $this->assertStringNotContainsString('As notas devem conter valores válidos', $notesResult['Aprovation']);

        $this->mockNotesModel->expects($this->once())->method('createMedia')->with($this->equalTo(7), $this->equalTo(8), $this->equalTo(9), $this->equalTo(8))->willReturn(true);

        $result = $this->notesController->saveMedia(7, 8, 9, 8, $notesResult['media']);

        $this->assertTrue($result);
    }
}

?>