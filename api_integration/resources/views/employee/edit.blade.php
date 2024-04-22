<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-8 text-gray-800">Edit Employee: {{ $employee->name }}</h1>
        
        <!-- Edit Form -->
        <form action="{{ route('employee.update', $employee) }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ $employee->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Company Name Input -->
            <div class="mb-4">
                <label for="companyName" class="block text-gray-700 font-bold mb-2">Company Name</label>
                <input type="text" id="companyName" name="companyName" value="{{ $employee->companyName }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Gender Input -->
            <div class="mb-4">
                <label for="gender" class="block text-gray-700 font-bold mb-2">Gender</label>
                <input type="text" id="gender" name="gender" value="{{ $employee->gender }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Salary Input -->
            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                <input type="number" id="salary" name="salary" value="{{ $employee->salary }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- City Input -->
            <div class="mb-6">
                <label for="city" class="block text-gray-700 font-bold mb-2">City</label>
                <input type="text" id="city" name="city" value="{{ $employee->city }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
                <a href="{{ route('employee.show', $employee) }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
