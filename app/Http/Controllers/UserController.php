<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view("admin.user.home", compact("users"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.user.create");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_type' => $request->user_type ?? 'user', // Use default if not provided
            'password' => Hash::make($request->password),
        ]);
        Log::channel('material')->info('user added', [
            'user' => $user->name,
            'user_id' => $user->id,
            'added by' => Auth::user()->name,
            'with_id' => Auth::id(),
        ]);
        return redirect()->route('user.index')->with('success', 'User added successfully');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'user_type' => 'required|string',
        ]);
        $user = User::findOrFail($id);
        if ($data) {
            $user->update($data);
            Log::channel('material')->info('user updated', [
                'user' => $user->name,
                'user_id' => $user->id,
                'added by' => Auth::user()->name,
                'with_id' => Auth::id(),
            ]);
            session()->flash("success", "user updated successfully");
            return redirect()->route('user.index');
        } else {
            session()->flash("error", "Some problem occurred");
            return redirect()->route("user.edit",$user->id);
        }
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Log::channel('material')->info('user deleted', [
            'user' => $user->name,
            'user_id' => $user->id,
            'deleted by' => Auth::user()->name,
            'with_id' => Auth::id(),
        ]);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
