<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\PropertyFeatureController as AdminPropertyFeatureController;
use App\Http\Controllers\Admin\GuideController as AdminGuideController;
use App\Http\Controllers\Admin\ArticleCategoryController as AdminArticleCategoryController;
use App\Http\Controllers\Admin\HomeSectionController as AdminHomeSectionController;
use App\Http\Controllers\Admin\AboutSectionController as AdminAboutSectionController;
use App\Http\Controllers\Admin\OfferingSectionController as AdminOfferingSectionController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\FeatureController as AdminFeatureController;
use App\Http\Controllers\Admin\SpecificationCategoryController as AdminSpecificationCategoryController;
use App\Http\Controllers\Admin\PropertySpecificationController as AdminPropertySpecificationController;
use App\Http\Controllers\Admin\TypeHouseController as AdminTypeHouseController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\QuilUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::post('/quill-upload', [QuilUploadController::class, 'store'])->name('quill.upload');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/properties', [PropertyController::class, 'index'])->name('property.index');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('property.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


Route::prefix('admin')->group(function () {

    Route::prefix('auth')->middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'loginIndex'])->name('admin.login.index');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.check');
        // Route::get('/register', [AuthController::class, 'registerIndex'])->name('admin.register.index');
        // Route::post('/register/store', [AuthController::class, 'registerStore'])->name('admin.register.store');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::middleware(['auth'])->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::post('/profile/update-information', [ProfileController::class, 'update'])->name('admin.profile-information.update');
        Route::post('/profile/update-picture', [ProfileController::class, 'updatePicture'])->name('admin.profile-picture.update');
        Route::post('/profile/delete-picture', [ProfileController::class, 'deletePicture'])->name('admin.profile-picture.destroy');
        Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('admin.profile-password.update');

        Route::get('/location', [AdminLocationController::class, 'index'])->name('admin.location.index');
        Route::post('/location/store', [AdminLocationController::class, 'store'])->name('admin.location.store');
        Route::put('/location/update', [AdminLocationController::class, 'update'])->name('admin.location.update');
        Route::delete('/location/delete/{id}', [AdminLocationController::class, 'destroy'])->name('admin.location.destroy');

        Route::get('/guide', [AdminGuideController::class, 'index'])->name('admin.guide.index');
        Route::post('/guide/store', [AdminGuideController::class, 'store'])->name('admin.guide.store');
        Route::put('/guide/update', [AdminGuideController::class, 'update'])->name('admin.guide.update');
        Route::delete('/guide/delete/{id}', [AdminGuideController::class, 'destroy'])->name('admin.guide.destroy');

        Route::get('/property', [AdminPropertyController::class, 'index'])->name('admin.property.index');
        Route::get('/property/{slug}', [AdminPropertyController::class, 'show'])->name('admin.property.show');
        Route::post('/property/store', [AdminPropertyController::class, 'store'])->name('admin.property.store');
        Route::put('/property/update', [AdminPropertyController::class, 'update'])->name('admin.property.update');
        Route::delete('/property/delete/{id}', [AdminPropertyController::class, 'destroy'])->name('admin.property.destroy');

        Route::post('/property-feature/store', [AdminPropertyFeatureController::class, 'store'])->name('admin.property-feature.store');
        Route::put('/property-feature/update', [AdminPropertyFeatureController::class, 'update'])->name('admin.property-feature.update');
        Route::delete('/property-feature/delete/{id}', [AdminPropertyFeatureController::class, 'destroy'])->name('admin.property-feature.destroy');

        Route::post('/property-specification/store', [AdminPropertySpecificationController::class, 'store'])->name('admin.property-specification.store');
        Route::put('/property-specification/update', [AdminPropertySpecificationController::class, 'update'])->name('admin.property-specification.update');
        Route::delete('/property-specification/delete/{id}', [AdminPropertySpecificationController::class, 'destroy'])->name('admin.property-specification.destroy');

        Route::post('/type-house/store', [AdminTypeHouseController::class, 'store'])->name('admin.type-house.store');
        Route::put('/type-house/update', [AdminTypeHouseController::class, 'update'])->name('admin.type-house.update');
        Route::delete('/type-house/delete/{id}', [AdminTypeHouseController::class, 'destroy'])->name('admin.type-house.destroy');

        Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');
        Route::post('/faq/store', [FaqController::class, 'store'])->name('admin.faq.store');
        Route::put('/faq/update', [FaqController::class, 'update'])->name('admin.faq.update');
        Route::delete('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');

        Route::get('/article-category', [AdminArticleCategoryController::class, 'index'])->name('admin.article-category.index');
        Route::post('/article-category/store', [AdminArticleCategoryController::class, 'store'])->name('admin.article-category.store');
        Route::put('/article-category/update', [AdminArticleCategoryController::class, 'update'])->name('admin.article-category.update');
        Route::delete('/article-category/delete/{id}', [AdminArticleCategoryController::class, 'destroy'])->name('admin.article-category.destroy');

        Route::get('/article', [AdminArticleController::class, 'index'])->name('admin.article.index');
        Route::post('/article/store', [AdminArticleController::class, 'store'])->name('admin.article.store');
        Route::put('/article/update', [AdminArticleController::class, 'update'])->name('admin.article.update');
        Route::delete('/article/delete/{id}', [AdminArticleController::class, 'destroy'])->name('admin.article.destroy');

        Route::get('/feature', [AdminFeatureController::class, 'index'])->name('admin.feature.index');
        Route::post('/feature/store', [AdminFeatureController::class, 'store'])->name('admin.feature.store');
        Route::put('/feature/update', [AdminFeatureController::class, 'update'])->name('admin.feature.update');
        Route::delete('/feature/delete/{id}', [AdminFeatureController::class, 'destroy'])->name('admin.feature.destroy');

        Route::get('/specification-category', [AdminSpecificationCategoryController::class, 'index'])->name('admin.specification-category.index');
        Route::post('/specification-category/store', [AdminSpecificationCategoryController::class, 'store'])->name('admin.specification-category.store');
        Route::put('/specification-category/update', [AdminSpecificationCategoryController::class, 'update'])->name('admin.specification-category.update');
        Route::delete('/specification-category/delete/{id}', [AdminSpecificationCategoryController::class, 'destroy'])->name('admin.specification-category.destroy');

        Route::get('/home-section', [AdminHomeSectionController::class, 'index'])->name('admin.home-section.index');
        Route::get('/home-section/edit', [AdminHomeSectionController::class, 'edit'])->name('admin.home-section.edit');
        Route::put('/home-section/update', [AdminHomeSectionController::class, 'update'])->name('admin.home-section.update');

        Route::get('/about-section', [AdminAboutSectionController::class, 'index'])->name('admin.about-section.index');
        Route::get('/about-section/edit', [AdminAboutSectionController::class, 'edit'])->name('admin.about-section.edit');
        Route::put('/about-section/update', [AdminAboutSectionController::class, 'update'])->name('admin.about-section.update');

        Route::get('/offering-section', [AdminOfferingSectionController::class, 'index'])->name('admin.offering-section.index');
        Route::get('/offering-section/edit', [AdminOfferingSectionController::class, 'edit'])->name('admin.offering-section.edit');
        Route::put('/offering-section/update', [AdminOfferingSectionController::class, 'update'])->name('admin.offering-section.update');
    });
});
