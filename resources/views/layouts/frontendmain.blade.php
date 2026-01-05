<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSettings->site_name }} | @yield('title')</title>
    <meta name="description" content="Ghazi Lab & Diagnostic Center and FNAC Clinic in Multan - Expert diagnostic services including FNAC, Bone Marrow Tests, and all general diagnostic tests by Dr. Sadia Majeed.">
    <link rel="stylesheet" href="/assets/dist/css/style.css">
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6Ld_wcMlf71W3N2oCQMYLzVFxxL2dYyvr5w&s">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- ================= NAVBAR ================= -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                         <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-microscope text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="font-poppins font-bold text-xl text-slate-800">{{ $siteSettings->site_name }}</h1>
                            <p class="text-xs text-slate-600">{{ $siteSettings->tagline }}</p>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link text-slate-700 font-medium {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>

                    <a href="{{ route('about') }}"
                        class="nav-link text-slate-700 font-medium {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>

                    <a href="{{ route('services') }}"
                        class="nav-link text-slate-700 font-medium {{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>

                    <a href="{{ route('blog') }}"
                        class="nav-link text-slate-700 font-medium {{ request()->routeIs('blog') ? 'active' : '' }}">
                        Blog
                    </a>

                    <!-- <a href="{{ route('contact') }}"
                        class="nav-link text-slate-700 font-medium {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a> -->

                </div>

                <!-- Phone Number & CTA -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="tel:+923001234567" class="phone-number">
                        <i class="fas fa-phone mr-2"></i>
                        {{ $siteSettings->primary_phone }}
                    </a>
                    <a href="{{ route('contact') }}" class="btn-primary-custom text-white px-6 py-2 rounded-full font-semibold">
                        Contact Us
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button id="mobileMenuBtn" class="text-slate-700 hover:text-red-600">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu lg:hidden fixed top-0 right-0 w-full h-screen bg-white shadow-xl z-40">
            <div class="p-6">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="font-poppins font-bold text-xl text-slate-800">Menu</h3>
                    <button id="closeMobileMenu" class="text-slate-700 hover:text-red-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <div class="space-y-6">
                    <a href="{{ route('home') }}"
                        class="block text-slate-700 font-medium text-lg hover:text-red-600 transition-colors {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="block text-slate-700 font-medium text-lg hover:text-red-600 transition-colors {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>

                    <a href="{{ route('services') }}"
                        class="block text-slate-700 font-medium text-lg hover:text-red-600 transition-colors {{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>

                      <a href="{{ route('blog') }}"
                        class="block text-slate-700 font-medium text-lg hover:text-red-600 transition-colors {{ request()->routeIs('blog') ? 'active' : '' }}">
                        Blog
                    </a>

                    <a href="{{ route('contact') }}"
                        class="block text-slate-700 font-medium text-lg hover:text-red-600 transition-colors {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>


                    <!-- Mobile Phone Numbers -->
                    <div class="border-t pt-6 mt-6">
                        <h4 class="font-semibold text-slate-800 mb-4">Contact Numbers</h4>
                        <div class="space-y-3">
                            <a href="tel:{{ $siteSettings->primary_phone }}" class="flex items-center text-slate-700 hover:text-green-600">
                                <i class="fas fa-phone mr-3 text-green-600"></i>
                                {{ $siteSettings->primary_phone }}
                            </a>
                            <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" class="flex items-center text-slate-700 hover:text-green-600">
                                <i class="fab fa-whatsapp mr-3 text-green-600"></i>
                                WhatsApp Chat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-8">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                         <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-microscope text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-poppins font-bold text-xl">{{ $siteSettings->site_name }}</h3>
                            <p class="text-gray-400 text-sm">{{ $siteSettings->tagline }}</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">Leading diagnostic center in Multan providing comprehensive medical testing services with specialized expertise in FNAC and cancer screening.</p>
                    <div class="flex items-center text-gray-300 mb-4">
                        <i class="fas fa-map-marker-alt text-red-400 mr-3"></i>
                        <span>{{ $siteSettings->address }}</span>
                    </div>
                </div>

                <div>
                    <h4 class="font-poppins font-semibold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-red-400 transition-colors">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-red-400 transition-colors">Services</a></li>
                        <li><a href="{{ route('blog') }}" class="text-gray-300 hover:text-red-400 transition-colors">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-red-400">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-poppins font-semibold text-lg mb-6">Contact Info</h4>
                    <div class="space-y-4">
                        <a href="tel:{{ $siteSettings->primary_phone }}" class="flex items-center text-gray-300 hover:text-green-400 transition-colors">
                            <i class="fas fa-phone text-green-400 mr-3"></i>
                            {{ $siteSettings->primary_phone }}
                        </a>
                        <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" class="flex items-center text-gray-300 hover:text-green-400 transition-colors">
                            <i class="fab fa-whatsapp text-green-400 mr-3"></i>
                            WhatsApp: {{ $siteSettings->whatsapp_number }}
                        </a>
                        <a href="mailto:{{ $siteSettings->primary_email }}" class="flex items-center text-gray-300 hover:text-blue-400 transition-colors">
                            <i class="fas fa-envelope text-blue-400 mr-3"></i>
                            {{ $siteSettings->primary_email }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; 2026 {{ $siteSettings->site_name }}. All rights reserved. | {{ $siteSettings->tagline }}.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" class="whatsapp-float bg-green-500 hover:bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl shadow-lg">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/assets/dist/js/main.js"></script>
  @stack('scripts')


    <script>
        // Initialize AOS Animation
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileMenu.classList.remove('active');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>

</html>