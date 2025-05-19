<x-layout webtitle="Portfolio" description="Kumpulan Portfolio Lotusaja">
    <x-header main="Lotusaja Portfolio"></x-header>

    <!-- Hero Portfolio Section -->
    <div class="portfolio mt-8 mb-8 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-2 colors1" data-aos="fade-up" data-aos-duration="1200">Jelajahi
            Karya Unggulan Kami</h2>
        <p class="text-base-content max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="1300">Koleksi proyek terbaik
            kami yang menunjukkan keahlian dan
            inovasi dalam setiap desain</p>
    </div>

    <!-- Portfolio Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16 px-4">
        @foreach ($porto as $portofolio)
            <div class="group card bg-base-300 shadow-xl hoversan hover:shadow-2xl transition-all duration-500 ease-in-out transform rounded-xl overflow-hidden hover:border-b-4 hover:border-primary hover:border-l-3"
                data-aos="fade-up" data-aos-duration="800">

                <!-- Card Image with Overlay -->
                <figure class="relative overflow-hidden h-64">
                    <img src="{{ $portofolio->link_img }}"
                        class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                        loading="lazy" alt="{{ $portofolio->title }}" title="{{ $portofolio->title }}" />

                    <!-- Overlay with Quick Actions -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center p-4">
                        <div
                            class="flex gap-2 mb-4 transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500">
                            <button class="btn btn-circle btn-sm color1 open-lightbox"
                                data-image="{{ $portofolio->link_img }}" data-title="{{ $portofolio->title }}"
                                title="View Full Image">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </figure>

                <!-- Card Content -->
                <div class="card-body p-6 bg-base-300">
                    <h3 class="card-title text-xl font-bold group-hover:text-primary transition-colors">
                        {{ $portofolio->title }}
                    </h3>

                    <p class="text-base-content/80 my-2">
                        {!! Str::limit(strip_tags($portofolio->description), 100, '...') !!}
                    </p>
                    <div class="card-actions mt-auto pt-2 border-t border-base-300">
                        <a href="/portfolios/{{ $portofolio->slug }}" title="View Project Details"
                            aria-label="View Project Details" class="btn color1 w-full gap-2 text-white">
                            <span>Explore Project</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Custom Lightbox -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-90">
        <div class="lightbox-content relative w-full h-full flex flex-col items-center justify-center p-4">
            <!-- Navigation Controls -->
            <button id="prev-btn"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 btn btn-circle btn-ghost text-white hover:bg-black/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="next-btn"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 btn btn-circle btn-ghost text-white hover:bg-black/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Image Container -->
            <div class="image-container relative w-full h-full flex items-center justify-center overflow-hidden">
                <div id="draggable-container" class="cursor-grab active:cursor-grabbing">
                    <img id="lightbox-img" src="" alt=""
                        class="max-h-[85vh] max-w-[85vw] object-contain transition-all duration-300 ease-in-out shadow-2xl" />
                </div>

                <!-- Zoom Controls -->
                <div class="absolute bottom-6 right-6 flex gap-2">
                    <button id="zoom-in" class="btn btn-circle color1 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                    <button id="zoom-out" class="btn btn-circle color1 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                    <button id="zoom-reset" class="btn btn-circle color1 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Project Title Bar -->
            <div
                class="absolute top-0 left-0 right-0 bg-gradient-to-b from-black/80 to-transparent py-4 px-6 flex justify-between items-center">
                <h3 id="lightbox-title" class="text-white text-xl font-bold"></h3>
                <div class="flex items-center gap-3">
                    <span id="zoom-level" class="text-white text-sm bg-black/40 px-2 py-1 rounded">100%</span>
                    <button id="close-lightbox" class="btn btn-circle btn-sm color1 text-white">✕</button>
                </div>
            </div>

            <!-- Image Counter -->
            <div class="absolute bottom-6 left-6 bg-black/60 text-white px-3 py-1 rounded-full text-sm">
                <span id="current-index">1</span>/<span id="total-images">{{ count($porto) }}</span>
            </div>

            <!-- Hint for Touch Devices -->
            <div id="drag-hint"
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black/60 text-white px-4 py-2 rounded-lg text-sm opacity-0 transition-opacity duration-500 pointer-events-none">
                Drag to pan image
            </div>
        </div>
    </div>
</x-layout>

<!-- Add this script before the closing body tag -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all portfolio items and store their images/titles
        const portfolioItems = [];
        document.querySelectorAll('.open-lightbox').forEach((button, index) => {
            portfolioItems.push({
                image: button.getAttribute('data-image'),
                title: button.getAttribute('data-title'),
                index: index
            });

            button.addEventListener('click', function() {
                openLightbox(index);
            });
        });

        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const closeBtn = document.getElementById('close-lightbox');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const currentIndexSpan = document.getElementById('current-index');
        const zoomInBtn = document.getElementById('zoom-in');
        const zoomOutBtn = document.getElementById('zoom-out');
        const zoomResetBtn = document.getElementById('zoom-reset');
        const zoomLevelDisplay = document.getElementById('zoom-level');
        const draggableContainer = document.getElementById('draggable-container');
        const dragHint = document.getElementById('drag-hint');

        let currentIndex = 0;
        let scale = 1;
        let translateX = 0;
        let translateY = 0;
        let isDragging = false;
        let startX = 0;
        let startY = 0;
        let dragTimeout;

        // Function to open lightbox
        function openLightbox(index) {
            currentIndex = index;
            updateLightboxContent();
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling

            // Reset zoom and position
            resetZoomAndPosition();
        }

        // Function to close lightbox
        function closeLightbox() {
            lightbox.classList.add('hidden');
            document.body.style.overflow = ''; // Enable scrolling
        }

        // Function to update lightbox content
        function updateLightboxContent() {
            const item = portfolioItems[currentIndex];
            lightboxImg.src = item.image;
            lightboxImg.alt = item.title;
            lightboxTitle.textContent = item.title;
            currentIndexSpan.textContent = currentIndex + 1;

            // Reset zoom and position
            resetZoomAndPosition();
        }

        // Function to reset zoom and position
        function resetZoomAndPosition() {
            scale = 1;
            translateX = 0;
            translateY = 0;
            updateTransform();
            updateZoomLevel();
        }

        // Function to update transform
        function updateTransform() {
            draggableContainer.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
        }

        // Function to update zoom level display
        function updateZoomLevel() {
            zoomLevelDisplay.textContent = `${Math.round(scale * 100)}%`;
        }

        // Function to navigate to previous image
        function navigatePrev() {
            currentIndex = (currentIndex - 1 + portfolioItems.length) % portfolioItems.length;
            updateLightboxContent();
        }

        // Function to navigate to next image
        function navigateNext() {
            currentIndex = (currentIndex + 1) % portfolioItems.length;
            updateLightboxContent();
        }

        // Zoom functions
        function zoomIn() {
            scale = Math.min(scale + 0.25, 4);
            updateTransform();
            updateZoomLevel();
            showDragHintIfNeeded();
        }

        function zoomOut() {
            scale = Math.max(scale - 0.25, 0.5);

            // If zooming out below 1.25, reset position
            if (scale <= 1.25) {
                translateX = 0;
                translateY = 0;
            }

            updateTransform();
            updateZoomLevel();
        }

        function zoomReset() {
            resetZoomAndPosition();
        }

        // Function to show drag hint
        function showDragHintIfNeeded() {
            if (scale > 1.25) {
                dragHint.style.opacity = '1';
                clearTimeout(dragTimeout);
                dragTimeout = setTimeout(() => {
                    dragHint.style.opacity = '0';
                }, 2000);
            }
        }

        // Drag functionality
        draggableContainer.addEventListener('mousedown', function(e) {
            if (scale <= 1.25) return; // Only drag if zoomed in enough

            isDragging = true;
            startX = e.clientX - translateX;
            startY = e.clientY - translateY;
            draggableContainer.style.cursor = 'grabbing';
            e.preventDefault();
        });

        document.addEventListener('mousemove', function(e) {
            if (!isDragging) return;

            translateX = e.clientX - startX;
            translateY = e.clientY - startY;

            // Limit panning to reasonable bounds
            const bounds = 1000 * (scale - 1); // Increase allowed pan area with higher zoom
            translateX = Math.max(-bounds, Math.min(bounds, translateX));
            translateY = Math.max(-bounds, Math.min(bounds, translateY));

            updateTransform();
        });

        document.addEventListener('mouseup', function() {
            isDragging = false;
            draggableContainer.style.cursor = scale > 1.25 ? 'grab' : 'default';
        });

        // Touch events for mobile
        draggableContainer.addEventListener('touchstart', function(e) {
            if (scale <= 1.25) return; // Only drag if zoomed in enough

            isDragging = true;
            startX = e.touches[0].clientX - translateX;
            startY = e.touches[0].clientY - translateY;
            e.preventDefault();
        }, {
            passive: false
        });

        document.addEventListener('touchmove', function(e) {
            if (!isDragging) return;

            translateX = e.touches[0].clientX - startX;
            translateY = e.touches[0].clientY - startY;

            // Limit panning to reasonable bounds
            const bounds = 1000 * (scale - 1); // Increase allowed pan area with higher zoom
            translateX = Math.max(-bounds, Math.min(bounds, translateX));
            translateY = Math.max(-bounds, Math.min(bounds, translateY));

            updateTransform();
            e.preventDefault();
        }, {
            passive: false
        });

        document.addEventListener('touchend', function() {
            isDragging = false;
        });

        // Event listeners
        closeBtn.addEventListener('click', closeLightbox);
        prevBtn.addEventListener('click', navigatePrev);
        nextBtn.addEventListener('click', navigateNext);
        zoomInBtn.addEventListener('click', zoomIn);
        zoomOutBtn.addEventListener('click', zoomOut);
        zoomResetBtn.addEventListener('click', zoomReset);

        // Close lightbox when clicking outside the image (but check we're not dragging)
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox && !isDragging) {
                closeLightbox();
            }
        });

        // Prevent drag from causing lightbox close
        draggableContainer.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (lightbox.classList.contains('hidden')) return;

            switch (e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    navigatePrev();
                    break;
                case 'ArrowRight':
                    navigateNext();
                    break;
                case '+':
                    zoomIn();
                    break;
                case '-':
                    zoomOut();
                    break;
                case '0':
                    zoomReset();
                    break;
            }
        });

        // Mouse wheel zoom
        lightboxImg.addEventListener('wheel', function(e) {
            e.preventDefault();

            // Get cursor position relative to image
            const rect = lightboxImg.getBoundingClientRect();
            const mouseX = e.clientX - (rect.left + rect.width / 2) - translateX;
            const mouseY = e.clientY - (rect.top + rect.height / 2) - translateY;

            // Save old scale for ratio calculation
            const oldScale = scale;

            // Zoom in or out
            if (e.deltaY < 0) {
                scale = Math.min(scale + 0.25, 4);
            } else {
                scale = Math.max(scale - 0.25, 0.5);
            }

            // If zooming out to normal size, reset position
            if (scale <= 1) {
                translateX = 0;
                translateY = 0;
            } else {
                // Adjust position to zoom toward cursor position
                const scaleRatio = scale / oldScale;
                translateX = translateX - mouseX * (scaleRatio - 1);
                translateY = translateY - mouseY * (scaleRatio - 1);
            }

            updateTransform();
            updateZoomLevel();
            showDragHintIfNeeded();

            // Update cursor style
            draggableContainer.style.cursor = scale > 1.25 ? 'grab' : 'default';
        });

        // Double click to toggle zoom
        draggableContainer.addEventListener('dblclick', function(e) {
            if (scale > 1) {
                zoomReset();
            } else {
                // Zoom in to 250% on double click
                scale = 2.5;

                // Get position of click relative to center
                const rect = lightboxImg.getBoundingClientRect();
                translateX = (rect.width / 2) - (e.clientX - rect.left);
                translateY = (rect.height / 2) - (e.clientY - rect.top);

                updateTransform();
                updateZoomLevel();
                showDragHintIfNeeded();
            }

            // Update cursor style
            draggableContainer.style.cursor = scale > 1.25 ? 'grab' : 'default';
        });
    });
</script>
