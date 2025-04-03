<?php
namespace otazkyodpovede;

define('_ROOT_', dirname(dirname(__FILE__)));
require_once(_ROOT_.'/db/config.php');
use PDO;

class QnA { 
    private $conn;

    public function __construct() {
        $this->connect(); // This should be called inside the constructor
    }

    // Method to connect to the database
    private function connect() {
        $config = DATABASE;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            // Create a new PDO connection
            $this->conn = new PDO(
                'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'],
                $config['USER_NAME'],
                $config['PASSWORD'],
                $options
            );
        } catch (PDOException $e) {
            // Handle the connection error
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    // Method to fetch questions and answers from the database
    public function insertQnA() {
        try {
            // Fetch questions and answers from the database
            $sql = "SELECT Otázka, Odpoveď FROM udaje"; // Uprav názov tabuľky a stĺpcov podľa tvojej databázy
            $statement = $this->conn->prepare($sql);
            $statement->execute();
    
            // Fetch the results as an associative array
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $qa_pairs = [];  // Array to store question-answer pairs
    
            if ($results) {
                // Loop through the results and process them
                foreach ($results as $row) {
                    $qa_pairs[] = [
                        'question' => $row['Otázka'],
                        'answer' => $row['Odpoveď']
                    ];
                }
                return $qa_pairs; // Return the array of question-answer pairs
            } else {
                echo "Žiadne otázky a odpovede neboli nájdené v databáze.";
                return []; // Return an empty array if no data found
            }
        } catch (Exception $e) {
            // Error message
            echo "Chyba pri načítaní dát z databázy: " . $e->getMessage();
            return []; // Return an empty array if there's an error
        }
    }
}
?>
