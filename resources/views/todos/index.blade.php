<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('todos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + New To-Do
                        </a>
                    </div>

                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-200 uppercase text-sm font-bold">
                            <tr>
                                <th class="py-3 px-4 text-left">Title</th>
                                <th class="py-3 px-4 text-left">Description</th>
                                <th class="py-3 px-4 text-left">Status</th>
                                <th class="py-3 px-4 text-left">Priority</th>
                                <th class="py-3 px-4 text-left">End date</th>
                                <th class="py-3 px-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300">
                            @foreach ($todos as $todo)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="py-3 px-4">{{ $todo->title }}</td>
                                    <td class="py-3 px-4">{{ $todo->description }}</td>
                                    <td class="py-3 px-4">{{ $todo->status }}</td>
                                    <td class="py-3 px-4">{{ $todo->priority }}</td>
                                    <td class="py-3 px-4">{{ $todo->end_date }}</td>
                                    <td class="py-3 px-4 text-right">
                                        <a href="{{ route('todos.show', $todo) }}" class="dark:text-white text-black hover:underline block">View/See changes</a>
                                        <a href="{{ route('todos.edit', $todo) }}" class="text-blue-500 hover:underline block">Edit</a>
                                        <button onclick="generatePublicLink('{{ $todo->id }}')" class="text-green-500 hover:underline w-full block text-right">Generate Link</button>
                                        <form onsubmit="confirmDeleting(event, '{{ $todo->title }}')" action="{{ route('todos.destroy', $todo) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div id="public-link-container" class="mt-4 hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            <strong>Public Link:</strong> 
                            <a id="public-link" href="#" target="_blank" class="text-blue-500 hover:underline"></a>
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <strong>Expires At:</strong> <span id="public-link-expiration"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function generatePublicLink(todoId) {
        fetch(`/todos/${todoId}/generate-public-link`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.public_link) {
                const expirationDate = new Date(data.expires_at);
                const formattedDate = expirationDate.toISOString().slice(0, 16).replace('T', ' ');

                document.getElementById('public-link').href = data.public_link;
                document.getElementById('public-link').textContent = data.public_link;
                document.getElementById('public-link-expiration').textContent = formattedDate;

                document.getElementById('public-link-container').classList.remove('hidden');
            } else {
                alert('Failed to generate public link.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while generating the public link.');
        });
    }

    function confirmDeleting(event, todoTitle) {
        if (!confirm(`Are you sure you want to delete the To-do item "${todoTitle}"?`)) {
            event.preventDefault();
        }
    }
</script>