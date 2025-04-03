<?php
namespace otazkyodpovede;

define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/db/config.php');

use PDO;
use PDOException;

class QnA {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $config = DATABASE;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->conn = new PDO(
                'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'], 
                $config['USER_NAME'], 
                $config['PASSWORD'], 
                $options
            );
        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    public function getQnA() {
        $query = "SELECT question, answer FROM qna";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // public function insertQuestion($question, $answer) {
    //     $query = "INSERT INTO qna (question, answer) VALUES (:question, :answer)";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute(['question' => $question, 'answer' => $answer]);
    // }
}
?>