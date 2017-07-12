<?php

if( isset($_POST['type']) && !empty(isset($_POST['type'])) ){
	$type = $_POST['type'];
	
	switch ($type) {
		case "getCourses":
			getCourses();
			break;
		case "getCourse":
            getCourse($_POST['course_id']);
		    break;
        case "saveCourse":
            saveCourse($_POST['data']);
            break;
        case "addCourse":
            addCourse($_POST['data']);
            break;
		default:
			invalidRequest();
	}
}

function getCourse($course_id)
    {
        include ("database.php");
        $sql = "SELECT * FROM course WHERE course_id = ?";
        
        try {
            // Create a prepared statement
            $results = $db->prepare($sql);
            // Bind values to the statement
            $results->bindValue(1, $course_id, PDO::PARAM_INT);
            $results->execute();
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            return false;
        }
        $data['records'] = $results->fetch();
        echo json_encode($data);
    }

function getCourses()
    {
        include("database.php");
        
        try {
            $records = $db->query("SELECT * FROM course");
            $data['records'] = $records->fetchAll();
            echo json_encode($data);
        } catch(Exception $e) {
            $data['status'] = 'ERR';
        }
    }

function saveCourse($dataArray)
    {   include("database.php");
        
        $course_id      = $dataArray['course_id'];
        $course_prefix  = $dataArray['course_prefix'];
        $course_number  = $dataArray['course_number'];
        $course_name    = $dataArray['course_name'];

        try {
            $sql = "UPDATE course
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
        break;
    }

function addCourse($data)
    {   include("database.php");
        
        $course_prefix  = $data['course_prefix'];
        $course_number  = $data['course_number'];
        $course_name    = $data['course_name'];

        try {
            $sql = "INSERT INTO course
                    (course_prefix, course_number, course_name)
                    VALUES (?, ?, ?)";
                                   
            
            $results = $db->prepare($sql);
            $results->bindValue(1, $course_prefix, PDO::PARAM_STR);
            $results->bindValue(2, $course_number, PDO::PARAM_INT);
            $results->bindValue(3, $course_name, PDO::PARAM_STR);
            $results->execute();
            $course_id = $db->lastInsertId();
            
        } catch(Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br>"   ;
            $data['status'] = 'ERR';
        }
        $data['records']['course_id'] = $course_id;
        $data['status'] = 'OK';
        echo json_encode($data);
    }

function deleteCourse() {}
?>