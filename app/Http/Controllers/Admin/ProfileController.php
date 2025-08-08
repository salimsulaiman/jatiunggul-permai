<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        $user = User::findOrFail($validated['id']);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index');
    }

    public function updatePicture(Request $request)
    {
        $rules = [
            'id' => 'required|exists:users,id',
            'profile' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];

        $validated = $request->validate($rules);

        $user = User::findOrFail($validated['id']);

        if ($request->hasFile('profile')) {
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }

            $imagePath = $request->file('profile')->store('user_images', 'public');
        } else {
            $imagePath = $user->profile;
        }


        $user->update([
            'profile' => $imagePath,
        ]);

        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully.');
    }
    public function deletePicture(Request $request)
    {
        $rules = [
            'id' => 'required|exists:users,id',
        ];

        $validated = $request->validate($rules);

        $user = User::findOrFail($validated['id']);

        if ($user->profile && Storage::disk('public')->exists($user->profile)) {
            Storage::disk('public')->delete($user->profile);
        }


        $user->update([
            'profile' => null,
        ]);

        return redirect()->route('admin.profile.index')->with('success', 'Profile deleted successfully.');
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'id' => 'required|exists:users,id',
            'old_password' => 'required|string|min:5',
            'password' => 'required|string|min:5|confirmed',
        ];

        $validated = $request->validate($rules);

        $user = User::findOrFail($validated['id']);

        if (!Hash::check($validated['old_password'], $user->password)) {
            return back()->withErrors(['old_password' => 'Old password does not match'])->withInput();
        }

        $user->update([
            'password' => Hash::make($validated['password']),
            'last_password_change_at' => now(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
