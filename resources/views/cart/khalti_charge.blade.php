<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Khalti Payment</title>
    <!-- Include Khalti's JavaScript SDK -->
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Pay with Khalti</h1>
        <p>Total Amount: NPR {{ number_format($amount / 100, 2) }}</p>

        <!-- Payment Button -->
        <button id="pay-button" style="padding: 10px 20px; background-color: #5a67d8; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Pay Now
        </button>

        <div id="payment-status" style="margin-top: 20px;"></div>
    </div>

    <script>
        const config = {
            publicKey: "{{ $public_key }}", // Public key from the backend
            productIdentity: "{{ $product_identity }}", // Order ID
            productName: "{{ $product_name }}", // Product name
            productUrl: "{{ $product_url }}", // Product URL
            paymentPreference: ["KHALTI"], // Payment methods
            eventHandler: {
                onSuccess(payload) {
                    // Update status on the page
                    document.getElementById("payment-status").innerHTML = "Processing your payment...";

                    // Send payload.token and other data to your backend for verification
                    fetch("{{ url('khalti/verify-payment') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById("payment-status").innerHTML = "Payment successful! Redirecting...";
                            window.location.href = "{{ $payment_success_url }}";
                        } else {
                            document.getElementById("payment-status").innerHTML = "Payment verification failed!";
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        document.getElementById("payment-status").innerHTML = "An error occurred during verification.";
                    });
                },
                onError(error) {
                    console.error(error);
                    document.getElementById("payment-status").innerHTML = "An error occurred during payment!";
                },
                onClose() {
                    console.log("Payment widget is closed.");
                }
            }
        };

        const checkout = new KhaltiCheckout(config);

        // Attach the payment button click event
        document.getElementById("pay-button").addEventListener("click", function () {
            checkout.show({ amount: {{ $amount }} }); // Amount in paisa
        });
    </script>
</body>
</html>