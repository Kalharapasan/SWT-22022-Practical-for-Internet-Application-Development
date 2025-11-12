document.getElementById("fetchContent").addEventListener("click",fetchContentWithFetchAPI);
function fetchContentWithFetchAPI() {
	fetch("https://getbootstrap.com/").then(response => {
	if (response.ok) {
		return response.text();
	} else {
		throw new Error("Failed to fetch content with fetch API.");
	}
	}).then(content => {
		displayContent("output", content);
	}).catch(error => {
		displayError("output", error.message);
	});
}
function displayContent(targetId, content) {
	var outputElement = document.getElementById(targetId);
	outputElement.textContent = content;
}
function displayError(targetId, errorMessage) {
	var outputElement = document.getElementById(targetId);
	outputElement.textContent = "Error: " + errorMessage;
}
