<x-layout webtitle="Lotusaja - Blogs" description="Kumpulan Artikel Lotusaja">
    <x-header main="Lotusaja Blog"></x-header>
    <div class="posts mt-6 mb-4 px-4">
        <div class="gabunganfilter grid grid-cols-1 lg:grid-cols-4 items-center lg:gap-2">
            <div class="search flex justify-center lg:justify-end lg:col-span-3 items-center mb-4 lg:mb-0 gap-2">
                <form action="/posts" method="GET" class="w-full flex gap-2 justify-center lg:justify-end items-center">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <label class="input md:w-1/2 lg:w-4/5 flex items-center gap-2">
                        <svg class="h-[2em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                stroke="currentColor">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </g>
                        </svg>
                        <input type="search" name="search" id="search-input" value="{{ request('search') }}"
                            class="grow" placeholder="Search title..." />
                        <kbd class="kbd kbd-sm smhide">Ctrl K</kbd>
                    </label>
                    <button type="submit" class="btn btn-primary text-xl"><i
                            class="fa-brands fa-searchengin"></i></button>
                </form>
            </div>
            <div class="filtercategory flex items-center justify-center lg:justify-start">
                <form action="/posts" method="GET" class="dropdown dropdown-end z-[1]">
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <label tabindex="0" class="btn btn-primary cursor-pointer gap-1">
                        <i class="fa-solid fa-filter"></i> Kategori
                    </label>
                    <ul tabindex="0"
                        class="gap-2 dropdown-content menu p-2 mt-2 bg-base-100 border border-primary shadow-xl rounded-xl w-52
                        transition-all duration-300 ease-in-out text-gray-800">
                        @foreach ($cat as $cate)
                            <li>
                                <button type="submit" name="category" value="{{ $cate->slug }}"
                                    class="transition-colors duration-200 rounded-lg px-3 py-1 w-full text-left
                            {{ request('category') === $cate->slug ? 'bg-primary text-white' : 'hover:bg-base-content hover:text-base-300 text-base-content' }}">
                                    {{ $cate->title }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </form>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 mt-4 justify-center items-center mb-3">
            {{-- Search Filter Badge --}}
            @if (request('search'))
                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                    class="badge !text-white !bg-primary text-md font-semibold badge-outline group px-4 py-3 gap-2 transition-all">
                    ✕ {{ request('search') }}
                </a>
            @endif

            {{-- Category Filter Badge --}}
            @if (request('category'))
                <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}"
                    class="badge !text-base-content !bg-success text-md font-semibold badge-outline group px-4 py-3 gap-2 transition-all">
                    ✕ {{ \App\Models\Category::where('slug', request('category'))->value('title') }}
                </a>
            @endif

            {{-- Author Filter Badge --}}
            @if (request('author'))
                <a href="{{ request()->fullUrlWithQuery(['author' => null]) }}"
                    class="badge !text-base-content !bg-info text-md font-semibold badge-outline group px-4 py-3 gap-2 transition-all">
                    ✕ {{ \App\Models\User::where('name', request('author'))->value('name') }}
                </a>
            @endif

            {{-- Reset All Filters --}}
            @if (request()->hasAny(['search', 'category', 'author']))
                <a href="/posts"
                    class="badge badge-error font-semibold px-4 py-3 text-base-content font-semibold hover:scale-105 transition-all shadow-md">
                    ✕ Reset Filters
                </a>
            @endif
        </div>
        <!-- Add this code immediately after the filter badges and before the post grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-4">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="card bg-base-300 hover:shadow-xl transition-shadow duration-300 hoversan"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                        <!-- Your existing post card content -->
                        <div class="card-body p-6">
                            <!-- Category and date -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="mb-2">
                                    <a href="{{ request()->fullUrlWithQuery(['category' => $post->category->slug]) }}"
                                        class="badge badge-{{ $post->category->color }} text-base-content font-semibold">{{ $post->category->title }}</a>
                                </div>
                                <div class="flex items-center text-sm mb-3">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    <span>
                                        @if ($post->created_at->diffInDays(now()) >= 1)
                                            {{ $post->created_at->format('m-Y') }}
                                        @else
                                            {{ $post->created_at->diffForHumans() }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!-- Title -->
                            <h3 class="text-xl font-semibold hover:text-primary transition-colors duration-300">
                                <a href="/post/{{ $post->slug }}"
                                    class="decoration-primary decoration-2">{{ $post->title }}</a>
                            </h3>
                            <!-- Description -->
                            <p class="my-4 text-sm">{!! Str::limit(strip_tags($post->description), 100, '...') !!}</p>
                            <!-- Author and read more -->
                            <div class="flex items-center gap-3 mt-4 pt-4">
                                <a href="{{ request()->fullUrlWithQuery(['author' => $post->author->name]) }}"
                                    class="flex items-center gap-2">
                                    <img loading="lazy"
                                        src="{{ $post->author->avatar ?? asset('image/logoLotus3.jpg') }}"
                                        alt="Author" class="w-8 h-8 rounded-full" />
                                    <div>
                                        <h4 class="font-medium">{{ $post->author->name }}</h4>
                                    </div>
                                </a>
                                <a href="/post/{{ $post->slug }}"
                                    class="ml-auto text-sm font-medium text-base-content hover:text-primary hover:underline flex items-center group">
                                    Read More
                                    <i
                                        class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
        </div>
        <div class="notfound flex justify-center items-center flex-col text-center">
            <span class="text-base-content text-3xl sm:text-4xl md:text-5xl font-bold mb-2">
                Wah, artikelnya nggak ketemu nih!
            </span>
            <p class="text-base-content text-lg sm:text-xl mb-2 max-w-xl">
                Tenang, mungkin ada beberapa hal yang bisa kamu cek dulu. Yuk coba tips di bawah ini supaya lebih mudah
                menemukan artikel yang kamu cari!
            </p>
            <div class="bg-base-300 border border-primary rounded-lg p-6 shadow-md w-full max-w-md text-left">
                <h3 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                    Tips untuk menemukan artikel :
                </h3>
                <ul class="space-y-3 text-base-content">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                        <span>Cek lagi ejaan atau kata kunci yang kamu pakai</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                        <span>Coba gunakan kata kunci yang lebih umum atau kurangi filter pencariannya</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                        <span>Atau kamu bisa juga jelajahi kategori artikel yang tersedia</span>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>
    @if ($posts->hasPages())
        <div class="flex justify-center my-8">
            <div class="bg-base-300 rounded-full shadow-md px-6 py-3 flex items-center gap-2 md:gap-4">
                <!-- Previous button -->
                <a href="{{ $posts->previousPageUrl() }}"
                    @if ($posts->onFirstPage()) class="text-gray-400 pointer-events-none" 
               aria-disabled="true" 
           @else 
               class="text-base-content hover:font-semibold hover:text-primary transition-colors" 
               aria-label="Previous page" @endif>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </span>
                </a>
                <div class="flex items-center gap-1 md:gap-2">
                    @php
                        $window = 2;
                        if ($posts->lastPage() <= 2 * $window + 3) {
                            $startPage = 1;
                            $endPage = $posts->lastPage();
                            $showStartDots = false;
                            $showEndDots = false;
                        } else {
                            $startPage = max(1, $posts->currentPage() - $window);
                            $endPage = min($posts->lastPage(), $posts->currentPage() + $window);
                            if ($startPage <= 2) {
                                $startPage = 1;
                                $endPage = min($posts->lastPage(), 1 + 2 * $window + 1);
                                $showStartDots = false;
                            } else {
                                $showStartDots = true;
                            }
                            if ($endPage >= $posts->lastPage() - 1) {
                                $endPage = $posts->lastPage();
                                $startPage = max(1, $posts->lastPage() - 2 * $window - 1);
                                $showEndDots = false;
                            } else {
                                $showEndDots = true;
                            }
                        }
                    @endphp
                    @for ($i = $startPage; $i <= $endPage; $i++)
                        @if ($i == $posts->currentPage())
                            <a href="{{ $posts->url($i) }}"
                                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white font-medium"
                                aria-current="page">
                                {{ $i }}
                            </a>
                        @else
                            <a href="{{ $posts->url($i) }}"
                                class="inline-flex items-center justify-center w-8 h-8 rounded-full text-base-content hover:bg-indigo-700 hover:text-white font-medium">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor
                    @if (isset($showEndDots) && $showEndDots)
                        <span class="text-base-content px-1">...</span>
                        <a href="{{ $posts->url($posts->lastPage()) }}"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full text-base-content hover:text-white hover:bg-indigo-700 font-medium">
                            {{ $posts->lastPage() }}
                        </a>
                    @endif
                </div>
                <a href="{{ $posts->nextPageUrl() }}"
                    @if (!$posts->hasMorePages()) class="text-gray-400 pointer-events-none" 
               aria-disabled="true" 
           @else 
               class="text-base-content hover:text-primary hover:font-semibold transition-colors" 
               aria-label="Next page" @endif>
                    <span class="flex items-center gap-1">
                        <span class="hidden sm:inline">Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>
                <div class="hidden md:block text-sm text-base-content border-l border-base-content pl-4 ml-2">
                    Showing {{ $posts->firstItem() ?? 0 }} to {{ $posts->lastItem() ?? 0 }} of
                    {{ $posts->total() }} results
                </div>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const searchInput = document.getElementById('search-input');
                if (searchInput) {
                    searchInput.focus();
                }
            }
        });
    </script>
</x-layout>
