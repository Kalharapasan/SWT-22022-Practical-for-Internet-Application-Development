<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Student Management</h1>

    <form id="studentForm" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" id="name" class="form-control" placeholder="Student Name" required>
        </div>
        <div class="mb-3">
            <label for="gpa" class="form-label">GPA</label>
            <input type="number" id="gpa" class="form-control" placeholder="GPA" required step="0.01" min="0" max="4.0">
        </div>
        <input type="submit" value="Add Student" class="btn btn-primary">
    </form>

    <table id="studentTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>GPA</th>
            </tr>
        </thead>    
        <tbody>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    loadStudents();

    // Prevent default form submission
    $("#studentForm").on("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        addStudent(); // Call the function to add a student
    });
});

function loadStudents() {
    $.ajax({
        url: "get_students.php",
        type: "GET",
        success: function(response) {
            try {
                var data = JSON.parse(response);
                if (data.success && data.students && Array.isArray(data.students)) {
                    $("#studentTable tbody").empty();
                    for (var i = 0; i < data.students.length; i++) {
                        var student = data.students[i];
                        var tableRow = "<tr>";
                        tableRow += "<td>" + student.Id + "</td>";
                        tableRow += "<td>" + student.Name + "</td>";
                        tableRow += "<td>" + student.Gpa + "</td>";
                        tableRow += "</tr>";
                        $("#studentTable tbody").append(tableRow);
                    }
                } else {
                    console.warn("Unexpected response format: students array not found.");
                }
            } catch (error) {
                console.error("Error parsing response:", error);
                alert("An error occurred while retrieving student data.");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
            alert("An error occurred while retrieving student data.");
        }
    });
}

function addStudent() {
    var name = $("#name").val().trim();
    var gpa = parseFloat($("#gpa").val());

    if (name === "") {
        alert("Please enter a name.");
        return;
    }
    if (isNaN(gpa) || gpa < 0 || gpa > 4) {
        alert("Please enter a valid GPA between 0 and 4.");
        return;
    }

    $.ajax({
        url: "add_student.php",
        type: "POST",
        data: {
            name: name,
            gpa: gpa
        },
        success: function(response) {
            try {
                var data = JSON.parse(response);
                if (data.success) {
                    $("#studentForm").trigger("reset");
                    loadStudents(); // Reload the student list
                    console.log("Student added successfully!");
                } else {
                    alert("Error adding student: " + data.message);
                }
            } catch (error) {
                console.error("Error parsing response:", error);
                alert("An error occurred while adding the student. Please check your server logs.");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
            alert("An error occurred while adding the student.");
        }
    });
}
</script>
</body>
</html>
