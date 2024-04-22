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
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path fill-rule="evenodd"
                        d="M14.293 5.293a1 1 0 00-1.414 1.414L12.414 10l-2.121 2.121a1 1 0 101.414 1.414L13.414 11l2.121 2.121a1 1 0 001.414-1.414L14.414 10l2.121-2.121a1 1 0 00-1.414-1.414L13.414 9l-2.121-2.121a1 1 0 00-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    @endif


    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path fill-rule="evenodd"
                        d="M14.293 5.293a1 1 0 00-1.414 1.414L12.414 10l-2.121 2.121a1 1 0 101.414 1.414L13.414 11l2.121 2.121a1 1 0 001.414-1.414L14.414 10l2.121-2.121a1 1 0 00-1.414-1.414L13.414 9l-2.121-2.121a1 1 0 00-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    @endif



    <div class="container mx-auto px-4 py-8">
        {{ $slot }}
    </div>
</body>
