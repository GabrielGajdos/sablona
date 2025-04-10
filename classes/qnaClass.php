<?php
namespace otazkyodpovede;

require_once(__DIR__ . '/Database.php');

use PDO;

class QnA extends Database {
    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConnection();
    }

    public function getQnA() {
        try {
            $query = "SELECT question, answer FROM qna";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            die("Chyba pri získavaní otázok a odpovedí: " . $e->getMessage());
        }
    }

    // public function insertQuestion($question, $answer) {
    //     try {
    //         $query = "INSERT INTO qna (question, answer) VALUES (:question, :answer)";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->execute(['question' => $question, 'answer' => $answer]);
    //     } catch (\PDOException $e) {
    //         die("Chyba pri vkladaní: " . $e->getMessage());
    //     }
    // }
}
