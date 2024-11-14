# Notes API - Laravel Project

This is a simple Laravel-based API for managing notes. It provides endpoints to create, read, update, and delete notes.

## Requirements

- PHP
- Composer
- Laravel
- MySQL

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/RanaGulraiz045/notes-laravel-task.git
    cd notes-laravel-task
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Create the `.env` file:**

    ```bash
    cp .env.example .env
    ```

4. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

5. **Configure the database:**

   Open the `.env` file and update the database settings:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6. **Run the migrations:**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```

   The API should now be running at `http://127.0.0.1:8000`.

## API Endpoints

### 1. Create a New Note

   - **Endpoint:** `POST /api/notes`
   - **Description:** Creates a new note.
   - **Request Body:**
     ```json
     {
       "title": "Your Note Title",
       "content": "Your Note Content"
     }
     ```
   - **Response:** Returns the created note with a 201 status.

### 2. Get All Notes

   - **Endpoint:** `GET /api/notes`
   - **Description:** Retrieves all notes.
   - **Response:** Returns an array of notes with a 200 status.

### 3. Update a Note

   - **Endpoint:** `PUT /api/notes/{id}`
   - **Description:** Updates an existing note by ID.
   - **Request Body (example):**
     ```json
     {
       "title": "Updated Note Title",
       "content": "Updated Note Content"
     }
     ```
   - **Response:** Returns the updated note with a 200 status.

### 4. Delete a Note

   - **Endpoint:** `DELETE /api/notes/{id}`
   - **Description:** Deletes a note by ID.
   - **Response:** Returns a success message with a 200 status.

