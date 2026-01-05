@extends('layouts.frontendmain')

@section('title', 'Health Blog')

@section('content')

<!-- HERO -->
<section class="hero-bg min-h-[55vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-white">
        <h1 class="font-poppins font-bold text-5xl lg:text-6xl mb-6" data-aos="fade-up">
            Health <span class="text-red-400">Blog</span>
        </h1>
        <p class="text-xl lg:text-2xl max-w-3xl text-gray-200" data-aos="fade-up" data-aos-delay="200">
            Latest medical insights, diagnostic awareness & health tips
        </p>
    </div>
</section>

<!-- BLOG LIST -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-poppins font-bold text-4xl text-slate-800 mb-4">
                Latest Articles
            </h2>
            <p class="text-xl text-slate-600">
                Stay informed with expert diagnostic knowledge
            </p>
        </div>

        <!-- BLOG GRID (2 COLUMNS) -->
        <!-- BLOG GRID (2 COLUMNS) -->
        <div class="grid md:grid-cols-2 gap-10">

            @forelse($blogs as $blog)
            <div class="service-card bg-white rounded-2xl shadow-soft overflow-hidden" data-aos="fade-up">

                <!-- Thumbnail -->
                <img src="{{ asset('storage/'.$blog->thumbnail) }}"
                    alt="{{ $blog->title }}"
                    class="w-full h-56 object-cover">

                <div class="p-8">

                    <!-- TAGS -->
                    <span class="text-sm text-red-600 font-semibold">
                        {{ strtoupper(explode(',', $blog->tags)[0]) }}
                    </span>

                    <!-- TITLE -->
                    <h3 class="font-poppins font-bold text-2xl text-slate-800 mt-2 mb-4">
                        {{ $blog->title }}
                    </h3>

                    <!-- SHORT CONTENT -->
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        {{ Str::limit(strip_tags($blog->content), 140) }}
                    </p>

                    <!-- META -->
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-slate-500">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $blog->published_at->format('M Y') }}
                        </span>

                        <a href="{{ route('blog.show', $blog->slug) }}"
                            class="text-red-600 font-semibold hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-2 text-center text-slate-500">
                No blog posts available.
            </p>
            @endforelse
        </div>

        <!-- PAGINATION -->
        <div class="mt-12 flex justify-center">
            {{ $blogs->links() }}
        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-20 gradient-accent text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-poppins font-bold text-4xl lg:text-5xl text-white mb-6" data-aos="fade-up">
            Need Medical Advice or Tests?
        </h2>
        <p class="text-xl text-gray-200 mb-10 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Contact Ghazi Lab & Diagnostic Center for trusted diagnostic services
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-6" data-aos="fade-up" data-aos-delay="400">

            <a href="{{ route('contact') }}"
                class="bg-slate-800 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-lg hover:scale-105 transition border-2 border-white/20">
                <i class="fas fa-envelope mr-2"></i>
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection