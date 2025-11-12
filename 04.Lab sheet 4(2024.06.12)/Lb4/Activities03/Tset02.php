<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        // Creating Object 
        const house = { 
            address: "Main street, B City", 
            bedrooms: 4, 
            bathroom: 2 
        };

        // Create empty object and add properties
        const house2 = {};
        house2.address = "Main street, B City";
        house2.bedrooms = 4; 
        house2.bathroom = 2;

        // Create object with new keyword
        const house3 = new Object();
        house3.address = "Main street, B City"; 
        house3.bedrooms = 4; 
        house3.bathroom = 2; 

        // Output all objects to the console
        console.log("House 1:", house);
        console.log("House 2:", house2);
        console.log("House 3:", house3);
    </script>
</head>
<body>
    
</body>
</html>
