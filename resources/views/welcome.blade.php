@php
    $highlights = [
        ['value' => '6+', 'label' => 'years in full stack development'],
        ['value' => 'ERP/API', 'label' => 'recent focus areas'],
        ['value' => 'Global', 'label' => 'open to relocation and sponsorship'],
    ];

    $summaryPoints = [
        '6+ years of experience in enterprise web applications, desktop software, ERP customization, and REST API integration.',
        'Hands-on delivery across manufacturing, healthcare, and enterprise environments.',
        'Comfortable with backend, frontend, databases, deployment, and cross-functional collaboration.',
    ];

    $experience = [
        [
            'role' => 'Full Stack Developer',
            'company' => 'PT Intan Pariwara',
            'period' => 'Mar 2025 - Present',
            'highlights' => [
                'Developed ERP systems, REST APIs, and internal web applications, improving business process efficiency by 25%.',
                'Integrated ERP with external platforms and automated Talenta synchronization to improve data consistency and reduce manual work.',
                'Owned design, implementation, testing, and deployment across ERP and warehouse-related projects.',
            ],
        ],
        [
            'role' => 'Full Stack Developer',
            'company' => 'PT Kalventis Sinergi Farma',
            'period' => 'Aug 2023 - Aug 2024',
            'highlights' => [
                'Built and maintained ASP.NET MVC web applications following clean code practices.',
                'Integrated Mailchimp and Zoom for marketing and communication workflows.',
                'Optimized SQL queries and improved deployment and review processes.',
            ],
        ],
        [
            'role' => 'Full Stack Developer',
            'company' => 'PT Coway International Indonesia',
            'period' => 'Jun 2022 - Jun 2023',
            'highlights' => [
                'Delivered Careline Dashboard and Cody Manager using ERPNext integrations and desktop apps.',
                'Built custom APIs and integrated mobile applications with backend services.',
                'Owned testing and production deployment tasks.',
            ],
        ],
        [
            'role' => 'Junior Software Engineer',
            'company' => 'Infonet Global Tech',
            'period' => 'Mar 2019 - May 2022',
            'highlights' => [
                'Worked on Gold Trading System components and desktop applications.',
                'Implemented barcode scanning flows and offline persistence for mobile.',
                'Supported bug fixes and UI improvements across enterprise projects.',
            ],
        ],
    ];

    $projects = [
        [
            'title' => 'Customer 360',
            'company' => 'PT Kalventis Sinergi Farma',
            'period' => 'Aug 2023 – Aug 2024',
            'summary' => 'Landing page platform with admin for user/role management, campaign pages, and event creation (online, hybrid, live).',
            'tags' => ['ASP.NET', 'Landing Pages', 'Role Management'],
        ],
        [
            'title' => 'Careline Dashboard',
            'company' => 'PT Coway International Indonesia',
            'period' => 'Jul 2022 – Jun 2023',
            'summary' => 'Desktop application for Careline: lead registration, FAQ lookup, customer search, and service area checks.',
            'tags' => ['Desktop App', 'Operations', 'Customer Support'],
        ],
        [
            'title' => 'Cody Manager',
            'company' => 'PT Coway International Indonesia',
            'period' => 'Dec 2022 – Jun 2023',
            'summary' => 'Admin tool for Cody Managers: assignments, task sync, material requests, and meeting activity reviews.',
            'tags' => ['ERPNext', 'Workflow', 'Admin UI'],
        ],
        [
            'title' => 'Coway ERP',
            'company' => 'PT Coway International Indonesia',
            'period' => 'Jun 2022 – Oct 2022',
            'summary' => 'ERPNext/Frappe work: APIs, backend fixes, and frontend data customizations.',
            'tags' => ['Frappe', 'ERPNext', 'Python'],
        ],
        [
            'title' => 'DST Recruitment',
            'company' => 'PT Coway International Indonesia',
            'period' => 'Jun 2022',
            'summary' => 'Recruitment site for the Lead division with application and screening flows.',
            'tags' => ['Web', 'Recruitment'],
        ],
        [
            'title' => 'Gold Trading System Mobile (Main sub project)',
            'company' => 'Infonet Global Tech',
            'period' => 'Apr 2021 – Nov 2021',
            'summary' => 'Java mobile app for barcode scanning with offline persistence (planned online migration).',
            'tags' => ['Java', 'Mobile', 'Barcode'],
        ],
        [
            'title' => 'Gold Trading System Desktop',
            'company' => 'Infonet Global Tech',
            'period' => '2019 - 2022',
            'summary' => 'Desktop trading system for jewelry transactions with role-based UI and order flows.',
            'tags' => ['C#', 'WPF', 'Desktop Software'],
        ],
        [
            'title' => 'Appraisal Performance System',
            'company' => 'PT Kalventis Sinergi Farma',
            'period' => '—',
            'summary' => 'Internal web app for KPI appraisal and employee performance rating workflows.',
            'tags' => ['Web', 'KPI', 'HR Tools'],
        ],
        [
            'title' => 'WMS',
            'company' => 'PT Intan Pariwara',
            'period' => 'Recent',
            'summary' => 'Warehouse workflow for location validation, stock counting, and relabelling operations.',
            'tags' => ['WMS', 'Inventory', 'Mobile Friendly'],
        ],
        [
            'title' => 'Program Sinergi',
            'company' => 'PT Intan Pariwara',
            'period' => 'Sep 2025 - Nov 2025',
            'summary' => 'Custom ERP modules and APIs for inventory management, order processing, and reporting.',
            'tags' => ['Java spring boot', 'Flutter', 'System Integration','PostgreSQL'],
        ],
        [
            'title' => 'Oldist Integration',
            'company' => 'PT Intan Pariwara',
            'period' => 'Mar 2025 - Present',
            'youtube' => 'https://youtu.be/vhS_wGyRv1U',
            'summary' => 'Automated synchronization of customer and order data between ERP to Oldist.',
            'tags' => ['FastAPI', 'Python', 'Mysql'],
        ],
    ];

    // Build gallery array for each project by scanning public folders
    // include manual folder mappings when project folder name differs from title slug
    $projectFolderMap = [
        'Program Sinergi' => 'rabat',
        'Gold Trading System Desktop' => 'gold-desktop',
    ];

    foreach ($projects as $idx => $proj) {
        $gallery = [];
        if (!empty($proj['image'])) {
            $gallery[] = $proj['image'];
        }

        // candidate folders to scan
        $candidates = [];
        // slug from title
        $slug = \Illuminate\Support\Str::slug($proj['title'] ?? '');
        if ($slug) {
            $candidates[] = $slug;
        }

        // title lowercased
        $titleLower = strtolower($proj['title'] ?? '');
        if ($titleLower) {
            $candidates[] = $titleLower;
        }

        // user-provided mapping
        if (!empty($projectFolderMap[$proj['title'] ?? ''])) {
            $candidates[] = $projectFolderMap[$proj['title']];
        }

        // also include folder matching company or common names
        if (!empty($proj['company'])) {
            $candidates[] = \Illuminate\Support\Str::slug($proj['company']);
        }

        // scan candidates for images
        foreach (array_unique($candidates) as $folder) {
            $dir = public_path('images/projects/'.$folder);
            if (is_dir($dir)) {
                $files = glob($dir.'/*.{png,jpg,jpeg,webp,svg}', GLOB_BRACE);
                if ($files) {
                    foreach ($files as $f) {
                        $gallery[] = 'images/projects/'.$folder.'/'.basename($f);
                    }
                }
            }
        }

        $projects[$idx]['gallery'] = array_values(array_unique($gallery));
    }

    $skillGroups = [
        [
            'title' => 'Languages',
            'items' => ['C#', 'Python', 'Java', 'PHP', 'JavaScript','TypeScript'],
        ],
        [
            'title' => 'Frameworks & Platforms',
            'items' => ['ASP.NET Core', 'Laravel', 'Frappe Framework', 'ERPNext', 'Vue.js', 'Windows Presentation Foundation', 'Next.js'],
        ],
        [
            'title' => 'Databases & Tools',
            'items' => ['SQL Server', 'MariaDB', 'MySQL', 'REST APIs', 'git', 'Azure DevOps','Postman', 'Swagger', 'Docker', 'Linux','IIS'],
        ]
    ];

    $softSkills = [
        'Cross-functional collaboration',
        'Stakeholder communication',
        'Autonomous execution',
        'High ownership mindset',
        'Problem solving',
    ];

    $languages = [
        ['name' => 'Indonesian', 'level' => 'Native or bilingual proficiency'],
        ['name' => 'English', 'level' => 'Professional working proficiency'],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alveen Chriskofasius | Full Stack Developer</title>
        <meta
            name="description"
            content="Alveen Chriskofasius is a Full Stack Developer with 6+ years of experience in ERP development, REST APIs, enterprise web applications, desktop software, and system integration."
        >

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fraunces:600,700|sora:400,500,600,700,800" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[var(--color-ink)] text-[var(--color-paper)] antialiased">
        <div class="portfolio-orb portfolio-orb-one"></div>
        <div class="portfolio-orb portfolio-orb-two"></div>
        <div class="portfolio-grid"></div>

        <div class="relative isolate mx-auto max-w-7xl px-5 pb-16 pt-5 sm:px-8 lg:px-10 lg:pb-24">
            <header class="sticky top-4 z-40 mb-10">
                <div class="section-card mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3 sm:px-6">
                    <a href="#home" class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/5 text-sm font-semibold tracking-[0.24em] text-[var(--color-accent)]">AC</span>
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-white/50">Resume Portfolio</p>
                            <p class="text-sm font-semibold text-white">Alveen Chriskofasius</p>
                        </div>
                    </a>

                    <nav class="hidden items-center gap-6 text-sm text-white/70 md:flex">
                        <a href="#summary" class="transition hover:text-white">Summary</a>
                        <a href="#experience" class="transition hover:text-white">Experience</a>
                        <a href="#projects" class="transition hover:text-white">Projects</a>
                        <a href="#skills" class="transition hover:text-white">Skills</a>
                        <a href="#contact" class="transition hover:text-white">Contact</a>
                    </nav>

                    <a href="#contact" class="inline-flex items-center rounded-full border border-[var(--color-accent)]/40 bg-[var(--color-accent)] px-4 py-2 text-sm font-semibold text-[var(--color-ink)] transition hover:-translate-y-0.5 hover:shadow-[0_12px_30px_rgba(255,138,76,0.25)]">
                        Contact
                    </a>
                </div>
            </header>

            <main class="space-y-8 lg:space-y-10">
                <section id="home" class="grid gap-6 lg:grid-cols-[1.25fr_0.95fr] lg:items-stretch">
                    <div class="section-card flex flex-col justify-between overflow-hidden px-6 py-8 sm:px-8 sm:py-10 lg:px-10 lg:py-12">
                        <div class="mb-10 flex flex-wrap items-center gap-3 text-xs uppercase tracking-[0.3em] text-white/55">
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1">Full Stack Developer</span>
                            <span>Indonesia</span>
                            <span>Open to relocation</span>
                        </div>

                        <div class="max-w-3xl space-y-6">
                            <p class="text-sm font-medium uppercase tracking-[0.28em] text-[var(--color-accent-soft)]">ERP, REST APIs, enterprise web applications, desktop software</p>
                            <h1 class="font-display text-5xl leading-none text-balance text-white sm:text-6xl lg:text-7xl">
                                Full Stack Developer with 6+ years of enterprise software experience.
                            </h1>
                            <p class="max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
                                Experienced in ERP development, REST API integration, web applications, desktop systems, SQL databases, and business process automation. Open to international opportunities and employer sponsorship.
                            </p>
                        </div>

                        <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:flex-wrap">
                            <a href="#experience" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-[var(--color-ink)] transition hover:-translate-y-0.5">
                                View Experience
                            </a>
                            <a href="https://www.linkedin.com/in/alveen-chriskofasius/" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/10">
                                LinkedIn
                            </a>
                            <a href="https://github.com/alveenchriskofasius" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/10">
                                GitHub
                            </a>
                        </div>
                    </div>

                    <div class="grid gap-6">
                        <div class="section-card spotlight-card px-6 py-8 sm:px-8">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/55">Profile Snapshot</p>
                            <div class="mt-8 space-y-5">
                                @foreach ($highlights as $highlight)
                                    <div class="border-b border-white/10 pb-5 last:border-b-0 last:pb-0">
                                        <p class="font-display text-4xl text-white">{{ $highlight['value'] }}</p>
                                        <p class="mt-2 max-w-xs text-sm leading-7 text-white/65">{{ $highlight['label'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="section-card px-6 py-8 sm:px-8">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/55">Contact Details</p>
                            <div class="mt-6 grid gap-4 text-sm text-white/78">
                                <div class="rounded-[1.4rem] border border-white/10 bg-white/5 px-4 py-4">
                                    <p class="text-white/45">Email</p>
                                    <a href="mailto:alveen.chriskofasius@gmail.com" class="mt-1 block break-all font-semibold text-white">alveen.chriskofasius@gmail.com</a>
                                </div>
                                <div class="rounded-[1.4rem] border border-white/10 bg-white/5 px-4 py-4">
                                    <p class="text-white/45">Phone</p>
                                    <a href="tel:+6281288466034" class="mt-1 block font-semibold text-white">+62 812 8846 6034</a>
                                </div>
                                <div class="rounded-[1.4rem] border border-white/10 bg-white/5 px-4 py-4">
                                    <p class="text-white/45">Work Authorization</p>
                                    <p class="mt-1 font-semibold text-white">Employer sponsorship required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="summary" class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
                    <div class="section-card px-6 py-8 sm:px-8 lg:px-10">
                        <p class="text-xs uppercase tracking-[0.28em] text-white/55">Professional Summary</p>
                        <h2 class="mt-4 font-display text-3xl text-white sm:text-4xl">Short summary for recruiters and hiring managers.</h2>
                        <div class="mt-6 space-y-3">
                            @foreach ($summaryPoints as $point)
                                <div class="flex gap-3 rounded-[1.2rem] border border-white/8 bg-black/15 px-4 py-3">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[var(--color-accent)]"></span>
                                    <p class="text-sm leading-7 text-white/68">{{ $point }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="section-card px-6 py-8 sm:px-8 lg:px-10">
                        <p class="text-xs uppercase tracking-[0.28em] text-white/55">Target Roles</p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            @foreach (['Full Stack Developer', 'Software Engineer', 'Backend Engineer', 'Application Developer', 'ERP Developer'] as $role)
                                <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white/78">{{ $role }}</span>
                            @endforeach
                        </div>

                        <div class="mt-8 rounded-[1.8rem] border border-[var(--color-accent)]/20 bg-[var(--color-accent)]/8 p-5">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/45">Keywords</p>
                            <p class="mt-3 text-sm leading-7 text-white/74">
                                ERP, ERPNext, Frappe Framework, REST APIs, ASP.NET MVC, Laravel, C#, Python, Java, SQL Server, MySQL, system integration, desktop applications, enterprise web applications.
                            </p>
                        </div>
                    </div>
                </section>

                <section id="experience" class="section-card px-6 py-8 sm:px-8 lg:px-10 lg:py-10">
                    <div class="flex flex-col gap-4 border-b border-white/10 pb-6 sm:flex-row sm:items-end sm:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/55">Work Experience</p>
                            <h2 class="mt-4 font-display text-3xl text-white sm:text-4xl">Experience in ERP, APIs, web applications, and desktop software.</h2>
                        </div>
                        <p class="max-w-md text-sm leading-7 text-white/64">
                            Industry background includes manufacturing, healthcare, and enterprise software delivery.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-5 lg:grid-cols-2">
                        @foreach ($experience as $job)
                            <article class="project-card rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(255,255,255,0.08),rgba(255,255,255,0.03))] p-6">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.26em] text-[var(--color-accent-soft)]">{{ $job['company'] }}</p>
                                        <h3 class="mt-3 text-2xl font-semibold text-white">{{ $job['role'] }}</h3>
                                    </div>
                                    <span class="rounded-full border border-[var(--color-accent)]/20 bg-[var(--color-accent)]/10 px-3 py-1 text-xs font-semibold text-[var(--color-accent)]">
                                        {{ $job['period'] }}
                                    </span>
                                </div>

                                <div class="mt-5 space-y-3">
                                    @foreach ($job['highlights'] as $item)
                                        <div class="flex gap-3 rounded-[1.2rem] border border-white/8 bg-black/15 px-4 py-3">
                                            <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[var(--color-accent)]"></span>
                                            <p class="text-sm leading-7 text-white/68">{{ $item }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section id="projects" class="section-card px-6 py-8 sm:px-8 lg:px-10 lg:py-10">
                    <div class="flex flex-col gap-4 border-b border-white/10 pb-6 sm:flex-row sm:items-end sm:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/55">Selected Projects</p>
                            <h2 class="mt-4 font-display text-3xl text-white sm:text-4xl">Relevant project examples from production work.</h2>
                        </div>
                        <p class="max-w-md text-sm leading-7 text-white/64">
                            Short summaries showing systems, business workflows, and technologies used in delivery.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-5 lg:grid-cols-2 xl:grid-cols-3">
                        @foreach ($projects as $project)
                            <article class="project-card rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(255,255,255,0.08),rgba(255,255,255,0.03))] p-6">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.26em] text-[var(--color-accent-soft)]">{{ $project['company'] }}</p>
                                        <h3 class="mt-3 text-2xl font-semibold text-white">{{ $project['title'] }}</h3>
                                    </div>
                                </div>

                                @php
                                    $youtubeEmbed = null;
                                    if (!empty($project['youtube'])) {
                                        preg_match('/(?:youtu\.be\/|v=)([A-Za-z0-9_-]{11})/', $project['youtube'], $m);
                                        if (!empty($m[1])) {
                                            $youtubeEmbed = 'https://www.youtube.com/embed/'.$m[1];
                                        }
                                    }
                                @endphp

                                @if (!empty($youtubeEmbed))
                                    <div class="mt-4">
                                        <iframe src="{{ $youtubeEmbed }}" class="w-full max-w-sm rounded-md" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                @elseif (!empty($project['video']))
                                    <div class="mt-4">
                                        <video controls class="w-full max-w-sm rounded-md">
                                            <source src="{{ str_replace(' ', '%20', asset($project['video'])) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <span class="inline-flex w-fit rounded-full border border-[var(--color-accent)]/20 bg-[var(--color-accent)]/10 px-3 py-1 text-xs font-semibold text-[var(--color-accent)]">
                                        {{ $project['period'] }}
                                    </span>
                                    <p class="mt-4 text-sm leading-7 text-white/68">{{ $project['summary'] }}</p>
                                </div>

                                @php
                                    $gallery = $project['gallery'] ?? [];
                                    $galleryUrls = [];
                                    foreach ($gallery as $g) {
                                        $galleryUrls[] = asset($g);
                                    }
                                @endphp

                                @if (!empty($galleryUrls))
                                    <div class="mt-4">
                                        <div class="grid grid-cols-2 gap-2 w-full max-w-xs">
                                            @foreach (array_slice($galleryUrls, 0, 6) as $i => $gUrl)
                                                <img src="{{ $gUrl }}" alt="{{ $project['title'] }}" data-gallery='@json($galleryUrls)' data-index="{{ $i }}" class="h-32 w-full rounded-md object-cover cursor-pointer project-thumb" />
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-6 flex flex-wrap gap-2">
                                    @foreach ($project['tags'] as $tag)
                                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-white/70">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section id="skills" class="grid gap-6 lg:grid-cols-[0.95fr_1.05fr]">
                    <div class="section-card px-6 py-8 sm:px-8 lg:px-10">
                        <p class="text-xs uppercase tracking-[0.28em] text-white/55">Skills</p>
                        <h2 class="mt-4 font-display text-3xl text-white sm:text-4xl">Technical skills and qualifications.</h2>
                        <p class="mt-5 text-sm leading-8 text-white/66 sm:text-base">
                            Skills relevant to full stack, backend, ERP, and enterprise application roles.
                        </p>

                        <div class="mt-8">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/45">Education</p>
                            <div class="mt-4 rounded-[1.6rem] border border-white/10 bg-black/20 p-5">
                                <p class="text-lg font-semibold text-white">BINUS University</p>
                                <p class="mt-1 text-sm text-[var(--color-accent-soft)]">Information System</p>
                                <p class="mt-2 text-sm text-white/62">Jul 2014 - Nov 2018</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-4">
                        @foreach ($skillGroups as $group)
                            <article class="section-card px-6 py-6 sm:px-8">
                                <p class="text-xs uppercase tracking-[0.28em] text-white/45">{{ $group['title'] }}</p>
                                <div class="mt-5 flex flex-wrap gap-3">
                                    @foreach ($group['items'] as $skill)
                                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white/78">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach

                        <article class="section-card px-6 py-6 sm:px-8">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/45">Soft Skills</p>
                            <div class="mt-5 flex flex-wrap gap-3">
                                @foreach ($softSkills as $skill)
                                    <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white/78">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </article>

                        <article class="section-card px-6 py-6 sm:px-8">
                            <p class="text-xs uppercase tracking-[0.28em] text-white/45">Languages</p>
                            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                                @foreach ($languages as $language)
                                    <div class="rounded-[1.3rem] border border-white/10 bg-black/20 p-4">
                                        <p class="font-semibold text-white">{{ $language['name'] }}</p>
                                        <p class="mt-1 text-sm text-white/62">{{ $language['level'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    </div>
                </section>

                <section id="contact" class="section-card overflow-hidden px-6 py-8 sm:px-8 lg:px-10 lg:py-12">
                    <div class="grid gap-8 lg:grid-cols-[1.15fr_0.85fr] lg:items-end">
                        <div>
                            <p class="text-xs uppercase tracking-[0.28em] text-white/55">Contact</p>
                            <h2 class="mt-4 max-w-3xl font-display text-4xl text-white sm:text-5xl">
                                Open to international full stack and software engineering opportunities.
                            </h2>
                            <p class="mt-5 max-w-2xl text-sm leading-8 text-white/68 sm:text-base">
                                Available for roles involving enterprise software, ERP, APIs, web applications, and internal systems. Open to relocation and employer sponsorship.
                            </p>
                        </div>

                        <div class="grid gap-4 rounded-[2rem] border border-white/10 bg-black/20 p-6 sm:p-7">
                            <a href="mailto:alveen.chriskofasius@gmail.com" class="inline-flex items-center justify-between rounded-[1.2rem] border border-white/10 bg-white/5 px-5 py-4 text-sm text-white/80 transition hover:border-white/20 hover:bg-white/8">
                                <span>Email</span>
                                <span class="font-semibold break-all text-white">alveen.chriskofasius@gmail.com</span>
                            </a>
                            <a href="tel:+6281288466034" class="inline-flex items-center justify-between rounded-[1.2rem] border border-white/10 bg-white/5 px-5 py-4 text-sm text-white/80 transition hover:border-white/20 hover:bg-white/8">
                                <span>Phone</span>
                                <span class="font-semibold text-white">+62 812 8846 6034</span>
                            </a>
                            <a href="https://www.linkedin.com/in/alveen-chriskofasius/" target="_blank" rel="noreferrer" class="inline-flex items-center justify-between rounded-[1.2rem] border border-white/10 bg-white/5 px-5 py-4 text-sm text-white/80 transition hover:border-white/20 hover:bg-white/8">
                                <span>LinkedIn</span>
                                <span class="font-semibold text-white">alveen-chriskofasius</span>
                            </a>
                            <a href="https://github.com/alveenchriskofasius" target="_blank" rel="noreferrer" class="inline-flex items-center justify-between rounded-[1.2rem] border border-white/10 bg-white/5 px-5 py-4 text-sm text-white/80 transition hover:border-white/20 hover:bg-white/8">
                                <span>GitHub</span>
                                <span class="font-semibold text-white">alveenchriskofasius</span>
                            </a>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    
    <div id="project-lightbox" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/70 p-4">
        <div class="relative mx-auto w-full max-w-3xl">
            <button id="lb-close" class="absolute right-2 top-2 z-50 rounded-full bg-white/10 px-3 py-1 text-sm">Close</button>
            <button id="lb-full" class="absolute right-20 top-2 z-50 rounded-full bg-white/10 px-3 py-1 text-sm">⤢</button>
            <button id="lb-prev" class="absolute left-2 top-1/2 z-50 -translate-y-1/2 rounded-full bg-white/10 px-3 py-1 text-sm">‹</button>
            <button id="lb-next" class="absolute right-12 top-1/2 z-50 -translate-y-1/2 rounded-full bg-white/10 px-3 py-1 text-sm">›</button>
            <img id="lb-image" src="" alt="Gallery image" class="w-full max-h-[90vh] object-contain rounded-md" />
        </div>
    </div>

    <script>
        (function(){
            const lightbox = document.getElementById('project-lightbox');
            const lbImage = document.getElementById('lb-image');
            const lbClose = document.getElementById('lb-close');
            const lbPrev = document.getElementById('lb-prev');
            const lbNext = document.getElementById('lb-next');
            let currentGallery = [];
            let currentIndex = 0;

            function openGallery(gallery, index){
                currentGallery = gallery;
                currentIndex = index || 0;
                lbImage.src = currentGallery[currentIndex];
                lightbox.classList.remove('hidden');
                lightbox.classList.add('flex');
            }

            function closeGallery(){
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                lbImage.src = '';
            }

            function showIndex(i){
                if(!currentGallery.length) return;
                currentIndex = (i + currentGallery.length) % currentGallery.length;
                lbImage.src = currentGallery[currentIndex];
            }

            document.querySelectorAll('.project-thumb').forEach(el => {
                el.addEventListener('click', e => {
                    const gallery = JSON.parse(el.getAttribute('data-gallery') || '[]');
                    const index = parseInt(el.getAttribute('data-index') || '0', 10);
                    openGallery(gallery, index);
                });
            });

            lbClose.addEventListener('click', closeGallery);
            lbPrev.addEventListener('click', () => showIndex(currentIndex - 1));
            lbNext.addEventListener('click', () => showIndex(currentIndex + 1));
            const lbFull = document.getElementById('lb-full');
            lbFull.addEventListener('click', () => {
                const el = document.getElementById('project-lightbox');
                if (!document.fullscreenElement) {
                    if (el.requestFullscreen) el.requestFullscreen();
                } else {
                    if (document.exitFullscreen) document.exitFullscreen();
                }
            });

            // keyboard navigation
            document.addEventListener('keydown', e => {
                if(lightbox.classList.contains('hidden')) return;
                if(e.key === 'Escape') closeGallery();
                if(e.key === 'ArrowLeft') showIndex(currentIndex - 1);
                if(e.key === 'ArrowRight') showIndex(currentIndex + 1);
            });

            // close on overlay click
            lightbox.addEventListener('click', e => {
                if(e.target === lightbox) closeGallery();
            });
        })();
    </script>
    </body>
</html>
