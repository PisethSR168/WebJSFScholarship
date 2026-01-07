@extends('layouts.web')

@section('content')
    <!-- Hero / Swiper -->
    <section id="home" class="relative">
        <div class="swiper mySwiper h-[60vh] md:h-[70vh]">
            <div class="swiper-wrapper">
                <!-- slide 1: image -->
                <div class="swiper-slide relative">
                    <img src="{{ asset('img/University.png') }}" alt="slide" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-black/30 flex items-center">
                        <div class="max-w-4xl mx-auto px-6 text-white" data-aos="fade-up">
                            <h1 class="text-3xl md:text-5xl font-bold">JSF Scholarship</h1>
                            <p class="mt-3 max-w-2xl">A community place for learning, culture and togetherness.</p>
                            <div class="mt-4">
                                <a href="#about" class="inline-block px-4 py-2 bg-indigo-600 rounded-md">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slide 2: video -->
                <div class="swiper-slide relative">
                    <video class="hero-video" autoplay muted loop playsinline>
                        <source src="{{ asset('video/hero-video.mp4') }}"
                            type="video/mp4">
                    </video>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end">
                        <div class="max-w-4xl mx-auto px-6 pb-12 text-white" data-aos="fade-up">
                            <h2 class="text-2xl md:text-4xl font-semibold">Activities & Classes</h2>
                            <p class="mt-2">Join our workshops, classes and community events.</p>
                        </div>
                    </div>
                </div>

                <!-- slide 3: image -->
                <div class="swiper-slide relative">
                    <img src="{{ asset('img/backgroudweb.jpg') }}" alt="slide" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-black/25 flex items-center">
                        <div class="max-w-4xl mx-auto px-6 text-white" data-aos="fade-up">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4">Community & Culture</h2>
                            <p class="mt-2">Celebrating local knowledge and traditions.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pagination / navigation -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- News Section with Cool Cards -->
    <!-- <section id="news" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4" data-aos="fade-up">Latest News</h2>
            <p class="text-gray-600 dark:text-gray-400 text-center mb-12 max-w-2xl mx-auto" data-aos="fade-up"
                data-aos-delay="100">
                Stay updated with the latest happenings and achievements at JSF Scholarship
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> -->
                <!-- News Card 1 -->
                <!-- <div class="news-card bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80"
                            alt="Computer Lab" class="news-image w-full">
                        <div class="news-date px-4 pt-4">Oct 10, 2023</div>
                    </div>
                    <div class="news-content px-4 pb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">New Computer Lab Opening
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                            We're excited to announce the opening of our new state-of-the-art computer lab,
                            equipped with the latest technology to enhance our students' digital literacy skills.
                        </p>
                        <a href="#" class="read-more-btn">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div> -->

                <!-- News Card 2 -->
                <!-- <div class="news-card bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Science Competition" class="news-image w-full">
                        <div class="news-date px-4 pt-4">Sep 25, 2023</div>
                    </div>
                    <div class="news-content px-4 pb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Student Achievements in
                            National Competition</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                            Congratulations to our students who won top honors in the National Science Competition,
                            showcasing their exceptional knowledge and skills.
                        </p>
                        <a href="#" class="read-more-btn">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div> -->

                <!-- News Card 3 -->
                <!-- <div class="news-card bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Parent Teacher Meeting" class="news-image w-full">
                        <div class="news-date px-4 pt-4">Sep 15, 2023</div>
                    </div>
                    <div class="news-content px-4 pb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Parent-Teacher Meeting
                            Schedule</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                            The upcoming parent-teacher meetings have been scheduled. Please check the school
                            notice board for your allocated time slot.
                        </p>
                        <a href="#" class="read-more-btn">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- View All News Button -->
            <!-- <div class="text-center mt-12" data-aos="fade-up">
                <a href="#"
                    class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 dark:text-blue-400 dark:border-blue-400 rounded-lg hover:bg-blue-600 hover:text-white dark:hover:bg-blue-400 dark:hover:text-gray-900 transition duration-300 font-medium">
                    View All News <i class="fas fa-newspaper ml-2"></i>
                </a>
            </div>
        </div>
    </section> -->

    <!-- Activities & Events Section -->
    <!-- <section id="events" class="py-16 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">Activities & Events</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 p-3 rounded-lg mb-4">
                        <p class="font-bold">October 15, 2023</p>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Annual Sports Day</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Join us for a day of fun, games, and healthy
                        competition.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">Learn
                        More</a>
                </div>

                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 p-3 rounded-lg mb-4">
                        <p class="font-bold">November 5, 2023</p>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Science Fair</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Showcasing innovative projects from our
                        talented students.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">Learn
                        More</a>
                </div>

                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 p-3 rounded-lg mb-4">
                        <p class="font-bold">December 20, 2023</p>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Winter Concert</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Enjoy performances by our music and drama
                        students.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">Learn
                        More</a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Our Staff Section -->
    <section id="staff" class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">Our Management Team
            </h2>
            <div class="swiper staffSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="{{ asset('img/mrjoel.jpg') }}"
                                alt="Principal" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Mr. Joel</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Board Director of JSF</p>
                            <p class="text-gray-600 dark:text-gray-400">I am deeply passionate about developing my spiritual practice by helping young people pursue their education. I provide mentorship and support, empowering them to succeed academically.</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="{{ asset('img/mrnen.jpg') }}"
                                alt="Teacher" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Mr. Neou Nen</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Founder of JSF</p>
                            <p class="text-gray-600 dark:text-gray-400">Passionate about inspiring smiles, teaching English, leadership development, and creating positive change through education and digital content.</p>
                        </div>
                    </div>

                    <!-- <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="https://images.unsplash.com/photo-1544717390-1c8b4c5caf7b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                alt="Teacher" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Mr. Anan</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Science Teacher</p>
                            <p class="text-gray-600 dark:text-gray-400">Dedicated to making science accessible and
                                exciting for all students.</p>
                        </div>
                    </div> -->

                    <!-- <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80"
                                alt="Teacher" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Ms. Srey</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Mathematics Teacher</p>
                            <p class="text-gray-600 dark:text-gray-400">Making complex mathematical concepts simple
                                and understandable.</p>
                        </div>
                    </div> -->

                    <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="{{ asset('img/piseth.jpg') }}" alt="Teacher"
                                class="w-32 h-32 rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Mr.Song Piseth </h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Cyber & Development</p>
                            <p class="text-gray-600 dark:text-gray-400">Passionate about helping students build a strong foundation in cybersecurity and coding for website development and problem solving.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination mt-6"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- Top Students Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">Current Awardees</h2>

            <div class="swiper studentSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
<div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center student-card">
    <img src="{{ asset('img/Chhorn Ponchai.jpg') }}" alt="Portrait of Chhorn Ponchai" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110">
    <h4 class="text-xl font-bold text-gray-800 dark:text-white">Chhorn Ponchai</h4>
    <p class="text-blue-600 dark:text-blue-400 mb-2">Architecture</p>
    <p class="text-gray-600 dark:text-gray-400">I'm 18 years old and currently studying Architecture at Build Bright University. My key skills include technical design and effective communication.</p>
</div>
                    </div>

                    <div class="swiper-slide">
<div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center student-card">
    <img src="{{ asset('img/sophanit.jpg') }}" alt="Portrait of Nery Sophanit" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110">
    <h4 class="text-xl font-bold text-gray-800 dark:text-white">Nery Sophanit</h4>
    <p class="text-blue-600 dark:text-blue-400 mb-2">Civil Engineering & Construction</p>
    <p class="text-gray-600 dark:text-gray-400">I'm 20 years old and currently studying Civil Engineering and Construction at Build Bright University. My key skills include structural planning and project management.</p>
</div>
                    </div>

                    <!-- <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="{{ asset('img/rith.jpg') }}"
                                alt="Student" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Rith</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Grade 9 - Mathematics</p>
                            <p class="text-gray-600 dark:text-gray-400">Gold medalist in International Math
                                Challenge</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="{{ asset('img/mrjoel.jpg') }}"
                                alt="Student" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Sophea</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Grade 12 - Literature</p>
                            <p class="text-gray-600 dark:text-gray-400">Published poet and winner of Creative
                                Writing Award</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg text-center student-card">
                            <img src="{{ asset('img/mrjoel.jpg') }}"
                                alt="Student" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">Chan</h4>
                            <p class="text-blue-600 dark:text-blue-400 mb-2">Grade 8 - Technology</p>
                            <p class="text-gray-600 dark:text-gray-400">Developed award-winning mobile app for
                                community service</p>
                        </div>
                    </div> -->
                </div>
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
<section id="about" class="py-16 bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">
            About JSF Scholarship
        </h2>

        <!-- Combined grid for better structure -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- History Text -->
            <div data-aos="fade-right">
                <h3 id="history" class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
                    Our History
                </h3>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    The history of the JFS Scholarship Foundation began in 2025 when I faced financial challenges 
                    in supporting my nephews' university education. Recognizing the importance of higher education, 
                    I initially reached out to Joel and his family for assistance. However, I hesitated, feeling 
                    it might not be appropriate to ask for help specifically for my nephews.
                </p>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Instead of seeking personal aid, on 12 November 2025, I envisioned creating a broader impact. 
                    I realized that many young individuals encounter similar obstacles in pursuing their academic 
                    goals. This inspired me to establish the Joel Scholarship Foundation (JFS Scholarship), aimed 
                    at providing financial support to deserving students eager to further their education.
                </p>
                <p class="text-gray-700 dark:text-gray-300">
                    The foundation embodies the spirit of community and empowerment, helping potential young 
                    leaders overcome financial barriers and achieve their dreams.
                </p>
            </div>
            
            <!-- History Image -->
            <div data-aos="fade-left" class="order-first md:order-last">
                <img 
                    src="{{ asset('img/History.jpg') }}"
                    alt="Students studying together in a library"
                    class="w-full h-auto md:h-96 object-cover rounded-lg shadow-lg"
                >
            </div>
        </div>

        <!-- Mission & Vision Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <!-- Mission Image -->
            <div data-aos="fade-right">
                <img 
                    src="{{ asset('img/Mission.jpg ') }}"
                    alt="Students collaborating on a project"
                    class="w-full h-auto md:h-96 object-cover rounded-lg shadow-lg"
                >
            </div>
            
            <!-- Mission Text -->
            <div data-aos="fade-left">
                <h3 id="mission" class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
                    Mission & Vision
                </h3>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    <strong class="text-blue-600 dark:text-blue-400">Vision:</strong> 
                    To see every underprivileged youth in rural Cambodia achieve their full potential through quality education, becoming leaders who drive positive change in their communities.
                </p>
                <p class="text-gray-700 dark:text-gray-300">
                    <strong class="text-blue-600 dark:text-blue-400">Mission:</strong> 
                    We identify, support, and empower talented students from rural Cambodian communities by providing comprehensive financial assistance for higher education, while fostering a culture of academic excellence, social responsibility, and community service. 
                </p>
            </div>
        </div>
    </div>
</section>

    <!-- Gallery Section -->
    <!-- <section id="gallery" class="py-16 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">Photo Gallery</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <a href="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                    data-fancybox="gallery" class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                        alt="School Building"
                        class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">
                </a>

                <a href="https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                    data-fancybox="gallery" class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in"
                    data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                        alt="Students Learning"
                        class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">
                </a>

                <a href="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2064&q=80"
                    data-fancybox="gallery" class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in"
                    data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                        alt="Classroom" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">
                </a>

                <a href="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                    data-fancybox="gallery" class="overflow-hidden rounded-lg shadow-lg" data-aos="zoom-in"
                    data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                        alt="School Event"
                        class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">
                </a>
            </div>
        </div>
    </section> -->
@endsection

@push('scripts')
    <script></script>
@endpush