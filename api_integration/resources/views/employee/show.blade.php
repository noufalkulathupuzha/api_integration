<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex items-center mb-4">
            <a href="{{ url()->previous() }}" class="flex items-center text-gray-600 hover:text-gray-800">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.707 4.293a1 1 0 011.414 1.414L9.414 10l3.707 3.707a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Back
            </a>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-semibold mb-4 text-gray-800">{{ $employee->name }}</h1>
                <div class="border-b border-gray-200 mb-4"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600"><span class="font-semibold">Company:</span> {{ $employee->companyName }}</p>
                        <p class="text-sm text-gray-600 mt-2"><span class="font-semibold">Gender:</span> {{ $employee->gender }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600"><span class="font-semibold">Salary:</span> ${{ number_format($employee->salary, 2) }}</p>
                        <p class="text-sm text-gray-600 mt-2"><span class="font-semibold">City:</span> {{ $employee->city }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
