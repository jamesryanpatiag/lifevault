<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeVault - Streamline Your Life Insurance Business</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #d1d5db; /* Tailwind's gray-300 */
        }
    </style>
</head>
<body class="bg-gray-900 antialiased">

    <!-- Navigation Bar -->
    <header class="bg-gray-950 shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-100 tracking-wide">
                <img src="{{ asset('images/logo.png') }}" alt="LifeVault Logo" class="h-20 inline-block mr-2">
            </a>
            <a href="{{ route('admin') }}" class="bg-yellow-400 text-black font-semibold py-2 px-6 rounded-full shadow-md hover:bg-yellow-500 transition duration-300">
                Sign In
            </a>
        </nav>
    </header>

    <!-- Hero Section -->
    <main>
        <section class="bg-gray-900 py-16 md:py-24 text-center">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight">
                        Secure Your Future, Streamline Your Business.
                        <span class="text-yellow-400">LifeVault for Life Insurance Agents.</span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                        The all-in-one information system designed to help you manage clients, track policies, and grow your practice with confidence.
                    </p>
                    <a href="#signup" class="inline-block bg-yellow-400 text-black font-semibold py-3 px-8 rounded-full text-lg shadow-xl hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                        Get Started Free
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 md:py-24 bg-gray-950">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-12">Why Choose LifeVault?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature Card 1 -->
                    <div class="bg-gray-800 rounded-xl shadow-lg p-8 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-yellow-400 flex items-center justify-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292m0 5.292a4 4 0 110-5.292M12 4.354a4 4 0 110 5.292m0 5.292a4 4 0 110-5.292m0 5.292a4 4 0 110-5.292m0 5.292a4 4 0 110-5.292" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-2 text-white">Client Management</h3>
                        <p class="text-gray-300 text-center">Keep all client information in one secure, accessible place. From contact details to policy history, everything you need is just a click away.</p>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="bg-gray-800 rounded-xl shadow-lg p-8 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-yellow-400 flex items-center justify-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-4a2 2 0 012-2h2a2 2 0 012 2v4m-5 0h4m-4 0v-4a2 2 0 012-2h2a2 2 0 012 2v4m-5 0h4" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-2 text-white">Policy Tracking</h3>
                        <p class="text-gray-300 text-center">Never miss a renewal or a follow-up. Our intuitive dashboard provides real-time insights into your policy portfolio.</p>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="bg-gray-800 rounded-xl shadow-lg p-8 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-yellow-400 flex items-center justify-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13H9.001c-.247 0-.482.046-.708.133L16.292 9.708a9.001 9.001 0 01-1.292 3.292z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-2 text-white">Performance Analytics</h3>
                        <p class="text-gray-300 text-center">Gain a clear view of your business health. Track commissions, set goals, and identify opportunities for growth.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-16 md:py-24 bg-gray-900">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-12">What Our Agents Are Saying</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Testimonial Card 1 -->
                    <div class="bg-gray-800 rounded-xl shadow-lg p-8">
                        <p class="text-gray-300 text-lg italic mb-4">"LifeVault has transformed how I manage my clients. I'm more organized and efficient than ever before. This system is a game-changer for anyone serious about their career."</p>
                        <p class="font-semibold text-gray-200">- Jane Doe, Senior Agent</p>
                    </div>
                    <!-- Testimonial Card 2 -->
                    <div class="bg-gray-800 rounded-xl shadow-lg p-8">
                        <p class="text-gray-300 text-lg italic mb-4">"The analytics feature is a game-changer. I finally have a clear picture of my sales performance and where to focus my efforts. Highly recommend LifeVault!"</p>
                        <p class="font-semibold text-gray-200">- John Smith, Top Producer</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section id="signup" class="py-16 md:py-24 bg-gray-950 text-white text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to take your business to the next level?</h2>
                <p class="text-lg md:text-xl mb-8 opacity-90">Join LifeVault and start building a more secure and prosperous future today.</p>
                <a href="#" class="inline-block bg-yellow-400 text-black font-semibold py-3 px-8 rounded-full text-lg shadow-xl hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                    Sign Up Now
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-950 text-gray-400 py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 LifeVault. All rights reserved.</p>
            <div class="mt-4 space-x-4">
                <a href="#" class="hover:text-yellow-400 transition duration-200">About</a>
                <a href="#" class="hover:text-yellow-400 transition duration-200">Contact</a>
                <a href="#" class="hover:text-yellow-400 transition duration-200">Privacy Policy</a>
            </div>
        </div>
    </footer>

</body>
</html>
