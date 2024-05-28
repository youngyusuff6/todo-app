# Todo List Application

This is a simple Todo List application built using the Laravel framework with Livewire for dynamic, real-time user interfaces. This application allows users to create, edit, delete, and toggle the completion status of todo items. The interface includes flash messages that provide feedback to the user about their actions.

## Features

- **Create Todo Items**: Users can add new todo items with a name that must be between 3 and 50 characters.
- **Search Functionality**: Users can search for todo items by name.
- **Edit Todo Items**: Users can edit the name of existing todo items.
- **Toggle Completion Status**: Users can mark todo items as completed or incomplete.
- **Delete Todo Items**: Users can delete todo items.
- **Flash Messages**: Users receive feedback messages when they create, update, or delete todo items. These messages disappear after 5 seconds with a smooth fade-out effect.

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/youngyusuff/todo-app.git
   cd todo-list
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Set up environment variables:**
   Copy the `.env.example` file to `.env` and configure your database and other settings.

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Serve the application:**
   ```bash
   php artisan serve
   ```


## Usage

### Creating Todo Items

1. Enter the name of the todo item in the input field.
2. Click the "Add Todo" button.
3. A success message will appear, indicating the item was added.

### Searching Todo Items

1. Enter a search term in the search input field.
2. The list will update to show only the items that match the search term.

### Editing Todo Items

1. Click the "Edit" button next to the todo item you want to edit.
2. Update the name in the input field that appears.
3. Click the "Save" button to save the changes.
4. An updated message will appear, indicating the item was updated.

### Toggling Completion Status

1. Click the checkbox next to a todo item to toggle its completion status.
2. The item will be marked as completed or incomplete based on its previous status.

### Deleting Todo Items

1. Click the "Delete" button next to the todo item you want to delete.
2. A deleted message will appear, indicating the item was removed.

## Flash Messages

- **Success Message**: Appears when a todo item is successfully created.
- **Updated Message**: Appears when a todo item is successfully updated.
- **Deleted Message**: Appears when a todo item is successfully deleted.
- **Error Message**: Appears if there is an error in the process.

These messages will automatically disappear after 5 seconds with a smooth fade-out effect.

## Code Structure

- **Component**: `TodoList` component handles all operations related to todo items.
- **Views**: Blade templates located in `resources/views/livewire/todo-list.blade.php` for displaying the todo list and handling user interactions.
- **Styles**: Basic styles for alerts and form inputs.
- **JavaScript**: Script to handle the automatic disappearance of flash messages after 5 seconds.

## Contribution

Feel free to fork this repository and contribute by submitting a pull request. Make sure to follow the established code style and include appropriate tests.

**Todo List Application** - A simple, intuitive way to manage your tasks and stay organized. Built with Laravel and Livewire.