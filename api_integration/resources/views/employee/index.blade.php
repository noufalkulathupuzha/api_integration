<x-layout>

    <h1 class="text-3xl font-semibold text-center mb-8">Employee List</h1>

    <!-- Employee Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($employees as $employee)
            <a href="{{ route('employee.show', ['employee'=>$employee]) }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $employee->name }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $employee->companyName }}</p>
                    <div class="flex items-center mt-4">
                        <span class="inline-block px-2 py-1 bg-gray-200 text-xs font-medium text-gray-700 rounded-full mr-2">{{ $employee->gender }}</span>
                        <span class="inline-block px-2 py-1 bg-gray-200 text-xs font-medium text-gray-700 rounded-full mr-2">Salary: ${{ number_format($employee->salary, 2) }}</span>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">{{ $employee->city }}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $employees->links() }}
    </div>
    
</x-layout>
