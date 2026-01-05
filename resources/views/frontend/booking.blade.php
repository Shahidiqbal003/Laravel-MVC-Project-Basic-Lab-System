@extends('layouts.frontendmain')

@section('title', 'Book a Test')

@section('content')

<!-- HERO -->
<section class="hero-bg min-h-[60vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-white">
        <h1 class="font-poppins font-bold text-5xl lg:text-6xl mb-6" data-aos="fade-up">
            Book a <span class="text-red-400">Diagnostic Test</span>
        </h1>
        <p class="text-xl lg:text-2xl max-w-3xl text-gray-200" data-aos="fade-up" data-aos-delay="200">
            Easy & quick online booking for all diagnostic services
        </p>
    </div>
</section>

<!-- BOOKING FORM -->
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="service-card bg-white rounded-2xl p-10 shadow-soft" data-aos="fade-up">
            <h2 class="font-poppins font-bold text-3xl text-slate-800 mb-8 text-center">
                Test Booking Form
            </h2>

            <form action="#" method="POST" class="grid md:grid-cols-2 gap-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block font-medium text-slate-700 mb-2">Patient Name</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                        placeholder="Enter full name">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block font-medium text-slate-700 mb-2">Phone Number</label>
                    <input type="text" name="phone" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                        placeholder="+92 3xx xxxxxxx">
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-medium text-slate-700 mb-2">Email Address</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                        placeholder="example@email.com">
                </div>

                <!-- Test Type -->
                <div>
                    <label class="block font-medium text-slate-700 mb-2">Select Test</label>
                    <select name="test" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500">
                        <option value="">-- Select Test --</option>
                        <option value="FNAC">FNAC</option>
                        <option value="Bone Marrow">Bone Marrow Test</option>
                        <option value="Blood Test">Blood Test</option>
                        <option value="Urine Test">Urine Test</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Date -->
                <div>
                    <label class="block font-medium text-slate-700 mb-2">Preferred Date</label>
                    <input type="date" name="date" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Time -->
                <div>
                    <label class="block font-medium text-slate-700 mb-2">Preferred Time</label>
                    <input type="time" name="time"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Message -->
                <div class="md:col-span-2">
                    <label class="block font-medium text-slate-700 mb-2">Additional Notes</label>
                    <textarea name="message" rows="4"
                        class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-red-500"
                        placeholder="Any specific instructions or concerns"></textarea>
                </div>

                <!-- Submit -->
                <div class="md:col-span-2 text-center mt-6">
                    <button type="submit"
                        class="btn-primary-custom text-white px-10 py-4 rounded-full font-semibold text-lg inline-flex items-center justify-center pulse-glow">
                        <i class="fas fa-calendar-check mr-3"></i>
                        Submit Booking Request
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 gradient-accent text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-poppins font-bold text-4xl lg:text-5xl text-white mb-6" data-aos="fade-up">
            Need Help With Booking?
        </h2>
        <p class="text-xl text-gray-200 mb-10 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Call us or WhatsApp for instant assistance
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
