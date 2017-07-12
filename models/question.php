<?php
/* OUTCOMES */

if( isset($_POST['type']) && !empty(isset($_POST['type'])) ){
	$type = $_POST['type'];
	
	switch ($type) {
		case "getQuestions":
			getQuestions($_POST['outcome_id']);
			break;
		case "getQuestion":
            getQuestion($_POST['question_id']);
		    break;
        case "saveQuestion":
            saveQuestion($_POST['data']);
            break;
        case "addQuestion":
            addQuestion($_POST['data']);
            break;
		default:
			invalidRequest();
	}
}

function getQuestion($question_id)
    {
        include ("database.php");
        $sql = "SELECT * FROM question WHERE question_id = ?";
        
        try {
            // Create a prepared statement
            $results = $db->prepare($sql);
            // Bind values to the statement
            $results->bindValue(1, $question_id, PDO::PARAM_INT);
            $results->execute();
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            return false;
        }
        $data['records'] = $results->fetch();
        echo json_encode($data);
    }

function getQuestions($outcome_id)
    {
        include("database.php");
        
        try {
            $sql = ("SELECT * FROM question
                     WHERE outcome_id = ?");
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $outcome_id, PDO::PARAM_INT);
            $results->execute();
            $data['records'] = $results->fetchAll();
            echo json_encode($data);
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            return false;
        }
    }

function saveQuestion($data)
    {   include("database.php");
        
        $question_id    = $data['question_id'];
        $question_text  = $data['question_text'];
        $question_type  = $data['question_type'];

        try {
            $sql = "UPDATE  question
                    SET     question_text = ?,
                            question_type = ?
                    WHERE   question_id = ?";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $question_text, PDO::PARAM_STR);
            $results->bindValue(2, $question_type, PDO::PARAM_STR);
            $results->bindValue(3, $question_id, PDO:: PARAM_INT);
            $results->execute();
            
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            $data['status'] = 'ERR';
        }
        
        $data['status'] = 'OK';
        echo json_encode($data);
    }

function addQuestion($data)
    {   include("database.php");
        
        
        $question_text  = $data['question_text'];
        $question_type  = $data['question_type'];
        $outcome_id     = $data['outcome_id'];

        try {
            $sql = "INSERT INTO question
                    (question_text, question_type, outcome_id)
                    VALUES (?, ?, ?)";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $question_text, PDO::PARAM_STR);
            $results->bindValue(2, $question_type, PDO::PARAM_STR);
            $results->bindValue(3, $outcome_id, PDO::PARAM_INT);
            $results->execute();
            
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            // $data['status'] = 'ERR';
        }
        
        $data['status'] = 'OK';
        echo json_encode($data);
    }

function deleteQuestion() {}
?>