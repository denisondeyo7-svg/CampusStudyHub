<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_notes</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../admin/admin.css">
</head>
<body>
    <form action="add_notes.php" method="post" enctype="multipart/form-data">
        <p class="den">Notes <i class="fas fa-graduation-cap"></i></p>
        <div class="input">
            <input type="number"name="year"placeholder="year"required>
        </div>
        <div class="input">
            <input type="number"name="semister"placeholder="semister"required>
        </div>
        <div class="input">
            <input type="file"name="pdf"required>
        </div>
        <div class="input">
            <input type="text"name="description" placeholder="description"required>
        </div>
        <button id="editbtn"name="addnotes-btn">Add Notes</button>
    </form>
</body>
</html>