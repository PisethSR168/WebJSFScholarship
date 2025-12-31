@extends('layouts.web')

@section('content')
    <style>
        .history-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
        }

        .dark .history-gradient {
            background: linear-gradient(135deg, #020617 0%, #1e3a8a 100%);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 25%, #60a5fa 50%, #d8bc1dff 75%, #d1d1cdff 100%);
        }

        .dark .hero-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1e40af 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .dark .card-hover:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translate(0, 0px);
            }

            50% {
                transform: translate(0, -10px);
            }

            100% {
                transform: translate(0, -0px);
            }
        }

        .gradient-text {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .dark .gradient-text {
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .timeline-item {
            position: relative;
            padding-left: 2rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #3b82f6;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 1.5rem;
            width: 2px;
            height: calc(100% - 1rem);
            background: #e5e7eb;
        }

        .dark .timeline-item::after {
            background: #374151;
        }

        .timeline-item:last-child::after {
            display: none;
        }

        .timeline-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .timeline-content.open {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
        
        .arrow {
            transition: transform 0.3s ease;
        }
        
        .arrow.rotate {
            transform: rotate(180deg);
        }

        .value-card {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.5s ease;
            background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(255,255,255,0.9));
        }

        .value-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), rgba(255,255,255,0));
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .value-card:hover::after {
            opacity: 1;
        }

        .value-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0,0,0,0.25);
        }

        .icon-container {
            position: relative;
            z-index: 1;
            transition: all 0.5s ease;
        }

        .value-card:hover .icon-container {
            transform: scale(1.1) rotate(-5deg);
        }

        .value-card-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
        }

        .value-card-purple {
            background: linear-gradient(135deg, #a855f7 0%, #c084fc 100%);
        }

        .value-card-pink {
            background: linear-gradient(135deg, #ec4899 0%, #f472b6 100%);
        }

        .arrow-btn {
            transition: all 0.3s ease;
        }

        .value-card:hover .arrow-btn {
            transform: translateX(8px);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeInUp 0.8s ease forwards;
        }

        .delay-1 { animation-delay: 0.1s; opacity: 0; }
        .delay-2 { animation-delay: 0.3s; opacity: 0; }
        .delay-3 { animation-delay: 0.5s; opacity: 0; }

        .gradient-border {
            background: linear-gradient(90deg, transparent, #3b82f6, #a855f7, transparent);
            height: 3px;
            border-radius: 2px;
        }

        .objective-card {
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .objective-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .objective-card:hover::before {
            opacity: 1;
        }
        
        .objective-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .dark .objective-card:hover {
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }
        
        .icon-wrapper {
            transition: all 0.4s ease;
        }
        
        .objective-card:hover .icon-wrapper {
            transform: scale(1.15) rotate(10deg);
        }
        
        .number-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            z-index: 10;
        }

        .dark .number-badge {
            box-shadow: 0 4px 15px rgba(0,0,0,0.6);
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        .objectives-gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .divider-line {
            height: 3px;
            background: linear-gradient(90deg, transparent, #667eea, #764ba2, transparent);
            margin: 2rem 0;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 gradient-text">About Joel Scholarship Foundation</h1>
                <p class="text-xl text-blue-50 mb-8">Dedicated to empowering underprivileged youth from rural areas of Cambodia by providing financial support for their higher education at universities in Siem Reap.</p>
                <div class="mb-8">
                    <p class="text-lg text-blue-100 italic">"Supporting Dreams, Shaping Leaders"</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#history"
                        class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 dark:bg-gray-800 dark:text-blue-300 dark:hover:bg-gray-700">
                        History
                    </a>
                    <a href="#values"
                        class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 dark:bg-gray-800 dark:text-blue-300 dark:hover:bg-gray-700">
                        Core Values
                    </a>
                    <a href="#objectives"
                        class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 dark:bg-gray-800 dark:text-blue-300 dark:hover:bg-gray-700">
                        Objectives
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section id="history" class="py-16 history-gradient text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our History</h2>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols gap-8">
                    <div data-aos="fade-right">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 h-full relative overflow-hidden">
                            <div class="absolute top-4 right-4 text-green-300 opacity-20">
                                <i class="fas fa-quote-left text-4xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-6 flex items-center">
                                <i class="fas fa-seedling mr-3 text-green-300"></i>
                                Joel Scholarship Foundation
                            </h3>
                            <p class="text-blue-100 mb-6 text-lg leading-relaxed text-justify">The Joel Scholarship Foundation is dedicated to empowering underprivileged youth from rural areas of Cambodia by providing financial support for their higher education at universities in Siem Reap. Our mission is to remove financial barriers that prevent talented young individuals from pursuing their academic goals and to foster a culture of community responsibility among our scholarship recipients.</p>
                            <div class="absolute bottom-4 right-4 text-green-300 opacity-20">
                                <i class="fas fa-quote-right text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section id="values" class="py-24 bg-gradient-to-br from-gray-50 via-blue-50 to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Header -->
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="inline-block text-sm font-bold text-blue-600 dark:text-blue-400 mb-4 uppercase tracking-widest">
                    Our Foundation
                </span>
                <h2 class="text-5xl md:text-6xl font-black mb-6">
                    <span class="text-gray-900 dark:text-white">Core </span>
                    <span class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-xl shadow-lg">Values</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-8">
                    The principles that define who we are and guide everything we do
                </p>
                <div class="gradient-border max-w-md mx-auto"></div>
            </div>

            <!-- Values Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
                <!-- Generosity Card -->
                <div class="value-card value-card-blue text-white shadow-2xl animate-fadeIn delay-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-10">
                        <!-- Icon -->
                        <div class="icon-container mb-8">
                            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto">
                                <i class="fas fa-heart text-5xl text-white"></i>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-3xl font-bold mb-6 text-center">Generosity</h3>

                        <!-- Divider -->
                        <div class="w-20 h-1 bg-white/40 mx-auto mb-6 rounded-full"></div>

                        <!-- Description -->
                        <p class="text-lg leading-relaxed text-blue-50 text-center mb-8">
                            We emphasize the value of giving, we encourage our scholars to share their knowledge and resources with others in need.
                        </p>

                        <!-- Arrow Button -->
                        <div class="text-center">
                            <button class="arrow-btn inline-flex items-center justify-center w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full transition-all">
                                <i class="fas fa-arrow-right text-white text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Perseverance Card -->
                <div class="value-card value-card-purple text-white shadow-2xl animate-fadeIn delay-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="p-10">
                        <!-- Icon -->
                        <div class="icon-container mb-8">
                            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto">
                                <i class="fas fa-mountain text-5xl text-white"></i>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-3xl font-bold mb-6 text-center">Perseverance</h3>

                        <!-- Divider -->
                        <div class="w-20 h-1 bg-white/40 mx-auto mb-6 rounded-full"></div>

                        <!-- Description -->
                        <p class="text-lg leading-relaxed text-purple-50 text-center mb-8">
                            We celebrate the spirit of resilience, inspiring students to overcome challenges and pursue their educational goals with determination.
                        </p>

                        <!-- Arrow Button -->
                        <div class="text-center">
                            <button class="arrow-btn inline-flex items-center justify-center w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full transition-all">
                                <i class="fas fa-arrow-right text-white text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Unity Card -->
                <div class="value-card value-card-pink text-white shadow-2xl animate-fadeIn delay-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="p-10">
                        <!-- Icon -->
                        <div class="icon-container mb-8">
                            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto">
                                <i class="fas fa-users text-5xl text-white"></i>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-3xl font-bold mb-6 text-center">Unity</h3>

                        <!-- Divider -->
                        <div class="w-20 h-1 bg-white/40 mx-auto mb-6 rounded-full"></div>

                        <!-- Description -->
                        <p class="text-lg leading-relaxed text-pink-50 text-center mb-8">
                            We foster collaboration and community spirit, recognizing that working together strengthens our impact and creates lasting change.
                        </p>

                        <!-- Arrow Button -->
                        <div class="text-center">
                            <button class="arrow-btn inline-flex items-center justify-center w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full transition-all">
                                <i class="fas fa-arrow-right text-white text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-16 history-gradient text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Journey Timeline</h2>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="mt-16" data-aos="fade-up">
                    <div class="space-y-8">
                        <div class="timeline-item" data-aos="fade-right">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                                <div class="flex items-center mb-3">
                                    <div class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        2025</div>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Foundation</h4>
                                <p class="text-gray-600 dark:text-gray-300">Joel Scholarship Foundation established with
                                    focus on rural education access and higher education opportunities.</p>
                                
                                <!-- Dropdown Content -->
                                <div id="content-2025" class="timeline-content mt-3">
                                    <p class="text-gray-600 dark:text-gray-200">
                                        Our foundation began with a vision to bridge the educational gap between urban and rural communities. We started by conducting comprehensive research on the barriers faced by talented students in remote areas and developed a sustainable model for support.
                                    </p>
                                </div>
                                
                                <!-- See More Button -->
                                <button onclick="toggleContent('2025')" class="flex items-center mt-3 text-blue-600 dark:text-blue-400 hover:underline focus:outline-none">
                                    <span id="text-2025">See more...</span>
                                    <svg id="arrow-2025" class="arrow w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="timeline-item" data-aos="fade-left">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                                <div class="flex items-center mb-3">
                                    <div class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        2026</div>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Expansion</h4>
                                <p class="text-gray-600 dark:text-gray-300">Launched scholarship program and established
                                    university partnerships, expanding reach to rural communities across Cambodia.</p>
                                
                                <!-- Dropdown Content -->
                                <div id="content-2026" class="timeline-content mt-3">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Our initial cohort of scholars began their studies at partner universities in Siem Reap, receiving full financial support including tuition, accommodation, and living expenses. This marked the beginning of our comprehensive support system designed to ensure academic success and personal development.
                                    </p>
                                </div>
                                
                                <!-- See More Button -->
                                <button onclick="toggleContent('2026')" class="flex items-center mt-3 text-blue-600 dark:text-blue-400 hover:underline focus:outline-none">
                                    <span id="text-2026">See more...</span>
                                    <svg id="arrow-2026" class="arrow w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section id="objectives" class="py-20 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center mb-6">
                    <div class="h-1 w-12 bg-gradient-to-r from-blue-600 to-purple-600 mr-3"></div>
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wider shadow-lg">
                        What We Do
                    </span>
                    <div class="h-1 w-12 bg-gradient-to-r from-purple-600 to-pink-600 ml-3"></div>
                </div>
                <h2 class="text-5xl md:text-6xl font-extrabold mb-6">
                    <span class="objectives-gradient-text">Our Objectives</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Three core pillars that drive our mission to transform lives through education
                </p>
                <div class="divider-line"></div>
            </div>

            <!-- Objectives Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Objective 1: Financial Support -->
                <div class="objective-card bg-white dark:bg-gray-800 rounded-3xl shadow-2xl dark:shadow-xl p-8 relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="number-badge pulse-animation">1</div>
                    
                    <div class="icon-wrapper w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-xl dark:shadow-lg">
                        <i class="fas fa-hand-holding-usd text-white text-4xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 text-center">
                        Provide Financial Support
                    </h3>
                    
                    <div class="h-1 w-16 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto mb-6 rounded-full"></div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center">
                        Offer scholarships to cover tuition and educational expenses for students from rural areas and disadvantaged families.
                    </p>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center text-blue-600 dark:text-blue-400">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="text-sm font-semibold">Full Scholarship Coverage</span>
                        </div>
                    </div>
                </div>

                <!-- Objective 2: Encourage Higher Education -->
                <div class="objective-card bg-white dark:bg-gray-800 rounded-3xl shadow-2xl dark:shadow-xl p-8 relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="number-badge pulse-animation" style="animation-delay: 0.2s;">2</div>
                    
                    <div class="icon-wrapper w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl dark:shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-4xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 text-center">
                        Encourage Higher Education
                    </h3>
                    
                    <div class="h-1 w-16 bg-gradient-to-r from-purple-500 to-purple-600 mx-auto mb-6 rounded-full"></div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center">
                        Promote the significance of higher education in improving lives and communities.
                    </p>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center text-purple-600 dark:text-purple-400">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="text-sm font-semibold">Transforming Communities</span>
                        </div>
                    </div>
                </div>

                <!-- Objective 3: Community Responsibility -->
                <div class="objective-card bg-white dark:bg-gray-800 rounded-3xl shadow-2xl dark:shadow-xl p-8 relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="number-badge pulse-animation" style="animation-delay: 0.4s;">3</div>
                    
                    <div class="icon-wrapper w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl dark:shadow-lg">
                        <i class="fas fa-hands-helping text-white text-4xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 text-center">
                        Foster Community Responsibility
                    </h3>
                    
                    <div class="h-1 w-16 bg-gradient-to-r from-pink-500 to-pink-600 mx-auto mb-6 rounded-full"></div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center">
                        Inspire scholarship recipients to engage in community service, help others and make a difference in their communities.
                    </p>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center text-pink-600 dark:text-pink-400">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="text-sm font-semibold">Giving Back Together</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleContent(year) {
            const content = document.getElementById(`content-${year}`);
            const text = document.getElementById(`text-${year}`);
            const arrow = document.getElementById(`arrow-${year}`);
            
            if (content.classList.contains('open')) {
                content.classList.remove('open');
                text.textContent = 'See more...';
                arrow.classList.remove('rotate');
            } else {
                content.classList.add('open');
                text.textContent = 'See less';
                arrow.classList.add('rotate');
            }
        }
    </script>
@endsection