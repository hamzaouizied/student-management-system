@extends('layouts.main')

@section('main-content')
    <div class="mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
            Welcome to <span class="text-primary">Student Dashboard</span>
        </h1>
        <p class="text-gray-600 mb-8">Manage and monitor your academic activities efficiently</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-10">
            <div
                class="relative bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-white/10 rounded-full"></div>
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/5 rounded-full"></div>
                <div class="p-6 relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-xl">
                            <i class="fas fa-user-graduate text-white text-2xl"></i>
                        </div>
                        <div class="text-white/70 text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> {{ rand(5, 15) }}% this month
                        </div>
                    </div>
                    <p class="text-white/80 mb-2">Total Students</p>
                    <h2 class="text-4xl font-bold text-white mb-2">{{ $studentsCount }}</h2>
                    <div class="w-full bg-white/30 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full" style="width: {{ min(($studentsCount / 100) * 10, 100) }}%">
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="relative bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-white/10 rounded-full"></div>
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/5 rounded-full"></div>
                <div class="p-6 relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-xl">
                            <i class="fas fa-book-open text-white text-2xl"></i>
                        </div>
                        <div class="text-white/70 text-sm font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> {{ rand(3, 12) }}% this month
                        </div>
                    </div>
                    <p class="text-white/80 mb-2">Total Courses</p>
                    <h2 class="text-4xl font-bold text-white mb-2">{{ $coursesCount }}</h2>
                    <div class="w-full bg-white/30 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full" style="width: {{ min(($coursesCount / 20) * 10, 100) }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Latest Students</h2>
                        <p class="text-gray-500 text-sm">Recently enrolled students</p>
                    </div>
                    <a href="{{ route('students.index') }}"
                        class="text-primary hover:text-primary-dark text-sm font-medium flex items-center">
                        View All <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($latestStudents as $student)
                            <div
                                class="bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-100 p-5 hover:border-primary/30 hover:shadow-md transition-all duration-300 group">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-r from-primary/20 to-primary/10 rounded-xl flex items-center justify-center mr-4">
                                            <span
                                                class="text-primary font-bold text-lg">{{ substr($student->full_name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-800 group-hover:text-primary transition-colors">
                                                {{ $student->full_name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">{{ $student->email }}</p>
                                        </div>
                                    </div>
                                    <div class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-1 rounded-full">
                                        Active
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-gray-800">{{ $student->courses()->count() }}</div>
                                        <div class="text-xs text-gray-500">Courses</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-gray-800">{{ rand(70, 98) }}%</div>
                                        <div class="text-xs text-gray-500">Progress</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-gray-800">A{{ rand(1, 4) }}</div>
                                        <div class="text-xs text-gray-500">Grade</div>
                                    </div>
                                </div>

                                <a href="{{ route('students.show', $student) }}"
                                    class="w-full mt-4 py-2.5 bg-primary/5 text-primary rounded-lg font-medium hover:bg-primary transition-all duration-300 text-sm">
                                    View Profile
                                </a>
                            </div>
                        @endforeach
                    </div>

                    @if($latestStudents->isEmpty())
                        <div class="text-center py-10">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-user-graduate text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-gray-500 font-medium">No students found</h3>
                            <p class="text-gray-400 text-sm mt-1">Start by adding new students</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                <h3 class="font-bold text-gray-800 mb-4">Quick Stats</h3>

                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-chart-line text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Avg. Progress</p>
                                <p class="font-bold text-gray-800">85%</p>
                            </div>
                        </div>
                        <div class="text-green-600 text-sm font-semibold">
                            +{{ rand(2, 8) }}%
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-tasks text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Assignments Due</p>
                                <p class="font-bold text-gray-800">{{ rand(3, 15) }}</p>
                            </div>
                        </div>
                        <div class="text-red-600 text-sm font-semibold">
                            {{ rand(1, 5) }} urgent
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-calendar-alt text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Events Today</p>
                                <p class="font-bold text-gray-800">{{ rand(1, 4) }}</p>
                            </div>
                        </div>
                        <div class="text-primary text-sm font-semibold">
                            {{ now()->format('h:i A') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <h3 class="font-bold text-gray-800 mb-4">Upcoming Deadlines</h3>

                <div class="space-y-4">
                    <div class="p-4 border border-orange-200 bg-orange-50 rounded-xl">
                        <div class="flex items-start justify-between mb-2">
                            <h4 class="font-semibold text-gray-800">Final Project</h4>
                            <span
                                class="bg-orange-500 text-white text-xs font-semibold px-2.5 py-1 rounded-full">Today</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">Web Development Course</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-clock mr-2"></i>
                            Due: {{ now()->format('h:i A') }}
                        </div>
                    </div>

                    <div class="p-4 border border-blue-200 bg-blue-50 rounded-xl">
                        <div class="flex items-start justify-between mb-2">
                            <h4 class="font-semibold text-gray-800">Mid-term Exam</h4>
                            <span
                                class="bg-blue-500 text-white text-xs font-semibold px-2.5 py-1 rounded-full">Tomorrow</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">Database Management</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-clock mr-2"></i>
                            Due: {{ now()->addDay()->format('M d, h:i A') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Latest Courses</h2>
                    <p class="text-gray-500 text-sm">Recently added courses with enrollment details</p>
                </div>
                <a href="{{ route('courses.index') }}"
                    class="text-primary hover:text-primary-dark text-sm font-medium flex items-center">
                    Browse All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($latestCourses as $course)
                        <div
                            class="group relative bg-gradient-to-b from-white to-gray-50 rounded-xl border border-gray-100 hover:border-primary/30 hover:shadow-xl transition-all duration-500 overflow-hidden">
                            <div class="p-5">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-r from-primary/20 to-primary/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-book text-primary"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h3
                                                    class="font-bold text-gray-800 group-hover:text-primary transition-colors line-clamp-1">
                                                    {{ $course->title }}
                                                </h3>
                                                <p class="text-xs text-gray-500">
                                                    Ref: <span class="font-mono">{{ $course->course_ref }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                            {{ Str::limit($course->description ?? 'No description available', 80) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center text-sm">
                                        <div class="w-6 text-gray-400">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                        <span class="text-gray-600">Instructor:</span>
                                        <span class="font-semibold ml-2">{{ $course->instructor }}</span>
                                    </div>

                                    <div class="flex items-center text-sm">
                                        <div class="w-6 text-gray-400">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <span class="text-gray-600">Enrolled:</span>
                                        <span class="font-bold text-green-600 ml-2">{{ $course->students_count }}
                                            students</span>
                                    </div>

                                    <div class="flex items-center text-sm">
                                        <div class="w-6 text-gray-400">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-600">Rating:</span>
                                        <div class="ml-2 flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i <= rand(3, 5) ? 'text-yellow-400' : 'text-gray-300' }} text-xs"></i>
                                            @endfor
                                            <span class="text-gray-600 text-xs ml-1">({{ rand(15, 45) }})</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="flex justify-between text-xs text-gray-500 mb-1">
                                        <span>Course Completion</span>
                                        <span>{{ rand(40, 95) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-primary to-primary-dark h-2 rounded-full"
                                            style="width: {{ rand(40, 95) }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 py-4 bg-gray-50 border-t border-gray-100 flex justify-between">
                                <button
                                    class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary-dark transition-colors duration-300 flex-1 mr-2">
                                    <i class="fas fa-eye mr-2"></i> View Details
                                </button>
                            </div>

                            <div class="absolute top-4 right-4">
                                @php
                                    $badges = [
                                        'bg-green-100 text-green-800' => 'Active',
                                        'bg-blue-100 text-blue-800' => 'Popular',
                                        'bg-purple-100 text-purple-800' => 'New'
                                    ];
                                    $badge = array_rand($badges);
                                @endphp
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badge }}">
                                    {{ $badges[$badge] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($latestCourses->isEmpty())
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-book text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-gray-500 font-medium">No courses available</h3>
                        <p class="text-gray-400 text-sm mt-1">Create your first course to get started</p>
                        <button
                            class="mt-4 px-6 py-3 bg-primary text-white rounded-xl font-medium hover:bg-primary-dark transition-colors">
                            <i class="fas fa-plus mr-2"></i> Add New Course
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-8 bg-gradient-to-r from-primary/5 to-primary/10 border border-primary/20 rounded-2xl p-6">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Need help managing your courses?</h3>
                <p class="text-gray-600">Check out our documentation or contact support</p>
            </div>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <button
                    class="px-6 py-3 bg-white border border-primary text-primary rounded-xl font-medium hover:bg-primary hover:text-white transition-all duration-300">
                    <i class="fas fa-question-circle mr-2"></i> Help Center
                </button>
                <button
                    class="px-6 py-3 bg-primary text-white rounded-xl font-medium hover:bg-primary-dark transition-colors duration-300">
                    <i class="fas fa-plus-circle mr-2"></i> Add Student
                </button>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .hover\:shadow-xl {
            transition: box-shadow 0.3s ease;
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.group').hover(
                function () {
                    $(this).find('.group-hover\\:text-primary').addClass('text-primary');
                },
                function () {
                    $(this).find('.group-hover\\:text-primary').removeClass('text-primary');
                }
            );

            function animateProgressBars() {
                $('.bg-gradient-to-r').each(function () {
                    const width = $(this).css('width');
                    $(this).css('width', '0');

                    setTimeout(() => {
                        $(this).animate({
                            width: width
                        }, 1000);
                    }, 300);
                });
            }

            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            $(window).scroll(function () {
                $('.bg-gradient-to-r').each(function () {
                    if (isInViewport(this) && !$(this).hasClass('animated')) {
                        $(this).addClass('animated');
                        const width = $(this).attr('style').match(/width: (\d+)%/)[1];
                        $(this).css('width', '0');
                        $(this).animate({
                            width: width + '%'
                        }, 1000);
                    }
                });
            });

            setTimeout(animateProgressBars, 500);
        });
    </script>
@endpush