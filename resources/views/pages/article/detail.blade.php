@extends('components.layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full h-[300px] md:h-[500px] bg-cover bg-center bg-no-repeat relative"
            style="background-image: url('{{ asset('storage/' . $article->image) }}')">
            <div class="bg-black/20 inset-0 absolute"></div>
        </div>
        <div
            class="w-full mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8 bg-white flex flex-col md:flex-row flex-wrap gap-12 lg:gap-20">
            <article class="flex-[5] basis-0">
                <h4 class="mt-4 text-slate-600 text-sm">{{ $article->category->name }}:
                    {{ $article->created_at->format('F j, Y') }}</h4>
                <h1 class="mt-4 text-slate-700 text-3xl md:text-4xl leading-relaxed">{{ $article->title }}
                </h1>
                <div class="flex gap-2 items-center mt-3 flex-wrap">
                    <h5 class="text-slate-600 text-xs">Shared with</h5>
                    <div class="flex gap-2 items-center">
                        <a href="#" class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50"
                                class="fill-gray-500 group-hover:fill-gray-700 transition-colors duration-300">
                                <path
                                    d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M37,19h-2c-2.14,0-3,0.5-3,2 v3h5l-1,5h-4v15h-5V29h-4v-5h4v-3c0-4,2-7,6-7c2.9,0,4,1,4,1V19z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="group">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50"
                                class="fill-gray-500 group-hover:fill-gray-700 transition-colors duration-300">
                                <path
                                    d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="group"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                width="20" height="20" viewBox="0 0 50 50"
                                class="fill-gray-500 group-hover:fill-gray-700 transition-colors duration-300">
                                <path
                                    d="M25,2C12.318,2,2,12.318,2,25c0,3.96,1.023,7.854,2.963,11.29L2.037,46.73c-0.096,0.343-0.003,0.711,0.245,0.966 C2.473,47.893,2.733,48,3,48c0.08,0,0.161-0.01,0.24-0.029l10.896-2.699C17.463,47.058,21.21,48,25,48c12.682,0,23-10.318,23-23 S37.682,2,25,2z M36.57,33.116c-0.492,1.362-2.852,2.605-3.986,2.772c-1.018,0.149-2.306,0.213-3.72-0.231 c-0.857-0.27-1.957-0.628-3.366-1.229c-5.923-2.526-9.791-8.415-10.087-8.804C15.116,25.235,13,22.463,13,19.594 s1.525-4.28,2.067-4.864c0.542-0.584,1.181-0.73,1.575-0.73s0.787,0.005,1.132,0.021c0.363,0.018,0.85-0.137,1.329,1.001 c0.492,1.168,1.673,4.037,1.819,4.33c0.148,0.292,0.246,0.633,0.05,1.022c-0.196,0.389-0.294,0.632-0.59,0.973 s-0.62,0.76-0.886,1.022c-0.296,0.291-0.603,0.606-0.259,1.19c0.344,0.584,1.529,2.493,3.285,4.039 c2.255,1.986,4.158,2.602,4.748,2.894c0.59,0.292,0.935,0.243,1.279-0.146c0.344-0.39,1.476-1.703,1.869-2.286 s0.787-0.487,1.329-0.292c0.542,0.194,3.445,1.604,4.035,1.896c0.59,0.292,0.984,0.438,1.132,0.681 C37.062,30.587,37.062,31.755,36.57,33.116z">
                                </path>
                            </svg></a>
                    </div>
                </div>
                <article
                    class="mt-4 prose w-full max-w-none prose-slate prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl">
                    {!! $article->content !!}
                </article>
            </article>
            <div class="flex-[2] basis-0 mt-8 md:mt-20">
                <h4 class="text-slate-700 font-medium">Topik Hangat</h4>
                <div class="flex gap-2 mt-4 flex-wrap items-center">
                    @foreach ($categories as $category)
                        <a href="{{ route('article.index', ['category' => $category->slug]) }}"
                            class="text-slate-500 hover:text-slate-700 transition-colors duration-300 ease-in-out text-sm">
                            {{ $category->name }}
                        </a>
                        @if (!$loop->last)
                            |
                        @endif
                    @endforeach
                </div>
                <h4 class="text-slate-700 font-medium mt-4">Artikel Terkait</h4>
                <div class="flex flex-col gap-8 md:gap-4 mt-4">
                    @foreach ($relatedArticles as $relatedArticle)
                        <a href="{{ route('article.show', $relatedArticle->slug) }}"
                            class="w-full flex flex-col gap-4 md:gap-2 overflow-hidden group">
                            <div class="aspect-video relative overflow-hidden rounded-xl">
                                <img src="{{ asset('storage/' . $relatedArticle->image) }}" alt=""
                                    class="w-full h-full object-center object-cover group-hover:scale-105 duration-300 transition-transform ease-in-out">
                            </div>
                            <h5 class="text-xs text-slate-600">{{ $relatedArticle->category->name }} |
                                {{ $relatedArticle->created_at->format('F j, Y') }}</h5>
                            <h4
                                class="text-2xl md:text-base text-slate-600 font-semibold line-clamp-2 group-hover:text-slate-700">
                                {{ $relatedArticle->title }}</h4>
                        </a>
                    @endforeach
                </div>
                <h4 class="text-slate-700 font-medium my-4">Follow Us</h4>
                <div class="space-y-2">
                    <a class="flex gap-2 items-center group cursor-pointer text-slate-500 hover:text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 50 50"
                            class="fill-gray-500 group-hover:fill-gray-700 transition-colors duration-300">
                            <path
                                d="M 16 3 C 8.83 3 3 8.83 3 16 L 3 34 C 3 41.17 8.83 47 16 47 L 34 47 C 41.17 47 47 41.17 47 34 L 47 16 C 47 8.83 41.17 3 34 3 L 16 3 z M 37 11 C 38.1 11 39 11.9 39 13 C 39 14.1 38.1 15 37 15 C 35.9 15 35 14.1 35 13 C 35 11.9 35.9 11 37 11 z M 25 14 C 31.07 14 36 18.93 36 25 C 36 31.07 31.07 36 25 36 C 18.93 36 14 31.07 14 25 C 14 18.93 18.93 14 25 14 z M 25 16 C 20.04 16 16 20.04 16 25 C 16 29.96 20.04 34 25 34 C 29.96 34 34 29.96 34 25 C 34 20.04 29.96 16 25 16 z">
                            </path>
                        </svg>Instagram
                    </a>
                    <a class="flex gap-2 items-center group cursor-pointer text-slate-500 hover:text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 50 50"
                            class="fill-gray-500 group-hover:fill-gray-700 transition-colors duration-300">
                            <path
                                d="M41,4H9C6.243,4,4,6.243,4,9v32c0,2.757,2.243,5,5,5h32c2.757,0,5-2.243,5-5V9C46,6.243,43.757,4,41,4z M37.006,22.323 c-0.227,0.021-0.457,0.035-0.69,0.035c-2.623,0-4.928-1.349-6.269-3.388c0,5.349,0,11.435,0,11.537c0,4.709-3.818,8.527-8.527,8.527 s-8.527-3.818-8.527-8.527s3.818-8.527,8.527-8.527c0.178,0,0.352,0.016,0.527,0.027v4.202c-0.175-0.021-0.347-0.053-0.527-0.053 c-2.404,0-4.352,1.948-4.352,4.352s1.948,4.352,4.352,4.352s4.527-1.894,4.527-4.298c0-0.095,0.042-19.594,0.042-19.594h4.016 c0.378,3.591,3.277,6.425,6.901,6.685V22.323z">
                            </path>
                        </svg>Tiktok
                    </a>
                </div>
            </div>
        </div>
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-24">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <h4 class="text-2xl font-medium text-slate-700">Recommendation Article</h4>
                <a href="{{ route('article.index') }}" class="text-sm text-green-800 hover:text-green-700">Show All</a>
            </div>

            <!-- Artikel Grid -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8 mt-8">
                @foreach ($otherArticles as $otherArticle)
                    <div
                        class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 group">

                        <!-- Gambar -->
                        <div class="h-32 w-32 shrink-0 rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $otherArticle->image) }}" alt="Thumbnail"
                                class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500">
                        </div>

                        <div class="flex flex-col justify-between h-full flex-1 gap-2">
                            <h5 class="text-xs font-medium text-slate-500">
                                {{ $otherArticle->category->name }} • {{ $otherArticle->created_at->format('F j, Y') }}
                            </h5>
                            <h4
                                class="text-base font-semibold text-slate-700 line-clamp-2 mt-1 group-hover:text-green-700 transition-colors duration-300">
                                {{ $otherArticle->title }}
                            </h4>
                            <p class="line-clamp-2 text-sm">{{ $otherArticle->summary }}</p>

                            <a href="{{ route('article.show', $otherArticle->slug) }}"
                                class="inline-flex items-center gap-1 text-sm font-medium text-green-700 hover:gap-2 transition-all duration-300 mt-2">
                                Read more
                                <span><i data-feather="arrow-right" class="size-4"></i></span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full">
                {{ $otherArticles->links() }}
            </div>
        </div>
    </div>
@endsection
