<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex justify-center mb-8">
            <a href="{{ route('employee.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Go to Employee List
            </a>
        </div>

        <div class="bg-gradient-to-br from-blue-100 to-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-semibold mb-4 text-gray-800">Welcome to Api Integration</h1>
                
                <div class="mb-8 mt-2">
                    <p class="text-lg text-gray-700">
                        APIs (Application Programming Interfaces) are tools that allow different software applications to communicate with each other. In the context of web development, APIs enable interaction between various web services and applications, facilitating data exchange and functionality integration.
                    </p>
                    <p class="mt-4 text-lg text-gray-700">
                        API integration in Laravel involves incorporating external APIs into your Laravel application to leverage additional features, data, or services provided by third-party providers. Laravel provides robust tools and libraries to simplify API integration, making it easier to consume and interact with external services.
                    </p>
                    <p class="mt-4 text-lg text-gray-700">
                        Some common use cases of API integration in Laravel include:
                    </p>
                    <ul class="list-disc ml-8 mt-2 text-lg text-gray-700">
                        <li>Fetching data from external APIs (e.g., weather data, currency exchange rates).</li>
                        <li>Integrating payment gateways for processing online payments.</li>
                        <li>Authenticating users via third-party services (e.g., OAuth).</li>
                        <li>Interacting with social media platforms for sharing content or fetching user data.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
