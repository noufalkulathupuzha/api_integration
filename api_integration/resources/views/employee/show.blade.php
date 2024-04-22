<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex items-center mb-4">
            <a href="{{ url()->previous() }}" class="flex items-center text-gray-600 hover:text-gray-800">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.707 4.293a1 1 0 011.414 1.414L9.414 10l3.707 3.707a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Back
            </a>
            <div class="ml-auto flex space-x-4">
                <a href="{{ route('employee.edit', $employee) }}" class="flex items-center text-gray-600 hover:text-gray-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M13.586 6.586a2 2 0 10-1.172-1.172L6.999 10l5.415 5.414a2 2 0 101.172-1.172L9.171 10l4.415-4.414zM5 4a2 2 0 00-2 2v8a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2H5z" clip-rule="evenodd" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('employee.destroy', $employee) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center text-gray-600 hover:text-gray-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 6a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zM3 10a1 1 0 011-1h1.34l.52-1.56A2 2 0 017.36 6h5.28a2 2 0 011.64.84l.52 1.56H17a1 1 0 110 2h-.34l-.52 1.56A2 2 0 0114.64 14H9.36a2 2 0 01-1.64-.84l-.52-1.56H4a1 1 0 01-1-1zm13-6h-3V3a3 3 0 00-3 3v1H7V6a3 3 0 00-3-3H1a1 1 0 00-1 1v2a3 3 0 003 3h1v8a3 3 0 003 3h6a3 3 0 003-3V10h1a3 3 0 003-3V4a1 1 0 00-1-1zm-3 14a1 1 0 01-1 1H6a1 1 0 01-1-1v-1h10v1z" clip-rule="evenodd" />
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
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
