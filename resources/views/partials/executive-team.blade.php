<!-- =====================================================
     EXECUTIVE TEAM
     Pass ['extendedTeam' => true] to also show the second grid.
===================================================== -->

@php
    // Placeholder names, positions and role descriptions — replace once the team supplies them.
    // Leave 'photo' as null to show the "photo coming soon" placeholder.
    $teamGrids = [
        [
            'label'   => 'EXECUTIVE LEADERSHIP',
            'members' => [
                [
                    'name'     => 'Michael Girma',
                    'position' => 'Chief Executive Officer, CEO',
                    'photo'    => 'images/team/executive-06.jpg',
                    'role'     => 'Sets the Group\'s strategic direction and leads the executive team, overseeing growth across hospitality, coffee export, trading and distribution.',
                ],
                [
                    'name'     => 'Kumlachew Mulugeta',
                    'position' => 'Deputy CEO',
                    'photo'    => 'images/team/executive-02.jpg',
                    'role'     => 'Supports the CEO in managing the organization and helps ensure that business goals and plans are achieved.
                                    Oversees key departments, coordinates senior managers, and represents the CEO when required.',
                ],
                [
                    'name'     => 'Blen Mekonnen',
                    'position' => 'HR Director',
                    'photo'    => 'images/team/executive-03.jpg',
                    'role'     => 'Leads the organization’s human resources activities.
                                    Manages recruitment, employee development, performance, workplace policies, employee relations, and staff welfare.',
                ],
                [
                    'name'     => 'Elias Dagne',
                    'position' => 'Finance Director',
                    'photo'    => 'images/team/executive-04.jpg',
                    'role'     => 'Leads the organization’s financial management. Oversees budgeting, accounting, financial reporting, cash flow, financial controls, and ensures the organization uses its resources responsibly.',
                ],

            ],
        ],
        [
            'label'   => 'BUSINESS LEADERSHIP',
            'members' => [
                [
                    'name'     => 'Birhanu Legesse',
                    'position' => 'Quality Director',
                    'photo'    => 'images/team/executive-05.jpg',
                    'role'     => 'Ensures products, services, and processes meet required standards and continuously improves quality across the organization.',
                ],
                [
                    'name'     => 'Ephrem Getachew',
                    'position' => 'Export and Import Director',
                    'photo'    => 'images/team/executive-01.jpg',
                    'role'     => 'Oversees international trade, shipping, documentation, customs requirements, suppliers, customers, and compliance with trade regulations.',
                ],
                [
                    'name'     => 'Aselefech Ketsela',
                    'position' => 'Learning and Development Director',
                    'photo'    => 'images/team/executive-07.jpg',
                    'role'     => 'Identifies training needs, develops learning programs, and supports employees in building the skills needed for organizational growth.',
                ],
                [
                    'name'     => 'Nejat Hassen',
                    'position' => 'Chief of Staff',
                    'photo'    => 'images/team/executive-08.jpg',
                    'role'     => 'Follows up on strategic initiatives, coordinates senior leaders, prepares important meetings and reports, and helps ensure decisions are implemented effectively.',
                ],
            ],
        ],
    ];

    if (empty($extendedTeam)) {
        $teamGrids = array_slice($teamGrids, 0, 1);
    }
@endphp

<section class="executive-team-section" id="executive-team">

    <div class="executive-team-container">

        <!-- HEADER -->

        <div class="executive-team-header">

            <div class="executive-team-label">
                THE TEAM
            </div>

            <div class="executive-team-heading">

                <h2>
                    Experienced people,
                    <span>shared direction.</span>
                </h2>

                <p>
                    Our executive team consists of industry experts
                    with diverse and reliable experience, overseeing
                    the Group's assets and guiding it towards success
                    through strategic leadership and vision.
                </p>

            </div>

        </div>


        <!-- TEAM MEMBERS -->

        @foreach ($teamGrids as $grid)

            <div class="executive-team-grid">

                @foreach ($grid['members'] as $member)

                    <article class="executive-member" tabindex="0">

                        <div class="executive-photo">

                            @if ($member['photo'])
                                <img loading="lazy" decoding="async"
                                    src="{{ asset($member['photo']) }}"
                                    alt="{{ $member['name'] }}, {{ $member['position'] }}"
                                >
                            @else
                                <div class="executive-photo-placeholder" aria-hidden="true">
                                    <span>ROMINA</span>
                                    <small>PHOTO COMING SOON</small>
                                </div>
                            @endif

                            <span class="executive-hint" aria-hidden="true">
                                <i class="fa-solid fa-plus"></i>
                            </span>

                            <!-- Role description, revealed on hover / focus -->
                            <div class="executive-overlay">
                                <span class="executive-overlay-label">The role</span>
                                <p>{{ $member['role'] }}</p>
                            </div>

                        </div>

                        <div class="executive-info">

                            <span>
                                {{ $grid['label'] }}
                            </span>

                            <h3>
                                {{ $member['name'] }}
                            </h3>

                            <p>
                                {{ $member['position'] }}
                            </p>

                        </div>

                    </article>

                @endforeach

            </div>

        @endforeach


        <!-- BOTTOM STATEMENT -->

        <div class="executive-team-bottom">

            <div class="executive-team-line"></div>

            <p>
                Strategic leadership.
                <span>Long-term vision.</span>
            </p>

        </div>

    </div>

</section>
