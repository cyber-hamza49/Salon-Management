<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>BarberX Salon - Invoice</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            color: #333;
            line-height: 1.6;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .invoice-container {
            background-color: white;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px;
            border-bottom: 2px solid #D5B981;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #b8995d;
            margin: 0;
        }
        .invoice-info { 
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            font-size: 0.9em;
        }
        .customer-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th, td { 
            padding: 12px; 
            border: 1px solid #e0e0e0; 
            text-align: left;
        }
        th {
            background-color: #1d2434;
            color: #D5B981;
            font-weight: bold;
        }
        .total { 
            text-align: right;
            padding: 15px 0;
            border-top: 2px solid #D5B981;
        }
        .total p {
            margin: 10px 0;
            font-size: 1.1em;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <h1>BarberX Salon</h1>
            <p>Invoice</p>
        </div>

        <div class="customer-info">
            <h3>Bill To:</h3>
            <p>Name: <strong>{{ $user->name }}</strong></p>
            <p>Email: {{ $user->email }}</p>
        </div>

        <div class="invoice-info">
            <div>
                <strong>Invoice No:</strong> {{ $invoice_no }}
            </div>
            <div>
                <strong>Date:</strong> {{ $date }}
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Stylist</th>
                    <th>Date & Time</th>
                    <th>Price (PKR)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->service->Name }}</td>
                    <td>{{ $appointment->stylist->name }}</td>
                    <td>{{ $appointment->date }} {{ $appointment->time }}</td>
                    <td class="amount">PKR {{ number_format($appointment->service->Price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <p><strong>Total (PKR):</strong> PKR {{ number_format($totalPKR, 2) }}</p>
            <p><strong>Total (USD):</strong> $ {{ number_format($totalUSD, 2) }}</p>
        </div>

        <div class="footer">
            <p>Thank you for choosing BarberX Salon!</p>
            <p>Transaction ID: {{ $transaction_id }}</p>
        </div>
    </div>
</body>
</html>