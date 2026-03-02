<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeHeroSectionController;
use App\Http\Controllers\Admin\MarqueeItemController;
use App\Http\Controllers\Admin\FindTalentStepController;
use App\Http\Controllers\Admin\WelcomeSectionController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Middleware\EnsureAdminAuthenticated;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// ── Dev Utility ──
Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'Application cache cleared!';
});


// ── Public Routes ──
Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/about-us', fn() => view('pages.aboutus.aboutus'))->name('about');
Route::get('/case-studies', fn() => view('pages.casestudy.casestudy'))->name('casestudy');
Route::get('/contact-us', fn() => view('pages.contactus.contactus'))->name('contact');

// ── Public: Consultation form submission (modal AJAX) ──
Route::post('/consultations', [ConsultationController::class, 'store'])->name('consultations.store');

// ── Public: Contact-us form submission (AJAX) ──
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');


// ── Admin Auth (guest — redirects if already logged in) ──
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


// ── Admin Panel (protected) ──
Route::prefix('admin')->name('admin.')->middleware(EnsureAdminAuthenticated::class)->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Pages (top-level page editors — kept for backwards compat if needed)
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/home',         fn() => view('pages.admin.pages.home'))->name('home');
        Route::get('/about',        fn() => view('pages.admin.pages.about'))->name('about');
        Route::get('/case-studies', fn() => view('pages.admin.pages.casestudies'))->name('casestudies');
        Route::get('/contact',      fn() => view('pages.admin.pages.contact'))->name('contact');
    });

    // ── Page Sections ──
    Route::prefix('sections')->name('sections.')->group(function () {

        // Home page sections
        Route::prefix('home')->name('home.')->group(function () {

            // Hero Section — full CRUD
            Route::get('/hero',                            [HomeHeroSectionController::class, 'edit'])->name('hero');
            Route::post('/hero',                           [HomeHeroSectionController::class, 'store'])->name('hero.store');
            Route::post('/hero/{homeHeroSection}',         [HomeHeroSectionController::class, 'update'])->name('hero.update');
            Route::patch('/hero/{homeHeroSection}/status', [HomeHeroSectionController::class, 'toggleStatus'])->name('hero.toggleStatus');
            Route::delete('/hero/{homeHeroSection}',       [HomeHeroSectionController::class, 'destroy'])->name('hero.destroy');
            Route::post('/hero/{id}/restore',              [HomeHeroSectionController::class, 'restore'])->name('hero.restore');

            // Remaining section stubs (blade-only for now)
            // Marquee Section — full CRUD
            Route::get('/marquee',                             [MarqueeItemController::class, 'index'])->name('marquee');
            Route::post('/marquee',                            [MarqueeItemController::class, 'store'])->name('marquee.store');
            Route::post('/marquee/{marqueeItem}',              [MarqueeItemController::class, 'update'])->name('marquee.update');
            Route::patch('/marquee/{marqueeItem}/status',      [MarqueeItemController::class, 'toggleStatus'])->name('marquee.toggleStatus');
            Route::delete('/marquee/{marqueeItem}',            [MarqueeItemController::class, 'destroy'])->name('marquee.destroy');
            Route::post('/marquee/{id}/restore',               [MarqueeItemController::class, 'restore'])->name('marquee.restore');
            Route::post('/marquee/sort',                       [MarqueeItemController::class, 'sort'])->name('marquee.sort');
            // Find Talent Section — full CRUD
            // NOTE: static segments (sort) MUST come before wildcard ({findTalentStep}) routes
            Route::get('/find-talent',                                [FindTalentStepController::class, 'index'])->name('findtalent');
            Route::post('/find-talent',                               [FindTalentStepController::class, 'store'])->name('findtalent.store');
            Route::post('/find-talent/sort',                          [FindTalentStepController::class, 'sort'])->name('findtalent.sort');
            Route::post('/find-talent/{findTalentStep}',              [FindTalentStepController::class, 'update'])->name('findtalent.update');
            Route::patch('/find-talent/{findTalentStep}/status',      [FindTalentStepController::class, 'toggleStatus'])->name('findtalent.toggleStatus');
            Route::delete('/find-talent/{findTalentStep}',            [FindTalentStepController::class, 'destroy'])->name('findtalent.destroy');
            Route::post('/find-talent/{id}/restore',                  [FindTalentStepController::class, 'restore'])->name('findtalent.restore');
            // Welcome Section — full CRUD (singleton + slider lines + slider items)
            // NOTE: all static sub-segments (sort) MUST come before wildcard routes
            Route::get('/welcome',                                                            [WelcomeSectionController::class, 'index'])->name('welcome');
            Route::post('/welcome',                                                           [WelcomeSectionController::class, 'store'])->name('welcome.store');
            Route::put('/welcome/{welcomeSection}',                                           [WelcomeSectionController::class, 'update'])->name('welcome.update');
            Route::patch('/welcome/{welcomeSection}/status',                                  [WelcomeSectionController::class, 'toggleStatus'])->name('welcome.toggleStatus');
            Route::delete('/welcome/{welcomeSection}',                                        [WelcomeSectionController::class, 'destroy'])->name('welcome.destroy');
            Route::post('/welcome/{id}/restore',                                              [WelcomeSectionController::class, 'restore'])->name('welcome.restore');
            // Lines
            Route::post('/welcome/{welcomeSection}/lines/sort',                               [WelcomeSectionController::class, 'sortLines'])->name('welcome.lines.sort');
            Route::post('/welcome/{welcomeSection}/lines',                                    [WelcomeSectionController::class, 'storeLine'])->name('welcome.lines.store');
            Route::put('/welcome/{welcomeSection}/lines/{line}',                              [WelcomeSectionController::class, 'updateLine'])->name('welcome.lines.update');
            Route::patch('/welcome/{welcomeSection}/lines/{line}/status',                     [WelcomeSectionController::class, 'toggleLineStatus'])->name('welcome.lines.toggleStatus');
            Route::delete('/welcome/{welcomeSection}/lines/{line}',                           [WelcomeSectionController::class, 'destroyLine'])->name('welcome.lines.destroy');
            Route::post('/welcome/{sectionId}/lines/{lineId}/restore',                        [WelcomeSectionController::class, 'restoreLine'])->name('welcome.lines.restore');
            // Items
            Route::post('/welcome/{welcomeSection}/lines/{line}/items/sort',                  [WelcomeSectionController::class, 'sortItems'])->name('welcome.items.sort');
            Route::post('/welcome/{welcomeSection}/lines/{line}/items',                       [WelcomeSectionController::class, 'storeItem'])->name('welcome.items.store');
            Route::put('/welcome/{welcomeSection}/lines/{line}/items/{item}',                 [WelcomeSectionController::class, 'updateItem'])->name('welcome.items.update');
            Route::patch('/welcome/{welcomeSection}/lines/{line}/items/{item}/status',        [WelcomeSectionController::class, 'toggleItemStatus'])->name('welcome.items.toggleStatus');
            Route::delete('/welcome/{welcomeSection}/lines/{line}/items/{item}',              [WelcomeSectionController::class, 'destroyItem'])->name('welcome.items.destroy');
            Route::post('/welcome/{sectionId}/lines/{lineId}/items/{itemId}/restore',         [WelcomeSectionController::class, 'restoreItem'])->name('welcome.items.restore');
            Route::get('/portfolio',   fn() => view('pages.admin.sections.home.portfolio'))->name('portfolio');
            Route::get('/our-process', fn() => view('pages.admin.sections.home.ourprocess'))->name('ourprocess');
            Route::get('/hire-us',     fn() => view('pages.admin.sections.home.hireus'))->name('hireus');
            Route::get('/our-client',  fn() => view('pages.admin.sections.home.ourclient'))->name('ourclient');
            Route::get('/testimonial', fn() => view('pages.admin.sections.home.testimonial'))->name('testimonial');
            Route::get('/faq',         fn() => view('pages.admin.sections.home.faq'))->name('faq');
            Route::get('/cta',         fn() => view('pages.admin.sections.home.cta'))->name('cta');
        });

        // About Us page sections
        Route::prefix('about')->name('about.')->group(function () {
            Route::get('/hero',       fn() => view('pages.admin.sections.about.hero'))->name('hero');
            Route::get('/what-we',    fn() => view('pages.admin.sections.about.whatwe'))->name('whatwe');
            Route::get('/core-value', fn() => view('pages.admin.sections.about.corevalue'))->name('corevalue');
            Route::get('/join-now',   fn() => view('pages.admin.sections.about.joinnow'))->name('joinnow');
        });

        // Case Studies page sections
        Route::prefix('case-study')->name('casestudy.')->group(function () {
            Route::get('/hero',     fn() => view('pages.admin.sections.casestudy.hero'))->name('hero');
            Route::get('/projects', fn() => view('pages.admin.sections.casestudy.projects'))->name('projects');
            Route::get('/cta',      fn() => view('pages.admin.sections.casestudy.cta'))->name('cta');
        });

        // Contact Us page sections
        Route::prefix('contact')->name('contact.')->group(function () {
            Route::get('/contact-us', fn() => view('pages.admin.sections.contact.contactus'))->name('contactus');
            Route::get('/cta',        fn() => view('pages.admin.sections.contact.cta'))->name('cta');
        });
    });

    // Case Studies
    Route::prefix('case-studies')->name('casestudies.')->group(function () {
        Route::get('/',           fn() => view('pages.admin.casestudies.index'))->name('index');
        Route::get('/create',     fn() => view('pages.admin.casestudies.create'))->name('create');
        Route::get('/categories', fn() => view('pages.admin.casestudies.categories'))->name('categories');
    });

    // Testimonials
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/',       fn() => view('pages.admin.testimonials.index'))->name('index');
        Route::get('/create', fn() => view('pages.admin.testimonials.create'))->name('create');
    });

    // Partners
    Route::prefix('partners')->name('partners.')->group(function () {
        Route::get('/', fn() => view('pages.admin.partners.index'))->name('index');
    });

    // Consultations
    Route::prefix('consultations')->name('consultations.')->group(function () {
        Route::get('/',                        [AdminConsultationController::class, 'index'])->name('index');
        Route::get('/{consultation}',          [AdminConsultationController::class, 'show'])->name('show');
        Route::patch('/{consultation}/status', [AdminConsultationController::class, 'updateStatus'])->name('updateStatus');
    });

    // Contact-us submissions
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/',                   [AdminContactUsController::class, 'index'])->name('index');
        Route::get('/{contact}',          [AdminContactUsController::class, 'show'])->name('show');
        Route::patch('/{contact}/status', [AdminContactUsController::class, 'updateStatus'])->name('updateStatus');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/general', fn() => view('pages.admin.settings.general'))->name('general');
        Route::get('/seo',     fn() => view('pages.admin.settings.seo'))->name('seo');
        Route::get('/social',  fn() => view('pages.admin.settings.social'))->name('social');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/',       fn() => view('pages.admin.users.index'))->name('index');
        Route::get('/create', fn() => view('pages.admin.users.create'))->name('create');
    });

    // Profile
    Route::get('/profile', fn() => view('pages.admin.profile'))->name('profile');
});
