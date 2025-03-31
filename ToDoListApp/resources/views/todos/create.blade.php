<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Creation of the new To-do item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('todos.store') }}" method="POST" class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Provide the title of the task" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Provide the description (not required)"></textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="priority" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Priority:</label>
                <select name="priority" id="priority" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
                @error('priority')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Status:</label>
                <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="to-do">To-do</option>
                    <option value="in-progress">In progress</option>
                    <option value="done">Done</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">End date:</label>
                <input type="date" name="end_date" id="end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('end_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create To-do</button>
        </form>
    </div>
</x-app-layout>