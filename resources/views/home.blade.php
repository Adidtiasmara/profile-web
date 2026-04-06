<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - {{ $profile->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://unpkg.com/github-calendar@latest/dist/github-calendar-responsive.css" />
    <style>
        /* Animasi Melayang untuk Card */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* Custom Scrollbar untuk Heatmap */
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1e4ed8;
            border-radius: 10px;
        }

        /* Styling GitHub Calendar */
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
    </style>
</head>

<body class="bg-[#0b0f1a] text-gray-100 scroll-smooth overflow-x-hidden">

    <section
        class="h-screen flex flex-col justify-center items-center text-center bg-gradient-to-br from-black via-[#0b0f1a] to-blue-900 px-6 relative group overflow-hidden">
        <div
            class="absolute w-96 h-96 bg-blue-600/10 rounded-full blur-[120px] -top-20 -left-20 transition-all duration-700 group-hover:bg-blue-500/30 group-hover:scale-150">
        </div>
        <div
            class="absolute w-96 h-96 bg-blue-900/10 rounded-full blur-[120px] -bottom-20 -right-20 transition-all duration-700 group-hover:bg-blue-400/20 group-hover:scale-150">
        </div>

        <div class="z-10 transition-all duration-500 group-hover:scale-105">
            <h1 class="text-6xl font-extrabold mb-4 text-white tracking-tight">
                Halo, Saya <span class="text-blue-500">{{ $profile->name }}</span>
            </h1>
            <p class="text-2xl text-blue-300 mb-4 font-light">{{ $profile->title }}</p>
            <p class="text-sm text-gray-500 font-mono mb-8 opacity-60 group-hover:opacity-100 transition-opacity">//
                github.com/{{ $profile->github_username }}</p>

            <a href="#activity"
                class="inline-block bg-blue-600 px-10 py-4 rounded-full font-bold text-white hover:bg-blue-500 hover:shadow-[0_0_40px_rgba(37,99,235,0.6)] transition-all duration-300">
                Jelajahi Profil ↓
            </a>
        </div>
    </section>

    <section id="activity" class="bg-[#0b0f1a] py-24 text-white border-t border-blue-900/30 group">
        <div class="max-w-7xl mx-auto px-8">
            <h2
                class="text-4xl font-extrabold text-white mb-20 text-center tracking-tight transition-all duration-500 group-hover:scale-110 group-hover:translate-y-[-10px]">
                My <span class="text-blue-500">Activity Hub</span>
            </h2>

            <div class="grid lg:grid-cols-12 gap-12 items-start">

                <div class="lg:col-span-5">
                    <div
                        class="animate-float bg-gray-900/40 p-12 rounded-[3rem] shadow-2xl border border-blue-500/20 backdrop-blur-xl transition-all duration-500 hover:scale-[1.03] hover:border-blue-500/50 hover:shadow-[0_0_50px_rgba(30,64,175,0.3)]">
                        <div class="text-center">
                            @if ($profile->photo)
                                <img src="{{ asset('storage/' . $profile->photo) }}"
                                    class="w-52 h-52 rounded-[2.5rem] mx-auto mb-8 object-cover border-4 border-blue-600 shadow-[0_0_25px_rgba(37,99,235,0.4)] transition-transform duration-500 hover:rotate-3">
                            @endif

                            <h3 class="text-4xl font-bold text-white mb-2">{{ $profile->name }}</h3>
                            <p class="text-blue-400 font-bold tracking-widest uppercase text-sm mb-8">
                                {{ $profile->title }}</p>

                            <div
                                class="h-1.5 w-24 bg-blue-600 mx-auto mb-8 rounded-full shadow-lg shadow-blue-500/50 transition-all duration-500 hover:w-32">
                            </div>

                            <p class="text-gray-300 leading-relaxed text-left text-lg font-light italic">
                                "{{ $profile->bio }}"
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    @if ($github)
                        <div
                            class="bg-gray-900/40 p-10 rounded-[3rem] shadow-2xl border border-blue-500/10 backdrop-blur-md transition-all duration-500 hover:scale-[1.02] hover:border-blue-500/40 hover:shadow-[0_0_50px_rgba(30,64,175,0.2)]">

                            <div
                                class="flex flex-col xl:flex-row items-center justify-between mb-12 gap-8 text-left border-b border-gray-800/50 pb-10">
                                <div class="flex items-center gap-6">
                                    <img src="{{ $github['avatar_url'] }}"
                                        class="w-20 h-20 rounded-2xl border-2 border-blue-500 shadow-md">
                                    <div>
                                        <h3 class="text-2xl font-bold text-white">
                                            {{ $github['name'] ?? $github['login'] }}</h3>
                                        <p class="text-blue-400 font-mono text-sm opacity-80 italic">@
                                            {{ $github['login'] }}</p>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center gap-4 font-mono w-full">
                                    <div
                                        class="flex-1 text-center px-2 py-4 bg-gray-800/60 rounded-[1.5rem] border border-gray-700 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 group/stat">
                                        <p class="text-3xl font-bold text-blue-400 group-hover/stat:text-blue-300">
                                            {{ $github['public_repos'] }}</p>
                                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mt-1">Repos</p>
                                    </div>

                                    <div
                                        class="flex-1 text-center px-2 py-4 bg-gray-800/60 rounded-[1.5rem] border border-gray-700 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 group/stat">
                                        <p class="text-3xl font-bold text-blue-400 group-hover/stat:text-blue-300">
                                            {{ $github['followers'] }}</p>
                                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mt-1">Followers
                                        </p>
                                    </div>

                                    <div
                                        class="flex-1 text-center px-2 py-4 bg-gray-800/60 rounded-[1.5rem] border border-gray-700 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 group/stat">
                                        <p class="text-3xl font-bold text-blue-400 group-hover/stat:text-blue-300">
                                            {{ $github['following'] }}</p>
                                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mt-1">Following
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-12">
                                <h4
                                    class="text-xs font-bold text-gray-500 uppercase tracking-[0.3em] mb-6 border-l-4 border-blue-600 pl-4">
                                    Contribution Heatmap</h4>
                                <div id="github-activity"
                                    class="text-gray-400 overflow-x-auto bg-gray-800/30 p-8 rounded-[2rem] border border-gray-700/30 custom-scrollbar shadow-inner transition-all duration-500 hover:bg-gray-800/50">
                                    <p class="animate-pulse py-6 text-center text-sm italic">Syncing GitHub data...</p>
                                </div>
                            </div>

                            <div class="grid xl:grid-cols-2 items-center gap-12">
                                <div class="text-left">
                                    <h4
                                        class="text-xs font-bold text-gray-500 uppercase tracking-[0.3em] mb-4 border-l-4 border-blue-600 pl-4">
                                        Top Languages</h4>
                                    <p class="text-gray-400 text-sm mb-8 leading-relaxed opacity-80">Teknologi yang
                                        sering digunakan dalam pengembangan sistem lab.</p>
                                    <div id="chart-legend"
                                        class="grid grid-cols-2 gap-4 text-xs font-mono uppercase tracking-widest">
                                    </div>
                                </div>
                                <div class="flex justify-center transition-transform duration-500 hover:scale-110">
                                    <canvas id="languageChart" style="max-width:260px; max-height:260px;"></canvas>
                                </div>
                            </div>

                            <a href="{{ $github['html_url'] }}" target="_blank"
                                class="block text-center mt-12 bg-gradient-to-r from-blue-900/10 to-blue-600/10 border-2 border-blue-600/30 text-blue-400 px-8 py-5 rounded-3xl hover:bg-blue-600 hover:text-white hover:scale-105 transition-all duration-500 font-bold uppercase tracking-widest text-sm shadow-xl shadow-blue-900/10">
                                View Full GitHub Profile ↗
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#0b0f1a] py-24 border-t border-gray-900 group">
        <div class="max-w-5xl mx-auto px-6">
            <h2
                class="text-4xl font-extrabold mb-16 text-center text-white transition-all duration-500 group-hover:scale-110">
                Technical <span class="text-blue-600">Skills</span></h2>
            <div class="grid md:grid-cols-2 gap-x-16 gap-y-10">
                @foreach ($profile->skills as $skill)
                    <div
                        class="group/skill p-4 rounded-2xl transition-all duration-300 hover:bg-blue-900/10 hover:scale-[1.05]">
                        <div class="flex justify-between mb-3">
                            <span
                                class="font-bold text-gray-300 group-hover/skill:text-blue-500 transition-colors uppercase tracking-widest text-xs">{{ $skill->name }}</span>
                            <span class="text-blue-400 font-mono text-xs">{{ $skill->level }}%</span>
                        </div>
                        <div class="w-full bg-gray-800/50 rounded-full h-2.5 overflow-hidden border border-gray-700/50">
                            <div class="bg-blue-600 h-full rounded-full transition-all duration-1000 ease-out group-hover/skill:shadow-[0_0_20px_#2563eb] group-hover/skill:bg-blue-400"
                                style="width: {{ $skill->level }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-black py-10 text-center text-gray-500 text-sm tracking-widest border-t border-gray-900">
        &copy; {{ date('Y') }} {{ $profile->name }}. <br>
        <span class="mt-2 block opacity-50">Made with Polinema Business Analytics Lab.</span>
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
                            borderWidth: 6,
                            hoverOffset: 15
                        }]
                    },
                    options: {
                        cutout: '75%',
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });

                const legendContainer = document.getElementById('chart-legend');
                labels.forEach((label, i) => {
                    legendContainer.innerHTML += `
                        <div class="flex items-center gap-3 group/leg cursor-default">
                            <span class="w-3 h-3 rounded-full shadow-sm transition-transform duration-300 group-hover/leg:scale-150" style="background:${colors[i % colors.length]}"></span>
                            <span class="text-gray-400 group-hover/leg:text-blue-400 transition-colors truncate">${label}</span>
                        </div>
                    `;
                });
            }
        });
    </script>
</body>

</html>
