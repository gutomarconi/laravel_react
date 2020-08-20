## Laravel with React

Simple Laravel API to manage orders, accounts and products.
Frontend in ReactJS with a simple react bootstrap table to list orders and a action to delete an order.

## Setup

* Clone this repository
* Create MySQL database named 'laravel_react'
* In the repository root folder, rename the .env.example file to .env
* Update .env file at the repository root folder to configure DB_HOST, DB_DATABASE, DB_USERNAME and DB_PASSWORD with your respective information
* In the repository root folder, run "composer install".
* In the client folder, run "npm install".
* In the client folder, run "npm run start".
* In the repository root folder, run "composer start".

The server will be up and running at address http://127.0.0.1:8000.
    
    Can use Postman or any other tool to test the endpoints 
The frontend will running at address http://localhost:3000.
    
    Access this address through a browser to access the app.
The database will be seeded with 1 account and 50 orders with products.

## Endpoints

/GET /api/products - List all products
/GET /api/products/{uuid} - Get a product by the given uuid

/GET /api/accounts - List all accounts
/GET /api/accounts/{uuid} - Get a account by the given uuid

/GET /api/orders - List all orders
/GET /api/orders/{uuid} - Get a order by the given uuid
/POST /api/orders - Create a new order
	
	parameters (form data urlencoded):
		- owner* 	- account uuid
		- status* 	- "Under Review", "In Progress", "Completed"
		- products	- Array of products uuid

/PATCH /api/orders/{uuid} - Update an order
	
	parameters (form data urlencoded):
		- owner* 	- account uuid
		- status* 	- "Under Review", "In Progress", "Completed"

/DELETE /api/orders/{uuid} - Delete an order

