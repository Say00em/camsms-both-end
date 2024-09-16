<?php

use App\Http\Controllers\CategoryContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceViewController;
use App\Http\Controllers\MailConfigController;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryContactController::class, 'category_view'])->name('category');
Route::get('/contact/view', [CategoryContactController::class, 'contact_view'])->name('contact.view');
Route::get('/contact/create', [CategoryContactController::class, 'contact_create'])->name('contact.create');
Route::get('/mail/history', [MailConfigController::class, 'mail_send_history'])->name('mail.history');
Route::get('/sms/history', [HomeController::class, 'sms_history'])->name('sms.history');
Route::get('/invoice/history', [InvoiceViewController::class, 'invoice_history'])->name('invoice.history');
Route::get('/mail/imap', [MailConfigController::class, 'mail_imap_view'])->name('mail.imap.view');
Route::get('/sender/mail', [MailConfigController::class, 'sender_mail_view'])->name('sender.mail.view');
Route::get('/mail/send', [MailConfigController::class, 'mail_send_form'])->name('mail.send');
Route::get('/mail/inbox', [MailConfigController::class, 'mail_inbox'])->name('mail.inbox');


//post

Route::post('/mail/imap/store', [MailConfigController::class, 'mail_imap_store'])->name('mail.imap.store');
Route::post('/sender/mail/store', [MailConfigController::class, 'sender_mail_store'])->name('sender.mail.store');
Route::post('/category/store', [CategoryContactController::class, 'category_store'])->name('category.store');
Route::post('/contact/store', [CategoryContactController::class, 'contact_store'])->name('contact.store');
Route::post('/mail/send/store', [MailConfigController::class, 'mail_send_store'])->name('mail.send.store');

