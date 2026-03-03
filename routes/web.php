<?php
// SAVE AS: routes/web.php
// CHANGES FROM ORIGINAL:
//   • Added use statements for PartnerSectionController & TestimonialSectionController
//   • Replaced stub Route::get('/our-client', ...) with full CRUD routes
//   • Replaced stub Route::get('/testimonial', ...) with full CRUD routes

use App\Http\Controllers\Admin\AboutCoreValueSectionController;
use App\Http\Controllers\Admin\AboutHeroSectionController;
use App\Http\Controllers\admin\AboutJoinNowSectionController;
use App\Http\Controllers\Admin\AboutMissionVisionController;
use App\Http\Controllers\Admin\AboutWhatWeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CaseStudyHeroSectionController;
use App\Http\Controllers\Admin\CaseStudyProjectController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\Admin\CtaSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqSectionController;
use App\Http\Controllers\Admin\FindTalentStepController;
use App\Http\Controllers\Admin\HireSectionController;
use App\Http\Controllers\Admin\HomeHeroSectionController;
use App\Http\Controllers\Admin\MarqueeItemController;
use App\Http\Controllers\Admin\PartnerSectionController;
use App\Http\Controllers\Admin\PortfolioProjectController;
use App\Http\Controllers\Admin\ProcessSectionController;
use App\Http\Controllers\Admin\TestimonialSectionController;
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

    // Pages (top-level page editors)
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

            // Marquee Section — full CRUD
            Route::get('/marquee',                             [MarqueeItemController::class, 'index'])->name('marquee');
            Route::post('/marquee',                            [MarqueeItemController::class, 'store'])->name('marquee.store');
            Route::post('/marquee/{marqueeItem}',              [MarqueeItemController::class, 'update'])->name('marquee.update');
            Route::patch('/marquee/{marqueeItem}/status',      [MarqueeItemController::class, 'toggleStatus'])->name('marquee.toggleStatus');
            Route::delete('/marquee/{marqueeItem}',            [MarqueeItemController::class, 'destroy'])->name('marquee.destroy');
            Route::post('/marquee/{id}/restore',               [MarqueeItemController::class, 'restore'])->name('marquee.restore');
            Route::post('/marquee/sort',                       [MarqueeItemController::class, 'sort'])->name('marquee.sort');

            // Find Talent Section — full CRUD
            Route::get('/find-talent',                                [FindTalentStepController::class, 'index'])->name('findtalent');
            Route::post('/find-talent',                               [FindTalentStepController::class, 'store'])->name('findtalent.store');
            Route::post('/find-talent/sort',                          [FindTalentStepController::class, 'sort'])->name('findtalent.sort');
            Route::post('/find-talent/{findTalentStep}',              [FindTalentStepController::class, 'update'])->name('findtalent.update');
            Route::patch('/find-talent/{findTalentStep}/status',      [FindTalentStepController::class, 'toggleStatus'])->name('findtalent.toggleStatus');
            Route::delete('/find-talent/{findTalentStep}',            [FindTalentStepController::class, 'destroy'])->name('findtalent.destroy');
            Route::post('/find-talent/{id}/restore',                  [FindTalentStepController::class, 'restore'])->name('findtalent.restore');

            // Welcome Section — full CRUD
            Route::get('/welcome',                                                            [WelcomeSectionController::class, 'index'])->name('welcome');
            Route::post('/welcome',                                                           [WelcomeSectionController::class, 'store'])->name('welcome.store');
            Route::put('/welcome/{welcomeSection}',                                           [WelcomeSectionController::class, 'update'])->name('welcome.update');
            Route::patch('/welcome/{welcomeSection}/status',                                  [WelcomeSectionController::class, 'toggleStatus'])->name('welcome.toggleStatus');
            Route::delete('/welcome/{welcomeSection}',                                        [WelcomeSectionController::class, 'destroy'])->name('welcome.destroy');
            Route::post('/welcome/{id}/restore',                                              [WelcomeSectionController::class, 'restore'])->name('welcome.restore');
            Route::post('/welcome/{welcomeSection}/lines/sort',                               [WelcomeSectionController::class, 'sortLines'])->name('welcome.lines.sort');
            Route::post('/welcome/{welcomeSection}/lines',                                    [WelcomeSectionController::class, 'storeLine'])->name('welcome.lines.store');
            Route::put('/welcome/{welcomeSection}/lines/{line}',                              [WelcomeSectionController::class, 'updateLine'])->name('welcome.lines.update');
            Route::patch('/welcome/{welcomeSection}/lines/{line}/status',                     [WelcomeSectionController::class, 'toggleLineStatus'])->name('welcome.lines.toggleStatus');
            Route::delete('/welcome/{welcomeSection}/lines/{line}',                           [WelcomeSectionController::class, 'destroyLine'])->name('welcome.lines.destroy');
            Route::post('/welcome/{sectionId}/lines/{lineId}/restore',                        [WelcomeSectionController::class, 'restoreLine'])->name('welcome.lines.restore');
            Route::post('/welcome/{welcomeSection}/lines/{line}/items/sort',                  [WelcomeSectionController::class, 'sortItems'])->name('welcome.items.sort');
            Route::post('/welcome/{welcomeSection}/lines/{line}/items',                       [WelcomeSectionController::class, 'storeItem'])->name('welcome.items.store');
            Route::put('/welcome/{welcomeSection}/lines/{line}/items/{item}',                 [WelcomeSectionController::class, 'updateItem'])->name('welcome.items.update');
            Route::patch('/welcome/{welcomeSection}/lines/{line}/items/{item}/status',        [WelcomeSectionController::class, 'toggleItemStatus'])->name('welcome.items.toggleStatus');
            Route::delete('/welcome/{welcomeSection}/lines/{line}/items/{item}',              [WelcomeSectionController::class, 'destroyItem'])->name('welcome.items.destroy');
            Route::post('/welcome/{sectionId}/lines/{lineId}/items/{itemId}/restore',         [WelcomeSectionController::class, 'restoreItem'])->name('welcome.items.restore');

            // Portfolio Section — full CRUD
            Route::get('/portfolio',                                    [PortfolioProjectController::class, 'index'])->name('portfolio');
            Route::post('/portfolio',                                   [PortfolioProjectController::class, 'store'])->name('portfolio.store');
            Route::post('/portfolio/sort',                              [PortfolioProjectController::class, 'sort'])->name('portfolio.sort');
            Route::post('/portfolio/{portfolioProject}',                [PortfolioProjectController::class, 'update'])->name('portfolio.update');
            Route::patch('/portfolio/{portfolioProject}/status',        [PortfolioProjectController::class, 'toggleStatus'])->name('portfolio.toggleStatus');
            Route::delete('/portfolio/{portfolioProject}',              [PortfolioProjectController::class, 'destroy'])->name('portfolio.destroy');
            Route::post('/portfolio/{id}/restore',                      [PortfolioProjectController::class, 'restore'])->name('portfolio.restore');

            // Our Process Section — full CRUD
            Route::get('/ourprocess',                                          [ProcessSectionController::class, 'index'])->name('ourprocess');
            Route::post('/ourprocess/settings',                                [ProcessSectionController::class, 'updateSettings'])->name('ourprocess.settings.update');
            Route::post('/ourprocess/steps',                                   [ProcessSectionController::class, 'storeStep'])->name('ourprocess.steps.store');
            Route::post('/ourprocess/steps/sort',                              [ProcessSectionController::class, 'sortSteps'])->name('ourprocess.steps.sort');
            Route::post('/ourprocess/steps/{processStep}',                     [ProcessSectionController::class, 'updateStep'])->name('ourprocess.steps.update');
            Route::patch('/ourprocess/steps/{processStep}/status',             [ProcessSectionController::class, 'toggleStepStatus'])->name('ourprocess.steps.toggleStatus');
            Route::delete('/ourprocess/steps/{processStep}',                   [ProcessSectionController::class, 'destroyStep'])->name('ourprocess.steps.destroy');
            Route::post('/ourprocess/steps/{id}/restore',                      [ProcessSectionController::class, 'restoreStep'])->name('ourprocess.steps.restore');

            // Hire Us Section — full CRUD
            Route::get('/hireus',                                              [HireSectionController::class, 'index'])->name('hireus');
            Route::post('/hireus/settings',                                    [HireSectionController::class, 'updateSettings'])->name('hireus.settings.update');
            Route::post('/hireus/boxes',                                       [HireSectionController::class, 'storeBox'])->name('hireus.boxes.store');
            Route::post('/hireus/boxes/sort',                                  [HireSectionController::class, 'sortBoxes'])->name('hireus.boxes.sort');
            Route::post('/hireus/boxes/{hireBox}',                             [HireSectionController::class, 'updateBox'])->name('hireus.boxes.update');
            Route::patch('/hireus/boxes/{hireBox}/status',                     [HireSectionController::class, 'toggleBoxStatus'])->name('hireus.boxes.toggleStatus');
            Route::delete('/hireus/boxes/{hireBox}',                           [HireSectionController::class, 'destroyBox'])->name('hireus.boxes.destroy');
            Route::post('/hireus/boxes/{id}/restore',                          [HireSectionController::class, 'restoreBox'])->name('hireus.boxes.restore');

            // Our Partners (Client) Section — full CRUD
            Route::get('/our-client',                                          [PartnerSectionController::class, 'index'])->name('ourclient');
            Route::post('/our-client/settings',                                [PartnerSectionController::class, 'updateSettings'])->name('ourclient.settings.update');
            Route::post('/our-client/partners',                                [PartnerSectionController::class, 'storePartner'])->name('ourclient.partners.store');
            Route::post('/our-client/partners/sort',                           [PartnerSectionController::class, 'sortPartners'])->name('ourclient.partners.sort');
            Route::post('/our-client/partners/{partner}',                      [PartnerSectionController::class, 'updatePartner'])->name('ourclient.partners.update');
            Route::patch('/our-client/partners/{partner}/status',              [PartnerSectionController::class, 'togglePartnerStatus'])->name('ourclient.partners.toggleStatus');
            Route::delete('/our-client/partners/{partner}',                    [PartnerSectionController::class, 'destroyPartner'])->name('ourclient.partners.destroy');
            Route::post('/our-client/partners/{id}/restore',                   [PartnerSectionController::class, 'restorePartner'])->name('ourclient.partners.restore');

            // Testimonials Section — full CRUD
            Route::get('/testimonial',                                         [TestimonialSectionController::class, 'index'])->name('testimonial');
            Route::post('/testimonial/settings',                               [TestimonialSectionController::class, 'updateSettings'])->name('testimonial.settings.update');
            Route::post('/testimonial/items',                                  [TestimonialSectionController::class, 'storeTestimonial'])->name('testimonial.items.store');
            Route::post('/testimonial/items/sort',                             [TestimonialSectionController::class, 'sortTestimonials'])->name('testimonial.items.sort');
            Route::post('/testimonial/items/{testimonial}',                    [TestimonialSectionController::class, 'updateTestimonial'])->name('testimonial.items.update');
            Route::patch('/testimonial/items/{testimonial}/status',            [TestimonialSectionController::class, 'toggleTestimonialStatus'])->name('testimonial.items.toggleStatus');
            Route::delete('/testimonial/items/{testimonial}',                  [TestimonialSectionController::class, 'destroyTestimonial'])->name('testimonial.items.destroy');
            Route::post('/testimonial/items/{id}/restore',                     [TestimonialSectionController::class, 'restoreTestimonial'])->name('testimonial.items.restore');

            Route::get('/faq',                                    [FaqSectionController::class, 'index'])->name('faq');
            Route::post('/faq/settings',                          [FaqSectionController::class, 'updateSettings'])->name('faq.settings.update');
            Route::post('/faq/items',                             [FaqSectionController::class, 'storeFaqItem'])->name('faq.items.store');
            Route::post('/faq/items/sort',                        [FaqSectionController::class, 'sortFaqItems'])->name('faq.items.sort');
            Route::post('/faq/items/{faqItem}',                   [FaqSectionController::class, 'updateFaqItem'])->name('faq.items.update');
            Route::patch('/faq/items/{faqItem}/status',           [FaqSectionController::class, 'toggleFaqItemStatus'])->name('faq.items.toggleStatus');
            Route::delete('/faq/items/{faqItem}',                 [FaqSectionController::class, 'destroyFaqItem'])->name('faq.items.destroy');
            Route::post('/faq/items/{id}/restore',                [FaqSectionController::class, 'restoreFaqItem'])->name('faq.items.restore');

            Route::get('/cta',                                    [CtaSectionController::class, 'index'])->name('cta');
            Route::post('/cta/settings',                          [CtaSectionController::class, 'updateSettings'])->name('cta.settings.update');
        });

        // About Us page sections
        Route::prefix('about')->name('about.')->group(function () {
            Route::get('/hero',                            [AboutHeroSectionController::class, 'edit'])->name('hero');
            Route::post('/hero',                           [AboutHeroSectionController::class, 'store'])->name('hero.store');
            Route::post('/hero/{aboutHeroSection}',        [AboutHeroSectionController::class, 'update'])->name('hero.update');
            Route::patch('/hero/{aboutHeroSection}/status', [AboutHeroSectionController::class, 'toggleStatus'])->name('hero.toggleStatus');
            Route::delete('/hero/{aboutHeroSection}',      [AboutHeroSectionController::class, 'destroy'])->name('hero.destroy');
            Route::post('/hero/{id}/restore',              [AboutHeroSectionController::class, 'restore'])->name('hero.restore');
            // Mission & Vision Section — full CRUD

            // What We Do (Mission & Vision)
            Route::get('/whatwe', [AboutWhatWeController::class, 'edit'])->name('whatwe');
            Route::post('/whatwe', [AboutWhatWeController::class, 'store'])->name('whatwe.store');
            Route::post('/whatwe/{section}', [AboutWhatWeController::class, 'update'])->name('whatwe.update');
            Route::patch('/whatwe/{section}/status', [AboutWhatWeController::class, 'toggleStatus'])->name('whatwe.toggleStatus');
            Route::delete('/whatwe/{section}', [AboutWhatWeController::class, 'destroy'])->name('whatwe.destroy');
            Route::post('/whatwe/{id}/restore', [AboutWhatWeController::class, 'restore'])->name('whatwe.restore');
            // Core Value Section — full CRUD
            Route::get('/core-value',                                    [AboutCoreValueSectionController::class, 'index'])->name('corevalue');
            Route::post('/core-value',                                   [AboutCoreValueSectionController::class, 'store'])->name('corevalue.store');
            Route::put('/core-value/{coreValueSection}',                 [AboutCoreValueSectionController::class, 'update'])->name('corevalue.update');
            Route::patch('/core-value/{coreValueSection}/status',        [AboutCoreValueSectionController::class, 'toggleStatus'])->name('corevalue.toggleStatus');
            Route::delete('/core-value/{coreValueSection}',              [AboutCoreValueSectionController::class, 'destroy'])->name('corevalue.destroy');
            Route::post('/core-value/{id}/restore',                      [AboutCoreValueSectionController::class, 'restore'])->name('corevalue.restore');

            Route::prefix('join-now')->name('joinnow.')->group(function () {
                Route::get('/',                                   [AboutJoinNowSectionController::class, 'index'])->name('index');
                Route::post('/',                                  [AboutJoinNowSectionController::class, 'store'])->name('store');
                Route::put('/{joinNowSection}',                   [AboutJoinNowSectionController::class, 'update'])->name('update');
                Route::patch('/{joinNowSection}/status',          [AboutJoinNowSectionController::class, 'toggleStatus'])->name('toggleStatus');
                Route::delete('/{joinNowSection}',                [AboutJoinNowSectionController::class, 'destroy'])->name('destroy');
                Route::post('/{id}/restore',                      [AboutJoinNowSectionController::class, 'restore'])->name('restore');
            });
        });




        // Case Studies page sections
        // Case Studies page sections
        Route::prefix('case-study')->name('casestudy.')->group(function () {

            // Hero Section — full CRUD
            Route::get('/hero',                        [CaseStudyHeroSectionController::class, 'index'])->name('hero');
            Route::post('/hero',                       [CaseStudyHeroSectionController::class, 'store'])->name('hero.store');
            Route::put('/hero/{heroSection}',          [CaseStudyHeroSectionController::class, 'update'])->name('hero.update');
            Route::patch('/hero/{heroSection}/status', [CaseStudyHeroSectionController::class, 'toggleStatus'])->name('hero.toggleStatus');
            Route::delete('/hero/{heroSection}',       [CaseStudyHeroSectionController::class, 'destroy'])->name('hero.destroy');
            Route::post('/hero/{id}/restore',          [CaseStudyHeroSectionController::class, 'restore'])->name('hero.restore');

            // Projects — full CRUD
            Route::get('/projects',                          [CaseStudyProjectController::class, 'index'])->name('projects');
            Route::post('/projects',                         [CaseStudyProjectController::class, 'store'])->name('projects.store');
            Route::put('/projects/{project}',                [CaseStudyProjectController::class, 'update'])->name('projects.update');
            Route::patch('/projects/{project}/status',       [CaseStudyProjectController::class, 'toggleStatus'])->name('projects.toggleStatus');
            Route::delete('/projects/{project}',             [CaseStudyProjectController::class, 'destroy'])->name('projects.destroy');
            Route::post('/projects/{id}/restore',            [CaseStudyProjectController::class, 'restore'])->name('projects.restore');
            Route::post('/projects/sort',                    [CaseStudyProjectController::class, 'sort'])->name('projects.sort');

            // CTA (stub — unchanged)
            Route::get('/cta', fn() => view('pages.admin.sections.casestudy.cta'))->name('cta');
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
