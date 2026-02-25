<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
 use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
class Walletcontroller extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'name' => 'required|string|max:255',
            ]);

            // Set initial balance to 0
            $validated['balance'] = 0;

            $wallet = Wallet::create($validated);

            return response()->json([
                'message' => 'Wallet created successfully',
                'wallet' => $wallet,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $wallet = Wallet::with('transactions')->find($id);

        if (!$wallet) {
            return response()->json([
                'message' => 'Wallet not found',
            ], 404);
        }

        return response()->json([
            'wallet' => [
                'id' => $wallet->id,
                'user_id' => $wallet->user_id,
                'name' => $wallet->name,
                'balance' => $wallet->balance,
                'created_at' => $wallet->created_at,
                'updated_at' => $wallet->updated_at,
            ],
            'transactions' => $wallet->transactions,
            'transaction_count' => $wallet->transactions->count(),
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
