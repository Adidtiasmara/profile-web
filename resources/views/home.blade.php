<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - {{ $profile->name }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/github-calendar@latest/dist/github-calendar-responsive.css" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                },
            },
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Animasi Melayang */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float 10s ease-in-out infinite;
        }

        .animate-float-mid {
            animation: float 8s ease-in-out infinite;
        }

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1e4ed8;
            border-radius: 10px;
        }

        /* GitHub Calendar Styling */
        .contrib-column {
            border: none !important;
            color: #9ca3af !important;
        }

        .contrib-number {
            color: #60a5fa !important;
        }

        .ContributionCalendar-day[data-level="0"] {
            fill: #1f2937 !important;
        }

        .ContributionCalendar-day[data-level="1"] {
            fill: #1e3a8a !important;
        }

        .ContributionCalendar-day[data-level="2"] {
            fill: #1d4ed8 !important;
        }

        .ContributionCalendar-day[data-level="3"] {
            fill: #2563eb !important;
        }

        .ContributionCalendar-day[data-level="4"] {
            fill: #3b82f6 !important;
        }

        .calendar text {
            fill: #9ca3af !important;
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
<nav class="fixed top-0 left-0 w-full z-50 backdrop-blur-xl bg-black/30 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-sm font-bold tracking-widest text-white">
            {{ $profile->name }}
        </h1>
        <div class="flex gap-6 text-xs font-mono text-gray-400">
            <a href="#activity" class="hover:text-blue-400 transition">Profile</a>
            <a href="#skills" class="hover:text-blue-400 transition">Skills</a>
        </div>
    </div>
</nav>

<body class="bg-[#0b0f1a] text-gray-100 scroll-smooth overflow-x-hidden">

    <section
        class="h-screen flex flex-col justify-center items-center text-center bg-gradient-to-br from-black via-[#0b0f1a] to-blue-900 px-6 relative group overflow-hidden">

        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-20 left-[10%] animate-float-slow opacity-20">
                <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
            </div>
            <div class="absolute top-40 right-[15%] animate-float-mid opacity-15">
                <svg class="w-20 h-20 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                </svg>
            </div>
        </div>

        <div class="z-10 transition-all duration-700 group-hover:scale-[1.01]">
            <span
                class="inline-block px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-mono mb-6 tracking-[0.2em] uppercase animate-pulse">
                Ready for Collaboration
            </span>

            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                Hi, I'm <span class="text-blue-500">{{ $profile->name }}</span> <br>
                {{-- <span class="text-gray-300 text-3xl md:text-5xl font-light">
                    {{ $profile->title }}
                </span> --}}

                <div class="flex flex-wrap justify-center gap-3 mt-4">
                    @foreach ($profile->skills->take(3) as $skill)
                        <span
                            class="px-4 py-1 text-sm bg-blue-500/10 border border-blue-500/20 rounded-full text-blue-400">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            </h1>
            <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <a href="#activity"
                    class="flex items-center gap-2 bg-blue-600 px-10 py-4 rounded-full font-bold text-white hover:bg-blue-500 hover:shadow-[0_0_40px_rgba(37,99,235,0.6)] transition-all">
                    Lihat Profil Lengkap
                </a>
                <a href="https://github.com/{{ $profile->github_username }}" target="_blank"
                    class="flex items-center gap-2 px-10 py-4 rounded-full font-bold text-gray-300 border border-gray-700 hover:bg-white/5 transition-all font-mono text-sm">
                    Kunjungi GitHub ↗
                </a>
            </div>
        </div>
    </section>

    <section id="activity" class="bg-[#0b0f1a] py-24 text-white border-t border-blue-900/30">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-4xl font-extrabold text-white mb-20 text-center tracking-tight">
                My <span class="text-blue-500">Profile</span>
            </h2>

            <div class="grid lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-5">
                    <div
                        class="bg-gray-900/40 p-10 rounded-[3rem] shadow-2xl border border-blue-500/20 backdrop-blur-xl transition-all duration-500 hover:border-blue-500/50">
                        <div class="text-center">
                            @if ($profile->photo)
                                <img src="{{ asset('storage/' . $profile->photo) }}"
                                    class="w-52 h-52 rounded-[2.5rem] mx-auto mb-8 object-cover border-4 border-blue-600 shadow-[0_0_25px_rgba(37,99,235,0.4)]">
                            @endif

                            <h3 class="text-4xl font-bold text-white mb-2 tracking-tight">{{ $profile->name }}</h3>
                            <p class="text-blue-400 font-bold tracking-widest uppercase text-xs mb-8">
                                {{ $profile->title }}</p>

                            <p class="text-gray-400 text-sm mb-6 font-medium">
                                {{ $profile->age }} Years Old • {{ $profile->origin }}
                            </p>

                            <p
                                class="text-gray-200 leading-relaxed text-left text-lg font-light italic bg-blue-500/5 p-6 rounded-2xl border border-blue-500/10">
                                "{{ $profile->bio }}"
                            </p>

                            <div class="flex flex-wrap gap-4 mt-8 justify-center border-t border-blue-900/30 pt-8">
                                @if ($profile->linkedin)
                                    <a href="https://linkedin.com/in/{{ $profile->linkedin }}" target="_blank"
                                        class="group flex items-center gap-3 text-gray-400 hover:text-blue-400 transition-all duration-300">
                                        <div
                                            class="p-2 rounded-lg bg-blue-500/10 border border-blue-500/20 group-hover:shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="font-mono text-xs group-hover:underline">in/{{ $profile->linkedin }}</span>
                                    </a>
                                @endif

                                @if ($profile->instagram)
                                    <a href="https://instagram.com/{{ $profile->instagram }}" target="_blank"
                                        class="group flex items-center gap-3 text-gray-400 hover:text-pink-500 transition-all duration-300">
                                        <div
                                            class="p-2 rounded-lg bg-pink-500/10 border border-pink-500/20 group-hover:shadow-[0_0_15px_rgba(236,72,153,0.4)] transition-all">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                            </svg>
                                        </div>
                                        <span class="font-mono text-xs group-hover:underline">@
                                            {{ $profile->instagram }}</span>
                                    </a>
                                @endif

                                @if ($profile->email)
                                    <a href="mailto:{{ $profile->email }}"
                                        class="group flex items-center gap-3 text-gray-400 hover:text-green-400 transition-all duration-300">
                                        <div
                                            class="p-2 rounded-lg bg-green-500/10 border border-green-500/20 group-hover:shadow-[0_0_15px_rgba(74,222,128,0.4)] transition-all">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path
                                                    d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="font-mono text-xs group-hover:underline">{{ $profile->email }}</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    @if ($github)
                        <div
                            class="bg-gray-900/40 p-10 rounded-[3rem] shadow-2xl border border-blue-500/10 backdrop-blur-md transition-all duration-500 hover:border-blue-500/40">

                            <div class="flex items-center gap-6 mb-12 border-b border-gray-800/50 pb-10">
                                <img src="{{ $github['avatar_url'] }}"
                                    class="w-24 h-24 rounded-2xl border-2 border-blue-500 shadow-lg">

                                <div class="flex flex-col gap-4">
                                    <div>
                                        <h3 class="text-3xl font-bold text-white tracking-tight leading-none">
                                            {{ $github['name'] ?? $github['login'] }}</h3>
                                        <p class="text-blue-400 font-mono text-sm mt-1 opacity-80">@
                                            {{ $github['login'] }}</p>
                                    </div>

                                    <div class="flex gap-3 font-mono">
                                        <div
                                            class="px-4 py-2 bg-gray-800/60 rounded-xl border border-gray-700 min-w-[80px] text-center">
                                            <p class="text-xl font-bold text-blue-400 leading-none">
                                                {{ $github['public_repos'] }}</p>
                                            <p class="text-[9px] uppercase tracking-widest text-gray-500 mt-1">Repos
                                            </p>
                                        </div>
                                        <div
                                            class="px-4 py-2 bg-gray-800/60 rounded-xl border border-gray-700 min-w-[80px] text-center">
                                            <p class="text-xl font-bold text-blue-400 leading-none">
                                                {{ $github['followers'] }}</p>
                                            <p class="text-[9px] uppercase tracking-widest text-gray-500 mt-1">
                                                Followers
                                            </p>
                                        </div>
                                        <div
                                            class="px-4 py-2 bg-gray-800/60 rounded-xl border border-gray-700 min-w-[80px] text-center">
                                            <p class="text-xl font-bold text-blue-400 leading-none">
                                                {{ $github['following'] ?? '7' }}</p>
                                            <p class="text-[9px] uppercase tracking-widest text-gray-500 mt-1">
                                                Following</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-12">
                                <h4
                                    class="text-xs font-bold text-gray-500 uppercase tracking-[0.3em] mb-6 border-l-4 border-blue-600 pl-4">
                                    Contribution Heatmap</h4>
                                <div id="github-activity"
                                    class="text-gray-400 overflow-x-auto bg-gray-800/30 p-8 rounded-[2rem] border border-gray-700/30 custom-scrollbar">
                                    <p class="animate-pulse py-6 text-center text-sm italic">Syncing GitHub data...</p>
                                </div>
                            </div>

                            <div class="grid xl:grid-cols-2 items-center gap-12">
                                <div class="text-left">
                                    <h4
                                        class="text-xs font-bold text-gray-500 uppercase tracking-[0.3em] mb-4 border-l-4 border-blue-600 pl-4">
                                        Top Languages</h4>
                                    <p class="text-gray-400 text-sm mb-8 leading-relaxed font-light">Teknologi yang
                                        sering digunakan dalam pengembangan sistem lab.</p>
                                    <div id="chart-legend"
                                        class="grid grid-cols-2 gap-4 text-[10px] font-mono uppercase tracking-widest">
                                    </div>
                                </div>
                                <div class="flex justify-center transition-transform duration-500 hover:scale-105">
                                    <canvas id="languageChart" style="max-width:240px; max-height:240px;"></canvas>
                                </div>
                            </div>

                            <a href="{{ $github['html_url'] }}" target="_blank"
                                class="block text-center mt-12 bg-blue-600/10 border border-blue-600/30 text-blue-400 px-8 py-5 rounded-2xl hover:bg-blue-600 hover:text-white transition-all font-bold uppercase tracking-widest text-xs">
                                View Full GitHub Profile ↗
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="bg-[#0b0f1a] py-24 border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-4xl font-extrabold mb-16 text-center text-white">
                My <span class="text-blue-500">Projects</span>
            </h2>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-10">

                @foreach ($projects as $project)
                    <div
                        class="group relative bg-gray-900/40 border border-gray-800 rounded-3xl overflow-hidden hover:border-blue-500/40 transition-all duration-500">

                        {{-- Thumbnail --}}
                        @if ($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                        @endif

                        <div class="p-6">

                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-white mb-2 group-hover:text-blue-400 transition">
                                {{ $project->title }}
                            </h3>

                            {{-- Description --}}
                            <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                                {{ Str::limit($project->description, 100) }}
                            </p>

                            {{-- Tech --}}
                            @if ($project->tech)
                                <div class="flex flex-wrap gap-2 mb-5">
                                    @foreach (explode(',', $project->tech) as $tech)
                                        <span
                                            class="text-[10px] px-3 py-1 rounded-full bg-blue-600/10 text-blue-400 border border-blue-500/20 font-mono">
                                            {{ trim($tech) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Actions --}}
                            <div class="flex gap-3">
                                @if ($project->github)
                                    <a href="{{ $project->github }}" target="_blank"
                                        class="text-xs font-mono text-gray-400 hover:text-blue-400 transition">
                                        GitHub ↗
                                    </a>
                                @endif

                                @if ($project->demo)
                                    <a href="{{ $project->demo }}" target="_blank"
                                        class="text-xs font-mono text-gray-400 hover:text-green-400 transition">
                                        Live Demo ↗
                                    </a>
                                @endif
                            </div>

                        </div>

                        {{-- Hover Glow --}}
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 pointer-events-none bg-gradient-to-br from-blue-600/10 to-transparent">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="bg-[#0b0f1a] py-24 border-t border-gray-900">

        <p class="text-gray-300 text-2xl font-light">
            @foreach ($profile->skills as $skill)
                <span>{{ $skill->name }}</span>
                @if (!$loop->last)
                    <span class="mx-2 text-blue-500">•</span>
                @endif
            @endforeach
        </p>
    </section>

    <footer
        class="bg-black py-12 text-center text-gray-500 text-[10px] tracking-[0.3em] uppercase border-t border-gray-900">
        &copy; {{ date('Y') }} {{ $profile->name }}. <br>
        <span class="mt-4 block opacity-40">Made with Polinema Business Analytics Lab.</span>
    </footer>

    <script src="https://unpkg.com/github-calendar@latest/dist/github-calendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const githubUsername = "{{ $profile->github_username }}";

            if (githubUsername) {
                GitHubCalendar("#github-activity", githubUsername, {
                    responsive: true,
                    tooltips: true
                }).catch(() => {
                    document.getElementById('github-activity').innerHTML = "Gagal memuat activity.";
                });
            }

            const ctx = document.getElementById('languageChart').getContext('2d');
            const langData = {!! json_encode($github['languages'] ?? []) !!};

            const labels = Object.keys(langData);
            const values = Object.values(langData);
            const colors = ['#1e4ed8', '#2563eb', '#3b82f6', '#60a5fa', '#93c5fd', '#bfdbfe'];

            if (labels.length > 0) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: colors,
                            borderColor: '#0b0f1a',
                            borderWidth: 4,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        devicePixelRatio: 2, // Memaksa render lebih tajam
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '80%',
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                enabled: true,
                                backgroundColor: 'rgba(17, 24, 39, 0.9)', // Warna gelap agar kontras
                                titleFont: {
                                    size: 14,
                                    family: "'Plus Jakarta Sans'"
                                },
                                bodyFont: {
                                    size: 13,
                                    family: "'Plus Jakarta Sans'"
                                },
                                padding: 12,
                                cornerRadius: 10,
                                displayColors: false
                            }
                        }
                    }
                });

                const legendContainer = document.getElementById('chart-legend');
                labels.forEach((label, i) => {
                    legendContainer.innerHTML += `
                        <div class="flex items-center gap-2 group/leg cursor-default">
                            <span class="w-2 h-2 rounded-full" style="background:${colors[i % colors.length]}"></span>
                            <span class="text-gray-400 group-hover/leg:text-blue-400 transition-colors truncate font-mono">${label}</span>
                        </div>
                    `;
                });
            }
        });
    </script>
</body>

</html>
