 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Tracker API - Complete Guide</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #0f172a;
            --light: #f8fafc;
            --border: #e2e8f0;
            --text-dark: #1e293b;
            --text-light: #64748b;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: var(--text-dark);
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            line-height: 1.6;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            width: 2rem;
            height: 2rem;
            background: var(--primary);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        /* Hero Section */
        .hero {
            margin-top: 5rem;
            padding: 6rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            border-bottom: 1px solid var(--border);
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto 2rem;
            line-height: 1.8;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Section */
        section {
            padding: 4rem 0;
        }

        section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
            font-weight: 700;
        }

        section > p {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid var(--border);
            transition: all 0.3s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.1);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Getting Started Steps */
        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .step {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid var(--border);
            position: relative;
            padding-left: 5rem;
        }

        .step-number {
            position: absolute;
            left: 2rem;
            top: 2rem;
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.25rem;
        }

        .step h3 {
            margin-bottom: 0.75rem;
            color: var(--dark);
        }

        .step p {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Code Block */
        .code-block {
            background: var(--dark);
            color: #e2e8f0;
            padding: 1.5rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            margin: 2rem 0;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .code-block code {
            display: block;
        }

        .keyword { color: #60a5fa; }
        .string { color: #34d399; }
        .function { color: #f472b6; }
        .comment { color: #94a3b8; }

        /* API Endpoints */
        .endpoints-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .endpoints-table th {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .endpoints-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .endpoints-table tr:last-child td {
            border-bottom: none;
        }

        .method {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .method.get { background: #dbeafe; color: var(--primary); }
        .method.post { background: #dcfce7; color: var(--secondary); }
        .method.put { background: #fef3c7; color: var(--warning); }
        .method.delete { background: #fee2e2; color: var(--danger); }

        /* Testing Section */
        .testing-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            border: 2px dashed var(--border);
            margin-top: 2rem;
        }

        .testing-card h3 {
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .testing-card ul {
            list-style: none;
            margin-left: 0;
        }

        .testing-card li {
            padding: 0.5rem 0;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .testing-card li:before {
            content: "✓";
            width: 1.5rem;
            height: 1.5rem;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
            flex-shrink: 0;
        }

        /* FAQ Section */
        .faq-item {
            background: white;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 0.75rem;
            border: 1px solid var(--border);
            cursor: pointer;
            transition: all 0.3s;
        }

        .faq-item:hover {
            border-color: var(--primary);
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--dark);
        }

        .faq-icon {
            width: 1.5rem;
            height: 1.5rem;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            display: none;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            color: var(--text-light);
            line-height: 1.8;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .nav-links {
                gap: 1rem;
            }

            section h2 {
                font-size: 1.75rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card, .step, .testing-card {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .feature-card:nth-child(1) { animation-delay: 0.1s; }
        .feature-card:nth-child(2) { animation-delay: 0.2s; }
        .feature-card:nth-child(3) { animation-delay: 0.3s; }
        .feature-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a href="#" class="logo">
            <div class="logo-icon">💰</div>
            Money Tracker API
        </a>
        <ul class="nav-links">
            <li><a href="#features">Features</a></li>
            <li><a href="#quickstart">Get Started</a></li>
            <li><a href="#endpoints">API</a></li>
            <li><a href="#faq">FAQ</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>💰 Money Tracker API</h1>
            <p>A complete REST API for managing multiple wallets and tracking income/expense transactions. Built with Laravel, documented with examples, and ready for production.</p>
            <div class="cta-buttons">
                <a href="#quickstart" class="btn btn-primary">Start Building</a>
                <a href="#documentation" class="btn btn-secondary">View Documentation</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="container">
        <h2>✨ Key Features</h2>
        <p>Everything you need to manage multiple wallets and track transactions</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">👤</div>
                <h3>User Management</h3>
                <p>Create and manage user accounts with secure password hashing and validation</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💳</div>
                <h3>Multiple Wallets</h3>
                <p>Each user can create multiple wallets for different purposes (Business, Personal, etc.)</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Transaction Tracking</h3>
                <p>Record income and expense transactions with automatic balance calculation</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Secure & Validated</h3>
                <p>Input validation, password hashing, and data integrity with foreign keys</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📈</div>
                <h3>Complete Reports</h3>
                <p>View user profiles with all wallets and total balance across all accounts</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>RESTful API</h3>
                <p>Standard HTTP methods, consistent JSON responses, and clear error messages</p>
            </div>
        </div>
    </section>

    <!-- API Endpoints Section -->
    <section id="endpoints" class="container">
        <h2>📡 API Endpoints</h2>
        <p>6+ endpoints for complete wallet and transaction management</p>

        <table class="endpoints-table">
            <thead>
                <tr>
                    <th>Method</th>
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
                    <td><code>/api/users/{id}</code></td>
                    <td>Get user profile with wallets</td>
                </tr>
                <tr>
                    <td><span class="method post">POST</span></td>
                    <td><code>/api/wallets</code></td>
                    <td>Create a new wallet</td>
                </tr>
                <tr>
                    <td><span class="method get">GET</span></td>
                    <td><code>/api/wallets/{id}</code></td>
                    <td>Get wallet with transactions</td>
                </tr>
                <tr>
                    <td><span class="method post">POST</span></td>
                    <td><code>/api/wallets/{id}/transactions</code></td>
                    <td>Add income/expense transaction</td>
                </tr>
                <tr>
                    <td><span class="method get">GET</span></td>
                    <td><code>/api/health</code></td>
                    <td>Check API health status</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Quick Start Section -->
    <section id="quickstart" class="container">
        <h2>🚀 Quick Start (30 Minutes)</h2>
        <p>Get the Money Tracker API running in just 30 minutes</p>

        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Download Files</h3>
                <p>Download all source code files (10 PHP files) and documentation (20+ guides)</p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h3>Create Laravel Project</h3>
                <p>Create a new Laravel project using Composer or use your existing project</p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <h3>Copy Files</h3>
                <p>Copy models to app/Models, controllers to app/Http/Controllers/Api, migrations to database/migrations</p>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <h3>Run Migrations</h3>
                <p>Execute <code>php artisan migrate</code> to create database tables</p>
            </div>

            <div class="step">
                <div class="step-number">5</div>
                <h3>Start Server</h3>
                <p>Run <code>php artisan serve</code> to start development server on port 8000</p>
            </div>

            <div class="step">
                <div class="step-number">6</div>
                <h3>Test the API</h3>
                <p>Use Postman or curl to test endpoints following the included guides</p>
            </div>
        </div>

        <div class="testing-card">
            <h3>🧪 Test Your First Endpoint</h3>
            <p>Create a user account with this request:</p>
            <div class="code-block">
<span class="keyword">POST</span> http://localhost:8000/api/users
<span class="keyword">Content-Type:</span> <span class="string">application/json</span>

{
  <span class="string">"name"</span>: <span class="string">"John Doe"</span>,
  <span class="string">"email"</span>: <span class="string">"john@example.com"</span>,
  <span class="string">"password"</span>: <span class="string">"password123"</span>
}
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="container">
        <h2>🔧 How It Works</h2>
        <p>Understanding the Money Tracker API architecture</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🗄️</div>
                <h3>Database Design</h3>
                <p><strong>3 Tables:</strong> Users, Wallets, Transactions with proper relationships and foreign keys for data integrity</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔗</div>
                <h3>Data Relationships</h3>
                <p><strong>4 Relationships:</strong> User→Wallet (1-to-many), Wallet→Transaction (1-to-many) with cascade delete</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚙️</div>
                <h3>Controllers</h3>
                <p><strong>3 Controllers:</strong> UserController, WalletController, TransactionController with CRUD methods</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">✅</div>
                <h3>Validation</h3>
                <p><strong>Input Validation:</strong> Email uniqueness, password strength, amount validation, transaction type</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Balance Calculation</h3>
                <p><strong>Auto-Calculate:</strong> Income adds to balance, expenses subtract, total balance sums all wallets</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Security</h3>
                <p><strong>Best Practices:</strong> Password hashing, data validation, error handling, no sensitive data in responses</p>
            </div>
        </div>
    </section>

    <!-- Documentation Section -->
    <section id="documentation" class="container">
        <h2>📚 Comprehensive Documentation</h2>
        <p>227 pages of detailed guides, examples, and references</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📖</div>
                <h3>README.md (20 pages)</h3>
                <p>Main documentation with features, setup, quick start, API overview, and troubleshooting</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔗</div>
                <h3>API Documentation (25 pages)</h3>
                <p>Complete API reference with all endpoints, request/response formats, and examples</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Setup Guide</h3>
                <p>Step-by-step installation, database configuration, and environment setup</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🏗️</div>
                <h3>Architecture Docs</h3>
                <p>Project overview, models, relationships, and data structure explained</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🧪</div>
                <h3>Testing Guides (18 Tests)</h3>
                <p>Complete testing guide with Postman examples and quick reference</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Deployment Guide (25 pages)</h3>
                <p>Production deployment with server setup, SSL, monitoring, and backups</p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="container">
        <h2>❓ Frequently Asked Questions</h2>
        <p>Answers to common questions about the Money Tracker API</p>

        <div style="margin-top: 2rem;">
            <div class="faq-item">
                <div class="faq-question">
                    <span>How long does it take to set up?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>You can have the API running in 30 minutes! Just download files, copy them to your Laravel project, run migrations, and test. We have complete step-by-step guides to make it easy.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Do I need experience with Laravel?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>Basic Laravel knowledge is helpful but not required. We provide comprehensive documentation with code examples, visual diagrams, and step-by-step guides for everything.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Can I modify the code for my needs?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! The code is designed to be easily customizable. You can add new features, modify relationships, add authentication, or integrate with your frontend application.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Is this production-ready?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>Yes! The API follows best practices, includes security measures like password hashing and input validation, has comprehensive error handling, and includes a complete deployment guide for production.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>What about database and hosting?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>Works with MySQL/MariaDB. For hosting, you can use any PHP hosting provider, or deploy to cloud platforms like AWS, DigitalOcean, or Heroku. Our deployment guide covers everything.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I test the API?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>Use Postman (recommended) or curl commands. We provide a complete testing guide with 18 test cases covering all endpoints, success scenarios, and error handling. Everything is copy-paste ready.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>What documentation is included?</span>
                    <div class="faq-icon">▼</div>
                </div>
                <div class="faq-answer">
                    <p>227 pages of comprehensive documentation including: README (20 pages), API Documentation (25 pages), Setup Guide, Testing Guide (18 test cases), Deployment Guide (25 pages), Architecture docs, and more.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <h3 style="margin-bottom: 1rem;">💰 Money Tracker API</h3>
            <p style="margin-bottom: 1.5rem; color: #cbd5e1;">
                A complete REST API for managing multiple wallets and tracking income/expense transactions.<br>
                Built with Laravel, documented extensively, and ready for production.
            </p>
            <div class="footer-links">
                <a href="#features">Features</a>
                <a href="#quickstart">Quick Start</a>
                <a href="#endpoints">API Endpoints</a>
                <a href="#faq">FAQ</a>
                <a href="https://github.com" target="_blank">GitHub</a>
                <a href="https://laravel.com" target="_blank">Laravel</a>
            </div>
            <p style="color: #cbd5e1; margin-top: 2rem;">
                © 2024 Money Tracker API. Licensed under MIT. 
                <a href="#" style="color: #60a5fa; text-decoration: none;">Privacy Policy</a> • 
                <a href="#" style="color: #60a5fa; text-decoration: none;">Terms of Service</a>
            </p>
        </div>
    </footer>

    <!-- Interactive FAQ -->
    <script>
        document.querySelectorAll('.faq-item').forEach(item => {
            item.querySelector('.faq-question').addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });

        // Smooth scroll for nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>