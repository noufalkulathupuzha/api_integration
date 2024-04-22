<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-8 text-gray-800">Create New Employee</h1>

        <!-- Create Form -->
        <form action="{{ route('employee.store') }}" method="POST"
            class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            @csrf

            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Company Name Input -->
            <div class="mb-4">
                <label for="companyName" class="block text-gray-700 font-bold mb-2">Company Name</label>
                <input type="text" id="companyName" name="companyName"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Gender Input (Dropdown) -->
            <div class="relative mb-4">
                <label for="gender" class="block text-gray-700 font-bold mb-2">Gender</label>
                <div class="inline-block relative w-full">
                    <select id="gender" name="gender"
                        class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <!-- Heroicon: selector -->
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Salary Input -->
            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                <input type="number" id="salary" name="salary"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- City Input -->
            <div class="mb-6">
                <label for="city" class="block text-gray-700 font-bold mb-2">City</label>
                <input type="text" id="city" name="city"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                    Employee</button>
                <a href="{{ route('employee.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
