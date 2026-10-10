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

                <h2 class="ctc-display">Contact us</h2>

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
                    <input class="field" type="text" id="ctc_name" name="name" autocomplete="name" placeholder=" " required value="{{ old('name') }}" aria-describedby="ctc_name_error" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">
                    <label for="ctc_name">Name</label>
                    <p class="ctc-error" id="ctc_name_error" aria-live="polite" @unless($errors->has('name')) hidden @endunless>@error('name'){{ $message }}@enderror</p>
                </div>
                <div class="f">
                    <input class="field" type="email" id="ctc_email" name="email" autocomplete="email" placeholder=" " required value="{{ old('email') }}" aria-describedby="ctc_email_error" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}">
                    <label for="ctc_email">Email</label>
                    <p class="ctc-error" id="ctc_email_error" aria-live="polite" @unless($errors->has('email')) hidden @endunless>@error('email'){{ $message }}@enderror</p>
                </div>
            </div>

            <div class="f-row">
                <div class="f">
                    <input class="field" type="tel" id="ctc_phone" name="phone" autocomplete="tel" inputmode="numeric" pattern="[0-9]*" placeholder=" " value="{{ old('phone') }}" aria-describedby="ctc_phone_error" aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}">
                    <label for="ctc_phone">Phone</label>
                    <p class="ctc-error" id="ctc_phone_error" aria-live="polite" @unless($errors->has('phone')) hidden @endunless>@error('phone'){{ $message }}@enderror</p>
                </div>
                <div class="f">
                    <input class="field" type="text" id="ctc_subject" name="subject" placeholder=" " value="{{ old('subject') }}" aria-describedby="ctc_subject_error" aria-invalid="{{ $errors->has('subject') ? 'true' : 'false' }}">
                    <label for="ctc_subject">Subject</label>
                    <p class="ctc-error" id="ctc_subject_error" aria-live="polite" @unless($errors->has('subject')) hidden @endunless>@error('subject'){{ $message }}@enderror</p>
                </div>
            </div>

            <div class="f ctc-message">
                <textarea class="field" id="ctc_message" name="message" rows="1" placeholder=" " required aria-describedby="ctc_message_error" aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}">{{ old('message') }}</textarea>
                <label for="ctc_message">Message</label>
                <p class="ctc-error" id="ctc_message_error" aria-live="polite" @unless($errors->has('message')) hidden @endunless>@error('message'){{ $message }}@enderror</p>
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
