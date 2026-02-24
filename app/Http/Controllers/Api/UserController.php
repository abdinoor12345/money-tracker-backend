<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
 public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            $user = User::create($validated);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function show($id)
    {
        $user = User::with('wallets')->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        // Calculate total balance across all wallets
        $totalBalance = $user->wallets->sum('balance');

        return response()->json([
            'user' => $user,
            'wallets' => $user->wallets,
            'total_balance' => $totalBalance,
        ], 200);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
