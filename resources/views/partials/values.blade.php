{{-- =============================================
     VALUES — "Why choose Romina"
     React exact port: values section
============================================== --}}

<section class="values-section" id="values">
    <div class="values-wrap values-grid">

        {{-- Left: list --}}
        <div>
            <p class="mark">
                <span class="mark-rule"></span>
                <i aria-hidden="true"></i>
                <span data-i18n="why_choose_romina">{{ __('site.why_choose_romina') }}</span>
            </p>

            <ul class="val-list" id="valList">

                <li class="on" data-index="0">
                    <button type="button" aria-expanded="true">
                        <span class="val-word" data-i18n="val_0_name">{{ __('site.val_0_name') }}</span>
                        <i class="val-dot" aria-hidden="true"></i>
                    </button>
                    <p class="val-inline" data-i18n="val_0_text">{{ __('site.val_0_text') }}</p>
                </li>

                <li data-index="1">
                    <button type="button" aria-expanded="false">
                        <span class="val-word" data-i18n="val_1_name">{{ __('site.val_1_name') }}</span>
                        <i class="val-dot" aria-hidden="true"></i>
                    </button>
                    <p class="val-inline" data-i18n="val_1_text">{{ __('site.val_1_text') }}</p>
                </li>

                <li data-index="2">
                    <button type="button" aria-expanded="false">
                        <span class="val-word" data-i18n="val_2_name">{{ __('site.val_2_name') }}</span>
                        <i class="val-dot" aria-hidden="true"></i>
                    </button>
                    <p class="val-inline" data-i18n="val_2_text">{{ __('site.val_2_text') }}</p>
                </li>

                <li data-index="3">
                    <button type="button" aria-expanded="false">
                        <span class="val-word" data-i18n="val_3_name">{{ __('site.val_3_name') }}</span>
                        <i class="val-dot" aria-hidden="true"></i>
                    </button>
                    <p class="val-inline" data-i18n="val_3_text">{{ __('site.val_3_text') }}</p>
                </li>

                <li data-index="4">
                    <button type="button" aria-expanded="false">
                        <span class="val-word" data-i18n="val_4_name">{{ __('site.val_4_name') }}</span>
                        <i class="val-dot" aria-hidden="true"></i>
                    </button>
                    <p class="val-inline" data-i18n="val_4_text">{{ __('site.val_4_text') }}</p>
                </li>

            </ul>
        </div>

        {{-- Right: sticky card --}}
        <aside class="val-side" aria-live="polite">
            <div class="val-card" id="valCard">
                <span class="divider" aria-hidden="true"><b></b><i></i><b></b></span>
                <p class="val-name" id="valName">{{ __('site.val_0_name') }}</p>
                <p class="val-text" id="valText">{{ __('site.val_0_text') }}</p>
            </div>
        </aside>

    </div>
</section>
