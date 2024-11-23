<?php


// Database connection
$host = "localhost";
$dbname = "grade";
$username = "root";
$password = "";

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query to insert student results
    $query = "INSERT INTO student_results (student_name, student_id, bangla1st, bangla2nd, english1st, english2nd, math, physics, chemistry, biology, higherMath, infoTech, islam, bdWorld, agriculture, homeScience, total_marks, average_marks, cgpa)
              VALUES (:student_name, :student_id, :bangla1st, :bangla2nd, :english1st, :english2nd, :math, :physics, :chemistry, :biology, :higherMath, :infoTech, :islam, :bdWorld, :agriculture, :homeScience, :total_marks, :average_marks, :cgpa)";

    // Prepare the statement
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':student_name', $studentName);
    $stmt->bindParam(':student_id', $studentID);
    $stmt->bindParam(':bangla1st', $_POST['bangla1st']);
    $stmt->bindParam(':bangla2nd', $_POST['bangla2nd']);
    $stmt->bindParam(':english1st', $_POST['english1st']);
    $stmt->bindParam(':english2nd', $_POST['english2nd']);
    $stmt->bindParam(':math', $_POST['math']);
    $stmt->bindParam(':physics', $_POST['physics']);
    $stmt->bindParam(':chemistry', $_POST['chemistry']);
    $stmt->bindParam(':biology', $_POST['biology']);
    $stmt->bindParam(':higherMath', $_POST['higherMath']);
    $stmt->bindParam(':infoTech', $_POST['infoTech']);
    $stmt->bindParam(':islam', $_POST['islam']);
    $stmt->bindParam(':bdWorld', $_POST['bdWorld']);
    $stmt->bindParam(':agriculture', $_POST['agriculture']);
    $stmt->bindParam(':homeScience', $_POST['homeScience']);
    $stmt->bindParam(':total_marks', $totalMarks);
    $stmt->bindParam(':average_marks', $averageMarks);
    $stmt->bindParam(':cgpa', $cgpa);

    // Execute the query
    $stmt->execute();

    header("Location: result_page.php?student_id=" . $studentID);
    exit;

    echo "<h3>Data submitted successfully!</h3>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
