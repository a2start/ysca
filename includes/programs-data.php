<?php

function getProgramsList(): array
{
    return [
        'foundation-cricket' => [
            'id' => 'foundation-cricket',
            'slug' => 'program-foundation-cricket',
            'title' => 'Foundation Cricket Program',
            'short_title' => 'Foundation Cricket',
            'age_group' => 'Age: 6–10 Years',
            'badge' => 'Grassroots & Beginners',
            'level' => 'Beginner',
            'card_img' => 'assets/images/gemini-foundation.jpg',
            'banner_img' => 'assets/images/gemini-foundation.jpg',
            'headline' => 'Build Strong Basics. Learn the Game the Right Way.',
            'accent_color' => '#0a244f',
            'accent_gradient' => 'linear-gradient(135deg, #0a244f 0%, #153e7e 100%)',
            'accent_light' => '#eef5ff',
            'icon_img' => 'assets/images/ic-1.png',
            'icon_fa' => 'fa-cricket',
            'schedule' => '3–4 Days / Week',
            'duration' => 'Quarterly, Half-Yearly & Annual Modules',
            'timing' => 'Morning & Evening Sessions (2 Hours/Day)',
            'batch_size' => 'Max 12–15 Trainees per Batch',
            'goal' => 'Strong Basics & Love for the Game',
            'tagline' => 'Nurturing young passion into structured cricketing fundamentals through fun drills, motor skill development, and gentle professional guidance.',
            'overview' => 'The Foundation Cricket Program at Young Star Cricket Academy is tailored specifically for children aged 6 to 10 taking their very first steps into cricket. At this formative stage, training is centered around motor skill development, hand-eye coordination, balance, and learning fundamental bat-and-ball mechanics in a fun, safe, and positive sporting environment.<br><br>We utilize age-appropriate safety equipment, soft-touch leather balls, and incrediballs to build confidence and technique before transitioning to harder match balls. Our experienced grassroots coaches prioritize joy, teamwork, discipline, and building a genuine passion for cricket that lasts a lifetime.',
            'curriculum_modules' => [
                [
                    'title' => 'Module 1: Batting Fundamentals',
                    'icon' => 'fa-cricket',
                    'desc' => 'Grip, balanced stance, backlift alignment, head position, and executing basic front-foot defense, straight drive, and cover drive.'
                ],
                [
                    'title' => 'Module 2: Bowling Mechanics & Action',
                    'icon' => 'fa-bowling-ball',
                    'desc' => 'Developing a smooth run-up rhythm, upright seam position, full circular arm motion, and non-stressful follow-through to prevent bad habits early.'
                ],
                [
                    'title' => 'Module 3: Fielding Reflexes & Agility',
                    'icon' => 'fa-shield-alt',
                    'desc' => 'Two-handed ground pick-up, underarm & overarm target throws, catching technique with soft hands, and dynamic agility obstacle courses.'
                ],
                [
                    'title' => 'Module 4: Game Awareness & Team Spirit',
                    'icon' => 'fa-users',
                    'desc' => 'Understanding cricket pitch dimensions, basic scoring and dismissal rules, calling between wickets, respecting teammates and umpires.'
                ]
            ],
            'key_highlights' => [
                'Safe training environment using age-appropriate safety balls & incrediballs',
                'Strict 1:12 coach-to-trainee ratio ensuring individual attention for every child',
                'Specialized motor-skill and hand-eye coordination agility circuits',
                'Covered all-weather turf and astroturf net facilities',
                'Quarterly player progress reports shared directly with parents',
                'Regular mini-games and fun skill challenges to build match confidence'
            ],
            'lead_coaches' => [
                'lokesh-bharti' => [
                    'name' => 'Mr. Lokesh Bharti',
                    'role' => 'Youth Development Coach',
                    'slug' => 'coach-lokesh-bharti',
                    'image' => 'assets/images/lb.jpg'
                ],
                'nikhil-yadav' => [
                    'name' => 'Mr. Nikhil Yadav',
                    'role' => 'Junior Agility & S&C Specialist',
                    'slug' => 'coach-nikhil-yadav',
                    'image' => 'assets/images/ny.jpg'
                ]
            ],
            'weekly_routine' => [
                ['day' => 'Mon / Wed / Fri', 'activity' => 'Batting & Bowling Fundamentals + Agility Drills (2 Hours)'],
                ['day' => 'Saturday', 'activity' => 'Fun Skills Contests, Catching Challenges & Soft-Ball Mini Matches'],
                ['day' => 'Sunday', 'activity' => 'Rest / Optional Net Practice & Parental Review']
            ],
            'equipment_required' => 'Comfortable sportswear and running/athletic shoes. Academy provides starter bats, balls, and protective gear during early trial stages.',
            'faqs' => [
                [
                    'q' => 'Is prior cricket experience required to enroll in this batch?',
                    'a' => 'No prior experience is necessary. This program is created specifically for absolute beginners and focuses on building fundamentals from scratch.'
                ],
                [
                    'q' => 'Is hard-ball cricket played in this program?',
                    'a' => 'No. For children aged 6 to 10, we use high-density soft safety balls (Incrediballs) and tennis balls to build technique and reflexes safely without fear of injury.'
                ],
                [
                    'q' => 'Can parents sit and watch their children train?',
                    'a' => 'Yes, our Greater Noida facility features clean, shaded parent viewing galleries overlooking the turf nets and practice ground.'
                ]
            ],
            'contact_subject' => 'Inquiry for Foundation Cricket Program (Ages 6-10)'
        ],

        'junior-development' => [
            'id' => 'junior-development',
            'slug' => 'program-junior-development',
            'title' => 'Junior Development Program',
            'short_title' => 'Junior Development',
            'age_group' => 'Age: 11–14 Years',
            'badge' => 'Intermediate & Match-Ready',
            'level' => 'Intermediate',
            'card_img' => 'assets/images/gemini-junior.jpg',
            'banner_img' => 'assets/images/gemini-junior.jpg',
            'headline' => 'Develop Advanced Skills. Become Match Ready.',
            'accent_color' => '#e89903',
            'accent_gradient' => 'linear-gradient(135deg, #e89903 0%, #ff8c00 100%)',
            'accent_light' => '#fff8eb',
            'icon_img' => 'assets/images/ic-2.png',
            'icon_fa' => 'fa-crosshairs',
            'schedule' => '5 Days / Week',
            'duration' => 'Quarterly, Half-Yearly & Annual Modules',
            'timing' => 'Evening Sessions (3 Hours/Day) + Weekend Matches',
            'batch_size' => '15 Trainees per Batch (Tiered by Ability)',
            'goal' => 'Hard-Ball Mastery & School/District Readiness',
            'tagline' => 'Transitioning developing cricketers into hardened, match-ready competitors through systematic hard-ball turf net practice and tactical awareness.',
            'overview' => 'The Junior Development Program is our bridge from foundational mechanics to serious competitive cricket. Designed for boys and girls aged 11 to 14, this program transitions trainees into regular hard-ball cricket on natural turf pitches under match-like conditions.<br><br>Players refine their footwork against genuine pace and spin, fine-tune bowling variations and accuracy, sharpen wicketkeeping and boundary fielding reflexes, and learn the strategic decisions needed in 20-over and 50-over match play. Regular competitive practice matches ensure players learn how to handle real-game pressure.',
            'curriculum_modules' => [
                [
                    'title' => 'Module 1: Advanced Stroke Selection & Footwork',
                    'icon' => 'fa-bolt',
                    'desc' => 'Weight transfer for front and back foot shots, executing pull shots, square cuts, drives against swinging deliveries, and running between wickets.'
                ],
                [
                    'title' => 'Module 2: Seam, Swing & Spin Artistry',
                    'icon' => 'fa-bullseye',
                    'desc' => 'Fast bowlers learn wrist positioning for outswing and inswing; spinners master revolutions, loop, dip, and flight variations to beat batters in the air.'
                ],
                [
                    'title' => 'Module 3: Specialized Hard-Ball Fielding & Keeping',
                    'icon' => 'fa-shield',
                    'desc' => 'High catching with hard regulation balls, sliding boundary saves, direct hits from 30 yards, and wicketkeeper stance adjustments for spin and pace.'
                ],
                [
                    'title' => 'Module 4: Match Tactics & Target Chasing',
                    'icon' => 'fa-trophy',
                    'desc' => 'Setting tactical fields, bowling to field restrictions, rotating the strike during middle overs, and managing target-defending pressure.'
                ]
            ],
            'key_highlights' => [
                'Dedicated natural turf nets with hard regulation leather cricket balls',
                'Automated 3-wheel bowling machine sessions for technical stroke perfection',
                'Weekly center-wicket match exposure and inter-academy tournaments',
                'Comprehensive fitness, speed, agility, and core strength conditioning',
                'Video biomechanics feedback by former First-Class and BCCI coaches',
                'Clear development pathway towards district, school, and U-14 selection trials'
            ],
            'lead_coaches' => [
                'nayan-bhardwaj' => [
                    'name' => 'Mr. Nayan Bhardwaj',
                    'role' => 'Wicketkeeping & Fielding Coach',
                    'slug' => 'coach-nayan-bhardwaj',
                    'image' => 'assets/images/nb.jpg'
                ],
                'manoj-gupta' => [
                    'name' => 'Mr. Manoj Gupta',
                    'role' => 'Spin Specialist & Match Strategist',
                    'slug' => 'coach-manoj-gupta',
                    'image' => 'assets/images/mg.jpg'
                ]
            ],
            'weekly_routine' => [
                ['day' => 'Monday to Thursday', 'activity' => 'Turf Net Sessions + Technical Drills + S&C Fitness (3 Hours)'],
                ['day' => 'Friday', 'activity' => 'Bowling Machine Masterclass & Video Biomechanics Breakdown'],
                ['day' => 'Saturday', 'activity' => 'Full Center-Wicket Practice Match (25/30 Overs)'],
                ['day' => 'Sunday', 'activity' => 'Recovery / Tactical Video Review Session']
            ],
            'equipment_required' => 'Full cricket protective kit: regulation helmet, batting pads, gloves, thigh pad, chest guard, arm guard, abdominal guard, and cricket whites.',
            'faqs' => [
                [
                    'q' => 'How many matches do trainees play in this program?',
                    'a' => 'Trainees participate in at least one structured 25 to 40-over practice match every weekend, along with seasonal inter-academy leagues and invitation tournaments.'
                ],
                [
                    'q' => 'Is video analysis included in the training?',
                    'a' => 'Yes. Coaches conduct weekly high-speed camera recordings of batting stances and bowling release mechanics to correct errors with visual feedback.'
                ],
                [
                    'q' => 'Are academy players eligible for district age-group selections?',
                    'a' => 'Yes. Young Star Cricket Academy is affiliated with regional associations, and eligible standout players are directly forwarded to district and state trials.'
                ]
            ],
            'contact_subject' => 'Inquiry for Junior Development Program (Ages 11-14)'
        ],

        'senior-performance' => [
            'id' => 'senior-performance',
            'slug' => 'program-senior-performance',
            'title' => 'Senior Performance Program',
            'short_title' => 'Senior Performance',
            'age_group' => 'Age: 15–19 Years',
            'badge' => 'Elite Competition & State Trials',
            'level' => 'Advanced',
            'card_img' => 'assets/images/gemini-senior.jpg',
            'banner_img' => 'assets/images/gemini-senior.jpg',
            'headline' => 'Prepare for Competitive Cricket at the Highest Level.',
            'accent_color' => '#dd350b',
            'accent_gradient' => 'linear-gradient(135deg, #dd350b 0%, #b91c1c 100%)',
            'accent_light' => '#fef2f2',
            'icon_img' => 'assets/images/ic-3.png',
            'icon_fa' => 'fa-trophy',
            'schedule' => '6 Days / Week',
            'duration' => 'Annual & High-Performance Seasonal Camps',
            'timing' => 'Intensive Regimen (3.5–4 Hours/Day) + Tournaments',
            'batch_size' => 'Selective Admission (Skill & Fitness Tested)',
            'goal' => 'District, State & National Trophy Selection',
            'tagline' => 'Intense, professional-grade cricket training and match temperament building for serious athletes pursuing district, state, and first-class careers.',
            'overview' => 'The Senior Performance Program is our flagship competitive training track designed for cricketers aged 15 to 19 who aspire to represent State associations in BCCI domestic tournaments (Vinoo Mankad Trophy, Cooch Behar Trophy, Col. C.K. Nayudu Trophy) and top-tier senior club leagues.<br><br>The curriculum operates at professional cricket standards: high-intensity turf net sessions against 135+ kmph bowling and deceptive spin, deep tactical video review, pressure simulation scenarios, and intense athletic strength and conditioning. Trainees are mentored directly by former First-Class players who have navigated Ranji Trophy cricket.',
            'curriculum_modules' => [
                [
                    'title' => 'Module 1: High-Pace Batting & Power Hitting',
                    'icon' => 'fa-fire-alt',
                    'desc' => 'Handling fast short-pitched bowling, playing spin on deteriorating fourth-day wickets, bat-speed acceleration, and situational boundary hitting.'
                ],
                [
                    'title' => 'Module 2: Reverse Swing, Variations & Spell Craft',
                    'icon' => 'fa-magic',
                    'desc' => 'Shining the ball for reverse swing, executing yorkers and deceptive slower bouncers at the death, and bowling disciplined lines to attacking field settings.'
                ],
                [
                    'title' => 'Module 3: Elite Athletic Periodization & Injury Prehab',
                    'icon' => 'fa-dumbbell',
                    'desc' => 'Olympic lifting variations, rotator cuff and lumbar spine resilience, speed mechanics, and match-day nutritional strategies.'
                ],
                [
                    'title' => 'Module 4: Mental Toughness & Match Temperament',
                    'icon' => 'fa-brain',
                    'desc' => 'Coping with selection pressure, building fourth-innings match-winning patience, handling setbacks, and professional game visualization.'
                ]
            ],
            'key_highlights' => [
                'Direct supervision by Head Coach Kapil Pratap Singh (Ranji Trophy squad & ECB Level 2)',
                'High-frame-rate video biomechanics tracking bat-swing angle and release kinematics',
                'Regular participation in DDCA, UPCA, and All-India invitation tournaments',
                'Speed radar guns and programmable bowling machines replicating elite bowlers',
                'Direct exposure to state selectors, scouts, and visiting Ranji/IPL coaches',
                'Integrated access to the academy high-performance gymnasium and recovery center'
            ],
            'lead_coaches' => [
                'kapil-pratap-singh' => [
                    'name' => 'Kapil Pratap Singh',
                    'role' => 'Head Coach & Director of Cricket',
                    'slug' => 'coach-kapil-pratap-singh',
                    'image' => 'assets/images/kps.jpg'
                ],
                'suryabhan-singh' => [
                    'name' => 'Mr. Suryabhan Singh',
                    'role' => 'Head Pace Bowling & S&C Coach',
                    'slug' => 'coach-suryabhan-singh',
                    'image' => 'assets/images/sbs.jpg'
                ]
            ],
            'weekly_routine' => [
                ['day' => 'Mon / Wed / Fri', 'activity' => 'Intense Turf Nets + Biomechanics Correction + S&C Gym Workout'],
                ['day' => 'Tue / Thu', 'activity' => 'Open Net Simulations, Bowling Machine Match Scenarios & Death Overs Execution'],
                ['day' => 'Saturday', 'activity' => 'Full-Day 50-Over / Multi-Day League Fixture'],
                ['day' => 'Sunday', 'activity' => 'Recovery Protocol, Ice Baths & Tactical Video Debrief']
            ],
            'equipment_required' => 'Standard competitive hard-ball cricket equipment with two match bats, spiked turf shoes, rubber studs, and fitness workout gear.',
            'faqs' => [
                [
                    'q' => 'Is there an entrance trial for this program?',
                    'a' => 'Yes. Due to high demand and limited seats, candidates undergo a technical net assessment and physical fitness evaluation before admission is confirmed.'
                ],
                [
                    'q' => 'How does the academy assist with board examinations?',
                    'a' => 'We offer flexible morning and evening training shifts to ensure senior students can balance board exam preparation with elite cricket training.'
                ],
                [
                    'q' => 'Do academy players get opportunities in premier league clubs?',
                    'a' => 'Yes. Top performers are routinely placed with leading competitive clubs in Delhi-NCR and state-affiliated tournament squads.'
                ]
            ],
            'contact_subject' => 'Inquiry for Senior Performance Program (Ages 15-19)'
        ],

        'professional-coaching' => [
            'id' => 'professional-coaching',
            'slug' => 'program-professional-coaching',
            'title' => 'Professional Coaching & 1-on-1 Mentorship',
            'short_title' => 'Professional 1-on-1',
            'age_group' => 'Open Age / Selected Players',
            'badge' => 'Bespoke 1-on-1 Training',
            'level' => 'Advanced / Professional',
            'card_img' => 'assets/images/zite-professional.jpg',
            'banner_img' => 'assets/images/zite-professional.jpg',
            'headline' => 'Personalised Coaching for Serious Cricketers.',
            'accent_color' => '#0e91b2',
            'accent_gradient' => 'linear-gradient(135deg, #0e91b2 0%, #0369a1 100%)',
            'accent_light' => '#ecfeff',
            'icon_img' => 'assets/images/ic-44.png',
            'icon_fa' => 'fa-user-ninja',
            'schedule' => 'Customized Slots',
            'duration' => 'Per Session, 10-Session & Seasonal Master Packages',
            'timing' => 'Private Net Slots (Flexible Morning & Evening)',
            'batch_size' => 'Strictly 1-on-1 or Private Pods (Max 3 Players)',
            'goal' => 'Rapid Technical Correction & Elite Form Restoration',
            'tagline' => 'Exclusive, bespoke one-on-one masterclasses with senior coaching faculty to diagnose technical flaws, build variations, and accelerate player performance.',
            'overview' => 'Our Professional Coaching Program delivers personalized master training for ambitious cricketers seeking dedicated one-on-one intervention. Whether you are a batsman looking to eradicate an LBW susceptibility, a fast bowler recovering rhythm after injury, or a spinner developing a match-winning variation, this program provides undivided coaching focus.<br><br>Every session is customized around the athlete’s exact biomechanics, goals, and upcoming trials. Head coaches utilize multi-angle 240fps video recording, sensor-enabled bats, and automated bowling machines to test, diagnose, and recalibrate techniques with surgical precision.',
            'curriculum_modules' => [
                [
                    'title' => 'Module 1: High-Speed Bio-Mechanical Diagnosis',
                    'icon' => 'fa-video',
                    'desc' => 'Multi-angle camera assessment isolating kinetic chain sequencing: stance, trigger movements, bat path, delivery stride, and release position.'
                ],
                [
                    'title' => 'Module 2: Surgical Technical Correction Drills',
                    'icon' => 'fa-wrench',
                    'desc' => 'Isolating specific flaws through targeted progression drills: head falling over, closed face, bottom-hand dominance, or front-knee collapse.'
                ],
                [
                    'title' => 'Module 3: Bespoke Bowling Machine Regimens',
                    'icon' => 'fa-sliders-h',
                    'desc' => 'Repetitive delivery programming across various speeds, swing angles, and bounce levels to groove muscle memory and shot reflexes.'
                ],
                [
                    'title' => 'Module 4: Cognitive Match Strategy & Game Plans',
                    'icon' => 'fa-chess',
                    'desc' => 'Personalized match tactical blueprints, opposition video analysis, customized field setting plans, and mental pre-delivery routines.'
                ]
            ],
            'key_highlights' => [
                'Exclusive 1-on-1 access to Head Coach Kapil Pratap Singh and Senior Specialists',
                'Private dedicated turf nets and programmable 3-wheel bowling machine reserved for you',
                'Frame-by-frame video comparison against international technique benchmarks',
                'Personalized training diary with specific practice drills and target metrics',
                'Complete flexibility in scheduling around professional, university, or school routines',
                'Confidential pre-tournament preparation camps for state, district, and overseas players'
            ],
            'lead_coaches' => [
                'kapil-pratap-singh' => [
                    'name' => 'Kapil Pratap Singh',
                    'role' => 'Head Coach & Director of Cricket',
                    'slug' => 'coach-kapil-pratap-singh',
                    'image' => 'assets/images/kps.jpg'
                ],
                'rajeev-gupta' => [
                    'name' => 'Mr. Rajeev Gupta',
                    'role' => 'Senior Cricket Coach & Talent Selector',
                    'slug' => 'coach-rajeev-gupta',
                    'image' => 'assets/images/rg.jpg'
                ]
            ],
            'weekly_routine' => [
                ['day' => 'Flexible Sessions', 'activity' => '60 to 90 Minutes of Intensive 1-on-1 Technical Coaching'],
                ['day' => 'Post-Session', 'activity' => 'Video Review & Biomechanics Report Analysis with Coach'],
                ['day' => 'Homework Module', 'activity' => 'Specific Muscle Memory Drills & Strength Exercises']
            ],
            'equipment_required' => 'Personal cricket kit and preferred batting/bowling equipment. Specialized analysis sensors and cameras provided by academy.',
            'faqs' => [
                [
                    'q' => 'Can adult club and corporate cricketers book this program?',
                    'a' => 'Yes! We regularly train competitive club players, corporate tournament athletes, and overseas cricketers visiting India for specialized camps.'
                ],
                [
                    'q' => 'Can I choose which coach conducts my 1-on-1 sessions?',
                    'a' => 'Yes. Based on your specialization (batting, pace bowling, spin bowling, wicketkeeping), sessions can be booked with specific senior coaches.'
                ],
                [
                    'q' => 'How many sessions are recommended to see tangible improvement?',
                    'a' => 'Most players see noticeable technical correction within a 5-to-10 session package, combined with guided solo net practice.'
                ]
            ],
            'contact_subject' => 'Inquiry for Professional 1-on-1 Coaching Program'
        ],

        'cricket-hostel' => [
            'id' => 'cricket-hostel',
            'slug' => 'program-cricket-hostel',
            'title' => 'Academy Hostel & Residential Cricket Program',
            'short_title' => 'Cricket Hostel & Residential',
            'age_group' => 'Outstation & International Players',
            'badge' => 'Full Boarding & Immersion',
            'level' => 'Full Residential Immersion',
            'card_img' => 'assets/images/zite-hostel.jpg',
            'banner_img' => 'assets/images/zite-hostel.jpg',
            'headline' => 'Train Here. Stay Focused. Develop Faster.',
            'accent_color' => '#6b21a8',
            'accent_gradient' => 'linear-gradient(135deg, #6b21a8 0%, #4c1d95 100%)',
            'accent_light' => '#f5f3ff',
            'icon_img' => 'assets/images/ic-hostel.png',
            'icon_fa' => 'fa-hotel',
            'schedule' => 'Year-Round Boarding',
            'duration' => 'Annual, Term-Based & Summer Residential Camps',
            'timing' => 'Full-Day 24/7 Athlete Lifestyle Regimen',
            'batch_size' => 'Limited Capacity (Double & Triple Sharing Rooms)',
            'goal' => 'Full Cricket Immersion Without Travel Fatigue',
            'tagline' => 'A safe, disciplined, and comfortable residential boarding facility with sports nutrition, structured daily training, and academic support for outstation players.',
            'overview' => 'The Young Star Cricket Academy Hostel is created for talented outstation, interstate, and international cricketers dedicated to full-time player development. Located adjacent to our training grounds in Greater Noida, the hostel eliminates exhausting daily commutes and immerses trainees in an authentic professional sporting lifestyle.<br><br>Boarders follow an athlete’s daily regimen: early morning fitness, extensive morning and afternoon net sessions, nutritious meals planned by sports dietitians, supervised evening academic study hours, and 24/7 security with full-time resident wardens. Players build independence, camaraderie, and an uncompromising work ethic.',
            'curriculum_modules' => [
                [
                    'title' => 'Regimen 1: Morning Conditioning (6:00 AM – 7:30 AM)',
                    'icon' => 'fa-sun',
                    'desc' => 'Ground running, stamina conditioning, agility ladder drills, core activation, and athletic mobility under fitness trainers.'
                ],
                [
                    'title' => 'Regimen 2: Technical Skill & Turf Nets (9:00 AM – 1:00 PM)',
                    'icon' => 'fa-cricket',
                    'desc' => 'Intensive batting, bowling, and fielding sessions on natural turf pitches with automated bowling machines and video feedback.'
                ],
                [
                    'title' => 'Regimen 3: Athlete Nutrition & Rest (1:30 PM – 3:30 PM)',
                    'icon' => 'fa-utensils',
                    'desc' => 'Fresh, balanced high-protein athlete lunch, mandatory quiet rest period, hydration management, and physio recovery sessions.'
                ],
                [
                    'title' => 'Regimen 4: Center Wicket & Evening Study (4:00 PM – 8:30 PM)',
                    'icon' => 'fa-book-open',
                    'desc' => 'Match scenario practice, gym strength session, supervised academic study hall with high-speed Wi-Fi, and communal dinner.'
                ]
            ],
            'key_highlights' => [
                'Air-conditioned, modern rooms with individual wardrobes, study desks, and comfortable bedding',
                'In-house hygienic cafeteria providing 4 wholesome, protein-rich athlete meals daily',
                '24/7 CCTV surveillance, biometric access, and full-time resident hostel wardens',
                'Direct proximity to academy cricket grounds, turf nets, and fitness center',
                'Academic schooling support with partner schools and NIOS open-schooling boards',
                'Recreation lounge, sports library, table tennis, and weekend match travel arrangements'
            ],
            'lead_coaches' => [
                'kapil-pratap-singh' => [
                    'name' => 'Kapil Pratap Singh',
                    'role' => 'Head Coach & Director of Cricket',
                    'slug' => 'coach-kapil-pratap-singh',
                    'image' => 'assets/images/kps.jpg'
                ],
                'lokesh-bharti' => [
                    'name' => 'Mr. Lokesh Bharti',
                    'role' => 'Residential Mentor & Youth Coach',
                    'slug' => 'coach-lokesh-bharti',
                    'image' => 'assets/images/lb.jpg'
                ]
            ],
            'weekly_routine' => [
                ['day' => 'Monday to Friday', 'activity' => 'Dual Daily Training Sessions (Morning S&C + Afternoon Turf Nets) + Study Hall'],
                ['day' => 'Saturday', 'activity' => 'Weekend League Matches across Delhi-NCR / Regional Tournaments'],
                ['day' => 'Sunday', 'activity' => 'Rest, Recovery & Laundry Day, Video Review, Calling Home Time']
            ],
            'equipment_required' => 'Cricket match kits, personal apparel, casual clothing, personal toiletries, and educational study materials.',
            'faqs' => [
                [
                    'q' => 'What are the safety and security protocols for young residential players?',
                    'a' => 'We maintain round-the-clock security personnel, 24/7 CCTV monitoring across all public corridors, strict curfews, and resident wardens living on-site.'
                ],
                [
                    'q' => 'Are meals suitable for both vegetarian and non-vegetarian players?',
                    'a' => 'Yes. Our kitchen serves fresh, hygienic meals with separate vegetarian and non-vegetarian options planned to meet the caloric demands of competitive athletes.'
                ],
                [
                    'q' => 'How can outstation students manage their schooling while staying at the hostel?',
                    'a' => 'We have arrangements with reputable CBSE schools in Greater Noida for regular or sports-quota schooling, as well as dedicated tutoring for NIOS open-school students.'
                ]
            ],
            'contact_subject' => 'Inquiry for Academy Hostel & Residential Cricket Program'
        ],

        'gym-fitness' => [
            'id' => 'gym-fitness',
            'slug' => 'program-gym-fitness',
            'title' => 'Gym & High-Performance Conditioning Center',
            'short_title' => 'Gym & Conditioning',
            'age_group' => 'All Academy Players & Elite Athletes',
            'badge' => 'Specialist Sports Gym',
            'level' => 'All Levels (Age-Appropriate)',
            'card_img' => 'assets/images/zite-gym-interior.jpg',
            'banner_img' => 'assets/images/zite-gym-interior.jpg',
            'headline' => 'Build the Athlete Behind the Cricketer.',
            'accent_color' => '#16a34a',
            'accent_gradient' => 'linear-gradient(135deg, #15803d 0%, #166534 100%)',
            'accent_light' => '#f0fdf4',
            'icon_img' => 'assets/images/ic-gym.png',
            'icon_fa' => 'fa-dumbbell',
            'schedule' => 'Daily Access',
            'duration' => 'Annual & Ongoing Academy S&C Membership',
            'timing' => 'Morning & Evening Training Windows (Guided by S&C Coaches)',
            'batch_size' => 'Small Guided Pods for Proper Form & Safety',
            'goal' => 'Explosive Power, Speed & Zero-Injury Longevity',
            'tagline' => 'A cutting-edge strength, agility, and conditioning facility engineered specifically for modern fast bowling, athletic fielding, and explosive power hitting.',
            'overview' => 'Modern cricket is a game of explosive power, lightning reflexes, rapid recovery, and physical resilience. Our High-Performance Gym & Conditioning Center is not a generic gym — it is a cricket-specific athletic development laboratory managed by certified Strength & Conditioning specialists.<br><br>From fast bowlers building shoulder and lumbar durability to batsmen maximizing rotational torque and running speed between wickets, every athlete receives a tailored movement screening and periodized program designed to elevate on-field performance while preventing common overuse injuries.',
            'curriculum_modules' => [
                [
                    'title' => 'Module 1: Cricket-Specific Rotational Strength & Power',
                    'icon' => 'fa-weight-hanging',
                    'desc' => 'Trap-bar deadlifts, cable rotational chops, medicine-ball scoop throws, and kettlebell power drills for dynamic bat speed and throwing velocity.'
                ],
                [
                    'title' => 'Module 2: Fast Bowler Lumbar & Shoulder Prehab',
                    'icon' => 'fa-heartbeat',
                    'desc' => 'Scapular stabilization, rotator cuff strengthening, eccentric hamstring loading, and thoracic spine mobility to withstand bowling workloads.'
                ],
                [
                    'title' => 'Module 3: Speed, Agility & Quickness (SAQ)',
                    'icon' => 'fa-running',
                    'desc' => 'First-step acceleration, rapid deceleration mechanics, hurdle plyometrics, shuttle sprints, and sharp 180-degree boundary turns.'
                ],
                [
                    'title' => 'Module 4: Post-Match Recovery & Mobility Protocols',
                    'icon' => 'fa-spa',
                    'desc' => 'Foam rolling, dynamic myofascial release, contrast therapy, guided yoga mobility, and nutritional hydration recovery routines.'
                ]
            ],
            'key_highlights' => [
                'Equipped with commercial-grade Olympic bars, bumper plates, power cages, and turf sled track',
                'Personal guidance by certified Strength & Conditioning and NIS coaches',
                'Periodic physical testing: Yo-Yo test, 20m sprint radar, vertical jump, and core stability index',
                'Specific age-appropriate protocols: bodyweight mechanics for U-14s, progressive overload for seniors',
                'Specialized rehabilitation and return-to-play support for players recovering from injuries',
                'Hydration, sports electrolyte, and natural athletic nutrition guidance'
            ],
            'lead_coaches' => [
                'suryabhan-singh' => [
                    'name' => 'Mr. Suryabhan Singh',
                    'role' => 'Head Pace Bowling & S&C Coach',
                    'slug' => 'coach-suryabhan-singh',
                    'image' => 'assets/images/sbs.jpg'
                ],
                'nikhil-yadav' => [
                    'name' => 'Mr. Nikhil Yadav',
                    'role' => 'Strength & Conditioning Trainer',
                    'slug' => 'coach-nikhil-yadav',
                    'image' => 'assets/images/ny.jpg'
                ]
            ],
            'weekly_routine' => [
                ['day' => 'Mon / Thu', 'activity' => 'Lower Body Strength, Eccentric Hamstring Work & Rotational Core'],
                ['day' => 'Tue / Fri', 'activity' => 'Upper Body Power, Scapular Stability & Shoulder Prehab'],
                ['day' => 'Wednesday', 'activity' => 'Sprint Mechanics, Sled Pushes & Agility Ladder Conditioning'],
                ['day' => 'Saturday / Sunday', 'activity' => 'Match Day Readiness / Active Recovery & Guided Mobility']
            ],
            'equipment_required' => 'Standard gym workout attire, clean training sneakers, sweat towel, and personal hydration water bottle.',
            'faqs' => [
                [
                    'q' => 'Is weight training safe for young junior players under 14?',
                    'a' => 'Yes, because for younger cricketers, our trainers focus exclusively on bodyweight movements, coordination, flexibility, and core stability without heavy external weights.'
                ],
                [
                    'q' => 'Can players join the Gym & Fitness Center without other academy programs?',
                    'a' => 'Yes! We offer dedicated Athletic Strength & Conditioning memberships for cricketers and athletes wanting access to our specialist sports gym.'
                ],
                [
                    'q' => 'How are training routines tailored for batsmen versus bowlers?',
                    'a' => 'Fast bowlers receive intense rotator cuff, hamstring, and lumbar prehab, while batsmen focus heavily on core rotational torque, forearm strength, and acceleration.'
                ]
            ],
            'contact_subject' => 'Inquiry for Gym & High-Performance Fitness Center'
        ],
        'cricket-training' => [
            'id' => 'cricket-training',
            'slug' => 'cricket-training',
            'title' => 'Professional Cricket Training & Coaching Grounds',
            'short_title' => 'Cricket Training',
            'age_group' => 'Ages 6 to Senior / Pro',
            'badge' => 'Comprehensive Coaching',
            'level' => 'All Skill Levels (Grassroots to Elite)',
            'card_img' => 'assets/images/zite-ground.jpg',
            'banner_img' => 'assets/images/zite-ground.jpg',
            'headline' => 'Comprehensive Cricket Coaching on Professional Match Grounds.',
            'accent_color' => '#0e1b2e',
            'accent_gradient' => 'linear-gradient(135deg, #0e1b2e 0%, #1c3252 100%)',
            'accent_light' => '#f1f5f9',
            'icon_img' => 'assets/images/ic-1.png',
            'icon_fa' => 'fa-cricket',
            'schedule' => 'Daily Morning & Evening Batches',
            'duration' => 'Quarterly, Half-Yearly & Annual Enrollments',
            'timing' => '6:00 AM – 9:30 AM | 3:30 PM – 8:30 PM',
            'batch_size' => 'Strict 1:12 Coach Ratio',
            'goal' => 'Technical Mastery & Match Excellence',
            'tagline' => 'Scientific cricket coaching blending biomechanical precision, match intelligence, and athletic conditioning.',
            'overview' => 'Young Star Cricket Academy provides end-to-end cricket coaching across international-dimension grounds, floodlit practice wickets, and covered astroturf tracks in Greater Noida. Headed by NIS and BCCI certified coaches, our curriculum covers batting fundamentals, pace and spin bowling craft, dynamic athletic fielding, and situational match temperament.',
            'curriculum_modules' => [
                ['title' => 'Batting Biomechanics', 'icon' => 'fa-cricket', 'desc' => 'Footwork, head balance, front and back-foot strokeplay, and power-hitting technique.'],
                ['title' => 'Pace & Seam Craft', 'icon' => 'fa-bolt', 'desc' => 'Rhythm, wrist alignment, upright seam presentation, and Yorker/bouncer accuracy.'],
                ['title' => 'Spin Bowling Artistry', 'icon' => 'fa-undo-alt', 'desc' => 'Revolutions, drift, flight control, and mastering subtle variations.'],
                ['title' => 'Dynamic Fielding', 'icon' => 'fa-shield-alt', 'desc' => 'Direct hits, slip catching reflexes, boundary diving, and quick release.'],
                ['title' => 'Video Analysis', 'icon' => 'fa-video', 'desc' => 'Slow-motion high-speed camera review rectifying technical flaws frame-by-frame.'],
                ['title' => 'Match Temperament', 'icon' => 'fa-trophy', 'desc' => 'Weekly inter-academy league matches, pressure chasing, and tactical leadership.']
            ],
            'key_highlights' => [
                'International-standard turf match pitches and floodlit open wickets',
                'Strict 1:12 coach ratio ensuring individualized technical development',
                'Automated bowling machines with speed controls up to 150 km/h',
                'Comprehensive high-speed video capture and biomechanical stroke analysis',
                'Weekly competitive red-ball and white-ball league matches',
                'Direct nominations for district and state age-group trials'
            ],
            'lead_coaches' => [
                'rajeev-gupta' => ['name' => 'Mr. Rajeev Gupta', 'role' => 'Director & Chief Coach', 'slug' => 'coach-rajeev-gupta', 'image' => 'assets/images/rg.jpg'],
                'manoj-gupta' => ['name' => 'Mr. Manoj Gupta', 'role' => 'Senior Technical Director', 'slug' => 'coach-manoj-gupta', 'image' => 'assets/images/mg.jpg']
            ],
            'weekly_routine' => [
                ['day' => 'Mon – Fri', 'activity' => 'Technical Batting & Bowling Nets + High-Intensity Fielding (2–3 Hours)'],
                ['day' => 'Saturday', 'activity' => 'Full-Dress Inter-Academy League Practice Matches & Match Scenarios'],
                ['day' => 'Sunday', 'activity' => 'Recovery, Mobility Screening & 1-on-1 Corrective Video Sessions']
            ],
            'equipment_required' => 'Personal cricket kit (bat, pads, gloves, helmet, abdominal guard). Academy provides match balls, safety nets, and video analysis equipment.',
            'faqs' => [
                ['q' => 'What is the starting age for cricket training?', 'a' => 'We accept boys and girls starting from age 6 across age-segregated developmental batches.'],
                ['q' => 'Is a skill assessment required before admission?', 'a' => 'Yes, every prospective player takes part in a 1-day free trial evaluation with head coaches to determine batch placement.']
            ],
            'contact_subject' => 'Inquiry for Professional Cricket Training'
        ],
        'net-practice' => [
            'id' => 'net-practice',
            'slug' => 'net-practice',
            'title' => 'Turf Net Practice & Bowling Machine Sessions',
            'short_title' => 'Net Practice',
            'age_group' => 'All Ages & Skill Levels',
            'badge' => 'Turf Nets & Machines',
            'level' => 'All Levels (Amateur to Professional)',
            'card_img' => 'assets/images/zite-bowling-nets.webp',
            'banner_img' => 'assets/images/zite-bowling-nets.webp',
            'headline' => '10+ Professional Turf Lanes with Automated Bowling Machines.',
            'accent_color' => '#f97316',
            'accent_gradient' => 'linear-gradient(135deg, #ea580c 0%, #f97316 100%)',
            'accent_light' => '#fff7ed',
            'icon_img' => 'assets/images/ic-1.png',
            'icon_fa' => 'fa-baseball-ball',
            'schedule' => 'Daily Morning & Floodlit Evening Slots',
            'duration' => 'Hourly Bookings, Monthly Passes & Team Packages',
            'timing' => '6:00 AM – 11:30 AM | 3:30 PM – 8:30 PM',
            'batch_size' => 'Dedicated Lanes (Max 3–4 Batters per Net)',
            'goal' => 'Authentic Bounce & Repetition Volume',
            'tagline' => 'Sharpen your strokeplay and bowling consistency on curated natural turf pitches and automated bowling machine lanes.',
            'overview' => 'Young Star Cricket Academy hosts 10+ professional natural turf and astroturf net lanes in Greater Noida. Featuring automated programmable bowling machines (70–150 km/h with swing & spin), specialized sidearm throwdowns, and bright floodlighting, our net complex delivers high-volume, match-authentic practice year-round.',
            'curriculum_modules' => [
                ['title' => 'Curated Turf Pitches', 'icon' => 'fa-layer-group', 'desc' => 'Red and black clay pitches prepared by experienced groundsmen mirroring match bounce.'],
                ['title' => 'Automated Bowling Machines', 'icon' => 'fa-robot', 'desc' => 'Programmable dual-wheel machines delivering swing, cut, and speeds up to 150 km/h.'],
                ['title' => 'All-Weather Astroturf Lanes', 'icon' => 'fa-shield-alt', 'desc' => 'Heavy-duty synthetic turf tracks ensuring uninterrupted training during monsoons.'],
                ['title' => 'Full 25-Yard Fast Run-Ups', 'icon' => 'fa-running', 'desc' => 'Unrestricted approach space for fast bowlers without crowding or tripping hazards.'],
                ['title' => 'Sidearm Speed Specialists', 'icon' => 'fa-baseball-ball', 'desc' => 'High-velocity 135+ km/h steep bounce throwdowns for reaction time and power defense.'],
                ['title' => 'Floodlit Evening Sessions', 'icon' => 'fa-lightbulb', 'desc' => 'Powerful LED floodlighting allowing intense practice after school or work hours.']
            ],
            'key_highlights' => [
                '10+ professional practice lanes with natural clay and astroturf decks',
                'Automated programmable bowling machines with dimple & leather ball options',
                'Floodlit evening practice availability until 8:30 PM',
                'Full 25-yard bowler run-ups with bowling crease markers',
                'Sidearm throwdown specialists available for 1-on-1 power batting practice',
                'Individual player passes, monthly memberships, and corporate club rentals'
            ],
            'lead_coaches' => [
                'rajeev-gupta' => ['name' => 'Mr. Rajeev Gupta', 'role' => 'Director & Chief Coach', 'slug' => 'coach-rajeev-gupta', 'image' => 'assets/images/rg.jpg']
            ],
            'weekly_routine' => [
                ['day' => 'Morning (6:00 AM – 9:00 AM)', 'activity' => 'Fresh Pitch Match Simulation & Seam Bowling Nets'],
                ['day' => 'Midday (9:30 AM – 12:00 PM)', 'activity' => 'Individual Bowling Machine Practice & Biomechanical Capture'],
                ['day' => 'Evening (5:00 PM – 8:30 PM)', 'activity' => 'Floodlit Intensive Group Nets & Throwdown Masterclasses']
            ],
            'equipment_required' => 'Full protective gear mandatory (helmet with grille, pads, gloves, thigh guard, abdominal guard). Machine balls and practice leather balls provided.',
            'faqs' => [
                ['q' => 'Can guest cricketers or external teams book net lanes?', 'a' => 'Yes, our turf nets and bowling machines are available for individual or club bookings by reservation.'],
                ['q' => 'Are spikes allowed on the turf practice wickets?', 'a' => 'Yes, full metal and rubber spikes are permitted on natural turf wickets for authentic match grip.']
            ],
            'contact_subject' => 'Inquiry for Turf Net Practice & Bowling Machine Sessions'
        ]
    ];
}

function getProgramById(string $id): ?array
{
    $aliasMap = [
        'foundation' => 'foundation-cricket',
        'junior' => 'junior-development',
        'senior' => 'senior-performance',
        'professional' => 'professional-coaching',
        'hostel' => 'cricket-hostel',
        'gym' => 'gym-fitness',
        'training' => 'cricket-training',
        'cricket-training' => 'cricket-training',
        'nets' => 'net-practice',
        'net-practice' => 'net-practice',
        'program-foundation-cricket' => 'foundation-cricket',
        'program-junior-development' => 'junior-development',
        'program-senior-performance' => 'senior-performance',
        'program-professional-coaching' => 'professional-coaching',
        'program-cricket-hostel' => 'cricket-hostel',
        'program-gym-fitness' => 'gym-fitness'
    ];

    $cleanId = $aliasMap[$id] ?? $id;
    $programs = getProgramsList();
    return $programs[$cleanId] ?? null;
}

function getCoachingPrograms(): array
{
    $programs = getProgramsList();
    return array_filter($programs, static function ($key) {
        return in_array($key, [
            'foundation-cricket',
            'junior-development',
            'senior-performance',
            'professional-coaching'
        ], true);
    }, ARRAY_FILTER_USE_KEY);
}

function getFacilitiesList(): array
{
    $programs = getProgramsList();
    return array_filter($programs, static function ($key) {
        return in_array($key, [
            'cricket-training',
            'net-practice',
            'cricket-hostel',
            'gym-fitness'
        ], true);
    }, ARRAY_FILTER_USE_KEY);
}

