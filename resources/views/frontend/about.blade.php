@extends('layouts.frontendmain')

@section('title', 'About Us')

@section('content')

<!-- HERO SECTION -->
<section class="hero-bg min-h-[70vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-white">
        <h1 class="font-poppins font-bold text-5xl lg:text-6xl mb-6" data-aos="fade-up">
            About <span class="text-red-400">Laboratory</span>
        </h1>
        <p class="text-xl lg:text-2xl max-w-3xl text-gray-200" data-aos="fade-up" data-aos-delay="200">
            Trusted diagnostic excellence with advanced technology and expert medical care
        </p>
    </div>
</section>

<!-- ABOUT CONTENT -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- TEXT -->
            <div data-aos="fade-right">
                <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-6">
                    Who We Are
                </h2>
                <p class="text-lg text-slate-600 mb-6 leading-relaxed">
                    Laboratory & Diagnostic Center is a leading diagnostic facility in Multan,
                    providing comprehensive laboratory testing services with special expertise
                    in FNAC and cancer diagnostics.
                </p>
                <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                    Under the supervision of <strong>Dr. Sadia Majeed</strong>, Cancer & FNAC Specialist,
                    our lab ensures accurate, timely, and reliable test results using modern equipment
                    and internationally accepted protocols.
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="glass p-6 rounded-2xl shadow-soft">
                        <h4 class="font-bold text-3xl text-red-600 mb-1">15+</h4>
                        <p class="text-slate-600">Years Experience</p>
                    </div>
                    <div class="glass p-6 rounded-2xl shadow-soft">
                        <h4 class="font-bold text-3xl text-blue-600 mb-1">15k+</h4>
                        <p class="text-slate-600">Tests Performed</p>
                    </div>
                </div>
            </div>

            <!-- IMAGE -->
            <div data-aos="fade-left">
                <img src="{{ asset('assets/img/hero-lab.png') }}"
                     alt="Laboratory"
                     class="rounded-2xl shadow-custom">
            </div>
        </div>
    </div>
</section>

<!-- MISSION & VISION -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">

            <!-- MISSION -->
            <div class="service-card bg-white rounded-2xl p-8 shadow-soft" data-aos="fade-up">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-white text-2xl"></i>
                </div>
                <h3 class="font-poppins font-bold text-2xl mb-4 text-slate-800">Our Mission</h3>
                <p class="text-slate-600 leading-relaxed">
                    To provide accurate, affordable, and timely diagnostic services using advanced
                    technology while maintaining the highest standards of medical ethics and patient care.
                </p>
            </div>

            <!-- VISION -->
            <div class="service-card bg-white rounded-2xl p-8 shadow-soft" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="font-poppins font-bold text-2xl mb-4 text-slate-800">Our Vision</h3>
                <p class="text-slate-600 leading-relaxed">
                    To become the most trusted diagnostic center in South Punjab by delivering
                    excellence in diagnostic medicine and patient-focused healthcare solutions.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-6">
                Why Choose Laboratory?
            </h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Excellence in diagnostics with patient-first approach
            </p>
        </div>

        <div class="grid lg:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-microscope text-blue-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-lg text-slate-800 mb-2">Advanced Equipment</h4>
                <p class="text-slate-600 text-sm">Modern diagnostic technology</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-md text-green-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-lg text-slate-800 mb-2">Expert Specialists</h4>
                <p class="text-slate-600 text-sm">Qualified & experienced doctors</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-lg text-slate-800 mb-2">Quick Reporting</h4>
                <p class="text-slate-600 text-sm">Same-day test results</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-red-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-lg text-slate-800 mb-2">Patient Care</h4>
                <p class="text-slate-600 text-sm">Compassionate healthcare</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 gradient-accent text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-poppins font-bold text-4xl lg:text-5xl text-white mb-6" data-aos="fade-up">
            Your Health Is Our Priority
        </h2>
        <p class="text-xl text-gray-200 mb-10 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Visit Laboratory & Diagnostic Center or book your tests online today
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('contact') }}"
               class="bg-white text-slate-800 px-8 py-4 rounded-full font-semibold text-lg hover:scale-105 transition-transform shadow-lg">
                <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                Visit Us
            </a>

            <a href="{{ route('home') }}"
               class="bg-slate-800 text-white px-8 py-4 rounded-full font-semibold text-lg hover:scale-105 transition-transform shadow-lg border-2 border-white/20">
                <i class="fas fa-home mr-2"></i>
                Back to Home
            </a>
        </div>
    </div>
</section>

@endsection
