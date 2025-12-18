<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff8000',
                        secondary: '#f97316',
                        dark: '#111827',
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glass-effect {
            background: rgba(255, 128, 0, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 128, 0, 0.1);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #111827 0%, #1e293b 50%, #111827 100%);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .course-card {
            transition: all 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(255, 128, 0, 0.1);
        }

        .typewriter-text {
            border-right: 3px solid #ff8000;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-dark text-gray-100">
    <nav class="fixed w-full z-50 glass-effect">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-primary p-2 rounded-lg animate-pulse-slow">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">Student<span class="text-primary">Manage</span></h1>
                        <p class="text-xs text-gray-400">Laravel Powered</p>
                    </div>
                </div>
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-6 py-2 border border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition-all duration-300">
                                Log in
                            </a>
                        @endauth
                    </nav>
                @endif

            </div>

            <div id="mobileMenu" class="hidden lg:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#" class="text-gray-300 hover:text-primary py-2 border-b border-gray-800 nav-link">Home</a>
                    <a href="#"
                        class="text-gray-300 hover:text-primary py-2 border-b border-gray-800 nav-link">Features</a>
                    <a href="#"
                        class="text-gray-300 hover:text-primary py-2 border-b border-gray-800 nav-link">Courses</a>
                    <a href="#"
                        class="text-gray-300 hover:text-primary py-2 border-b border-gray-800 nav-link">Dashboard</a>
                    <a href="#"
                        class="text-gray-300 hover:text-primary py-2 border-b border-gray-800 nav-link">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-gradient pt-24 pb-16 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <div class="inline-block bg-primary/10 border border-primary/20 rounded-full px-4 py-2 mb-6">
                        <span class="text-primary text-sm font-semibold"><i class="fas fa-rocket mr-2"></i> Laravel 10
                            Ready</span>
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Welcome to
                        <span class="text-primary typewriter-text" id="typewriter"></span>
                    </h1>

                    <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                        The ultimate Laravel-powered student management system. Track courses, manage assignments, and
                        achieve academic excellence with our intuitive platform.
                    </p>

                    <div class="flex flex-wrap gap-4 mb-10">
                        <button id="getStartedBtn"
                            class="px-8 py-4 bg-primary text-white rounded-lg hover:bg-secondary transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl flex items-center">
                            <i class="fas fa-play-circle mr-3"></i>
                            Get Started Now
                        </button>
                        <button id="watchDemoBtn"
                            class="px-8 py-4 border border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition-all duration-300 flex items-center">
                            <i class="fas fa-video mr-3"></i>
                            Watch Demo
                        </button>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1" id="studentCount">0</div>
                            <div class="text-gray-400">Active Students</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1" id="courseCount">0</div>
                            <div class="text-gray-400">Courses</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1" id="successRate">0%</div>
                            <div class="text-gray-400">Success Rate</div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 relative">
                    <div class="relative animate-float">
                        <div
                            class="absolute -inset-4 bg-gradient-to-r from-primary to-transparent rounded-2xl opacity-20 blur-xl">
                        </div>
                        <img id="studentImage" src="http://student-managelebt-system.test/img/student.png"
                            alt="Student Dashboard"
                            class="relative rounded-2xl shadow-2xl w-full max-w-2xl mx-auto border-2 border-primary/20">
                    </div>

                    <div
                        class="absolute -top-4 -left-4 w-24 h-24 bg-primary/10 rounded-full border border-primary/20 animate-pulse">
                    </div>
                    <div
                        class="absolute -bottom-4 -right-4 w-32 h-32 bg-primary/5 rounded-full border border-primary/10 animate-pulse">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Powerful Features for <span class="text-primary">Student
                        Success</span></h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">Everything you need to manage your academic journey
                    in one place</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="feature-card bg-gray-900 rounded-xl p-8 border border-gray-800 hover:border-primary/30">
                    <div
                        class="feature-icon bg-primary/10 text-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Course Management</h3>
                    <p class="text-gray-400 mb-4">Organize all your courses, materials, and schedules in one intuitive
                        dashboard.</p>
                    <a href="#" class="text-primary hover:text-secondary flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="feature-card bg-gray-900 rounded-xl p-8 border border-gray-800 hover:border-primary/30">
                    <div
                        class="feature-icon bg-primary/10 text-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Progress Analytics</h3>
                    <p class="text-gray-400 mb-4">Track your academic progress with detailed analytics and performance
                        insights.</p>
                    <a href="#" class="text-primary hover:text-secondary flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="feature-card bg-gray-900 rounded-xl p-8 border border-gray-800 hover:border-primary/30">
                    <div
                        class="feature-icon bg-primary/10 text-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-tasks text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Assignment Tracker</h3>
                    <p class="text-gray-400 mb-4">Never miss deadlines with smart reminders and submission tracking.</p>
                    <a href="#" class="text-primary hover:text-secondary flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="feature-card bg-gray-900 rounded-xl p-8 border border-gray-800 hover:border-primary/30">
                    <div
                        class="feature-icon bg-primary/10 text-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-comments text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Instructor Connect</h3>
                    <p class="text-gray-400 mb-4">Direct communication with instructors for feedback and guidance.</p>
                    <a href="#" class="text-primary hover:text-secondary flex items-center">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-900/50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Featured <span class="text-primary">Courses</span></h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">Explore our most popular courses</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="coursesContainer">
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div
                class="bg-gradient-to-r from-primary/10 to-primary/5 border border-primary/20 rounded-3xl p-12 text-center">
                <h2 class="text-4xl font-bold mb-6">Ready to Start Your Journey?</h2>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">Join thousands of students who are already
                    managing their academic success with our platform.</p>

                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <button id="finalSignupBtn"
                        class="px-10 py-4 bg-primary text-white rounded-xl hover:bg-secondary transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl text-lg font-semibold">
                        <i class="fas fa-user-plus mr-3"></i>
                        Create Free Account
                    </button>
                    <button id="contactBtn"
                        class="px-10 py-4 border-2 border-primary text-primary rounded-xl hover:bg-primary hover:text-white transition-all duration-300 text-lg font-semibold">
                        <i class="fas fa-envelope mr-3"></i>
                        Contact Sales
                    </button>
                </div>

                <p class="text-gray-400 mt-8">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Secure & Privacy Focused • 14-day free trial • No credit card required
                </p>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="bg-primary p-2 rounded-lg">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">Student<span class="text-primary">Manage</span></h2>
                            <p class="text-gray-400">Built with Laravel & Tailwind</p>
                        </div>
                    </div>
                    <p class="text-gray-500">© 2023 Student Management System. All rights reserved.</p>
                </div>

                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-primary text-2xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary text-2xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary text-2xl">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary text-2xl">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function () {
            const texts = ["StudentManage", "Your Dashboard", "Success Portal", "Laravel System"];
            let count = 0;
            let index = 0;
            let currentText = '';
            let letter = '';

            function typeWriter() {
                if (count === texts.length) {
                    count = 0;
                }
                currentText = texts[count];
                letter = currentText.slice(0, ++index);

                $('#typewriter').text(letter);

                if (letter.length === currentText.length) {
                    setTimeout(() => {
                        index = 0;
                        count++;
                        setTimeout(typeWriter, 500);
                    }, 2000);
                } else {
                    setTimeout(typeWriter, 100);
                }
            }

            typeWriter();

            function animateCounter(elementId, target, duration) {
                let start = 0;
                const increment = target / (duration / 16);
                const element = $(elementId);

                const timer = setInterval(() => {
                    start += increment;
                    if (start >= target) {
                        element.text(target);
                        clearInterval(timer);
                    } else {
                        element.text(Math.floor(start));
                    }
                }, 16);
            }

            let countersAnimated = false;

            function checkCounters() {
                const counterSection = $('.hero-gradient');
                const scrollPos = $(window).scrollTop();
                const windowHeight = $(window).height();
                const sectionPos = counterSection.offset().top;

                if (!countersAnimated && scrollPos + windowHeight > sectionPos + 100) {
                    animateCounter('#studentCount', 5000, 2000);
                    animateCounter('#courseCount', 120, 1500);

                    let percent = 0;
                    const percentTimer = setInterval(() => {
                        percent += 1;
                        $('#successRate').text(percent + '%');
                        if (percent >= 98) {
                            clearInterval(percentTimer);
                        }
                    }, 20);

                    countersAnimated = true;
                }
            }

            const courses = [
                {
                    title: "Web Development",
                    desc: "Master HTML, CSS, JavaScript & modern frameworks",
                    icon: "fas fa-code",
                    students: 1250
                },
                {
                    title: "Data Science",
                    desc: "Python, ML, and data visualization techniques",
                    icon: "fas fa-chart-bar",
                    students: 890
                },
                {
                    title: "Mobile Apps",
                    desc: "Build iOS & Android apps with React Native",
                    icon: "fas fa-mobile-alt",
                    students: 1100
                }
            ];

            courses.forEach(course => {
                $('#coursesContainer').append(`
                    <div class="course-card bg-dark rounded-xl p-6 border border-gray-800 hover:border-primary/50">
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-primary/10 p-3 rounded-lg">
                                <i class="${course.icon} text-primary text-2xl"></i>
                            </div>
                            <span class="bg-primary/20 text-primary text-sm font-semibold px-3 py-1 rounded-full">
                                <i class="fas fa-users mr-1"></i> ${course.students}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">${course.title}</h3>
                        <p class="text-gray-400 mb-6">${course.desc}</p>
                        <button class="w-full py-3 bg-primary/10 text-primary rounded-lg hover:bg-primary hover:text-white transition-all duration-300 course-enroll-btn">
                            <i class="fas fa-plus mr-2"></i> Enroll Now
                        </button>
                    </div>
                `);
            });

            $('#loginBtn, #signupBtn, #getStartedBtn, #watchDemoBtn, #finalSignupBtn, #contactBtn').click(function (e) {
                e.preventDefault();
                const btnId = $(this).attr('id');
                const messages = {
                    'loginBtn': 'Redirecting to login page...',
                    'signupBtn': 'Opening registration form...',
                    'getStartedBtn': 'Starting your journey!',
                    'watchDemoBtn': 'Playing demo video...',
                    'finalSignupBtn': 'Creating your free account...',
                    'contactBtn': 'Opening contact form...'
                };

                $('body').append(`
                    <div class="fixed top-4 right-4 bg-primary text-white px-6 py-3 rounded-lg shadow-xl z-50 notification">
                        <i class="fas fa-check-circle mr-2"></i>
                        ${messages[btnId] || 'Action triggered!'}
                    </div>
                `);

                setTimeout(() => {
                    $('.notification').fadeOut(300, function () {
                        $(this).remove();
                    });
                }, 3000);
            });

            $(document).on('click', '.course-enroll-btn', function () {
                const courseTitle = $(this).closest('.course-card').find('h3').text();
                alert(`Enrolling in: ${courseTitle}\nFeature coming soon!`);
            });

            $('.nav-link').hover(
                function () {
                    $(this).addClass('text-primary').css('transform', 'translateY(-2px)');
                },
                function () {
                    $(this).removeClass('text-primary').css('transform', 'translateY(0)');
                }
            );

            $(window).scroll(function () {
                checkCounters();

                if ($(this).scrollTop() > 50) {
                    $('nav').addClass('bg-dark/95 backdrop-blur-md');
                } else {
                    $('nav').removeClass('bg-dark/95 backdrop-blur-md');
                }

                $('.feature-card, .course-card').each(function () {
                    const elementTop = $(this).offset().top;
                    const elementBottom = elementTop + $(this).outerHeight();
                    const viewportTop = $(window).scrollTop();
                    const viewportBottom = viewportTop + $(window).height();

                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('opacity-100 translate-y-0');
                    }
                });
            });

            $('.feature-card, .course-card').addClass('opacity-0 translate-y-8 transition-all duration-700');

            $(window).trigger('scroll');

            $('#studentImage').hover(
                function () {
                    $(this).css('transform', 'scale(1.02)');
                },
                function () {
                    $(this).css('transform', 'scale(1)');
                }
            );

            $('a[href^="#"]').click(function (e) {
                e.preventDefault();
                const target = $(this).attr('href');
                if (target !== '#') {
                    $('html, body').animate({
                        scrollTop: $(target).offset().top - 80
                    }, 800);
                }
            });
        });
    </script>
</body>

</html>