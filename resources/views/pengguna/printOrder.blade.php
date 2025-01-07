<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Print Resi - {{ config('app.name') }}</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">  
    <style>  
        body {  
            font-family: 'Arial', sans-serif;  
            margin: 20px;  
            background-color: #f9f9f9;  
        }  
  
        h1, h2 {  
            text-align: center;  
            margin: 0;  
        }  
  
        h1 {  
            font-size: 28px;  
            margin-bottom: 10px;  
            color: #007bff;  
        }  
  
        h2 {  
            font-size: 22px;  
            margin-bottom: 20px;  
            color: #333;  
        }  
  
        .container {  
            width: 100%;  
            max-width: 800px;  
            margin: auto;  
            padding: 20px;  
            border: 1px solid #ddd;  
            border-radius: 5px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
            background-color: #fff;  
        }  
  
        .info {  
            margin-bottom: 20px;  
            font-size: 16px;  
        }  
  
        .info p {  
            margin: 5px 0;  
        }  
  
        .table {  
            width: 100%;  
            border-collapse: collapse;  
            margin-top: 20px;  
        }  
  
        .table th, .table td {  
            border: 1px solid #ddd;  
            padding: 12px;  
            text-align: center;  
        }  
  
        .table th {  
            background-color: #007bff;  
            color: white;  
            font-size: 18px;  
        }  
  
        .table td {  
            font-size: 16px;  
        }  
  
        .summary {  
            margin-top: 20px;  
            font-size: 18px;  
            text-align: right;  
        }  
  
        .summary p {  
            margin: 5px 0;  
        }  
  
        .footer {  
            margin-top: 30px;  
            text-align: center;  
            font-size: 14px;  
            color: #777;  
        }  
  
        @media print {  
            body {  
                -webkit-print-color-adjust: exact; /* Chrome */  
                print-color-adjust: exact; /* Firefox */  
            }  
            .no-print {  
                display: none;  
            }  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>{{ config('app.name') }}</h1>  
        <h2>Bukti Transaksi</h2>  
        <hr>  
          
        <div class="info">  
            <p><strong>No Transaksi:</strong> {{ $order->id_order }}</p>  
            <p><strong>Tanggal:</strong> {{ $order->tgl_order }}</p>  
            <p><strong>Paket Layanan:</strong> {{ $order->package->nama_paket }}</p>  
            <p><strong>Berat:</strong> {{ $order->berat_kg }} kg</p>  
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>  
        </div>  
          
        <table class="table">  
            <thead>  
                <tr>  
                    <th>No</th>  
                    <th>Paket Laundry</th>  
                    <th>Banyak (kg)</th>  
                    <th>Harga per kg</th>  
                    <th>Sub Total</th>  
                </tr>  
            </thead>  
            <tbody>  
                <tr>  
                    <td>1</td>  
                    <td>{{ $order->package->nama_paket }}</td>  
                    <td>{{ $order->berat_kg }}</td>  
                    <td>Rp {{ number_format($order->subtotal / $order->berat_kg, 2, ',', '.') }}</td> <!-- Price per kg -->  
                    <td>Rp {{ number_format($order->subtotal, 2, ',', '.') }}</td>  
                </tr>  
                <tr>  
                    <td colspan="4" class="text-center"><strong>Subtotal Harga</strong></td>  
                    <td>Rp {{ number_format($order->subtotal, 2, ',', '.') }}</td>  
                </tr>  
            </tbody>  
        </table>  
  
        <div class="summary">  
            <p><strong>Dibayar:</strong> Rp {{ number_format($order->subtotal, 2, ',', '.') }}</p>  
            <p><strong>Tanggal Cetak:</strong> {{ now()->format('d-m-Y H:i') }}</p>  
        </div>  
  
        <div class="footer">  
            <p>Terima kasih telah menggunakan layanan kami!</p>  
            <button class="no-print" onclick="window.print()" style="margin-top: 20px; padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Cetak</button>  
        </div>  
    </div>  
</body>  
</html>  
