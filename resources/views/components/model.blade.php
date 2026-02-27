{{--
    Consultation Modal Component
    Triggered by: #open-consultation-modal (any element with this ID or class)
    Usage: Include once in your layout, e.g. in app.blade.php before </body>
    
    <x-consultation-modal />
--}}

{{-- Backdrop --}}
<div id="consultation-modal-backdrop"
    class="fixed inset-0 z-[999] bg-black/70 backdrop-blur-sm
           opacity-0 pointer-events-none
           transition-opacity duration-300 ease-in-out"
    aria-hidden="true">
</div>

{{-- Modal --}}
<div id="consultation-modal" role="dialog" aria-modal="true" aria-labelledby="consultation-modal-title"
    class="fixed inset-0 z-[1000] flex items-center justify-center p-4
           pointer-events-none">
    <div id="consultation-modal-panel"
        class="relative w-full max-w-[780px]
               bg-[#0d0d0d] border border-white/10 rounded-2xl
               shadow-[0_32px_80px_rgba(0,0,0,0.8)]
               opacity-0 translate-y-6 scale-[0.97]
               transition-all duration-300 ease-out
               pointer-events-none">

        {{-- Top decorative gradient line --}}
        <div
            class="absolute top-0 left-8 right-8 h-px
                    bg-gradient-to-r from-transparent via-[#FC3F37]/60 to-transparent
                    rounded-full">
        </div>

        {{-- Header --}}
        <div class="flex items-start justify-between px-8 pt-8 pb-6
                    border-b border-white/[0.07]">
            <div>
                <h2 id="consultation-modal-title" class="mb-1 font-semibold leading-tight text-white"
                    style="font-family: 'Gilroy-SemiBold', sans-serif; font-size: clamp(22px, 3vw, 30px); letter-spacing: -0.6px;">
                    Unlock Success with Us
                </h2>
                <p class="text-[#9A9A9A] text-sm leading-relaxed" style="font-family: 'Gilroy-Regular', sans-serif;">
                    Fill the form below and our team will get back to you at our earliest.
                </p>
            </div>

            {{-- Close button --}}
            <button id="consultation-modal-close" type="button" aria-label="Close modal"
                class="flex-shrink-0 ml-6 w-9 h-9 rounded-lg
                       flex items-center justify-center
                       bg-white/[0.06] hover:bg-white/[0.12]
                       text-[#A0A0A0] hover:text-white
                       border border-white/[0.08] hover:border-white/20
                       transition-all duration-200 cursor-pointer">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round">
                    <line x1="1" y1="1" x2="13" y2="13" />
                    <line x1="13" y1="1" x2="1" y2="13" />
                </svg>
            </button>
        </div>

        {{-- Body --}}
        <div class="px-8 py-7">
            <form id="consultation-form" novalidate>

                {{-- Row: Name + Email --}}
                <div class="grid grid-cols-1 gap-5 mb-5 md:grid-cols-2">

                    {{-- Name --}}
                    <div class="flex flex-col gap-2">
                        <label for="modal-name" class="text-[#E5E5E5] text-sm font-medium"
                            style="font-family: 'Gilroy-Medium', sans-serif;">
                            Your Name
                        </label>
                        <input type="text" id="modal-name" name="name" placeholder="John Doe" autocomplete="name"
                            class="w-full h-[50px] px-4
                                   bg-[rgba(176,176,176,0.07)] border border-[#353535]
                                   rounded-[8px] text-[#E5E5E5] text-[15px]
                                   placeholder:text-[#555]
                                   focus:outline-none focus:border-[#FC3F37]/70
                                   focus:bg-[rgba(252,63,55,0.04)]
                                   transition-all duration-200"
                            style="font-family: 'Gilroy-Regular', sans-serif;" />
                        <span class="modal-error hidden text-[#FC3F37] text-xs mt-0.5"
                            style="font-family: 'Gilroy-Regular', sans-serif;">
                            Please enter your name.
                        </span>
                    </div>

                    {{-- Email --}}
                    <div class="flex flex-col gap-2">
                        <label for="modal-email" class="text-[#E5E5E5] text-sm font-medium"
                            style="font-family: 'Gilroy-Medium', sans-serif;">
                            Email
                        </label>
                        <input type="email" id="modal-email" name="email" placeholder="you@company.com"
                            autocomplete="email"
                            class="w-full h-[50px] px-4
                                   bg-[rgba(176,176,176,0.07)] border border-[#353535]
                                   rounded-[8px] text-[#E5E5E5] text-[15px]
                                   placeholder:text-[#555]
                                   focus:outline-none focus:border-[#FC3F37]/70
                                   focus:bg-[rgba(252,63,55,0.04)]
                                   transition-all duration-200"
                            style="font-family: 'Gilroy-Regular', sans-serif;" />
                        <span class="modal-error hidden text-[#FC3F37] text-xs mt-0.5"
                            style="font-family: 'Gilroy-Regular', sans-serif;">
                            Please enter a valid email.
                        </span>
                    </div>
                </div>

                {{-- Message --}}
                <div class="flex flex-col gap-2 mb-7">
                    <label for="modal-message" class="text-[#E5E5E5] text-sm font-medium"
                        style="font-family: 'Gilroy-Medium', sans-serif;">
                        Brief Message
                    </label>
                    <textarea id="modal-message" name="message" rows="4" placeholder="Tell us about your project…"
                        class="w-full px-4 py-3
                               bg-[rgba(176,176,176,0.07)] border border-[#353535]
                               rounded-[8px] text-[#E5E5E5] text-[15px]
                               placeholder:text-[#555]
                               resize-none
                               focus:outline-none focus:border-[#FC3F37]/70
                               focus:bg-[rgba(252,63,55,0.04)]
                               transition-all duration-200"
                        style="font-family: 'Gilroy-Regular', sans-serif;"></textarea>
                    <span class="modal-error hidden text-[#FC3F37] text-xs mt-0.5"
                        style="font-family: 'Gilroy-Regular', sans-serif;">
                        Please enter a message.
                    </span>
                </div>

                {{-- Footer: Submit --}}
                <div class="flex items-center justify-end gap-4">

                    {{-- Success message (hidden by default) --}}
                    <p id="modal-success-msg" class="hidden text-sm text-green-400  items-center gap-1.5"
                        style="font-family: 'Gilroy-Medium', sans-serif;">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" class="flex-shrink-0">
                            <circle cx="7.5" cy="7.5" r="7" stroke="currentColor" stroke-width="1.4" />
                            <path d="M4.5 7.5l2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        We'll be in touch soon!
                    </p>

                    {{-- Submit Button (reusable btn-theme style, pure Tailwind) --}}
                    <button type="submit" id="modal-submit-btn"
                        class="group relative inline-flex items-center
                               h-[44px] min-w-[200px]
                               pl-5 pr-[52px]
                               rounded-[5px]
                               text-white text-[14px] font-medium capitalize
                               whitespace-nowrap cursor-pointer
                               transition-all duration-300 ease-in-out
                               focus:outline-none focus:ring-2 focus:ring-[#FC3F37]/50"
                        style="background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%);
                               font-family: 'Gilroy-Medium', sans-serif; line-height: 44px;"
                        onmouseover="this.style.background='rgba(181,30,23,1)'"
                        onmouseout="this.style.background='linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%)'">
                        <span id="modal-btn-label">Get Free Consultation</span>

                        {{-- Icon wrapper --}}
                        <span
                            class="absolute right-2 top-1/2 -translate-y-1/2
                                     flex items-center justify-center w-[30px] h-[30px]">
                            {{-- Diamond bg --}}
                            <span
                                class="absolute inset-0 bg-white/20 rounded-[4px]
                                         transition-all duration-300 ease-in-out
                                         group-hover:rotate-45 group-hover:bg-white/10"></span>
                            {{-- Arrow --}}
                            <svg id="modal-btn-icon"
                                class="relative z-10 transition-all duration-300 ease-in-out -rotate-45 group-hover:rotate-0"
                                width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                            {{-- Spinner (hidden by default) --}}
                            <svg id="modal-btn-spinner" class="relative z-10 hidden animate-spin" width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="white"
                                stroke-width="2.5">
                                <circle cx="12" cy="12" r="10" stroke-opacity="0.25" />
                                <path d="M12 2 a10 10 0 0 1 10 10" stroke-opacity="1" />
                            </svg>
                        </span>
                    </button>
                </div>

            </form>
        </div>

        {{-- Bottom decorative gradient --}}
        <div
            class="absolute bottom-0 left-0 right-0 h-[1px]
                    bg-gradient-to-r from-transparent via-white/[0.05] to-transparent
                    rounded-b-2xl">
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var backdrop = document.getElementById('consultation-modal-backdrop');
        var modal = document.getElementById('consultation-modal');
        var panel = document.getElementById('consultation-modal-panel');
        var closeBtn = document.getElementById('consultation-modal-close');
        var form = document.getElementById('consultation-form');
        var submitBtn = document.getElementById('modal-submit-btn');
        var btnLabel = document.getElementById('modal-btn-label');
        var btnIcon = document.getElementById('modal-btn-icon');
        var btnSpinner = document.getElementById('modal-btn-spinner');
        var successMsg = document.getElementById('modal-success-msg');

        function openModal() {
            backdrop.classList.remove('opacity-0', 'pointer-events-none');
            backdrop.classList.add('opacity-100');
            modal.classList.remove('pointer-events-none');
            panel.classList.remove('opacity-0', 'translate-y-6', 'scale-[0.97]', 'pointer-events-none');
            panel.classList.add('opacity-100', 'translate-y-0', 'scale-100', 'pointer-events-auto');
            document.body.style.overflow = 'hidden';
            setTimeout(function() {
                var el = document.getElementById('modal-name');
                if (el) el.focus();
            }, 320);
        }

        function closeModal() {
            panel.classList.remove('opacity-100', 'translate-y-0', 'scale-100', 'pointer-events-auto');
            panel.classList.add('opacity-0', 'translate-y-6', 'scale-[0.97]', 'pointer-events-none');
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(function() {
                modal.classList.add('pointer-events-none');
                document.body.style.overflow = '';
            }, 310);
        }

        /* Delegated trigger — catches nav button, hero CTA, any future trigger */
        document.addEventListener('click', function(e) {
            if (e.target.closest('[data-open-consultation]')) {
                e.preventDefault();
                openModal();
            }
        });

        closeBtn.addEventListener('click', closeModal);
        backdrop.addEventListener('click', function(e) {
            if (e.target === backdrop) closeModal();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });

        /* Hover on submit button */
        submitBtn.addEventListener('mouseover', function() {
            this.style.background = 'rgba(181,30,23,1)';
        });
        submitBtn.addEventListener('mouseout', function() {
            this.style.background =
                'linear-gradient(90deg,rgba(181,30,23,1) 0%,rgba(252,63,55,1) 100%)';
        });

        /* Validation */
        function isEmail(v) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
        }

        function validateField(input, errorEl, check) {
            var ok = check(input.value.trim());
            input.style.borderColor = ok ? '' : 'rgba(252,63,55,0.7)';
            errorEl.classList[ok ? 'add' : 'remove']('hidden');
            return ok;
        }

        var nameInput = document.getElementById('modal-name');
        var emailInput = document.getElementById('modal-email');
        var msgInput = document.getElementById('modal-message');
        var errors = form.querySelectorAll('.modal-error');

        [nameInput, emailInput, msgInput].forEach(function(el) {
            el.addEventListener('input', function() {
                this.style.borderColor = '';
            });
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var ok1 = validateField(nameInput, errors[0], function(v) {
                return v.length >= 2;
            });
            var ok2 = validateField(emailInput, errors[1], isEmail);
            var ok3 = validateField(msgInput, errors[2], function(v) {
                return v.length >= 5;
            });

            if (!ok1 || !ok2 || !ok3) return;

            submitBtn.disabled = true;
            btnLabel.textContent = 'Sending…';
            btnIcon.classList.add('hidden');
            btnSpinner.classList.remove('hidden');

            /*
             * Replace setTimeout with your real fetch, e.g.:
             *
             * fetch('/contact', {
             *     method: 'POST',
             *     headers: {
             *         'Content-Type': 'application/json',
             *         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
             *     },
             *     body: JSON.stringify({
             *         name: nameInput.value.trim(),
             *         email: emailInput.value.trim(),
             *         message: msgInput.value.trim()
             *     })
             * }).then(() => showSuccess()).catch(() => resetBtn());
             */
            setTimeout(showSuccess, 1600);
        });

        function showSuccess() {
            submitBtn.disabled = false;
            btnLabel.textContent = 'Get Free Consultation';
            btnIcon.classList.remove('hidden');
            btnSpinner.classList.add('hidden');
            successMsg.style.display = 'flex';
            successMsg.classList.remove('hidden');
            form.reset();
            setTimeout(function() {
                successMsg.style.display = '';
                successMsg.classList.add('hidden');
                closeModal();
            }, 2500);
        }

    });
</script>
