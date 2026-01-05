@extends('layouts.frontendmain')

@section('title', 'Home')

@section('content')
<section class="hero-bg min-h-screen flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <h1 class="hero-title font-poppins font-bold text-5xl lg:text-6xl mb-6 leading-tight" data-aos="fade-up">
                    Laboratory  & <span class="text-red-400">Diagnostic</span> Center
                </h1>
                <p class="hero-subtitle text-xl lg:text-2xl mb-6 text-gray-200" data-aos="fade-up" data-aos-delay="200">
                    Advanced Diagnostic Care with <span class="font-semibold text-yellow-400">FNAC Expertise</span>
                </p>
                <p class="text-lg mb-8 text-gray-300 leading-relaxed" data-aos="fade-up" data-aos-delay="400">
                    Expert diagnostic services in Multan with specialized FNAC, Bone Marrow Testing, and comprehensive general diagnostics under the supervision of Dr. Sadia Majeed, Cancer & FNAC Specialist.
                </p>

                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="600">
                    <a href="{{ route('contact') }}" class="btn-primary-custom text-white px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center pulse-glow">
                        <i class="fas fa-calendar-plus mr-3"></i>
                        Contact For Booking                    </a>
                    <a href="{{ route('services') }}" class="btn-secondary-custom text-white px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center">
                        <i class="fas fa-list mr-3"></i>
                        View All Tests
                    </a>
                </div>
            </div>

            <div class="hidden lg:block" data-aos="fade-left" data-aos-delay="800">
                <div class="relative">
                    <img src="{{ asset('assets/img/diagnostic-equipment.png') }}" alt="Diagnostic Equipment" class="w-full max-w-md mx-auto animate-float">
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-microscope text-2xl text-slate-800"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-poppins font-bold text-4xl lg:text-5xl text-slate-800 mb-6">
                Our Specialized Services
            </h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Comprehensive diagnostic solutions with expert care
            </p>
        </div>

       <div class="grid md:grid-cols-2 gap-10">

            @forelse($homeTests as $test)

            <div
                class="service-card group bg-white/90 backdrop-blur rounded-3xl p-8 shadow-soft hover:shadow-custom transition-all duration-300 border border-slate-100"
                data-aos="fade-up">

                <!-- Header -->
                <div class="flex items-start gap-6 mb-5">

                    <!-- TITLE (flex-grow) -->
                    <h3 class="font-poppins font-bold text-2xl text-slate-800 flex-1 leading-snug">
                        {{ $test->name }}
                    </h3>

                    <!-- PRICE / BADGE (no wrap) -->
                    <div class="shrink-0 text-right">
                        @if($test->is_coming_soon)
                        <span
                            class="inline-block bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                            COMING SOON
                        </span>
                        @else
                        <span
                            class="block text-red-600 font-extrabold text-2xl whitespace-nowrap">
                            Rs. {{ number_format($test->price) }}
                        </span>
                        @endif
                    </div>

                </div>


                <!-- Description -->
                <p class="text-slate-600 mb-6 leading-relaxed text-[15px]">
                    {{ $test->short_description }}
                </p>

                <!-- Details -->
                <div class="grid grid-cols-2 gap-4 mb-8 text-sm text-slate-700">
                    @if($test->sample_type)
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-vial text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Sample</p>
                            <p class="font-semibold">{{ $test->sample_type }}</p>
                        </div>
                    </div>
                    @endif

                    @if($test->report_time)
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl bg-green-100 flex items-center justify-center">
                            <i class="fas fa-clock text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500">Report Time</p>
                            <p class="font-semibold">{{ $test->report_time }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Action -->
                <div class="pt-4 border-t border-slate-100 flex justify-between items-center">

                    @if(!$test->is_coming_soon)
                    <a href="{{ route('contact') }}"
                        class="btn-primary-custom px-6 py-3 rounded-full font-semibold text-white inline-flex items-center gap-2 hover:scale-105 transition">
                        <i class="fas fa-calendar-plus"></i>
                        Contact For Booking
                    </a>
                    @else
                    <span
                        class="px-6 py-3 rounded-full bg-slate-200 text-slate-500 font-semibold cursor-not-allowed">
                        Contact Soon
                    </span>
                    @endif

                    <span class="text-xs text-slate-400">
                        Advanced Diagnostic Care
                    </span>
                </div>

            </div>

            @empty
            <p class="col-span-2 text-center text-slate-600">
                No diagnostic services available at the moment.
            </p>
            @endforelse

        </div>


    </div>
</section>


<!-- Statistics Section -->
<section class="py-20 gradient-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center text-white" data-aos="fade-up" data-aos-delay="200">
                <div class=" text-5xl font-bold mb-2">15,000+</div>
                <h4 class="font-semibold text-lg mb-2">Tests Performed</h4>
                <p class="text-gray-200 text-sm">Accurate diagnostic results</p>
            </div>

            <div class="text-center text-white" data-aos="fade-up" data-aos-delay="400">
                <div class=" text-5xl font-bold mb-2">5,000+</div>
                <h4 class="font-semibold text-lg mb-2">Happy Patients</h4>
                <p class="text-gray-200 text-sm">Satisfied with our services</p>
            </div>

            <div class="text-center text-white" data-aos="fade-up" data-aos-delay="600">
                <div class=" text-5xl font-bold mb-2">15+</div>
                <h4 class="font-semibold text-lg mb-2">Years Experience</h4>
                <p class="text-gray-200 text-sm">In diagnostic excellence</p>
            </div>

            <div class="text-center text-white" data-aos="fade-up" data-aos-delay="800">
                <div class=" text-5xl font-bold mb-2">24/7</div>
                <h4 class="font-semibold text-lg mb-2">Emergency Service</h4>
                <p class="text-gray-200 text-sm">Always available for you</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-6">About Laboratory & Diagnostic Center</h2>
                <p class="text-xl text-slate-600 mb-8 leading-relaxed">Leading diagnostic center in Multan providing comprehensive medical testing services with specialized expertise in FNAC and cancer screening.</p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-microscope text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800 mb-1">Advanced Equipment</h4>
                            <p class="text-slate-600 text-sm">State-of-the-art technology</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-md text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800 mb-1">Expert Team</h4>
                            <p class="text-slate-600 text-sm">Qualified specialists</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800 mb-1">Quick Results</h4>
                            <p class="text-slate-600 text-sm">Same-day reporting</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-home text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800 mb-1">Home Collection</h4>
                            <p class="text-slate-600 text-sm">Convenient service</p>
                        </div>
                    </div>
                </div>

                <a href="contact.html" class="btn-primary-custom text-white px-8 py-4 rounded-full font-semibold inline-flex items-center">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Visit Our Lab
                </a>
            </div>

            <div data-aos="fade-left">
                <div class="relative">
                    <img src="{{ asset('assets/img/diagnostic-equipment.png') }}" alt="Diagnostic Equipment" class="w-full max-w-lg mx-auto rounded-2xl shadow-custom">
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-custom">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-red-600 mb-1">15+</div>
                            <div class="text-sm text-slate-600">Years Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Doctors Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Content -->
            <div class="order-2 lg:order-1" data-aos="fade-right">
                <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-4">
                    Meet Our Expert Doctors
                </h2>
                <h3 class="text-2xl font-semibold text-blue-600 mb-6">
                    Experienced Specialists You Can Trust
                </h3>

                <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                    Our Laboratory & Diagnostic Center is supported by a team of highly qualified and experienced doctors. 
                    With years of expertise in diagnostic medicine, pathology, and cancer screening, our specialists are 
                    committed to providing accurate, reliable, and compassionate healthcare services.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-center text-slate-700">
                        <i class="fas fa-check-circle text-green-500 mr-4"></i>
                        <span class="text-lg">Highly Experienced Diagnostic Specialists</span>
                    </div>

                    <div class="flex items-center text-slate-700">
                        <i class="fas fa-check-circle text-green-500 mr-4"></i>
                        <span class="text-lg">Advanced FNAC & Pathology Services</span>
                    </div>

                    <div class="flex items-center text-slate-700">
                        <i class="fas fa-check-circle text-green-500 mr-4"></i>
                        <span class="text-lg">Cancer Screening & Early Diagnosis</span>
                    </div>

                    <div class="flex items-center text-slate-700">
                        <i class="fas fa-check-circle text-green-500 mr-4"></i>
                        <span class="text-lg">Commitment to Accuracy & Patient Care</span>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="order-1 lg:order-2" data-aos="fade-left">
                <div class="relative">
                    <img 
                        src="https://college.mayo.edu/media/mccms/content-assets/academics/health-sciences-training/medical-laboratory-science-florida-and-minnesota/mccms-medical-lab-science-program-3396025-0015-hero-mobile.jpg"
                        alt="Our Expert Doctors"
                        class="w-full max-w-md mx-auto rounded-2xl shadow-custom"
                    >

                    <div class="absolute -top-4 -left-4 w-20 h-20 bg-green-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-md text-2xl text-white"></i>
                    </div>

                    <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-award text-xl text-white"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-poppins font-bold text-4xl lg:text-5xl text-white mb-6" data-aos="fade-up">
            Ready to Get Your Tests Done?
        </h2>
        <p class="text-xl text-gray-200 mb-12 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Book your appointment online or visit our diagnostic center on Nishtar Road, Multan
        </p>

        <div class="grid sm:grid-cols-2 gap-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('contact') }}" class="bg-white text-slate-800 px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center hover:scale-105 transition-transform shadow-lg">
                <i class="fas fa-calendar-plus mr-3 text-red-600"></i>
                Contact For Booking
            </a>
            <a href="tel:+923001234567" class="bg-slate-800 text-white px-8 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center hover:scale-105 transition-transform shadow-lg border-2 border-white/20">
                <i class="fas fa-phone mr-3"></i>
                Call Now
            </a>
        </div>
    </div>
</section>
@endsection