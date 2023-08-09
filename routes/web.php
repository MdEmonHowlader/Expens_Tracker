<?php

use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// AJAX API

Route::middleware('auth')->group(function () {
    // Income Category
    Route::get('/income-cat-list', [IncomeCategoryController::class, 'incomeCategoryList'])
        ->name('income-cat-list');

    Route::post('/create-income-cat', [IncomeCategoryController::class, 'incomeCategoryCreate'])
        ->name(('income-cat-create'));

    Route::post('/update-income-cat', [IncomeCategoryController::class, 'incomeCategoryUpdate'])
        ->name(('income-cat-update'));

    Route::post('/delete-income-cat', [IncomeCategoryController::class, 'incomeCategoryDelete'])
        ->name(('income-cat-delete'));

    // Expense Category
    Route::get('/expense-cat-list', [ExpenseCategoryController::class, 'expenseCategoryList'])
        ->name('income-cat-list');

    Route::post('/create-expense-cat', [ExpenseCategoryController::class, 'expenseCategoryCreate'])
        ->name(('expense-cat-create'));

    Route::post('/update-expense-cat', [ExpenseCategoryController::class, 'expenseCategoryUpdate'])
        ->name(('expense-cat-update'));

    Route::post('/delete-expense-cat', [ExpenseCategoryController::class, 'expenseCategoryDelete'])
        ->name(('expense-cat-delete'));

    // Income Page
    Route::get('/income-list', [IncomeController::class, 'IncomeList'])
        ->name('income-list');

    Route::post('/create-income', [IncomeController::class, 'createIncome'])
        ->name(('income-create'));
    Route::post('/update-income', [IncomeController::class, 'updateIncome'])
        ->name(('income-update'));

    Route::post('/delete-income', [IncomeController::class, 'deleteIncome'])
        ->name('deleteIncome');

    // Expense Page
    Route::get('/expense-list', [ExpenseController::class, 'ExpenseList'])
        ->name('expense-list');

    Route::post('/create-expense', [ExpenseController::class, 'createExpense'])
        ->name(('expense-create'));

    Route::post('/update-expense', [ExpenseController::class, 'updateExpense'])
        ->name(('expense-update'));

    Route::post('/delete-expense', [ExpenseController::class, 'deleteExpense'])
        ->name('deleteExpense');

});

 require __DIR__ . '/auth.php';
