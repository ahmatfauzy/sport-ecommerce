<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::withCount('orders')->latest()->paginate(15);
        return view('pages.admin.users', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('orders.orderItems.product');
        return view('pages.admin.user-detail', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
            'is_active' => 'boolean'
        ]);

        $user->update([
            'role' => $request->role,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }
}
