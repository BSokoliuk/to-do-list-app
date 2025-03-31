<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('View To-do item') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
      <div class="mb-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">Title:</h3>
        <p class="text-gray-700 dark:text-gray-300">{{ $todo->title }}</p>
      </div>
      <div class="mb-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">Description:</h3>
        <p class="text-gray-700 dark:text-gray-300">{{ $todo->description }}</p>
      </div>
      <div class="mb-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">Priority:</h3>
        <p class="text-gray-700 dark:text-gray-300">{{ ucfirst($todo->priority) }}</p>
      </div>
      <div class="mb-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">Status:</h3>
        <p class="text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('-', ' ', $todo->status)) }}</p>
      </div>
      <div class="mb-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">End date:</h3>
        <p class="text-gray-700 dark:text-gray-300">{{ $todo->end_date }}</p>
      </div>
      <div class="mb-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">Change History:</h3>
        @if ($todo->changes->isNotEmpty())
          @php
            $groupedChanges = $todo->changes->groupBy(function ($change) {
                return $change->created_at->format('Y-m-d H:i:s'); // Group by exact timestamp
            });
          @endphp

          @foreach ($groupedChanges as $timestamp => $changes)
            <div class="mb-4">
              <h4 class="text-md font-semibold text-gray-700 dark:text-gray-300">Changes made on {{ $timestamp }}:</h4>
              @foreach ($changes as $change)
                <p class="text-gray-700 dark:text-gray-300">
                  {{ $change->field }}: {{ $change->old_value }} → {{ $change->new_value }}
                </p>
              @endforeach
            </div>
          @endforeach
        @else
          <p class="text-gray-700 dark:text-gray-300">No changes have been made yet.</p>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>