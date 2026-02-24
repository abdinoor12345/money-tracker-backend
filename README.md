 # Money Tracker API - Complete Project Overview

## 📋 What You're Building

A RESTful API for managing multiple wallets and transactions. Users can create accounts, manage multiple wallets, add income/expense transactions, and view their profile with total balance.

## 🏗️ Architecture

### Models (Database Entities)

**1. User Model**
- Fields: id, name, email, created_at, updated_at
- Relationships: hasMany(Wallet)
- Methods: getTotalBalanceAttribute() - calculates sum of all wallet balances

**2. Wallet Model**
- Fields: id, user_id, name, balance, created_at, updated_at
- Relationships: belongsTo(User), hasMany(Transaction)
- Methods: addTransaction() - updates balance based on transaction type

**3. Transaction Model**
- Fields: id, wallet_id, type (enum: income/expense), amount, description, created_at, updated_at
- Relationships: belongsTo(Wallet)

### Controllers (Business Logic)

**1. UserController**
- store() - Create new user account
  - Validates: name (required, string), email (required, unique, email)
  - Returns: Created user with 201 status
  
- show() - Get user profile with all wallets and total balance
  - Returns: User data, all wallets, total_balance

**2. WalletController**
- store() - Create wallet for a user
  - Validates: user_id (exists in users), name (required, string)
  - Returns: Created wallet with 201 status
  
- show() - Get wallet details with all transactions
  - Returns: Wallet data, transactions array, transaction_count

**3. TransactionController**
- store() - Add transaction to wallet
  - Validates: type (income/expense), amount (numeric, min 0.01), description (optional)
  - Updates wallet balance automatically
  - Returns: Created transaction with updated wallet balance

### Routes (API Endpoints)

```
POST   /api/users                          - Create user
GET    /api/users/{id}                     - Get user profile
POST   /api/wallets                        - Create wallet
GET    /api/wallets/{id}                   - Get wallet details
POST   /api/wallets/{walletId}/transactions - Add transaction
GET    /api/health                         - Health check
```

## 💾 Database Design

### Relationships
```
User
  ├── hasMany → Wallets
  
Wallet
  ├── belongsTo → User
  └── hasMany → Transactions
  
Transaction
  └── belongsTo → Wallet
```

### Data Flow
1. User creates account → User created in database
2. User creates wallet → Wallet created with balance = 0
3. User adds income transaction → Wallet balance increases
4. User adds expense transaction → Wallet balance decreases
5. User views profile → All wallets and total balance returned

## ✅ Validation

### User Creation
- name: required, string, max 255
- email: required, email format, unique

### Wallet Creation
- user_id: required, must exist in users table
- name: required, string, max 255

### Transaction Creation
- type: required, must be 'income' or 'expense'
- amount: required, numeric, minimum 0.01
- description: optional, string, max 255

## 🎯 Key Features

1. **Multiple Wallets Per User** - Users can have different wallets for different purposes
2. **Automatic Balance Calculation** - Income adds, expense subtracts automatically
3. **Transaction Tracking** - All transactions stored with timestamp and description
4. **No Authentication** - User creation doesn't require authentication
5. **RESTful Design** - Clean, standard API design
6. **Error Handling** - Consistent error responses with validation details
7. **Decimal Precision** - Amounts stored with 2 decimal places for accuracy

## 📁 File Locations

```
app/Models/
├── User.php
├── Wallet.php
└── Transaction.php

app/Http/Controllers/Api/
├── UserController.php
├── WalletController.php
└── TransactionController.php

database/migrations/
├── YYYY_MM_DD_HHMMSS_create_users_table.php
├── YYYY_MM_DD_HHMMSS_create_wallets_table.php
└── YYYY_MM_DD_HHMMSS_create_transactions_table.php

routes/
└── api.php
```

## 🚀 Quick Start

1. Create Laravel project
2. Copy models to app/Models/
3. Copy controllers to app/Http/Controllers/Api/
4. Copy migrations to database/migrations/
5. Update routes/api.php
6. Update .env with database credentials
7. Run: php artisan migrate
8. Run: php artisan serve
9. Test endpoints with Postman or curl

## 📊 Example API Usage Flow

### 1. Create User
```bash
POST /api/users
{
  "name": "John Doe",
  "email": "john@example.com"
}
```

### 2. Create Wallet
```bash
POST /api/wallets
{
  "user_id": 1,
  "name": "Business Account"
}
```

### 3. Add Income Transaction
```bash
POST /api/wallets/1/transactions
{
  "type": "income",
  "amount": 2000,
  "description": "Client payment"
}
```

### 4. Add Expense Transaction
```bash
POST /api/wallets/1/transactions
{
  "type": "expense",
  "amount": 500,
  "description": "Office supplies"
}
```

### 5. View User Profile
```bash
GET /api/users/1
```

Returns:
- User details
- All wallets with balances
- Total balance across all wallets

### 6. View Wallet with Transactions
```bash
GET /api/wallets/1
```

Returns:
- Wallet details with current balance
- All transactions for that wallet
- Transaction count

## 🔒 Data Integrity

- Foreign key constraints ensure data consistency
- CASCADE delete removes wallets/transactions if user is deleted
- Decimal validation prevents invalid amounts
- Enum validation restricts transaction type to 'income' or 'expense'
- Unique email prevents duplicate user accounts

## 📝 Clean Code Features

- Clear method names describing functionality
- Inline comments explaining logic
- Consistent error responses
- DRY principles followed
- Proper use of Laravel conventions
- Validation separated from business logic
- Relationships properly defined