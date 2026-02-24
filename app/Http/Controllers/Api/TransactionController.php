<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; 
class TransactionController extends Controller
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
     public function store(Request $request, $walletId)
    {
        try {
            // Validate wallet exists
            $wallet = Wallet::find($walletId);
            if (!$wallet) {
                return response()->json([
                    'message' => 'Wallet not found',
                ], 404);
            }

            // Validate transaction data
            $validated = $request->validate([
                'type' => 'required|in:income,expense',
                'amount' => 'required|numeric|min:0.01',
                'description' => 'nullable|string|max:255',
            ]);

            // Add wallet_id to validated data
            $validated['wallet_id'] = $walletId;

            // Create transaction
            $transaction = Transaction::create($validated);

            // Update wallet balance
            $wallet->addTransaction($validated['type'], $validated['amount']);

            return response()->json([
                'message' => 'Transaction created successfully',
                'transaction' => $transaction,
                'wallet_balance' => $wallet->balance,
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
