    {{--
         CONTACT — ported from React romina.jsx (Contact component)
         id="contact" is the canonical anchor for nav links and the footer.
    --}}

    <section class="ctc" id="contact">

        {{-- LEFT: full-bleed navy, content self-constrained to max-width:640px --}}
        <div class="ctc-info">
            <div class="ctc-in">

                <p class="mark tone-white">
                    <span class="mark-rule"></span>
                    <i></i>
                    Contact
                </p>

                <h2 class="ctc-display">Let's talk</h2>

                <div class="c-block">
                    <p class="c-label">Head office</p>
                    <p>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="c-icon" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        Bole Atlas, Cape Verde Street, in front of the European Union, Noah Diplomat Building, 13th floor, Addis Ababa, Ethiopia
                    </p>
                </div>

                <div class="c-block">
                    <p class="c-label">Email</p>
                    <a href="mailto:info@rominaplc.com">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="c-icon" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        info@rominaplc.com
                    </a>
                </div>

                <div class="c-block">
                    <p class="c-label">Divisions</p>
                    <ul class="c-phones">
                        <?php
                        $phones = [
                            ['KOBA',           '+251 900 989 898'],
                            ['Meskott',         '+251 90 387 9999'],
                            ['Romina Imports',  '0116 669 100'],
                            ['Jaquar World',    '+251 944 143 073'],
                        ];
                        ?>
                        @foreach ($phones as [$biz, $tel])
                            <li>
                                <span>{{ $biz }}</span>
                                <a href="tel:{{ preg_replace('/\s/', '', $tel) }}">{{ $tel }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>{{-- .ctc-in --}}
        </div>{{-- .ctc-info --}}

        {{-- RIGHT: white form — client-side only, no server submission --}}
        <form class="ctc-form" id="ctcForm" onsubmit="return false;" novalidate>

            <div class="f-row">
                <div class="f">
                    <input class="field" type="text"  id="ctc_name"    name="name"    autocomplete="name"  placeholder=" ">
                    <label for="ctc_name">Name</label>
                </div>
                <div class="f">
                    <input class="field" type="email" id="ctc_email"   name="email"   autocomplete="email" placeholder=" ">
                    <label for="ctc_email">Email</label>
                </div>
            </div>

            <div class="f-row">
                <div class="f">
                    <input class="field" type="tel"   id="ctc_phone"   name="phone"   autocomplete="tel"   placeholder=" ">
                    <label for="ctc_phone">Phone</label>
                </div>
                <div class="f">
                    <input class="field" type="text"  id="ctc_subject" name="subject" placeholder=" ">
                    <label for="ctc_subject">Subject</label>
                </div>
            </div>

            <div class="f">
                <textarea class="field" id="ctc_message" name="message" rows="3" placeholder=" "></textarea>
                <label for="ctc_message">Message</label>
            </div>

            <div class="f-actions">
                <button type="submit" class="ctc-send-btn">
                    Send message
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
                <p class="f-status" id="ctcStatus" role="status" style="display:none"></p>
            </div>

        </form>

    </section>
