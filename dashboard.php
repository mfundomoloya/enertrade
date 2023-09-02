
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kilowatts to Rands Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .balance{
            width: 200px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="balance" onclick="sell()">
        <h1 >Available Balance</h1>
        <p id="theBalance">R 0.00</p>
    </div>
    <div class="container">
        <h1>Kilowatts to Rands Converter</h1>
        <form id="converter-form">
            <label for="kilowatts">Enter Kilowatts:</label>
            <input type="number" id="kilowatts" step="0.01" required>
            <br>
            <button type="button" onclick="convert()">Convert</button>
            <button type= "button" onclick="sell()">Sell</button>
        </form>
        <p id="result"></p>
    </div>
    <br><br>
   

    <script>
        //declare and initialise the available balance
        let availableBalance = 0;
        function convert() {
            const kilowattsInput = document.getElementById('kilowatts');
            const resultElement = document.getElementById('result');

            // Conversion rate: 1 Kilowatt = 2.779 Rands (assuming a simple conversion for this example)
            const kilowatts = parseFloat(kilowattsInput.value);
            if (!isNaN(kilowatts)) {
                const rands = kilowatts * 2.78;
                resultElement.textContent = `${kilowatts} Kilowatts is R ${rands.toFixed(2)}.`;
            } else {
                resultElement.textContent = "Please enter a valid number of kilowatts.";
            }
        }
        function sell()
        {
            const kilowattsInput = document.getElementById('kilowatts');
            const resultElement = document.getElementById('result');
            const balanceElement = document.getElementById('theBalance');

            // Conversion rate: 1 Kilowatt = 2.779 Rands (assuming a simple conversion for this example)
            const kilowatts = parseFloat(kilowattsInput.value);
            if (!isNaN(kilowatts)) {
                const rands = kilowatts * 2.78;
                resultElement.textContent = `You have sold ${kilowatts} Kilowatts for R ${rands.toFixed(2)}.`;
                availableBalance = availableBalance + rands;
                balanceElement.textContent =  `R ${availableBalance.toFixed(2)}`;
            } else {
                resultElement.textContent = "Please enter a valid number of kilowatts.";
            }
        }
    </script>
    
</body>
</html>
