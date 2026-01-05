@extends('layouts.frontendmain')

@section('title', 'Contact Us')

@section('content')

<!-- HERO SECTION -->
<section class="hero-bg min-h-[60vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-white">
        <h1 class="font-poppins font-bold text-5xl lg:text-6xl mb-6" data-aos="fade-up">
            Contact <span class="text-red-400">Us</span>
        </h1>
        <p class="text-xl lg:text-2xl max-w-3xl text-gray-200" data-aos="fade-up" data-aos-delay="200">
            We are here to help you with all your diagnostic needs
        </p>
    </div>
</section>

<!-- CONTACT INFO + FORM -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">

            <!-- CONTACT INFORMATION -->
            <div data-aos="fade-right">
                <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-6">
                    Get in Touch
                </h2>
                <p class="text-lg text-slate-600 mb-10 leading-relaxed">
                    Visit {{ $siteSettings->site_name }} or contact us through phone, WhatsApp, or email.
                    Our team is always ready to assist you.
                </p>

                <div class="space-y-6">
                    <!-- Address -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg text-slate-800 mb-1">Our Location</h4>
                            <p class="text-slate-600">
                                {{ $siteSettings->address }}
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-phone text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg text-slate-800 mb-1">Call Us</h4>
                            <p class="text-slate-600">
                                <a href="tel:+{{ $siteSettings->primary_phone }}" class="hover:text-green-600">
                                    {{ $siteSettings->primary_phone }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg text-slate-800 mb-1">WhatsApp</h4>
                            <p class="text-slate-600">
                                <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" target="_blank" class="hover:text-green-600">
                                    Chat on WhatsApp
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-lg text-slate-800 mb-1">Email Us</h4>
                            <p class="text-slate-600">
                                <a href="mailto:{{ $siteSettings->primary_email }}" class="hover:text-blue-600">
                                    {{ $siteSettings->primary_email }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div data-aos="fade-left">
                <div class="service-card bg-white rounded-2xl p-8 shadow-soft">

                    <h3 class="font-poppins font-bold text-2xl text-slate-800 mb-6">
                        Send Us a Message
                    </h3>

                    {{-- SUCCESS ALERT --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fa fa-check-circle mr-2"></i>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                    @endif

                    <div id="formResponse"></div>
                    <!-- LOADER -->
                    <div id="formLoader" class="text-center my-4" style="display:none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <p class="mt-3 text-slate-600">Sending your message...</p>
                    </div>


                    <form action="{{ route('contact.store') }}"
                        method="POST"
                        id="contactForm"
                        class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                name="name"
                                id="name"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                                placeholder="Enter your name">
                        </div>

                        <!-- Phone + Email -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-slate-700 font-medium mb-2">
                                    Phone <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="phone"
                                    id="phone"
                                    required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                                    placeholder="XXXXXXXXXXX">
                                <small class="text-slate-500">
                                    Number format: 03XXXXXXXXX
                                </small>
                            </div>

                            <div>
                                <label class="block text-slate-700 font-medium mb-2">
                                    Email
                                </label>
                                <input type="email"
                                    name="email"
                                    id="email"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                                    placeholder="Enter your email">
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">
                                Message
                            </label>
                            <textarea name="message"
                                id="message"
                                rows="5"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                                placeholder="Write your message"></textarea>
                        </div>

                        <button type="submit"
                            class="btn-primary-custom w-full text-white px-8 py-4 rounded-full font-semibold text-lg">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- MAP SECTION -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-4">
                Find Us on Map
            </h2>
            <p class="text-xl text-slate-600">
                Visit our diagnostic center in Multan
            </p>
        </div>

        <div class="rounded-2xl overflow-hidden shadow-custom" data-aos="fade-up" data-aos-delay="200">
            <iframe
                src="https://www.google.com/maps?q=Fenway Park, 4 Jersey St, MA, Boston 2215&output=embed"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value.trim();

        const pkPhoneRegex = /^03[0-9]{9}$/;
        const responseBox = document.getElementById('formResponse');
        const loader = document.getElementById('formLoader');

        responseBox.innerHTML = '';

        // ❌ Validation
        if (name === '' || !pkPhoneRegex.test(phone)) {
            responseBox.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show mb-4">
                <i class="fa fa-exclamation-circle mr-2"></i>
                Please enter a valid name and Pakistani phone number (03XXXXXXXXX).
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        `;
            return;
        }

        // 🔄 UI EFFECTS
        form.style.opacity = '0.4';
        form.style.pointerEvents = 'none';
        loader.style.display = 'block';

        // 🔄 AJAX submit
        fetch("{{ route('contact.store') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {

                // ✅ Hide form
                form.style.display = 'none';
                loader.style.display = 'none';

                // ✅ Success message
                responseBox.innerHTML = `
            <div class="alert alert-success fade show">
                <i class="fa fa-check-circle mr-2"></i>
                ${data.message}
            </div>
        `;
            })
            .catch(() => {

                // ❌ Restore form
                form.style.opacity = '1';
                form.style.pointerEvents = 'auto';
                loader.style.display = 'none';

                responseBox.innerHTML = `
            <div class="alert alert-danger">
                Something went wrong. Please try again later.
            </div>
        `;
            });
    });
</script>
@endpush