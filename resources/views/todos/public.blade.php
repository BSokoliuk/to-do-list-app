<x-guest-layout>
  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
      <h1 class="text-2xl font-bold">{{ $todo->title }}</h1>
      @if ($todo->description)
        <p class="mt-4"><strong>Description:</strong> {{ $todo->description }}</p>
      @endif
      <p class="mt-4"><strong>Priority:</strong> {{ ucfirst($todo->priority) }}</p>
      <p class="mt-4"><strong>Status:</strong> {{ ucfirst($todo->status) }}</p>
      <p class="mt-4"><strong>End Date:</strong> {{ $todo->end_date }}</p>
    </div>
  </div>
</x-guest-layout>