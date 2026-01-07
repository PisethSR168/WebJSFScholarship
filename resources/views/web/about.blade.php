@extends('layouts.web')

@section('content')
    <style>
        /* Hero Section */
        .hero-gradient {
            background: linear-gradient(135deg, #ffffff 75%, #e0f2fe 100%);
        }
        
        .dark .hero-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1e40af 100%);
        }
        
        /* History Section */
        .history-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
        }
        
        .dark .history-gradient {
            background: linear-gradient(135deg, #020617 0%, #1e3a8a 100%);
        }
        
        /* Gradient Text */
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
        
        /* Card Hover Effects */
        .card-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .dark .card-hover:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        /* Floating Animation */
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        /* Timeline */
        .timeline-item {
            position: relative;
            padding-left: 2.5rem;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #3b82f6;
            border: 3px solid white;
            z-index: 2;
        }
        
        .dark .timeline-item::before {
            border: 3px solid #1f2937;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            left: 7px;
            top: 1.8rem;
            width: 2px;
            height: calc(100% - 0.8rem);
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
            transition: max-height 0.5s ease-out;
        }
        
        .timeline-content.open {
            max-height: 500px;
            transition: max-height 0.8s ease-in;
        }
        
        .arrow {
            transition: transform 0.3s ease;
        }
        
        .arrow.rotate {
            transform: rotate(180deg);
        }
        
        /* Value Cards */
        .value-card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .value-card-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        
        .value-card-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }
        
        .value-card-pink {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
        }
        
        .value-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }
        
        .value-card-icon {
            transition: all 0.5s ease;
        }
        
        .value-card:hover .value-card-icon {
            transform: scale(1.1) rotate(-5deg);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeIn {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        
        /* Objectives Section */
        .objectives-gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .number-badge {
            position: absolute;
            top: -12px;
            right: -12px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.25rem;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        /* Divider */
        .gradient-divider {
            height: 3px;
            background: linear-gradient(90deg, transparent, #3b82f6, #a855f7, transparent);
            border-radius: 2px;
        }
        
        /* Icon Circles */
        .icon-circle {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        
        /* Mission Vision Cards */
        .mission-card, .vision-card {
            height: 100%;
            min-height: 320px;
        }
        
        /* Section Spacing */
        section {
            scroll-margin-top: 80px;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-gradient py-20 md:py-24">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 gradient-text">
                    About Joel Scholarship Foundation
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    Dedicated to empowering underprivileged youth from rural areas of Cambodia by providing financial support for their higher education at universities in Siem Reap.
                </p>
                <div class="mb-10">
                    <p class="text-2xl font-semibold text-blue-600 dark:text-blue-400 italic">
                        "Supporting Dreams, Shaping Leaders"
                    </p>
                </div>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#history"
                        class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-lg hover:shadow-xl dark:bg-gray-800 dark:text-blue-300 dark:hover:bg-gray-700">
                        Our History
                    </a>
                    <a href="#values"
                        class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-lg hover:shadow-xl dark:bg-gray-800 dark:text-blue-300 dark:hover:bg-gray-700">
                        Core Values
                    </a>
                    <a href="#objectives"
                        class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-lg hover:shadow-xl dark:bg-gray-800 dark:text-blue-300 dark:hover:bg-gray-700">
                        Objectives
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16">
                <span class="inline-block px-6 py-2 bg-blue-600 text-white rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                    Our Purpose
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Vision & Mission<span class="text-blue-600 dark:text-blue-400"></span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Guiding principles that shape our educational approach and future aspirations
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Vision Card -->
                <div class="vision-card bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-8 card-hover text-white shadow-xl">
                    <div class="icon-circle mb-6 floating">
                        <i class="fas fa-eye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center">Vision</h3>
                    <p class="text-green-100 leading-relaxed text-center mb-4">
                        To see every underprivileged youth in rural Cambodia achieve their full potential through quality education, becoming leaders who drive positive change in their communities.
                    </p>
                    <div class="mt-6 pt-6 border-t border-white/30">
                        <p class="text-sm text-green-100 italic text-center">
                            Building a future where education knows no boundaries
                        </p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="mission-card bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-8 card-hover text-white shadow-xl">
                    <div class="icon-circle mb-6 floating" style="animation-delay: 0.2s;">
                        <i class="fas fa-bullseye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center">Mission</h3>
                    <p class="text-blue-100 leading-relaxed text-center mb-4">
                        We identify, support, and empower talented students from rural Cambodian communities by providing comprehensive financial assistance for higher education, while fostering a culture of academic excellence, social responsibility, and community service.
                    </p>
                    <div class="mt-6 pt-6 border-t border-white/30">
                        <p class="text-sm text-blue-100 italic text-center">
                            Transforming lives through education and opportunity
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section id="history" class="py-20 history-gradient">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Journey</h2>
                <p class="text-xl text-blue-200 max-w-2xl mx-auto">
                    The story of how we began and our commitment to educational empowerment
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-history text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white">Foundation Story</h3>
                    </div>
                    <p class="text-blue-100 text-lg leading-relaxed mb-6">
                        The Joel Scholarship Foundation was established with a clear vision: to bridge the educational gap between urban and rural Cambodia. Recognizing the immense potential of young minds in remote areas, we set out to create opportunities for higher education that were previously inaccessible.
                    </p>
                    <p class="text-blue-100 text-lg leading-relaxed">
                        Our approach goes beyond just financial support. We provide comprehensive assistance including mentorship, career guidance, and community engagement programs, ensuring our scholars not only succeed academically but also develop into well-rounded individuals who give back to their communities.
                    </p>
                    <div class="mt-8 pt-8 border-t border-white/20">
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-400 text-sm"></i>
                                </div>
                                <span class="text-white">Rural Focus</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-400 text-sm"></i>
                                </div>
                                <span class="text-white">Holistic Support</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-400 text-sm"></i>
                                </div>
                                <span class="text-white">Sustainable Impact</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Our Timeline</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Key milestones in our journey of educational empowerment
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-12">
                    <!-- 2025 -->
                    <div class="timeline-item" data-aos="fade-right">
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg card-hover">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-rocket text-blue-600 dark:text-blue-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-blue-600 dark:text-blue-400">ESTABLISHED</div>
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">2025</h3>
                                    </div>
                                </div>
                                <div class="bg-blue-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
                                    Foundation Year
                                </div>
                            </div>
                            
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Foundation & Research Phase</h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Established the foundation with comprehensive research on educational barriers in rural Cambodia. Developed our sustainable support model and established partnerships with local communities.
                            </p>
                            
                            <div id="content-2025" class="timeline-content">
                                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg">
                                    <h5 class="font-semibold text-blue-800 dark:text-blue-300 mb-2">Key Achievements:</h5>
                                    <ul class="list-disc pl-5 text-gray-700 dark:text-gray-300 space-y-1">
                                        <li>Conducted needs assessment across 15 rural communities</li>
                                        <li>Established partnership framework with 3 universities</li>
                                        <li>Developed scholarship selection criteria</li>
                                        <li>Created mentorship program structure</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <button onclick="toggleContent('2025')" 
                                    class="mt-4 flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-semibold transition duration-300">
                                <span id="text-2025">Read More</span>
                                <svg id="arrow-2025" class="arrow w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- 2026 -->
                    <div class="timeline-item" data-aos="fade-left">
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg card-hover">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-users text-green-600 dark:text-green-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-green-600 dark:text-green-400">EXPANSION</div>
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">2026</h3>
                                    </div>
                                </div>
                                <div class="bg-green-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
                                    Growth Phase
                                </div>
                            </div>
                            
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-3">Program Launch & Expansion</h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Launched our first scholarship program, welcoming the inaugural cohort of scholars. Expanded our reach to additional rural communities and strengthened university partnerships.
                            </p>
                            
                            <div id="content-2026" class="timeline-content">
                                <div class="mt-4 p-4 bg-green-50 dark:bg-green-900/30 rounded-lg">
                                    <h5 class="font-semibold text-green-800 dark:text-green-300 mb-2">Key Achievements:</h5>
                                    <ul class="list-disc pl-5 text-gray-700 dark:text-gray-300 space-y-1">
                                        <li>Awarded scholarships to 25 talented students</li>
                                        <li>Established partnerships with 5 universities</li>
                                        <li>Launched community service program</li>
                                        <li>Expanded to 3 new provinces</li>
                                        <li>Introduced alumni mentorship network</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <button onclick="toggleContent('2026')" 
                                    class="mt-4 flex items-center text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 font-semibold transition duration-300">
                                <span id="text-2026">Read More</span>
                                <svg id="arrow-2026" class="arrow w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section id="values" class="py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                    Our Foundation
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Core Values<span class="text-purple-600 dark:text-purple-400"></span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    The guiding principles that shape our approach and define our impact
                </p>
                <div class="gradient-divider max-w-md mx-auto mt-8"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Generosity -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl card-hover" data-aos="fade-up"
                    data-aos-delay="100">
                    <div
                        class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg value-card-icon">
                        <i class="fas fa-heart text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                        Generosity
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center mb-6">
                        We believe in the transformative power of giving. Our scholars are encouraged to share their
                        knowledge, skills, and resources with their communities, creating a cycle of generosity that
                        uplifts everyone.
                    </p>
                    <div class="text-center">
                        <i class="fas fa-hand-holding-heart text-2xl text-gray-400 dark:text-gray-500 opacity-75"></i>
                    </div>
                </div>

                <!-- Perseverance -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg value-card-icon">
                        <i class="fas fa-mountain text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                        Perseverance
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-purple-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center mb-6">
                        We celebrate resilience and determination. Our scholars learn to overcome challenges, adapt to obstacles, and persist in their educational journey, building character and strength that lasts a lifetime.
                    </p>
                    <div class="text-center">
                        <i class="fas fa-trophy text-2xl text-gray-400 dark:text-gray-500 opacity-75"></i>
                    </div>
                </div>

                <!-- Unity -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg value-card-icon">
                        <i class="fas fa-users text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                        Unity
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-pink-500 to-pink-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center mb-6">
                        We believe in the power of community. By working together, supporting each other, and sharing common goals, we create stronger networks and more sustainable impact that benefits entire communities.
                    </p>
                    <div class="text-center">
                        <i class="fas fa-handshake text-2xl text-gray-400 dark:text-gray-500 opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section id="objectives" class="py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16">
                <span class="inline-block px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full text-sm font-bold uppercase tracking-wider mb-4 shadow-lg">
                    Our Focus Areas
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Strategic Objectives<span class="objectives-gradient-text"></span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-8">
                    Three core pillars that guide our mission to transform lives through education
                </p>
                <div class="gradient-divider max-w-md mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Objective 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl card-hover relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="number-badge pulse-animation">1</div>
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-hand-holding-usd text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                        Financial Support
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center mb-6">
                        Provide comprehensive scholarships covering tuition, accommodation, study materials, and living expenses for students from rural and disadvantaged backgrounds.
                    </p>
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center text-blue-600 dark:text-blue-400">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="font-semibold">Full Support System</span>
                        </div>
                    </div>
                </div>

                <!-- Objective 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl card-hover relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="number-badge pulse-animation" style="animation-delay: 0.2s;">2</div>
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                        Higher Education Access
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-purple-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center mb-6">
                        Promote and facilitate access to quality higher education, emphasizing its role in personal development, career advancement, and community improvement.
                    </p>
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center text-purple-600 dark:text-purple-400">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="font-semibold">Education Advocacy</span>
                        </div>
                    </div>
                </div>

                <!-- Objective 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl card-hover relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="number-badge pulse-animation" style="animation-delay: 0.4s;">3</div>
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-hands-helping text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                        Community Engagement
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-pink-500 to-pink-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center mb-6">
                        Foster a culture of social responsibility by engaging scholars in community service, mentorship programs, and initiatives that give back to their communities.
                    </p>
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-center text-pink-600 dark:text-pink-400">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="font-semibold">Social Impact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <!-- <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center text-white" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Join Us in Making a Difference
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Together, we can empower more students, transform more lives, and build stronger communities through education.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#"
                        class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 shadow-lg hover:shadow-xl">
                        Support Our Mission
                    </a>
                    <a href="#"
                        class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white/10 transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section> -->

    <script>
        function toggleContent(year) {
            const content = document.getElementById(`content-${year}`);
            const text = document.getElementById(`text-${year}`);
            const arrow = document.getElementById(`arrow-${year}`);
            
            if (content.classList.contains('open')) {
                content.classList.remove('open');
                text.textContent = 'Read More';
                arrow.classList.remove('rotate');
            } else {
                // Close any other open sections
                document.querySelectorAll('.timeline-content.open').forEach(el => {
                    if (el.id !== `content-${year}`) {
                        el.classList.remove('open');
                        const otherYear = el.id.replace('content-', '');
                        document.getElementById(`text-${otherYear}`).textContent = 'Read More';
                        document.getElementById(`arrow-${otherYear}`).classList.remove('rotate');
                    }
                });
                
                content.classList.add('open');
                text.textContent = 'Show Less';
                arrow.classList.add('rotate');
            }
        }

        // Initialize AOS animations
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        }
    </script>
@endsection