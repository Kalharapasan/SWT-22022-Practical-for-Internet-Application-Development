<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Example</title>
</head>
<body onload="alert('Page loaded!')">

    <h3>Interactive Elements</h3>

    <!-- onchange -->
    <select onchange="alert('Selection changed!')">
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
    </select>

    <br><br>

    <!-- onclick -->
    <button onclick="alert('Button clicked!')">Click Me</button>

    <br><br>

    <!-- onmouseover & onmouseout -->
    <div 
        onmouseover="this.style.backgroundColor='lightblue'" 
        onmouseout="this.style.backgroundColor=''"
        style="padding:10px; width:150px; border:1px solid black;">
        Hover over me!
    </div>

    <br><br>

    <!-- onkeydown -->
    <input type="text" onkeydown="alert('Key pressed!')" placeholder="Type something">

</body>
</html>
