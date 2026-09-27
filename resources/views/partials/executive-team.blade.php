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
                    'name'     => 'Executive Name',
                    'position' => 'Chief Executive Officer',
                    'photo'    => 'images/team/executive-01.jpg',
                    'role'     => 'Sets the Group\'s strategic direction and leads the executive team, overseeing growth across hospitality, coffee export, trading and distribution.',
                ],
                [
                    'name'     => 'Executive Name',
                    'position' => 'Chief Financial Officer',
                    'photo'    => 'images/team/executive-02.jpg',
                    'role'     => 'Oversees financial planning, reporting and investment across the Group, keeping every business on a sound and sustainable footing.',
                ],
                [
                    'name'     => 'Executive Name',
                    'position' => 'Chief Operating Officer',
                    'photo'    => 'images/team/executive-03.jpg',
                    'role'     => 'Runs day-to-day operations across the Group\'s businesses, driving quality, efficiency and consistent standards of service.',
                ],
                [
                    'name'     => 'Executive Name',
                    'position' => 'Director of Hospitality',
                    'photo'    => 'images/team/executive-04.jpg',
                    'role'     => 'Leads Romina Restaurants, KOBA and Meskott, shaping the guest experience and the culinary standards behind each brand.',
                ],
            ],
        ],
        [
            'label'   => 'BUSINESS LEADERSHIP',
            'members' => [
                [
                    'name'     => 'Executive Name',
                    'position' => 'Managing Director, Romina Coffee',
                    'photo'    => null,
                    'role'     => 'Leads sourcing, processing and export of Ethiopian Arabica, working with farmer partners and buyers across four continents.',
                ],
                [
                    'name'     => 'Executive Name',
                    'position' => 'General Manager, KOBA',
                    'photo'    => null,
                    'role'     => 'Oversees KOBA\'s patisserie and bakery branches, from artisan production to the cafe experience across Addis Ababa.',
                ],
                [
                    'name'     => 'Executive Name',
                    'position' => 'General Manager, Romina Imports',
                    'photo'    => null,
                    'role'     => 'Manages the import and distribution of quality FMCG products supplied to the Ethiopian market.',
                ],
                [
                    'name'     => 'Executive Name',
                    'position' => 'General Manager, Jaquar World',
                    'photo'    => null,
                    'role'     => 'Leads Jaquar World Addis Ababa, the Group\'s partnership with Jaquar Group for complete bathroom solutions.',
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
                                <img
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
