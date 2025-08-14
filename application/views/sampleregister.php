<!DOCTYPE html>
<html>
<head>
    <title>Balance Amount Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        label { display: inline-block; width: 120px; margin-bottom: 10px; }
        input[type="number"] { width: 120px; padding: 4px; }
        .result { font-weight: bold; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Balance Amount Calculator</h2>
    <form>
        <label for="payAmount">Pay Amount:</label>
        <input type="number" id="payAmount" value="1000" min="0" step="0.01" readonly><br>

        <label for="receivedAmount">Received Amount:</label>
        <input type="number" id="receivedAmount" min="0" step="0.01" autocomplete="off"><br>

        <label for="balanceAmount">Balance:</label>
        <input type="number" id="balanceAmount" readonly><br>
    </form>
    <div id="message" class="result"></div>

    <script>
        const payAmount = document.getElementById('payAmount');
        const receivedAmount = document.getElementById('receivedAmount');
        const balanceAmount = document.getElementById('balanceAmount');
        const message = document.getElementById('message');

        function updateBalance() {
            const pay = parseFloat(payAmount.value) || 0;
            const received = parseFloat(receivedAmount.value) || 0;
            const balance = received - pay;
            balanceAmount.value = balance.toFixed(2);

            if(receivedAmount.value === '') {
                message.textContent = '';
            } else if(balance < 0) {
                message.textContent = 'Insufficient amount received!';
                message.style.color = 'red';
            } else {
                message.textContent = 'Change to return: ₹' + balance.toFixed(2);
                message.style.color = 'green';
            }
        }

        receivedAmount.addEventListener('input', updateBalance);

        // Optional: Update balance if pay amount is editable
        // payAmount.addEventListener('input', updateBalance);
    </script>
</body>
</html>