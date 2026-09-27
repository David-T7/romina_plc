{{--
    Shared apply form.
    $position — position array when pre-selected (show page), null for general (index page)
    $positions — array of open positions for the dropdown (used when $position is null)
--}}

@if (session('success'))
    <p class="f-status car-success" role="status">
        Your application was submitted — thank you! We'll be in touch if your profile is a strong match.
    </p>
@endif

@if (session('mail_error'))
    <p class="f-status err" role="alert">
        We couldn't send your application right now. Please email us directly at
        <a href="mailto:{{ config('careers.notify_email') }}">{{ config('careers.notify_email') }}</a>.
    </p>
@endif

<form class="car-form" id="carApplyForm" method="POST" action="{{ route('careers.apply') }}" enctype="multipart/form-data" novalidate>
    @csrf

    {{-- Honeypot — bots fill this, humans don't see it --}}
    <input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true"
           style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;">

    {{-- Position --}}
    @if ($position)
        <input type="hidden" name="position" value="{{ $position['slug'] }}">
        <p class="car-pos-label">
            Applying for: <strong>{{ $position['title'] }}</strong> &mdash; {{ $position['business'] }}
        </p>
    @else
        <div class="f">
            <label for="apply_position">Position</label>
            <select class="field" id="apply_position" name="position">
                <option value="general" {{ old('position', 'general') === 'general' ? 'selected' : '' }}>
                    General application
                </option>
                @foreach ($positions as $pos)
                    <option value="{{ $pos['slug'] }}" {{ old('position') === $pos['slug'] ? 'selected' : '' }}>
                        {{ $pos['title'] }} &mdash; {{ $pos['business'] }}
                    </option>
                @endforeach
            </select>
            @error('position')
                <span class="car-err" role="alert">{{ $message }}</span>
            @enderror
        </div>
    @endif

    <div class="f-row">
        <div class="f">
            <label for="apply_name">Full name</label>
            <input class="field" type="text" id="apply_name" name="full_name"
                   value="{{ old('full_name') }}" autocomplete="name" required>
            @error('full_name')
                <span class="car-err" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="f">
            <label for="apply_email">Email</label>
            <input class="field" type="email" id="apply_email" name="email"
                   value="{{ old('email') }}" autocomplete="email" required>
            @error('email')
                <span class="car-err" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="f">
        <label for="apply_phone">Phone</label>
        <input class="field" type="tel" id="apply_phone" name="phone"
               value="{{ old('phone') }}" autocomplete="tel" required>
        @error('phone')
            <span class="car-err" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div class="f">
        <label for="apply_cover">Cover letter <span style="font-weight:400;color:#999;">(optional)</span></label>
        <textarea class="field" id="apply_cover" name="cover_letter" rows="5"
                  placeholder="Tell us why you're interested in this role…">{{ old('cover_letter') }}</textarea>
        @error('cover_letter')
            <span class="car-err" role="alert">{{ $message }}</span>
        @enderror
    </div>

    {{-- CV drag-and-drop zone --}}
    <div class="f">
        <label>CV / Resume</label>
        <div class="cv-drop" id="cvDropZone" role="button" tabindex="0"
             aria-label="Click or drag and drop to upload your CV">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true" class="cv-icon">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="17 8 12 3 7 8"/>
                <line x1="12" y1="3" x2="12" y2="15"/>
            </svg>
            <span class="cv-prompt">
                Drag &amp; drop your CV here, or <span class="cv-browse">browse</span>
            </span>
            <span class="cv-hint">PDF, DOC, DOCX &mdash; max 5 MB</span>
            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx"
                   class="cv-input" aria-label="Upload your CV" required>
        </div>
        <p class="cv-info" id="cvInfo" aria-live="polite"></p>
        @error('cv')
            <span class="car-err" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div class="f-actions">
        <button type="submit" class="ctc-send-btn" id="carSubmitBtn">
            Submit application
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
            </svg>
        </button>
    </div>

</form>

<script>
(function () {
    var drop     = document.getElementById('cvDropZone');
    var input    = document.getElementById('cv');
    var info     = document.getElementById('cvInfo');
    var form     = document.getElementById('carApplyForm');
    var btn      = document.getElementById('carSubmitBtn');
    var ALLOWED  = ['pdf', 'doc', 'docx'];
    var MAX_BYTES = 5 * 1024 * 1024;

    function setFile(file) {
        var ext = file.name.split('.').pop().toLowerCase();
        info.className = 'cv-info';
        if (!ALLOWED.includes(ext)) {
            info.textContent = 'Only PDF, DOC or DOCX files are allowed.';
            info.classList.add('cv-err');
            drop.classList.remove('cv-has-file');
            return false;
        }
        if (file.size > MAX_BYTES) {
            info.textContent = 'File must be under 5 MB.';
            info.classList.add('cv-err');
            drop.classList.remove('cv-has-file');
            return false;
        }
        var kb = (file.size / 1024).toFixed(0);
        info.textContent = file.name + ' (' + kb + ' KB)';
        info.classList.add('cv-ok');
        drop.classList.add('cv-has-file');
        return true;
    }

    if (drop && input) {
        drop.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); input.click(); }
        });

        drop.addEventListener('dragover', function (e) {
            e.preventDefault();
            drop.classList.add('cv-over');
        });
        drop.addEventListener('dragleave', function () {
            drop.classList.remove('cv-over');
        });
        drop.addEventListener('drop', function (e) {
            e.preventDefault();
            drop.classList.remove('cv-over');
            var files = e.dataTransfer.files;
            if (!files.length) return;
            try {
                var dt = new DataTransfer();
                dt.items.add(files[0]);
                input.files = dt.files;
            } catch (err) { /* fallback: file won't be preloaded but drop zone shows info */ }
            setFile(files[0]);
        });

        input.addEventListener('change', function () {
            if (input.files && input.files[0]) setFile(input.files[0]);
        });

        /* Prevent the hidden input's click from bubbling back to the drop zone */
        input.addEventListener('click', function (e) { e.stopPropagation(); });
        drop.addEventListener('click', function () { input.click(); });
    }

    if (form && btn) {
        form.addEventListener('submit', function () {
            btn.disabled = true;
            btn.textContent = 'Sending…';
        });
    }
}());
</script>
