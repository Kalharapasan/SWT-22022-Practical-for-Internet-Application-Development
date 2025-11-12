<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display House Address</title>
</head>
<body>
    <h5>Address :</h5>
    <p id="address"></p>

    <script>
        const house = {
            address: "Main street, B City",
            bedrooms: 4,
            bathroom: 2,
            getAddress: function() {
                return this.address;
            }
        };
        let address = house.getAddress();
        document.getElementById("address").innerHTML = address;
    </script>
</body>
</html>
