<x-layout webtitle="Lotusaja - Blogs: {{ $post->title }}" description="{{ Str::words($post->description, 15, '...') }}">
    <x-header main="Lotusaja Post"></x-header>
    <article class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="text-medium font-mono breadcrumbs mb-4">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/posts">Blog</a></li>
                <li class="truncate max-w-xs">{{ $post->slug }}</li>
            </ul>
        </div>
        <!-- Main content card -->
        <div class="card bg-base-300 shadow-xl hoversan">
            <div class="card-body">
                <header>
                    <h1 class="card-title text-2xl md:text-3xl lg:text-4xl font-bold mb-4">
                        {{ $post->title }}
                    </h1>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <!-- Author info with microdata -->
                        <div class="flex items-center gap-3" itemscope itemtype="http://schema.org/Person">
                            <div class="avatar">
                                <div class="w-12 h-12 rounded-full bordersan">
                                    <img src="{{ $post->author->avatar ? Storage::url($post->author->avatar) : Storage::url('avatars/logoLotus3.jpg') }}"
                                        alt="{{ $post->author->name }}" loading="lazy" itemprop="image" />
                                </div>
                            </div>
                            <div>
                                <a href="/posts/?author={{ $post->author->name }}" class="font-medium hover:underline"
                                    itemprop="name">
                                    {{ $post->author->name }}
                                </a>
                            </div>
                        </div>
                        <!-- Post metadata -->
                        <div class="flex flex-wrap gap-3 text-sm">
                            <time datetime="{{ $post->created_at->toIso8601String() }}" class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $post->created_at->format('M d, Y') }}
                            </time>
                        </div>
                    </div>
                </header>
                <!-- Post description as article summary for SEO -->
                <div class="mb-6">
                    <p class="text-base leading-relaxed">{!! $post->description !!}</p>
                </div>
                <!-- Share buttons -->
                <div class="flex flex-row items-center justify-between gap-4 border-t border-base-content/50 pt-6 mt-8">
                    <!-- Share buttons with accessible labels -->
                    <div class="flex flex-wrap items-center gap-2">
                        <p class="font-medium mr-2">Share This Article :</p>
                        <button class="btn btn-sm color1 relative" id="copy-link-btn" onclick="copyCurrentUrl()"
                            aria-label="Copy link" title="copy link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-link-45deg" viewBox="0 0 16 16">
                                <path
                                    d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                <path
                                    d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                            </svg>
                            <span class="sr-only">Copy link</span>
                            <span id="tooltip"
                                class="absolute bottom-10 left-1/2 transform -translate-x-1/2 opacity-0 transition-opacity hidden text-white bg-primary rounded-md">Copied!</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Author bio for E-E-A-T signals -->
        <div class="card bg-base-300 shadow-lg mt-8 hoversan">
            <div class="card-body">
                <h2 class="card-title text-xl">About the Author</h2>
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="avatar">
                        <div class="w-24 h-24 rounded-full bordersan">
                            <img src="{{ $post->author->avatar ? Storage::url($post->author->avatar) : Storage::url('avatars/logoLotus3.jpg') }}"
                                alt="photo of{{ $post->author->name }}" loading="lazy" />
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">{{ $post->author->name }}</h3>
                        <p class="my-2">Writer at Lotusaja Post.</p>
                        <div class="flex gap-2 mt-2">
                            <a href="/posts/?author={{ $post->author->name }}" rel="author"
                                class="btn btn-sm color1 text-white">View all
                                posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h2 class="text-2xl font-bold mb-2">Rekomendasi Artikel</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($relatedPosts as $related)
                    <div class="card bg-base-300 shadow-lg hoversan max-h-40">
                        <div class="card-body">
                            <a href="/posts/?category={{ $related->category->slug }}"
                                class="text-base-content badge badge-{{ $related->category->color }}">
                                {{ $related->category->title }}
                            </a>
                            <h3 class="card-title text-lg">
                                <a href="/post/{{ $related->slug }}" class="hover:text-primary">
                                    {{ $related->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-base-content">
                                {!! Str::limit(strip_tags($related->description), 100, '...') !!}
                            </p>
                            <div class="card-actions justify-end mt-auto">
                                <a href="/post/{{ $related->slug }}" class="btn btn-sm color1 text-white">Read
                                    more</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-base-content">
                        Tidak ada artikel terkait untuk kategori ini.
                    </div>
                @endforelse
            </div>
        </div>
        <div class="view-more flex justify-center mt-4">
            <a href="/posts" class="btn color1 text-white">View All Article</a>
        </div>
    </article>
    <script>
        function copyCurrentUrl() {
            const currentURL = window.location.href;
            const tooltip = document.getElementById('tooltip');

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(currentURL)
                    .then(() => {
                        // Show tooltip
                        tooltip.classList.remove('opacity-0');
                        tooltip.classList.remove('hidden');
                        tooltip.classList.add('opacity-100');

                        // Hide tooltip after 2 seconds
                        setTimeout(() => {
                            tooltip.classList.remove('opacity-100');
                            tooltip.classList.add('hidden');
                        }, 2000);
                    })
                    .catch(err => {
                        fallbackCopyMethod(currentURL);
                    });
            } else {
                // Fall back to older methods
                fallbackCopyMethod(currentURL);
            }
        }

        function fallbackCopyMethod(text) {
            // Create a temporary textarea element
            const textArea = document.createElement("textarea");
            textArea.value = text;
            // Make the textarea out of viewport
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);

            // Select and copy
            textArea.focus();
            textArea.select();

            try {
                const successful = document.execCommand('copy');

                if (successful) {
                    const tooltip = document.getElementById('tooltip');
                    tooltip.classList.remove('opacity-0');
                    tooltip.classList.remove('hidden');
                    tooltip.classList.add('opacity-100');

                    setTimeout(() => {
                        tooltip.classList.remove('opacity-100');
                        tooltip.classList.add('hidden');
                    }, 2000);
                } else {
                    console.error("Unable to copy link");
                }
            } catch (err) {
                console.error("Copy failed", err);
            }

            // Clean up
            document.body.removeChild(textArea);
        }
    </script>
</x-layout>
