<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container my-5">
		<h1 class="text-center mb-4">Submission</h1>
		<form id="myForm">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<button type="button" id="submitForm" class="btn btn-primary">Submit</button>
		</form>
		<div id="formOutput" class="mt-4 p-3 border rounded bg-light"></div>
		<div id="content" class="mt-4 p-3 border rounded bg-light">
			This content will update 
		</div>
	</div>
	<script src="script.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
