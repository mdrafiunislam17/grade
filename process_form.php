<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture Student Information
    $studentName = htmlspecialchars($_POST['studentName']);
    $studentID = htmlspecialchars($_POST['studentID']);

    // Capture Subject Marks
    $subjects = [
        "Bangla 1st Paper" => $_POST['bangla1st'],
        "Bangla 2nd Paper" => $_POST['bangla2nd'],
        "English 1st Paper" => $_POST['english1st'],
        "English 2nd Paper" => $_POST['english2nd'],
        "Math" => $_POST['math'],
        "Physics" => $_POST['physics'],
        "Chemistry" => $_POST['chemistry'],
        "Biology" => $_POST['biology'],
        "Higher Math" => $_POST['higherMath'],
        "Information & Technology" => $_POST['infoTech'],
        "Islam & Moral Education" => $_POST['islam'],
        "Bangladesh & World" => $_POST['bdWorld'],
        "Agriculture Studies" => $_POST['agriculture'],
        "Home Science" => $_POST['homeScience'],
    ];

    // Function to determine grade and grade points based on marks
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

    // Initialize total marks and total grade points
    $totalMarks = 0;
    $totalGradePoints = 0;

    // Calculate Total Marks and CGPA
    foreach ($subjects as $subject => $marks) {
        $marks = intval($marks); // Convert marks to integer
        $totalMarks += $marks;

        // Get grade and grade point for the subject
        list($grade, $gradePoint) = getGradeAndPoint($marks);
        $totalGradePoints += $gradePoint;
    }

    // Calculate Average Marks and CGPA
    $averageMarks = $totalMarks / count($subjects);
    $cgpa = $totalGradePoints / count($subjects);

    require "connection.php";
}


