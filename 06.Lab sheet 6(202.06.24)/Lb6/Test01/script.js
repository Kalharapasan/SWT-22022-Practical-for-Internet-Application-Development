document.getElementById("fetchContent").addEventListener("click", fetchContentWithXMLHttpRequest);

function fetchContentWithXMLHttpRequest() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://getbootstrap.com/", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            var outputElement = document.getElementById("output");
            if (xhr.status === 200) {
                outputElement.innerHTML = xhr.responseText;
            } else {
                outputElement.textContent = "Error: " + xhr.status + " - Failed to fetch content.";
            }
        }
    };

    xhr.send();
}
