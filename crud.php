<?php
require_once('./conex.php');
function create($frutas)
{
    $con = getConnection();
    try {
        $stmt = $con->prepare("INSERT INTO frutas(nome, cor, codigo) VALUES (:nome , :cor, :codigo)");
        $stmt->bindParam(":nome", $frutas->name);
        $stmt->bindParam(":cor", $frutas->cor);
        $stmt->bindParam(":codigo", $frutas->codigo);
        if ($stmt->execute()) {
            echo "cadastrado";
        }
    } catch (PDOException $error) {
        echo "erro. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
$frutas = new stdClass();
$frutas->name = "limao";
$frutas->color = "verde";
$frutas->codeQR = 00;
create($frutas);
echo "<br><br>___<br><br>";
function get()
{
    try {
        $con = getConnection();
        $rs = $con->query("SELECT nome, cor, codigo FROM frutas");
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo "Nome: " . $row->name . " <br> Frutas: ";
            echo $row->cor . "<br> codigo: ";
            echo $row->codigo . "<br> <br>";
        }
    } catch (PDOException $error) {
        echo "erro. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
echo "Frutas <br><br>---<br><br>";
get();


