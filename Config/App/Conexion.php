<?php
class Conexion{
    private $conect;
    public function __construct()
    {
        $pdo = "mysql:host=".host.";dbname=".db.".charset.";
        try {
        $this->conect = new PDO($pdo, user, pass);
        $this->conect->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Error en la Conexión".$e->getMessage();

        }

    }
    public function conect()
    {
        return $this->conect;

    }
}

?>