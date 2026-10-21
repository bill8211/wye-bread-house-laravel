<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderBy('name')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'role' => [
                'required',
                Rule::in(['admin', 'employee', 'client']),
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = strtolower($validated['email']);
        $user->password = Hash::make($validated['password']);
        $user->role = $validated['role'];
        $user->is_active = true;
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'El usuario se creó correctamente.');
    }

    public function toggleStatus(User $user): RedirectResponse
    {
        $currentUserId = request()->user()->getAuthIdentifier();

        if ($user->getAuthIdentifier() == $currentUserId) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'No puedes desactivar tu propia cuenta.');
        }

        $user->is_active = ! $user->is_active;
        $user->save();

        $message = $user->is_active
            ? 'La cuenta se activó correctamente.'
            : 'La cuenta se desactivó correctamente.';

        return redirect()
            ->route('admin.users.index')
            ->with('success', $message);
    }
}