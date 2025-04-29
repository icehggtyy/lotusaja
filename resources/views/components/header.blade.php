@props(['main' => 'lotus'])
<div class="relative w-full flex justify-center items-center overflow-hidden bg-base-300 h-48">
    <!-- Wave Container -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Bottom Wave -->
        <svg class="absolute bottom-0 w-full h-24" data-aos="fade-up" data-aos-duration="1000" viewBox="0 0 1200 120"
            preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 C150,60 350,0 500,60 C650,120 750,30 900,80 C1050,130 1150,60 1200,90 L1200,120 L0,120 Z"
                class="fill-blue-600/40"></path>
            <path d="M0,30 C150,90 300,30 450,70 C600,110 750,40 900,90 C1050,140 1150,70 1200,100 L1200,120 L0,120 Z"
                class="fill-blue-500/30"></path>
        </svg>

        <!-- Left Side Wave -->
        {{-- <svg class="absolute top-0 left-0 w-1/3 h-full transform -scale-y-100" data-aos="fade-right"
            data-aos-duration="1000" viewBox="0 0 400 300" preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0,150 C50,100 100,200 150,150 C200,100 250,200 300,150 C350,100 400,180 400,250 L400,300 L0,300 Z"
                fill="#578fca"></path>
        </svg>

        <!-- Right Side Wave -->
        <svg class="absolute top-0 right-0 w-1/3 h-full transform -scale-x-100 -scale-y-100" data-aos="fade-right"
            data-aos-duration="1000" viewBox="0 0 400 300" preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0,150 C50,100 100,200 150,150 C200,100 250,200 300,150 C350,100 400,180 400,250 L400,300 L0,300 Z"
                fill="#578fca"></path>
        </svg> --}}
    </div>

    <!-- Heading -->
    <h1 class="text-base-content font-bold text-3xl z-10 py-6" data-aos="fade-down" data-aos-duration="1000">
        {{ $main }}</h1>
</div>
