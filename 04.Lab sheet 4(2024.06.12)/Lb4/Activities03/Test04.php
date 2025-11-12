<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Example</title>
</head>
<body>
    <h5>Full Name :</h5>
    <p id="full-name"></p>

    <script>
        function Person(first_name, last_name, age) {
            this.first_name = first_name;
            this.last_name = last_name;
            this.age = age;
            this.getFullName = function() {
                return `${this.first_name} ${this.last_name}`;
            };
        }
        const person1 = new Person("Pasan", "Kalhara", 24);
        let fullName = person1.getFullName();
        document.getElementById("full-name").innerHTML = fullName;
    </script>
</body>
</html>


