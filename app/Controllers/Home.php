<?php

namespace App\Controllers;

/**
 * Home controller.
 *
 * Nagpadagan sa portfolio landing page. Ang tanang personal nga datos
 * naa dinhi sa ubos aron dali ra nimo ilisan (placeholder pa kini).
 */
class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'meta' => [
                'title'       => 'Grace G. Getungo — IT Student, Web Developer & Graphic Designer',
                'description' => 'Portfolio ni Grace G. Getungo — Information Technology student, web developer, ug graphic designer.',
                'author'      => 'Grace G. Getungo',
            ],

            'profile' => [
                'name'      => 'Grace G. Getungo',
                'first'     => 'Grace',
                'role'      => 'IT Student | Web Developer | Graphic Designer',
                'tagline'   => 'I build clean, practical web experiences — turning ideas into working systems.',
                'location'  => 'Iligan City, Lanao del Norte',
                'email'     => 'grace.getungo@example.com',
                'phone'     => '09362050578',
                'photo'     => 'assets/img/profile.jpg',
                'resumeUrl' => '#',
                'available' => true,
                'socials'   => [
                    ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/grace-getungo', 'icon' => 'linkedin'],
                ],
            ],

            'stats' => [
                ['value' => '9+',      'label' => 'Projects Built'],
                ['value' => 'IT',      'label' => 'Student'],
                ['value' => 'Graphic', 'label' => 'Designer'],
            ],

            'about' => [
                'heading'  => 'About Me',
                'body'     => [
                    'I am an Information Technology student with a growing interest in web development, software development, and technology-based solutions. I enjoy learning through hands-on projects and applying what I learn to practical situations.',
                    'I am a quiet and hardworking person who prefers learning by doing. I may be shy when speaking in front of people, but I continuously work on improving my communication and confidence through school activities, projects, and practical experiences.',
                    'I enjoy solving problems independently and exploring different ways to make a system simpler and more useful. When learning a new technology, I prefer to understand how it works by actually building and testing something.',
                    'My goal is to continue developing my technical skills while gaining real-world experience in the IT industry.',
                ],
                'facts' => [
                    ['k' => 'Name',        'v' => 'Grace G. Getungo'],
                    ['k' => 'Role',        'v' => 'IT Student | Web Developer'],
                    ['k' => 'Also',        'v' => 'Graphic Designer'],
                    ['k' => 'Focus',       'v' => 'Web & Software Development'],
                ],
            ],

            'skills' => [
                'heading' => 'Technical Skills',
                'groups'  => [
                    [
                        'name'  => 'Programming & Development',
                        'items' => ['TypeScript', 'JavaScript', 'Java', 'HTML', 'CSS', 'React', 'Vite', 'Tailwind CSS'],
                    ],
                    [
                        'name'  => 'Database & Backend',
                        'items' => ['PostgreSQL', 'Supabase', 'REST APIs', 'Local Supabase using Docker', 'Database design', 'Authentication'],
                    ],
                    [
                        'name'  => 'Data & AI',
                        'items' => ['Python', 'Scikit-learn', 'Random Forest', 'Basic machine learning concepts', 'AI-assisted systems', 'Gemini API integration'],
                    ],
                    [
                        'name'  => 'Networking',
                        'items' => ['Cisco Packet Tracer', 'VLAN', 'VLSM', 'OSPF', 'HSRP / GLBP', 'Router and switch configuration', 'Basic network design'],
                    ],
                    [
                        'name'  => 'Tools',
                        'items' => ['Git & GitHub', 'Docker', 'VS Code', 'Figma / graphic design tools', 'Vercel'],
                    ],
                    [
                        'name'  => 'Design',
                        'items' => ['Graphic design', 'Social media advertisements', 'Layout design', 'Clean and minimal visual design', 'Digital marketing materials'],
                    ],
                ],
            ],

            'projects' => [
                'heading' => 'Projects',
                'items'   => [
                    [
                        'title'       => 'Weather Application',
                        'description' => 'A weather app with real-time updates, city search, and a dynamic interactive wind map.',
                        'image'       => 'assets/img/projects/weather-application-five-inky.jpg',
                        'tags'        => ['JavaScript', 'APIs', 'Dynamic Map'],
                        'url'         => 'https://weather-application-five-inky.vercel.app/',
                        'repo'        => '#',
                        'featured'    => true,
                    ],
                    [
                        'title'       => 'Middleware & Messaging Activity',
                        'description' => 'A middleware exercise with a working contact form and dynamic object-to-JSON conversion.',
                        'image'       => 'assets/img/projects/middleware-and-messaging.jpg',
                        'tags'        => ['TypeScript', 'Middleware', 'JSON'],
                        'url'         => 'https://middleware-and-messaging-activity.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'Portfolio Website (Bootstrap 5)',
                        'description' => 'A responsive personal portfolio built with Bootstrap 5 and a clean, modern layout.',
                        'image'       => 'assets/img/projects/portfolio-bootstrap.jpg',
                        'tags'        => ['HTML', 'CSS', 'Bootstrap 5'],
                        'url'         => 'https://portfolio-website-using-bootstrap-5.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'Aircraft Crusher — Shooter Game',
                        'description' => 'A browser arcade space shooter with a start menu, interactive controls, and score tracking.',
                        'image'       => 'assets/img/projects/aircraft-crusher.jpg',
                        'tags'        => ['JavaScript', 'Game', 'Canvas'],
                        'url'         => 'https://aircraft-crusher.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'Chat Application',
                        'description' => 'A messaging app with user registration, secure login, and real-time conversations.',
                        'image'       => 'assets/img/projects/chat-application.jpg',
                        'tags'        => ['React', 'Supabase', 'Authentication'],
                        'url'         => 'https://chat-application-seven-blue.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'Temperature Monitor Dashboard',
                        'description' => 'A dashboard that tracks saline and patient temperature in real time, with chamber status and logs.',
                        'image'       => 'assets/img/projects/temperature-monitor.jpg',
                        'tags'        => ['React', 'Dashboard', 'Data Visualization'],
                        'url'         => 'https://temperature-monitor-ten.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'Embracelet',
                        'description' => 'A Vite-powered web app featuring a clean login experience and a modern front-end toolchain.',
                        'image'       => 'assets/img/projects/embracelet.jpg',
                        'tags'        => ['Vite', 'JavaScript', 'Front-end'],
                        'url'         => 'https://embracelet-two.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'My Portfolio',
                        'description' => 'A personal portfolio introducing me as an aspiring developer, with a minimal and elegant design.',
                        'image'       => 'assets/img/projects/myportfolio.jpg',
                        'tags'        => ['HTML', 'CSS', 'JavaScript'],
                        'url'         => 'https://myportfolio-blond-five.vercel.app/',
                        'repo'        => '#',
                    ],
                    [
                        'title'       => 'Pokédex — WS 101 Prelim Project',
                        'description' => 'A Pokédex web app that fetches live Pokémon data from the PokéAPI, with search and dark mode.',
                        'image'       => 'assets/img/projects/ws101-prelim.jpg',
                        'tags'        => ['API', 'HTML', 'CSS'],
                        'url'         => 'https://grace-getungo-ws-101-prelim-project.vercel.app/',
                        'repo'        => '#',
                    ],
                ],
            ],

            'experience' => [
                'heading' => 'Education & Experience',
                'items'   => [
                    [
                        'period'      => 'Present',
                        'title'       => "BS Information Technology — Student",
                        'place'       => "St. Peter's College",
                        'description' => 'Currently pursuing a degree in Information Technology with a focus on web development, software development, and technology-based solutions.',
                    ],
                    [
                        'period'      => 'Projects',
                        'title'       => 'Hands-on Web & Software Projects',
                        'place'       => 'School & Personal Projects',
                        'description' => 'Built practical projects using HTML, CSS, JavaScript, TypeScript, React, Java, PostgreSQL, Supabase, and Python.',
                    ],
                    [
                        'period'      => 'Design',
                        'title'       => 'Graphic Design Work',
                        'place'       => 'Freelance / Personal',
                        'description' => 'Created clean and simple digital advertisements and visual content, including social media and marketing materials.',
                    ],
                ],
            ],

            'contact' => [
                'heading' => 'Contact Me',
                'sub'     => 'Have a project or a question in mind? Send me a message.',
            ],
        ];

        return view('portfolio/index', $data);
    }

    /**
     * Nagdawat sa contact form (AJAX POST).
     * Nagbalik og JSON aron dali ra i-handle sa front-end.
     */
    public function contact()
    {
        $rules = [
            'name'    => 'required|min_length[2]|max_length[120]',
            'email'   => 'required|valid_email|max_length[180]',
            'subject' => 'required|min_length[3]|max_length[180]',
            'message' => 'required|min_length[10]|max_length[5000]',
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON([
                'ok'     => false,
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'ip'      => $this->request->getIPAddress(),
            'time'    => date('c'),
        ];

        // Demo: i-log lang ang mensahe. Diri nimo isumpay ang email o database.
        log_message('notice', 'Portfolio contact message: {data}', ['data' => json_encode($data)]);

        return $this->response->setJSON([
            'ok'      => true,
            'message' => 'Thank you! Your message has been received.',
        ]);
    }
}
