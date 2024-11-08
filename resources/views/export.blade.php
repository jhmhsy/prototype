<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Members</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Download Members Data</h1>
        <a href="{{ route('export.members') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Download Excel
        </a>
        <a href="{{ route('export.lockers') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Download Lockers Data
        </a>
        <a href="{{ route('export.services') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            Download Services Data
        </a>
        <a href="{{ route('export.treadmills') }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            Download Treadmills Data
        </a>
    </div>
</body>

</html>