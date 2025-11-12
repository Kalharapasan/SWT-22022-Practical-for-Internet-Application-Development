document.getElementById("submitForm").addEventListener("click", submitForm);

function submitForm() {
	var form = document.getElementById("myForm");
	var name = form.elements["name"].value;
	var email = form.elements["email"].value;
	var outputElement = document.getElementById("formOutput");
			
	if (name && email) {
		var formData = new FormData(form);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "process.php", true);
		xhr.onload = function() {
			if (xhr.status === 200) {
				outputElement.innerHTML = xhr.responseText;
			} else {
				outputElement.innerHTML = "Form submission failed.";
			}
		};
		xhr.send(formData);
		} else {
			outputElement.innerHTML = "Please fill in all fields.";
		}
	}
setTimeout(function () {
	var contentElement = document.getElementById("content");
	contentElement.textContent = "This is updated content using AJAX!";
}, 5000);