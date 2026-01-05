@extends('layouts.frontendmain')

@section('title', 'Our Diagnostic Services')

@section('content')

<!-- HERO -->
<section class="hero-bg min-h-[60vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-white">
        <h1 class="font-poppins font-bold text-5xl lg:text-6xl mb-6" data-aos="fade-up">
            Diagnostic <span class="text-red-400">Services</span>
        </h1>
        <p class="text-xl lg:text-2xl max-w-3xl text-gray-200" data-aos="fade-up" data-aos-delay="200">
            Complete range of advanced & routine diagnostic tests
        </p>
    </div>
</section>

<!-- SERVICES LIST -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-4">
                Available Tests & Pricing
            </h2>
            <p class="text-xl text-slate-600">
                Accurate diagnostics with transparent pricing
            </p>
        </div>

        <!-- GRID (2 COLUMNS) -->
        <div class="grid md:grid-cols-2 gap-10">

            @forelse($tests as $test)

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

<!-- CTA -->
<section class="py-20 gradient-accent text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-poppins font-bold text-4xl lg:text-5xl text-white mb-6" data-aos="fade-up">
            Need Help Choosing a Test?
        </h2>
        <p class="text-xl text-gray-200 mb-10 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Call or WhatsApp our diagnostic team for guidance
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
            <a href="tel:+923001234567"
                class="bg-white text-slate-800 px-8 py-4 rounded-full font-semibold text-lg shadow-lg hover:scale-105 transition">
                <i class="fas fa-phone mr-2 text-green-600"></i>
                Call Now
            </a>

            <a href="https://wa.me/923001234567"
                class="bg-slate-800 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-lg hover:scale-105 transition border-2 border-white/20">
                <i class="fab fa-whatsapp mr-2"></i>
                WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection