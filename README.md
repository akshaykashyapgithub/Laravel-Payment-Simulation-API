## Laravel Payment Simulation API
A Laravel backend API for simulating payments with features like user authentication, order management, payment processing, and webhooks for payment status updates.
## Features
- User Authentication
  - Register
  - Login
  - Bearer token authentication (API token)
- Orders
  - Create order
  - View orders
  - View order details with payment info
- Payments
  - Simulate payment
  - Webhooks for payment status:
      - Success
      - Failed
      - Pending

## Tech Stack
- Laravel 10
- PHP 8+
- MySQL
- Passport or Sanctum (for token authentication)
- RESTful API architecture

## Screenshots
### 1. User Register
![Login Request](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Register%20API.png)

### 2. User Login
![Login Request](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Login%20API.png)
*Request to login and receive bearer token

### 3. Products API
![Products](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Products%20API.png)

### 3. Create Order
![Create Order](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Order%20API.png)
*Creating a new order via API*

### 4. Simulate Payment
![Payment Simulation](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Order%20Payment%20API%20.png)
*Simulating payment for an order*

### 4. Order Details
![Order Details](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Show%20Order%20by%20ID%20API%20.png)
*Viewing order details with payment status*

### 4. Update Payment Status Webhook
![Update Payment Webhook](https://github.com/akshaykashyapgithub/Laravel-Payment-Simulation-API/blob/main/API%20Screenshots/Update%20Pending%20Payment%20(Webhook).png)
*Update Payment status with payment webhook API*

    
