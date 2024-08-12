<?php
use App\Http\Controllers\BigfiveController;
use App\Http\Controllers\ChronotypeController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\FormInviteController;
use App\Http\Controllers\Member\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::prefix('member')->name('member.')->group(function () {
    Route::middleware(['auth:member'])->group(function() {
        Route::get('/dashboard', function () {
            return Inertia::render('Member/Dashboard');
        })->name('dashboard');

       
        Route::get('/tests/index',[BigfiveController::class,'index']);
        Route::get('/tests/create',[BigfiveController::class,'create'])->name('tests.create');
        Route::post('/tests',[BigfiveController::class,'store'])->name('tests.store');
        Route::get('/tests/show/{bigfive?}', [BigfiveController::class, 'show'])->name('tests.show');

        Route::get('/tests/chronotypecreate',[ChronotypeController::class, 'chronotypecreate'])->name('tests.chronotypecreate');
        Route::post('/tests',[ChronotypeController::class,'chronotypestore'])->name('tests.chronotypestore');
        Route::get('/tests/chronotypeshow/{chronotype?}', [ChronotypeController::class, 'chronotypeshow'])->name('tests.chronotypeshow');

        Route::get('/tests/stylecreate',[StyleController::class, 'stylecreate'])->name('tests.stylecreate');
        Route::post('/tests',[StyleController::class,'stylestore'])->name('tests.stylestore');
        Route::get('/tests/styleshow/{style?}', [StyleController::class, 'styleshow'])->name('tests.styleshow');

        Route::get('/company/formcreate/{token}', [FormInviteController::class, 'showCompanyForm'])->name('company.formcreate');
        Route::post('/company/store',[FormInviteController::class,'storeCompanyInfo'])->name('company.store');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
});