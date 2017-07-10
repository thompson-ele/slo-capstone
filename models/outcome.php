<?php
/* OUTCOMES */

if( isset($_POST['type']) && !empty(isset($_POST['type'])) ){
	$type = $_POST['type'];
	
	switch ($type) {
		case "getOutcomes":
			getOutcomes();
			break;
		case "getOutcome":
            getOutcome($_POST['outcome_id']);
		    break;
        case "saveOutcome":
            saveOutcome($_POST['data']);
        case "addOutcome":
            addOutcome($_POST['data']);
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
            $records = $db->query("SELECT * FROM outcome
                                   WHERE course_id = ?");
            // TODO: Fix SQL query to include course_id param
            $data['records'] = $records->fetchAll();
            echo json_encode($data);
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            return false;
        }
    }

function saveOutcome($dataArray)
    {   include("database.php");
        
        $course_id      = $dataArray['course_id'];
        $course_prefix  = $dataArray['course_prefix'];
        $course_number  = $dataArray['course_number'];
        $course_name    = $dataArray['course_name'];

        try {
            // TODO: update to save a specific outcome
            $sql = "UPDATE outcome
                    SET course_prefix = ?,
                        course_number = ?,
                        course_name = ?
                    WHERE course_id = ?";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $course_prefix, PDO::PARAM_STR);
            $results->bindValue(2, $course_number, PDO::PARAM_INT);
            $results->bindValue(3, $course_name, PDO::PARAM_STR);
            $results->bindValue(4, $course_id, PDO:: PARAM_INT);
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
        
        // TODO: Get info from the controller
        $course_prefix  = $data['course_prefix'];
        $course_number  = $data['course_number'];
        $course_name    = $data['course_name'];

        try {
            // TODO: Update SQL query
            $sql = "INSERT INTO course
                    (course_prefix, course_number, course_name)
                    VALUES (?, ?, ?)";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $course_prefix, PDO::PARAM_STR);
            $results->bindValue(2, $course_number, PDO::PARAM_INT);
            $results->bindValue(3, $course_name, PDO::PARAM_STR);
            $results->execute();
            
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            $data['status'] = 'ERR';
        }
        
        $data['status'] = 'OK';
        echo json_encode($data);
    }

function deleteOutcome() {}
?>