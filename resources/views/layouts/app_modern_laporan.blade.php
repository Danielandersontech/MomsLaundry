<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laporan' }} :: {{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        h3 {
            color: #007bff;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table tfoot td {
            font-weight: bold;
            background-color: #e9ecef;
        }

        .icon {
            font-size: 1.5rem;
            color: #007bff;
        }

        .filter-active {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .filter-active strong {
            color: #007bff;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        @include('flash::message')
        @yield('content')
    </div>
</body>

</html>
