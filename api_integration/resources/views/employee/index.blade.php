<!-- index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-center mb-8">Employee List</h1>

        <!-- Employee Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($employees as $employee)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $employee->name }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $employee->companyName }}</p>
                    <div class="flex items-center mt-4">
                        <span class="inline-block px-2 py-1 bg-gray-200 text-xs font-medium text-gray-700 rounded-full mr-2">{{ $employee->gender }}</span>
                        <span class="inline-block px-2 py-1 bg-gray-200 text-xs font-medium text-gray-700 rounded-full mr-2">Salary: ${{ number_format($employee->salary, 2) }}</span>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">{{ $employee->city }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</body>

</html>
