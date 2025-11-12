<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Dropdown Example</title>
</head>
<body>

    <h5>Select a Fruit:</h5>
    <select id="mySelect" onchange="handleSelectChange()">
        <option value="Apple">Apple</option>
        <option value="Orange">Orange</option>
        <option value="Mango">Mango</option>
    </select>
    <p id="selectedValue"></p>

    <script>
        function handleSelectChange() {
            const selectElement = document.getElementById("mySelect");
            const selectedValue = selectElement.value;
            document.getElementById("selectedValue").textContent = `You selected: ${selectedValue}`;
        }
    </script>

</body>
</html>
