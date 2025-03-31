<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ToDoController extends Controller
{
  public function index(Request $request): View
  {
    $query= $request->user()->todos();

    if ($request->has('priority') && $request->priority !== 'all') {
      $query->where('priority', $request->priority);
    }

    if ($request->has('status') && $request->status !== 'all') {
      $query->where('status', $request->status);
    }

    if ($request->has('end_date') && $request->end_date !== null) {
      $query->whereDate('end_date', $request->end_date);
    }

    $todos = $query->get();

    return view('todos.index', compact('todos'));
  }

  public function create(Request $request): View
  {
    return view('todos.create', [
      'user' => $request->user(),
    ]);
  }

  public function store(Request $request): RedirectResponse
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'priority' => 'required|in:low,medium,high',
      'status' => 'required|in:to-do,in-progress,done',
      'end_date' => 'required|date',
    ]);

    $validated['user_id'] = $request->user()->id;

    $request->user()->todos()->create($validated);

    return Redirect::route('todos.index')->with('status', 'todo-created');
  }

  public function edit(Request $request, $id): View
  {
    $todo = $request->user()->todos()->findOrFail($id);

    return view('todos.edit', [
      'todo' => $todo,
      'user' => $request->user(),
    ]);
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'priority' => 'required|in:low,medium,high',
      'status' => 'required|in:to-do,in-progress,done',
      'end_date' => 'required|date',
    ]);

    $todo = $request->user()->todos()->findOrFail($id);
    $todo->update($validated);

    return Redirect::route('todos.index')->with('status', 'todo-updated');
  }

  public function destroy(Request $request, $id): RedirectResponse
  {
    $todo = $request->user()->todos()->findOrFail($id);
    $todo->delete();

    return Redirect::route('todos.index')->with('status', 'todo-deleted');
  }

  public function generatePublicLink(Request $request, $id)
  {
    $todo = $request->user()->todos()->findOrFail($id);

    // unique token + expiration time 15 minutes
    $todo->public_token = Str::random(32);
    $todo->public_token_expires_at = now()->addMinutes(15);
    $todo->save();

    // public link
    $publicLink = route('todos.public', ['token' => $todo->public_token]);

    return response()->json([
        'message' => 'Public link generated successfully.',
        'public_link' => $publicLink,
        'expires_at' => $todo->public_token_expires_at,
    ]);
  }

  public function showPublicTask($token)
  {
    $todo = Todo::where('public_token', $token)
                ->where('public_token_expires_at', '>', now())
                ->firstOrFail();

    return view('todos.public', compact('todo'));
  }
}
