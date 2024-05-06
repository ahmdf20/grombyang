<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CSController extends Controller
{
    public function index(): View
    {
        return view('cs.index', [
            'title' => 'Grombyang | Customer Services',
            'users' => User::where([
                ['deleted_at', null],
                ['type', 'customer-service']
            ])->get()->all()
        ]);
    }

    public function add(): View
    {
        return view('cs.add', [
            'title'  => 'Grombyang | Add new Customer Service',
        ]);
    }

    public function edit($uuid): View
    {
        return view('cs.edit', [
            'title' => 'Grombyang | Edit Customer Service',
            'user' => User::where('uuid', $uuid)->first()
        ]);
    }

    public function edit_password($uuid): View
    {
        return view('cs.edit_password', [
            'title' => 'Grombyang | Edit Password Customer Service',
            'user' => User::where('uuid', $uuid)->first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|min:4',
            'repeat_password' => 'required|same:password'
        ]);
        User::insert([
            'uuid' => uuid_create(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'active',
            'type' => 'customer-service',
            'created_at' => now()
        ]);
        return redirect()->route('cs.index')->with([
            'title' => 'Added new data',
            'icon' => 'success',
            'text' => 'Success added data to users!'
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
        User::where('uuid', $uuid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);
        return redirect()->route('cs.index')->with([
            'title' => 'Edited data',
            'icon' => 'success',
            'text' => 'Success edited data user!'
        ]);
    }

    public function update_password(Request $request, $uuid)
    {
        $request->validate([
            'new_password' => 'required|min:4',
            'repeat_password' => 'required|same:new_password'
        ]);
        User::where('uuid', $uuid)->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now()
        ]);
        return redirect()->route('cs.index')->with([
            'title' => 'Edited password',
            'icon' => 'success',
            'text' => 'Success edited password user!'
        ]);
    }

    public function delete($uuid)
    {
        User::where('uuid', $uuid)->update([
            'status' => 'inactive',
            'deleted_at' => now()
        ]);

        return response()->json([
            'title' => 'Deleted!',
            'icon' => 'success',
            'text' => 'Your data has been deleted.'
        ]);
    }
}
