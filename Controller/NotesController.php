<?php

namespace Controller;

use Model\Notes;

use Exception;

class NotesController
{
    private $notesModel;

    public function __construct(Notes $notesModel) {
        $this->notesModel = $notesModel;
    }

    public function calculateMedia($note1, $note2, $note3, $min_note) {
        try {
            // isset($note1) and isset($note2) and isset($note3) and isset($min_note)
            $result = [];
            if (isset($note1, $note2, $note3, $min_note)) {
                if ($note1 > 0 and $note2 > 0 and $note3 > 0 and $min_note > 0) {
                    $media = round(($note1 + $note2 + $note3) / 3, 2);
                    $result['media'] = $media;

                    //O nome BMIrange não tem nada a ver com a sua aplicação
                    $result["Aprovation"] = match (true) {
                        $media < $min_note => "REPROVADO",
                        $media >= $min_note => "APROVADO",
                        default => "N/A"
                    };
                } else {
                    $result['Aprovation'] = "As notas devem conter valores válidos";
                }
            } else {
                $result['Aprovation'] = "As notas devem conter valores válidos";
            }

            return $result;
        } catch (Exception $error) {
            echo "Erro ao calcular média: " . $error->getMessage();
            return false;
        }
    }

    public function saveMedia($note1, $note2, $note3, $min_note, $mediaResult) {
        return $this->notesModel->createMedia($note1, $note2, $note3, $min_note, $mediaResult);
    }
}

?>