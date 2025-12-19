<?php

namespace Controllers\Personas;

use Controllers\PublicController;
use Dao\Personas\Personas as DaoPersonas;
use Views\Renderer;

class Persona extends PublicController
{
    private $mode = "DSP";
    private $personaId = 0;
    private $viewData = [];
    private $readonly = "";
    private $showCommitBtn = true;
    private $persona = [
        "persona_id" => 0,
        "nombre" => "",
        "apellido" => "",
        "edad" => 0,
        "estado" => "ACT"
    ];

    public function run(): void
    {
        $this->getParams();

        if ($this->mode !== "INS") {
            $this->persona = DaoPersonas::getPersonaById($this->personaId);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->processAction();
        }

        $this->prepareViewData();
        Renderer::render("personas/persona", $this->viewData);
    }
    private function getParams(): void
    {
        $this->mode = $_GET["mode"] ?? "DSP";
        $this->personaId = intval($_GET["id"] ?? 0);

        if (in_array($this->mode, ["DSP", "DEL"])) {
            $this->readonly = "readonly";
            $this->showCommitBtn = false;
        }
    }

    private function processAction(): void
    {
        switch ($this->mode) {
            case "INS":
                DaoPersonas::insertPersona(
                    $_POST["nombre"],
                    $_POST["apellido"],
                    intval($_POST["edad"]),
                    $_POST["estado"]
                );
                break;
            case "UPD":
                DaoPersonas::updatePersona(
                    intval($_POST["persona_id"]),
                    $_POST["nombre"],
                    $_POST["apellido"],
                    intval($_POST["edad"]),
                    $_POST["estado"]
                );
                break;

            case "DEL":
                DaoPersonas::deletePersona(intval($_POST["persona_id"]));
                break;
        }
        header("Location: index.php?page=Personas_Personas");
        exit;
    }
    private function prepareViewData(): void
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["readonly"] = $this->readonly;
        $this->viewData["showCommitBtn"] = $this->showCommitBtn;
        $this->viewData["persona"] = $this->persona;
    }
}
