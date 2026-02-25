 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Tracker API</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #333;
            background: #f5f5f5;
            line-height: 1.6;
        }

        header {
            background: #fff;
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        h2 {
            font-size: 20px;
            margin-top: 40px;
            margin-bottom: 20px;
            color: #1a1a1a;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 15px;
        }

        section {
            background: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        ul {
            list-style: none;
            margin-left: 0;
        }

        li {
            padding: 8px 0;
            padding-left: 25px;
            position: relative;
        }

        li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #007bff;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f9f9f9;
            font-weight: 600;
            color: #1a1a1a;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .method {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 600;
        }

        .method.get {
            background: #d4edda;
            color: #155724;
        }

        .method.post {
            background: #d1ecf1;
            color: #0c5460;
        }

        .method.put {
            background: #fff3cd;
            color: #856404;
        }

        .method.delete {
            background: #f8d7da;
            color: #721c24;
        }

        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 13px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .intro {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 22px;
            }

            h2 {
                font-size: 18px;
            }

            th, td {
                padding: 8px;
                font-size: 14px;
            }

            .method {
                font-size: 11px;
                padding: 3px 8px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Money Tracker API</h1>
            <p class="intro">A REST API for managing multiple wallets and tracking income/expense transactions.</p>
        </div>
    </header>

    <main class="container">
        <!-- Overview -->
        <section>
            <h2>Overview</h2>
            <p>The Money Tracker API provides endpoints for user account management, wallet creation, and transaction tracking. Each user can create multiple wallets and record income/expense transactions with automatic balance calculation.</p>
        </section>

        <!-- Key Features -->
        <section>
            <h2>Key Features</h2>
            <ul>
                <li>User account creation and management</li>
                <li>Multiple wallets per user</li>
                <li>Income and expense transaction tracking</li>
                <li>Automatic balance calculation</li>
                <li>User profiles with total balance across all wallets</li>
                <li>Complete transaction history</li>
                <li>Input validation on all fields</li>
                <li>Password hashing for security</li>
                <li>Data integrity with foreign keys</li>
                <li>RESTful API design with JSON responses</li>
            </ul>
        </section>

        <!-- API Endpoints -->
        <section>
            <h2>API Endpoints</h2>
            <table>
                <thead>
                    <tr>
                        <th style="width: 80px;">Method</th>
                        <th>Endpoint</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="method post">POST</span></td>
                        <td><code>/api/users</code></td>
                        <td>Create a new user account</td>
                    </tr>
                    <tr>
                        <td><span class="method get">GET</span></td>
                        <td><code>/api/users</code></td>
                        <td>List all users</td>
                    </tr>
                    <tr>
                        <td><span class="method get">GET</span></td>
                        <td><code>/api/users/{id}</code></td>
                        <td>Get user profile with all wallets and total balance</td>
                    </tr>
                    <tr>
                        <td><span class="method put">PUT</span></td>
                        <td><code>/api/users/{id}</code></td>
                        <td>Update user information</td>
                    </tr>
                    <tr>
                        <td><span class="method delete">DELETE</span></td>
                        <td><code>/api/users/{id}</code></td>
                        <td>Delete user and associated data</td>
                    </tr>
                    <tr>
                        <td><span class="method post">POST</span></td>
                        <td><code>/api/wallets</code></td>
                        <td>Create a new wallet for a user</td>
                    </tr>
                    <tr>
                        <td><span class="method get">GET</span></td>
                        <td><code>/api/wallets/{id}</code></td>
                        <td>Get wallet details with all transactions</td>
                    </tr>
                    <tr>
                        <td><span class="method post">POST</span></td>
                        <td><code>/api/wallets/{id}/transactions</code></td>
                        <td>Add income or expense transaction to wallet</td>
                    </tr>
                    <tr>
                        <td><span class="method get">GET</span></td>
                        <td><code>/api/health</code></td>
                        <td>Check API health status</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Request Examples -->
        <section>
            <h2>Request Examples</h2>
            
            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Create User</h3>
            <p><code>POST /api/users</code></p>
            <pre style="background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto;">
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}</pre>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Create Wallet</h3>
            <p><code>POST /api/wallets</code></p>
            <pre style="background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto;">
{
  "user_id": 1,
  "name": "Business Account"
}</pre>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Add Transaction</h3>
            <p><code>POST /api/wallets/1/transactions</code></p>
            <pre style="background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto;">
{
  "type": "income",
  "amount": 2000,
  "description": "Client payment"
}</pre>
        </section>

        <!-- Response Format -->
        <section>
            <h2>Response Format</h2>
            
            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Success Response (200/201)</h3>
            <pre style="background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto;">
{
  "message": "Operation successful",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "created_at": "2024-02-24T10:00:00Z",
    "updated_at": "2024-02-24T10:00:00Z"
  }
}</pre>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Error Response (422)</h3>
            <pre style="background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto;">
{
  "message": "Validation failed",
  "errors": {
    "email": [
      "The email has already been taken."
    ]
  }
}</pre>
        </section>

        <!-- Status Codes -->
        <section>
            <h2>HTTP Status Codes</h2>
            <ul>
                <li><strong>200 OK</strong> - Request successful, data returned</li>
                <li><strong>201 Created</strong> - Resource created successfully</li>
                <li><strong>400 Bad Request</strong> - Malformed request</li>
                <li><strong>404 Not Found</strong> - Resource does not exist</li>
                <li><strong>422 Unprocessable Entity</strong> - Validation failed</li>
                <li><strong>500 Internal Server Error</strong> - Server error</li>
            </ul>
        </section>

        <!-- Validation Rules -->
        <section>
            <h2>Validation Rules</h2>
            
            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">User Creation</h3>
            <ul>
                <li><code>name</code> - Required, string, max 255 characters</li>
                <li><code>email</code> - Required, valid email format, unique in database</li>
                <li><code>password</code> - Required, minimum 8 characters</li>
            </ul>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Wallet Creation</h3>
            <ul>
                <li><code>user_id</code> - Required, must exist in users table</li>
                <li><code>name</code> - Required, string, max 255 characters</li>
            </ul>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Transaction Creation</h3>
            <ul>
                <li><code>type</code> - Required, must be "income" or "expense"</li>
                <li><code>amount</code> - Required, numeric, minimum 0.01</li>
                <li><code>description</code> - Optional, string, max 255 characters</li>
            </ul>
        </section>

        <!-- Data Model -->
        <section>
            <h2>Data Model</h2>
            
            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Users Table</h3>
            <ul>
                <li><code>id</code> - Primary key</li>
                <li><code>name</code> - User name</li>
                <li><code>email</code> - User email (unique)</li>
                <li><code>password</code> - Hashed password</li>
                <li><code>created_at</code> - Creation timestamp</li>
                <li><code>updated_at</code> - Last update timestamp</li>
            </ul>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Wallets Table</h3>
            <ul>
                <li><code>id</code> - Primary key</li>
                <li><code>user_id</code> - Foreign key to users</li>
                <li><code>name</code> - Wallet name</li>
                <li><code>balance</code> - Current balance (decimal 10,2)</li>
                <li><code>created_at</code> - Creation timestamp</li>
                <li><code>updated_at</code> - Last update timestamp</li>
            </ul>

            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">Transactions Table</h3>
            <ul>
                <li><code>id</code> - Primary key</li>
                <li><code>wallet_id</code> - Foreign key to wallets</li>
                <li><code>type</code> - "income" or "expense"</li>
                <li><code>amount</code> - Transaction amount (decimal 10,2)</li>
                <li><code>description</code> - Optional description</li>
                <li><code>created_at</code> - Creation timestamp</li>
                <li><code>updated_at</code> - Last update timestamp</li>
            </ul>
        </section>

        <!-- Testing -->
        <section>
            <h2>Testing the API</h2>
            <p>Use Postman, curl, or any HTTP client to test the API.</p>
            
            <h3 style="font-size: 16px; margin-top: 20px; margin-bottom: 10px;">curl Example</h3>
            <pre style="background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto;">
curl -X POST http://localhost:8000/api/users \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
  }'</pre>
        </section>

       

    </main>

</body>
</html>