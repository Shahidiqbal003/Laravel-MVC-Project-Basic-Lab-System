@extends('layouts.frontendmain')

@section('title', $blog->title)

@section('content')

<!-- HERO -->
<section class="relative h-[60vh] overflow-hidden">
    <img src="{{ asset('storage/'.$blog->cover_image) }}"
         alt="{{ $blog->title }}"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-5xl mx-auto px-4 text-white text-center">
            <span class="inline-block mb-4 px-4 py-1 bg-red-500 rounded-full text-sm font-semibold">
                {{ strtoupper(explode(',', $blog->tags)[0]) }}
            </span>

            <h1 class="font-poppins font-bold text-4xl lg:text-5xl leading-tight mb-4">
                {{ $blog->title }}
            </h1>

            <p class="text-gray-300 text-sm">
                <i class="fas fa-calendar mr-1"></i>
                {{ $blog->published_at->format('F d, Y') }}
            </p>
        </div>
    </div>
</section>


<!-- CONTENT -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-12 gap-12">

            <!-- LEFT : BLOG CONTENT -->
            <div class="lg:col-span-8">

                <!-- Blog Content -->
                <article class="prose prose-lg max-w-none text-slate-700">
                    {!! $blog->content !!}
                </article>

                <!-- Tags -->
                <div class="mt-10 pt-6 border-t">
                    <h4 class="font-semibold text-slate-800 mb-3">Tags</h4>
                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $blog->tags) as $tag)
                            <span class="px-4 py-1 rounded-full bg-slate-100 text-slate-600 text-sm">
                                #{{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- RIGHT : STICKY SIDEBAR -->
            <aside class="lg:col-span-4">

                <div class="sticky top-28 space-y-6">

                    <!-- CARD -->
                    <div class="bg-white rounded-2xl shadow-soft overflow-hidden border">

                        <img src="{{ asset('storage/'.$blog->thumbnail) }}"
                             class="w-full h-52 object-cover"
                             alt="Related">

                        <div class="p-6">
                            <span class="text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded-full font-semibold">
                                Featured
                            </span>

                            <h4 class="font-bold text-xl text-slate-800 mt-4">
                                {{ $blog->title }}
                            </h4>

                            <p class="text-slate-600 text-sm mt-3">
                                {{ Str::limit(strip_tags($blog->content), 120) }}
                            </p>

                            <a href="{{ route('blog') }}"
                               class="inline-block mt-5 text-red-600 font-semibold hover:underline">
                                ← Back to Blogs
                            </a>
                        </div>
                    </div>

                </div>

            </aside>

        </div>

    </div>
</section>

@endsection
