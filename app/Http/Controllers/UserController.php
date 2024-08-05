<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdateStatusRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create(): View
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        try
        {
            $user           = new User();
            $user->name     = $request->get('name');
            $user->email    = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();
        }catch (Exception $e) {
            return redirect()->route('user.create')->with('error', 'There was an error adding the user: ' . $e->getMessage());
        }

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit(string $id): View
    {
        try {
            $user = User::query()->findOrFail((int)$id);
        }catch (Exception $e) {
            return \view('user.index')->with('error', 'user not found!' . $e->getMessage());
        }

        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        try
        {
            $user           = User::query()->findOrFail((int)$id);
            $user->name     = $request->get('name');
            $user->status   = $request->get('status');
            $user->email    = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->update();

        }catch (Exception $e) {
            return redirect()->route('user.index')->with('success', 'Error occurred while updating user: ' . $e->getMessage());
        }

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * @param UserUpdateStatusRequest $request
     * @return JsonResponse
     */
    public function updateStatus(UserUpdateStatusRequest $request): JsonResponse
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function destroy(string $id): RedirectResponse
    {
        try{
            $user = User::query()->findOrFail((int)$id);
            $user->delete();
        }catch (Exception $e) {
            return redirect()->route('user.index')->with('success', 'Error occurred while deleting user: ' . $e->getMessage());
        }

        return redirect()->route('user.index')->with('success', 'user deleted successfully.');
    }
}
