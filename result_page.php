<?php

// Database connection
$host = "localhost";
$dbname = "grade";
$username = "root";
$password = "";

function getGradeAndPoint($marks) {
    if ($marks >= 90 && $marks <= 99) {
        return ['A+', 5.00];
    } elseif ($marks >= 80 && $marks <= 89) {
        return ['A-', 4.50];
    } elseif ($marks >= 70 && $marks <= 79) {
        return ['A', 4.00];
    } elseif ($marks >= 60 && $marks <= 69) {
        return ['B+', 3.50];
    } elseif ($marks >= 50 && $marks <= 59) {
        return ['B', 3.00];
    } elseif ($marks >= 40 && $marks <= 49) {
        return ['C', 2.00];
    } else {
        return ['F', 0.00];
    }
}

function getGradeByGPA($gpa) {
    if ($gpa >= 4.80 && $gpa <= 5.00) {
        return 'A+';
    } elseif ($gpa >= 4.50 && $gpa < 4.80) {
        return 'A';
    } elseif ($gpa >= 4.00 && $gpa < 4.50) {
        return 'A-';
    } elseif ($gpa >= 3.50 && $gpa < 4.00) {
        return 'B+';
    } elseif ($gpa >= 3.00 && $gpa < 3.50) {
        return 'B';
    } elseif ($gpa >= 2.00 && $gpa < 3.00) {
        return 'C';
    } else {
        return 'F';
    }
}

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve the student ID from the URL or session
    if (isset($_GET['student_id'])) {
        $studentID = htmlspecialchars($_GET['student_id']);

        // Query to fetch student result from the database
        $query = "SELECT * FROM student_results WHERE student_id = :student_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':student_id', $studentID);
        $stmt->execute();

        // Fetch student data
        $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($studentData) {
            // Extract the data
            $studentName = $studentData['student_name'];
            $totalMarks = $studentData['total_marks'];
            $averageMarks = $studentData['average_marks'];
            $gpa = $studentData['cgpa'];
            $subjects = [
                "Bangla 1st Paper" => $studentData['bangla1st'],
                "Bangla 2nd Paper" => $studentData['bangla2nd'],
                "English 1st Paper" => $studentData['english1st'],
                "English 2nd Paper" => $studentData['english2nd'],
                "Math" => $studentData['math'],
                "Physics" => $studentData['physics'],
                "Chemistry" => $studentData['chemistry'],
                "Biology" => $studentData['biology'],
                "Higher Math" => $studentData['higherMath'],
                "Information & Technology" => $studentData['infoTech'],
                "Islam & Moral Education" => $studentData['islam'],
                "Bangladesh & World" => $studentData['bdWorld'],
                "Agriculture Studies" => $studentData['agriculture'],
                "Home Science" => $studentData['homeScience'],
            ];
            $isFailed = false; // Flag to track if the student failed any subject

                foreach ($subjects as $subject => $marks) {
                    list($grade, $gradePoint) = getGradeAndPoint($marks);
                    if ($grade == 'F') {
                        $isFailed = true; // Mark as failed if any grade is "F"
                        break;
                    }
                }

        } else {
            echo "<h3>No results found for this student ID!</h3>";
            exit;
        }
    } else {
        echo "<h3>Student ID is required!</h3>";
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Student Result</h1>

    <h2>Student Information</h2>
    <p><strong>Name:</strong> <?php echo $studentName; ?></p>
    <p><strong>Student ID:</strong> <?php echo $studentID; ?></p>

    <h2>Subject Marks</h2>
    <table>
        <tr>
            <th>Subject</th>
            <th>Marks Obtained</th>
            <th>Grade</th>
            <th>Grade Point</th>
        </tr>
        <?php foreach ($subjects as $subject => $marks): ?>
        <?php
            list($grade, $gradePoint) = getGradeAndPoint($marks);
        ?>
        <tr>
            <td><?php echo $subject; ?></td>
            <td><?php echo $marks; ?></td>
            <td class="<?php echo $grade == 'F' ? 'grade-F' : 'grade-A'; ?>"><?php echo $grade; ?></td>
            <td><?php echo $gradePoint; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="result-summary">
    <?php if ($isFailed): ?>
        <p><strong>Result:</strong> Failed</p>
        <p style="color: red;">One or more subjects have a failing grade ("F").</p>
    <?php else: ?>
        <p><strong>Total Marks:</strong> <?php echo $totalMarks; ?></p>
        <p><strong>Average Marks:</strong> <?php echo round($averageMarks, 2); ?></p>
        <p><strong>GPA:</strong> <?php echo round($gpa, 2); ?></p>
        <p><strong>Grade:</strong> <?php echo getGradeByGPA($gpa); ?></p>
    <?php endif; ?>
</div>


</div>

<div class="footer">

    <p>© <?php echo date("Y"); ?> Student Result Management System</p>
</div>
