# Wallet Management API

## Overview

This project provides a robust API for managing wallets, wallet types, and transactions for a financial platform. Users can create wallets and transfer money between wallets. The project is built using Laravel and follows standard API development practices.

---

## Features

-   **Wallet Management**: Create and manage multiple wallets for each user.
-   **Wallet Types**: Define wallet types with specific attributes like name, minimum balance, and interest rates.
-   **Money Transfers**: Transfer money between wallets with validation for sufficient balance and ownership.
-   **Transactions**: Record all transactions for tracking and auditing purposes.

---

## Prerequisites

-   PHP 8.2+
-   Composer
-   MySQL
-   Laravel 11+
-   API testing tools (e.g., Postman, ThunderClient)

---

## Installation

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/Coding-Nonny/supreme-prob.git
    cd supreme-prob
    ```

2. **Install Dependencies**:

    ```bash
    composer install
    ```

3. **Set Up Environment Variables**:
   Copy the `.env.example` file and configure the environment variables, including database credentials:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**:

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**:

    ```bash
    php artisan migrate
    ```

6. **Seed the Database (Optional)**:

    ```bash
    php artisan db:seed
    ```

7. **Start the Development Server**:
    ```bash
    php artisan serve
    ```

---

## API Endpoints

### **Wallet Management**

#### 1. Get all Wallet

-   **URL**: `/api/wallets`
-   **Method**: `GET`

-   **Response**:
    ```json
    {
        "id": 1,
        "user_id": 1,
        "wallet_type_id": 1,
        "balance": 500.0
    }
    ```

#### 2. Get a Wallet Details including user and wallet type

-   **URL**: `/api/wallets/{id}`
-   **Method**: `GET`
-   **Response**:
    ```json
    {
      "wallet": {
       "id": 1,
      "user_id": 1,
      "wallet_type_id": 1,
      "balance": 500.00,
    	"user": { ... },
      "wallet_type": { ... }
      }
    }
    ```

### **Transaction Management**

#### 3. Transfer Money

-   **URL**: `/api/transfer`
-   **Method**: `POST`
-   **Body Parameters**:
    ```json
    {
        "user_id": 1,
        "sender_wallet_id": 1,
        "receiver_wallet_id": 2,
        "amount": 100.0
    }
    ```
-   **Response**:
    ```json
    {
      "message": "Transfer successful",
      "transaction": { ... }
    }
    ```

#### 4. Deposit Money

-   **URL**: `/api/wallets/deposit`
-   **Method**: `POST`
-   **Body Parameters**:
    ```json
    {
        "wallet_id": 1,
        "amount": 200.0
    }
    ```
-   **Response**:
    ```json
    {
        "message": "Deposit successful",
        "balance": 700.0
    }
    ```

---

## Database Schema

### **Tables**

#### 1. `users`

-   `id`: Primary key
-   `name`: User's name
-   `email`: User's email

#### 2. `wallets`

-   `id`: Primary key
-   `user_id`: Foreign key referencing `users`
-   `wallet_type_id`: Foreign key referencing `wallet_types`
-   `balance`: Current wallet balance

#### 3. `wallet_types`

-   `id`: Primary key
-   `name`: Type name (e.g., Savings, Current)
-   `minimum_balance`: Minimum balance required
-   `monthly_interest_rate`: Monthly interest rate

#### 4. `transactions`

-   `id`: Primary key
-   `user_id`: Foreign key referencing `users`
-   `wallet_id`: Foreign key referencing `wallets`
-   `amount`: Transaction amount
-   `description`: Explains the transaction

---

## Testing

### **Using ThunderClient or Postman**

1. **Set Base URL**: `http://localhost:8000/api`
2. **Send Requests**: Use the documented endpoints above to test the API.

---

## Contributions

Feel free to fork this repository and submit pull requests.
