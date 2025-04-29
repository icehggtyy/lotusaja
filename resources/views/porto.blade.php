<x-layout webtitle="Lotusaja Portofolio: {{ $porto->title }}"
    description="{{ Str::words($porto->description, 15, '...') }}">
    <x-header main="Lotusaja Portfolio"></x-header>
    <article class="container mx-auto px-4 py-8 max-w-4xl" itemscope itemtype="http://schema.org/CreativeWork">
        <!-- Breadcrumbs with structured data -->
        <div class="text-medium font-mono breadcrumbs mb-4 text-base-content">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/portofolio">Portfolio</a></li>
                <li class="truncate max-w-xs">{{ $porto->slug }}</li>
            </ul>
        </div>

        <!-- Main content card -->
        <div class="card bg-base-300 shadow-xl hoversan">
            <div class="card-body">
                <header>
                    <!-- Hero image with lazy loading and responsive sizing -->
                    <figure class="mb-6">
                        <img src="{{ asset('storage/' . $porto->image) }}" alt="{{ $porto->title }}"
                            class="w-full rounded-xl object-cover" loading="lazy" itemprop="image">
                    </figure>
                    <!-- Title with proper heading hierarchy -->
                    <h1 class="card-title text-2xl md:text-3xl lg:text-4xl font-bold mb-4" itemprop="name">
                        {{ $porto->title }}
                    </h1>
                    <!-- Metadata with semantic markup -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <div class="flex flex-wrap gap-4 text-sm">
                            <time datetime="{{ $porto->created_at->toIso8601String() }}" itemprop="datePublished"
                                class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $porto->created_at->format('M d, Y') }}</span>
                            </time>
                        </div>
                    </div>
                </header>

                <!-- Project description with proper semantics -->
                <div class="mb-8" itemprop="description">
                    <h2 class="text-xl font-semibold mb-1">Project Details</h2>
                    <p class="text-base leading-relaxed">{!! $porto->description !!}</p>
                    <p class="text-base leading-relaxed mt-2">Project Link: <a href="{{ $porto->link }}"
                            target="_blank" title="Project Link {{ $porto->title }}"
                            class="hover:text-primary hover:underline">Click Here</a></p>
                </div>
                <!-- Call to action -->
                <div class="flex flex-row items-center justify-between gap-4 border-t border-base-content pt-6 mt-8">
                    <!-- Share buttons with accessible labels -->
                    <div class="flex flex-wrap items-center gap-2">
                        <p class="font-medium mr-2">Share This Project :</p>
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
        <section class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Related Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($relatedProject as $portofolio)
                    <div class="group card bg-base-300 shadow-xl hoversan hover:shadow-2xl transition-all duration-500 ease-in-out transform rounded-xl overflow-hidden hover:border-b-4 hover:border-primary hover:border-l-3"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Card Image with Overlay -->
                        <figure class="relative overflow-hidden h-64">
                            <img src="{{ asset('storage/' . $portofolio->image) }}"
                                class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                loading="lazy" alt="Photo of {{ $portofolio->title }}"
                                title="Photo Of {{ $portofolio->title }}" />

                            <!-- Overlay with Quick Actions -->
                        </figure>

                        <!-- Card Content -->
                        <div class="card-body p-6 bg-base-300">
                            <a href="/portfolios/{{ $portofolio->slug }}"
                                class="card-title text-xl font-bold group-hover:text-primary transition-colors">
                                {{ $portofolio->title }}
                            </a>

                            <p class="text-base-content/80 my-2">
                                {!! Str::limit(strip_tags($portofolio->description), 100, '...') !!}
                            </p>
                            <div class="card-actions mt-auto pt-2">
                                <a href="/portfolios/{{ $portofolio->slug }}" title="View Project Details"
                                    aria-label="View Project Details" class="btn color1 text-white w-full gap-2">
                                    <span>Explore Project</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
            </div>
            <h1 class="text-base-content font-semibold text-center">Tidak ada project terkait</h1>
            @endforelse
            <div class="view-more flex justify-center mt-4">
                <a href="/portfolio" class="btn color1 text-white">View All Project</a>
            </div>
        </section>
    </article>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CreativeWork",
        "name": "{{ $porto->title }}",
        "description": "{{ $porto->description }}",
        "image": "{{ asset('storage/' . $porto->image) }}",
        "datePublished": "{{ $porto->created_at->toIso8601String() }}",
        "author": {
            "@type": "Organization",
            "name": "Lotusaja"
        }
        @if(!empty($porto->client)),
        "sourceOrganization": {
            "@type": "Organization",
            "name": "{{ $porto->client }}"
        }
        @endif
    }
    </script>

    <!-- Improved copy link functionality with visual feedback -->
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
