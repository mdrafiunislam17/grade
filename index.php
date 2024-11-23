<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Subject Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    .form-header {
      font-family: 'Arial', sans-serif;
      color: #495057;
      margin-bottom: 20px;
      text-align: center;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-label {
      font-weight: 600;
    }
    .submit-btn {
      display: block;
      width: 100%;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="form-container">
          <h2 class="form-header">Student Subject Form</h2>
          <form action="process_form.php" method="POST">
           <!-- Student Information -->
<div class="row">
  <div class="col-md-6 form-group">
    <label for="studentName" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter your name">
  </div>
  <div class="col-md-6 form-group">
    <label for="studentID" class="form-label">Student ID</label>
    <input type="number" class="form-control" id="studentID" name="studentID" placeholder="Enter your ID">
  </div>
</div>

<!-- Subject Selection -->
<h4 class="mb-3 mt-4">Select Your Subjects</h4>
<div class="row">
  <div class="col-md-6 form-group">
    <label class="form-label" for="bangla1st">Bangla 1st Paper (Code: 101)</label>
    <input class="form-control" type="number" id="bangla1st" name="bangla1st" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="bangla2nd">Bangla 2nd Paper (Code: 102)</label>
    <input class="form-control" type="number" id="bangla2nd" name="bangla2nd" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="english1st">English 1st Paper (Code: 103)</label>
    <input class="form-control" type="number" id="english1st" name="english1st" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="english2nd">English 2nd Paper (Code: 104)</label>
    <input class="form-control" type="number" id="english2nd" name="english2nd" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="math">Math (Code: 105)</label>
    <input class="form-control" type="number" id="math" name="math" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="physics">Physics (Code: 106)</label>
    <input class="form-control" type="number" id="physics" name="physics" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="chemistry">Chemistry (Code: 107)</label>
    <input class="form-control" type="number" id="chemistry" name="chemistry" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="biology">Biology (Code: 108)</label>
    <input class="form-control" type="number" id="biology" name="biology" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="higherMath">Higher Math (Code: 109)</label>
    <input class="form-control" type="number" id="higherMath" name="higherMath" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="infoTech">Information & Technology (Code: 110)</label>
    <input class="form-control" type="number" id="infoTech" name="infoTech" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="islam">Islam & Moral Education (Code: 111)</label>
    <input class="form-control" type="number" id="islam" name="islam" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="bdWorld">Bangladesh & World (Code: 112)</label>
    <input class="form-control" type="number" id="bdWorld" name="bdWorld" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="agriculture">Agriculture Studies (Code: 113)</label>
    <input class="form-control" type="number" id="agriculture" name="agriculture" placeholder="Marks">
  </div>
  <div class="col-md-6 form-group">
    <label class="form-label" for="homeScience">Home Science (Code: 114)</label>
    <input class="form-control" type="number" id="homeScience" name="homeScience" placeholder="Marks">
  </div>
</div>

<!-- Submit Button -->
<button type="submit" class="btn btn-primary submit-btn mt-4">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
