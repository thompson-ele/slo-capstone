<?php
/* OUTCOMES */

if( isset($_POST['type']) && !empty(isset($_POST['type'])) ){
	$type = $_POST['type'];
	
	switch ($type) {
		case "getOutcomes":
			getOutcomes($_POST['course_id']);
			break;
		case "getOutcome":
            getOutcome($_POST['outcome_id']);
		    break;
        case "saveOutcome":
            saveOutcome($_POST['data']);
            break;
        case "addOutcome":
            addOutcome($_POST['data']);
            break;
		default:
			invalidRequest();
	}
}

// Gets a specific outcome
function getOutcome($outcome_id)
    {
        include ("database.php");
        $sql = "SELECT * FROM outcome WHERE outcome_id = ?";
        
        try {
            // Create a prepared statement
            $results = $db->prepare($sql);
            // Bind values to the statement
            $results->bindValue(1, $outcome_id, PDO::PARAM_INT);
            $results->execute();
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            return false;
        }
        $data['records'] = $results->fetch();
        echo json_encode($data);
    }

// Returns all outcomes associated with a particular course
function getOutcomes($course_id)
    {
        include("database.php");
        
        try {
            $sql = ("SELECT * FROM outcome
                     WHERE course_id = ?");
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $course_id, PDO::PARAM_INT);
            $results->execute();
            $data['records'] = $results->fetchAll();
            echo json_encode($data);
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            return false;
        }
    }

function saveOutcome($dataArray)
    {   include("database.php");
        
        $outcome_id     = $dataArray['outcome_id'];
        $outcome_text   = $dataArray['outcome_text'];
        $position       = $dataArray['position'];

        try {
            // TODO: update to save a specific outcome
            $sql = "UPDATE  outcome
                    SET     outcome_text = ?,
                            position = ?
                    WHERE   outcome_id = ?";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $outcome_text, PDO::PARAM_STR);
            $results->bindValue(2, $position, PDO::PARAM_INT);
            $results->bindValue(3, $outcome_id, PDO::PARAM_INT);
            $results->execute();
            
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            $data['status'] = 'ERR';
        }
        
        $data['status'] = 'OK';
        echo json_encode($data);
    }

// Creates a new outcome
function addOutcome($data)
    {   include("database.php");
        
        $course_id      = $data['course_id'];
        $outcome_text   = $data['outcome_text'];
        $position       = $data['position'];

        try {
            // TODO: Update SQL query
            $sql = "INSERT INTO outcome
                    (course_id, outcome_text, position)
                    VALUES (?, ?, ?)";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $course_id, PDO::PARAM_INT);
            $results->bindValue(2, $outcome_text, PDO::PARAM_STR);
            $results->bindValue(3, $position, PDO::PARAM_INT);
            $results->execute();
            $outcome_id = $db->lastInsertId();
            
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            $data['status'] = 'ERR';
        }
        
        $data['records']['outcome_id'] = $outcome_id;
        $data['status'] = 'OK';
        echo json_encode($data);
    }

function deleteOutcome() {}
?>