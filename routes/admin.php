<?php
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AdminInvite;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth:admin'])->group(function() {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');

        Route::get('/invite/send',[AdminInvite::class, 'sendmail'])->name('admin.sendmail');
        Route::post('/invite',[AdminInvite::class, 'sendInvite'])->name('invite.sendinvite');
        Route::get('/home/membersinfo',[AdminInvite::class,'getInviteMembers'])->name('home.members-info');
        Route::get('/home/{member}/showbigfive',[AdminInvite::class, 'showBigFive'])->name('home.bigfive');
        Route::get('home/{id}/edit',[AdminInvite::class,'edit'])->name('home.edit');
        Route::put('home/{id}',[AdminInvite::class,'update'])->name('home.update');
        Route::delete('home/{id}',[AdminInvite::class,'destroy'])->name('home.delete');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
});