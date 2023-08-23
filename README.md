# Employee Management System using Laravel
The Role-Based Employee Management System using Laravel, simplifies employee data handling. Admins exercise CRUD operations, users access personalized views, all supported by stringent data validation. This secure, user-friendly interface harnesses Laravel's power for precise and efficient employee data management.


## Table of Contents


1. [Features](#features)
2. [AdminPanelController](#adminpanelcontroller)
3. [UserPanelController](#userpanelcontroller)
4. [Application Routes](#application-routes)
5. [Getting Started](#getting-started)
6. [Troubleshooting Common Issues](#troubleshooting-common-issues)
7. [Screenshots](#screenshots)
   


## Features:
1. User Authentication and Authorization:

* Users can register, log in, and reset their passwords.
* Role-based access control with Admin and User roles.
2. Admin Panel:

* Admin can perform CRUD operations on employee records (Create, Read, Update, Delete).
* Admin can view a list of all employees with relevant information.
* Employee information includes Name, Email, Department, Designation, and Date of Joining.
3. User Panel:

* Users can view their own employee information.
4. Form Validation:

* Input forms are validated using Laravel's validation rules.
* Ensures data integrity and accuracy.
5. Error Handling and User Feedback:

* Comprehensive error handling mechanisms to provide users with informative messages.
* User-friendly feedback for successful actions.
6. Scalability and Maintainability:

* Developed using Laravel, a robust and widely-used PHP framework.
* Follows best practices for creating scalable and maintainable applications.
7. Clean and User-Friendly Interface:

* The application has a well-designed and intuitive user interface.
* Bootstrap is used for styling, ensuring a responsive and modern design.
## Benefits:
1. Efficient Employee Management:

* The system simplifies employee information management for organizations, streamlining administrative tasks.
2. Security and Access Control:

* Role-based access control ensures that users can only perform authorized actions.
* Data privacy and security are maintained through authentication mechanisms.
3. Data Accuracy:

* Form validation prevents invalid or inaccurate data from being submitted.
* Ensures the reliability of stored employee information.
4. User Satisfaction:

* User-friendly interface and error messages enhance user satisfaction.
* Proper feedback provides clarity and reduces user frustration.
5. Scalability and Maintenance:

* Built with Laravel, the application is designed for scalability as business needs grow.
* Laravel's modular structure makes maintenance and updates more manageable.
6. Modern Styling:

* Bootstrap styling offers a visually appealing and responsive design across devices.

# AdminPanelController
The AdminPanelController manages the administrative functionalities for the Employee Management System. It handles actions related to employee creation, modification, and deletion, providing a user-friendly experience for administrators.

## Methods

`index()`
Displays the main admin panel index page, listing all employees' information.

Functionality:
* Retrieves all employees using Employee::all().
* Passes the employee data to the admin-panel view for rendering.
***
`showCreateForm`
Displays the form for creating a new user and associated employee.

Functionality:

* Renders the create-user view, allowing administrators to input employee details.
***
`store`
Handles the form submission to create a new user and associated employee, with proper error handling.

Functionality:

* Validates form data using Laravel's validation rules.
* Creates a new user with associated employee data.
* Handles exceptions during user or employee creation.
* Redirects back to the admin panel with success or error messages.
***  
`deleteUser($id)`
Deletes an employee and its associated user.

Functionality:

* Finds the employee by ID.
* If found, deletes the employee and the associated user.
* Redirects back to the admin panel with success or error messages.
***
`showEditForm($id)`
Displays the form for editing an employee's information.

Functionality:

* Finds the employee by ID.
* If found, renders the edit-user view with the employee's data.
***
`updateUser(Request $request, $id)`
Updates an employee's information and associated user password if provided.

Functionality:

* Validates the updated data using Laravel's validation rules.
* Finds the employee by ID.
* Updates the employee's information.
* If a new password is provided, updates the associated user's password.
* Redirects back to the admin panel with success or error messages.
***


# UserPanelController
The UserPanelController manages the functionalities specific to the user panel of the Employee Management System. It provides authenticated users access to their own employee information and ensures a seamless user experience.

## Method
`index`
This method is responsible for displaying the user panel for authenticated users, allowing them to view their own employee information. If a user is not authenticated, it redirects them to the login page while sending 'from' data to indicate the source of the redirection.

Functionality:

* Checks if the user is authenticated using auth()->check().
* If the user is not authenticated:
* Redirects to the login page (route('login')) and includes 'from' data to manage redirection after login.
***
* If the user is authenticated:
* Retrieves the authenticated user using auth()->user().
* Retrieves the associated employee data using Employee::where('user_id', $user->id)->first().
* Passes user and employee data to the user-panel view for rendering.
***


# Application Routes
The application features routes that provide different functionalities based on user roles and authentication status. These routes facilitate interactions within the Employee Management System.

## Dashboard Route
`/dashboard`
Description: This route leads to the dashboard view, accessible to authenticated and verified users.

Functionality:

* Displays the index view.
* Requires users to be authenticated and verified.
* Named as 'dashboard'.

## Admin Routes
`Middleware: ['auth', 'admin']`

The admin routes group encompasses actions that are exclusive to admin users for managing employee data.

`/admin`
This route leads to the admin panel view, where administrators can manage employees.
* Displays the admin panel using the AdminPanelController's index method.
* Named as 'admin'.

`/create-user`
This route displays the form for creating a new user (employee).
* Displays the user creation form using the AdminPanelController's showCreateForm method.
* Named as 'create-user'.

`POST /create-user`
This route handles the submission of the user creation form.

* Invokes the AdminPanelController's store method to create a new user and associated employee.
* Named as 'store-user'.

`DELETE /delete-user/{id}`
This route handles the deletion of a user (employee).
* Invokes the AdminPanelController's deleteUser method to delete an employee and its associated user.
* Named as 'delete-user'.
  
`/edit-user/{id}`
This route displays the form for editing an existing user's information.
* Displays the edit user form using the AdminPanelController's showEditForm method.
* Named as 'edit-user'.

`PUT /update-user/{id}`
This route handles the submission of the user information update form.
* Invokes the AdminPanelController's updateUser method to update an employee's information.
* Named as 'update-user'.
  
## User Panel Route
`/user-panel`
This route leads to the user panel view, providing users access to their own employee information.
* Displays the user panel using the UserPanelController's index method.
* Named as 'user-panel'.

## Getting Started

Follow these steps to set up and run the BookHaven project locally:

1. **Clone the Repository**: Clone this repository to your local development environment using the following command:  
   ```sh
   git clone https://github.com/safeeras042/Employee-Management-System.git

2. **Install Dependencies**: Navigate to the project directory and install the required PHP dependencies using Composer:
   ```sh
   cd Employee-Management-System
   composer install

3. **Create .env File**: Copy it to create your own .env file:
   ```sh
   cp .env.example .env
* Then, generate an application key using the following command:
   ```sh
   php artisan key:generate

4.  **Create Database**: Create the bookhaven_db database using your preferred MySQL client.

5. **Database Configuration**: In the .env file, update the following lines with your database credentials:
   ```sh
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=employee_management_system
      DB_USERNAME=root
      DB_PASSWORD=

6. **Install JavaScript Dependencies**: Install the JavaScript dependencies using npm:
   ```sh
   npm install

7. **Build Frontend Assets**: Build the frontend assets by running the following command:
   ```sh
   npm run dev

8. **Start the Development Server**: Launch the Laravel development server:
   ```sh
   php artisan serve

9. **Access the Application**: Open a web browser and visit http://localhost:8000 to access the BookHaven application.


## Troubleshooting Common Issues

### Issue: Failed to Listen on 127.0.0.1:8000

**Solution**:
1. Navigate to your PHP installation folder.
2. Find the `php.ini-development` file and rename it to `php.ini`.

---

### Issue: Call to Undefined Function Illuminate\Encryption\openssl_cipher_iv_length()

**Solution**:
1. Open your `php.ini` file.
2. Search for the `;extension=openssl` line.
3. Remove the semicolon `;` at the beginning of the line to uncomment it.
4. Save the `php.ini` file.
5. Restart your server.

---

### Issue: Illuminate\Database\QueryException Could Not Find Driver

**Solution**:
1. Open your `php.ini` file.
2. Search for the `;extension=pdo_mysql` line.
3. Remove the semicolon `;` at the beginning of the line to uncomment it.
4. Save the `php.ini` file.
5. Restart your server.

## Screenshots

![Index](https://github.com/safeeras042/Employee-Management-System/assets/134996928/f61a387c-14d7-46d1-bc7f-1408f67b28ce)

![Admin-Panel (1)](https://github.com/safeeras042/Employee-Management-System/assets/134996928/5ea206fa-730a-40ed-a0db-2c889355b592)

![Create-User](https://github.com/safeeras042/Employee-Management-System/assets/134996928/edf521d7-11e9-4353-8a79-fb01bc63fa10)

![Edit-User](https://github.com/safeeras042/Employee-Management-System/assets/134996928/4a863073-02c2-40db-925a-6e6566dc55cf)
![User-Panel](https://github.com/safeeras042/Employee-Management-System/assets/134996928/07c714b7-8eb6-45d0-9c3f-8eab101923fe)










