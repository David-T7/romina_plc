{{-- =========================================================
     ROMINA ASSISTANT — Floating Chatbot
     v1.0 — Pure vanilla JS, no external dependencies
     Knowledge base + local keyword matching engine
     Coordinates with the 15s intro overlay via MutationObserver
     ========================================================= --}}

{{-- ── FLOATING TOGGLE BUTTON ── --}}
{{-- Icon-only circular button — no text label. Tooltip via aria-label + CSS ::after --}}
<button
    id="rc-toggle"
    class="rc-toggle"
    aria-label="Open Romina Assistant"
    aria-expanded="false"
    aria-controls="rc-window"
    hidden
>
    {{-- Premium AI/chatbot robot icon (SVG, no external dependency) --}}
    <span class="rc-toggle-icon" aria-hidden="true">
        <svg width="26" height="26" viewBox="0 0 48 48" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            {{-- Head / main body --}}
            <rect x="10" y="14" width="28" height="22" rx="6" fill="currentColor" opacity="0.15"/>
            <rect x="10" y="14" width="28" height="22" rx="6" stroke="currentColor" stroke-width="2.2" fill="none"/>
            {{-- Eyes --}}
            <circle cx="19" cy="24" r="3" fill="currentColor"/>
            <circle cx="29" cy="24" r="3" fill="currentColor"/>
            {{-- Mouth --}}
            <path d="M19 30 Q24 33.5 29 30" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
            {{-- Antenna --}}
            <line x1="24" y1="14" x2="24" y2="8" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
            <circle cx="24" cy="6.5" r="2.5" fill="#E8132C"/>
            {{-- Ears / side connectors --}}
            <rect x="6"  y="20" width="4" height="8" rx="2" fill="currentColor" opacity="0.5"/>
            <rect x="38" y="20" width="4" height="8" rx="2" fill="currentColor" opacity="0.5"/>
        </svg>
    </span>
</button>

{{-- ── CHAT WINDOW ── --}}
<div
    id="rc-window"
    class="rc-window"
    role="dialog"
    aria-label="Romina Assistant"
    aria-modal="false"
    aria-hidden="true"
    hidden
>
    {{-- Header --}}
    <div class="rc-header">
        <div class="rc-header-info">
            <div class="rc-header-avatar" aria-hidden="true">
                <img src="{{ asset('images/logo/logo-romina-white.svg') }}"
                     alt="" width="88" height="28">
            </div>
            <div>
                <p class="rc-header-name">Romina Assistant</p>
                <p class="rc-header-sub">How can we help you?</p>
            </div>
        </div>
        <button class="rc-close" id="rc-close" aria-label="Close Romina Assistant">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    {{-- Messages --}}
    <div class="rc-body" id="rc-body">
        <div class="rc-messages" id="rc-messages" aria-live="polite" aria-relevant="additions"></div>
    </div>

    {{-- Quick questions --}}
    <div class="rc-quick" id="rc-quick" aria-label="Suggested questions"></div>

    {{-- Input --}}
    <div class="rc-footer">
        <form class="rc-form" id="rc-form" onsubmit="return false;" autocomplete="off">
            <input
                type="text"
                id="rc-input"
                class="rc-input"
                placeholder="Ask about Romina Group…"
                aria-label="Your question"
                maxlength="300"
                autocomplete="off"
                spellcheck="false"
            >
            <button type="submit" class="rc-send" aria-label="Send message">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"/>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                </svg>
            </button>
        </form>
    </div>
</div>

<script>
/* =============================================================
   ROMINA ASSISTANT — complete chatbot logic
   ============================================================= */
(function () {
    'use strict';

    /* ── DOM refs ── */
    var toggle   = document.getElementById('rc-toggle');
    var win      = document.getElementById('rc-window');
    var closeBtn = document.getElementById('rc-close');
    var messages = document.getElementById('rc-messages');
    var quickEl  = document.getElementById('rc-quick');
    var form     = document.getElementById('rc-form');
    var input    = document.getElementById('rc-input');
    var body     = document.getElementById('rc-body');

    /* ─────────────────────────────────────────────────────────
       A. KNOWLEDGE BASE
    ───────────────────────────────────────────────────────── */
    var TOPICS = [
        {
            id: 'about',
            keywords: ['romina','about','group','company','history','established','founded','1973','holding','ethiopia','ethiopian','who','overview','general'],
            shortAnswer: 'Romina Group is an Ethiopian holding company established in 1973 and headquartered in Addis Ababa. The Group operates across hospitality and restaurants, coffee exporting, international trading, and importing and distribution. Romina began with a restaurant in Arat Kilo and has grown into a diversified enterprise spanning multiple sectors.',
            followUp: 'Would you like to learn about one of our business sectors?',
            route: null, routeLabel: null
        },
        {
            id: 'restaurants',
            keywords: ['restaurant','restaurants','dining','food','culinary','hospitality','catering','takeaway','european','asian','dishes','arat kilo','eat','menu','cuisine'],
            shortAnswer: 'Romina Restaurants focuses on great hospitality, attentive service, and home-style dishes. The culinary offering includes European, Asian, and Ethiopian cuisine, along with catering and takeaway services.',
            followUp: 'Would you like to know about KOBA Patisserie or Meskott?',
            route: '#brands', routeLabel: 'Explore Restaurants'
        },
        {
            id: 'koba',
            keywords: ['koba','patisserie','bakery','pastry','pastries','cake','cakes','bakery','breakfast','sandford','atlas','peacock','ics','artisan','bread'],
            shortAnswer: 'KOBA Patisserie & Bakery was established in 2020. KOBA specialises in pastries, cakes, artisan bakery products, breakfast, specialty coffee, and savoury dishes. Locations include Arat Kilo, Sandford, Atlas, and Peacock — with ICS coming soon.',
            followUp: 'Would you like to know about Meskott or Romina Coffee?',
            route: '#brands', routeLabel: 'Explore KOBA'
        },
        {
            id: 'meskott',
            keywords: ['meskott','culinary','experience','upscale','bar','cocktail','cocktails','wine','wines','fine dining','vip','street food','sellassie','twin towers','king george'],
            shortAnswer: 'Meskott Culinary Experience is an upscale dining and bar concept in Addis Ababa, offering international cuisine, wines, spirits, cocktails, fine dining, a VIP table area, a street food garden, and a bar experience. Located at Arat Kilo, King George VI Street, ground floor of Sellassie Twin Towers. Phone: +251 90 387 9999.',
            followUp: null,
            route: '#brands', routeLabel: 'Explore Meskott'
        },
        {
            id: 'coffee',
            keywords: ['coffee','romina coffee','arabica','export','wet mill','bean','beans','farm','farmers','roast','specialty','origin','2009'],
            shortAnswer: 'Romina Coffee exports Ethiopian Arabica coffee to markets including Europe, the USA, Asia, and the Middle East, with a focus on quality, traceability, and farmer support. Launched in 2009, Romina Coffee operates wet mills across major coffee-growing regions and works with thousands of farmers.',
            followUp: 'Would you like to learn about our sustainability and community work?',
            route: '#brands', routeLabel: 'Explore Coffee'
        },
        {
            id: 'imports',
            keywords: ['import','imports','importing','romina imports','distribution','pasta','dairy','rice','oil','fmcg','food processing','trading','trade'],
            shortAnswer: 'Romina Imports specialises in importing food-processing and FMCG products for the Ethiopian market, including pasta, pastry ingredients, dairy products, edible oils, and rice. Contact: 0116 669 100.',
            followUp: null,
            route: '#brands', routeLabel: 'Explore Imports'
        },
        {
            id: 'jaquar',
            keywords: ['jaquar','jaguar','bathroom','sanitary','faucet','fittings','shower','toilet','artize','lighting','plumbing','kazanchis','meskel flower','2017','partnership','showroom'],
            shortAnswer: 'Jaquar World Addis Ababa was launched in 2017 through a partnership between Jaquar Group and Romina Group, providing premium bathroom solutions including faucets, fittings, showers, sanitaryware, smart toilets, and lighting. Locations: Kazanchis (Zewditu Street, Joberg Building, 1st Floor) and Meskel Flower (Off Ethio-China Street, Martreza Building, Ground Floor). Phone: +251 944 143 073.',
            followUp: null,
            route: '#brands', routeLabel: 'Explore Jaquar World'
        },
        {
            id: 'sustainability',
            keywords: ['sustainability','sustainable','csr','community','environment','farmer','farmers','school','bridge','water','responsible','sourcing','seedling','certification','training','environmental'],
            shortAnswer: "Romina Coffee's sustainability programme focuses on farmer support, responsible sourcing, community development, and environmental responsibility. Community projects include schools, bridges, roads, and potable-water infrastructure — along with farmer training, coffee seedlings, shade trees, and certification programmes.",
            followUp: null,
            route: '#sustainability', routeLabel: 'View Sustainability'
        },
        {
            id: 'contact',
            keywords: ['contact','email','phone','address','office','reach','location','locations','head office','find','where','map','addis','bole','atlas','cape verde','noah','diplomat','info@'],
            shortAnswer: 'Romina Group Head Office is at Bole Atlas, Cape Verde Street, in front of the European Union, Noah Diplomat Building, 13th Floor, Addis Ababa, Ethiopia. Email: info@rominaplc.com. For divisions: KOBA (+251 900 989 898), Meskott (+251 90 387 9999), Romina Imports (0116 669 100), Jaquar World (+251 944 143 073).',
            followUp: null,
            route: '#contact', routeLabel: 'Contact Page'
        },
        {
            id: 'careers',
            keywords: ['career','careers','job','jobs','work','hiring','hire','employment','opportunity','opportunities','apply','team','join','internship','vacancy'],
            shortAnswer: "Romina Group welcomes talented individuals who share our values of excellence, innovation, and community passion. To explore career opportunities, please visit our Careers section or reach out directly at info@rominaplc.com.",
            followUp: null,
            route: '#careers', routeLabel: 'View Careers'
        },
        {
            id: 'businesses',
            keywords: ['business','businesses','sectors','sector','portfolio','division','divisions','operations','all','overview'],
            shortAnswer: "Romina Group operates across four main sectors: Restaurant Management & Hospitality (Romina Restaurants, KOBA, Meskott), Coffee Exporting (Romina Coffee), International Trading, and Importing & Distribution (Romina Imports, Jaquar World).",
            followUp: 'Which sector would you like to learn more about?',
            route: '#brands', routeLabel: 'Explore Businesses'
        }
    ];

    /* Sensitive patterns — always use the fallback, never shortAnswer */
    var SENSITIVE = ['price','cost','hour','opening time','open time','salary','revenue','ceo','founder','owner','employee count','award','valuation','discount','profit','revenue','turnover','annual','financial','stock','share','net worth'];

    /* Quick-question buttons (welcome screen) */
    var QUICK = [
        { label: 'About Romina',    topicId: 'about'          },
        { label: 'Our Businesses',  topicId: 'businesses'     },
        { label: 'Restaurants',     topicId: 'restaurants'    },
        { label: 'KOBA',            topicId: 'koba'           },
        { label: 'Meskott',         topicId: 'meskott'        },
        { label: 'Romina Coffee',   topicId: 'coffee'         },
        { label: 'Romina Imports',  topicId: 'imports'        },
        { label: 'Jaquar World',    topicId: 'jaquar'         },
        { label: 'Sustainability',  topicId: 'sustainability'  },
        { label: 'Contact Us',      topicId: 'contact'        },
        { label: 'Careers',         topicId: 'careers'        }
    ];

    /* ── Context-aware follow-up topic map ──
       After answering a topic, these IDs are offered as next steps.
       The answered topic ID is always removed from the list before display. */
    var FOLLOW_UP_MAP = {
        about:          ['businesses', 'coffee', 'sustainability', 'contact'],
        businesses:     ['restaurants', 'coffee', 'jaquar',       'imports' ],
        restaurants:    ['koba',  'meskott',      'about',         'contact' ],
        koba:           ['restaurants', 'meskott','coffee',        'contact' ],
        meskott:        ['restaurants', 'koba',   'contact',       'about'   ],
        coffee:         ['sustainability','about', 'businesses',   'contact' ],
        imports:        ['businesses',   'about', 'jaquar',        'contact' ],
        jaquar:         ['businesses',   'imports','contact',      'about'   ],
        sustainability: ['coffee',  'about',      'businesses',    'contact' ],
        contact:        ['about',   'businesses', 'careers',       'sustainability'],
        careers:        ['about',   'businesses', 'contact',       'sustainability'],
    };

    /* ─────────────────────────────────────────────────────────
       B. MATCHING ENGINE
    ───────────────────────────────────────────────────────── */
    function normalize(str) {
        return str.toLowerCase().replace(/[^\w\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }

    function editDistance(a, b) {
        if (Math.abs(a.length - b.length) > 2) return 99;
        var dp = [];
        for (var i = 0; i <= a.length; i++) {
            dp[i] = [i];
            for (var j = 1; j <= b.length; j++) {
                dp[i][j] = i === 0 ? j :
                    Math.min(dp[i-1][j]+1, dp[i][j-1]+1,
                             dp[i-1][j-1] + (a[i-1] === b[j-1] ? 0 : 1));
            }
        }
        return dp[a.length][b.length];
    }

    function matchQuery(query) {
        var norm = normalize(query);
        var words = norm.split(' ').filter(function(w){ return w.length > 0; });

        /* 1. Check sensitive patterns first */
        for (var s = 0; s < SENSITIVE.length; s++) {
            if (norm.indexOf(SENSITIVE[s]) !== -1) {
                return { type: 'sensitive' };
            }
        }

        /* 2. Score every topic */
        var scores = TOPICS.map(function(topic) {
            var score = 0;
            words.forEach(function(word) {
                topic.keywords.forEach(function(kw) {
                    if (kw === word) { score += 2; return; }
                    if (kw.indexOf(word) !== -1 || word.indexOf(kw) !== -1) { score += 1; return; }
                    if (word.length >= 5 && kw.length >= 5 && editDistance(word, kw) <= 1) { score += 1; }
                });
            });
            return { topic: topic, score: score };
        });

        /* 3. Find best score */
        scores.sort(function(a, b) { return b.score - a.score; });
        var best = scores[0];

        if (best.score < 2) return { type: 'unknown' };

        /* 4. Tie check */
        if (scores.length > 1 && scores[1].score === best.score) {
            return { type: 'tie', a: scores[0].topic.id, b: scores[1].topic.id };
        }

        return { type: 'found', topic: best.topic };
    }

    function getAnswerForTopic(topic) {
        var html = '<p>' + escHtml(topic.shortAnswer) + '</p>';
        if (topic.followUp) {
            html += '<p class="rc-followup">' + escHtml(topic.followUp) + '</p>';
        }
        if (topic.route && topic.routeLabel) {
            html += '<a href="' + escHtml(topic.route) + '" class="rc-link-btn" onclick="rcClose()">' +
                    escHtml(topic.routeLabel) +
                    '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>';
        }
        return html;
    }

    function getAnswer(query) {
        var result = matchQuery(query);
        if (result.type === 'sensitive') {
            return "<p>I don't have enough verified information to answer that accurately. For detailed information please contact Romina Group directly at <a href='mailto:info@rominaplc.com'>info@rominaplc.com</a>.</p>";
        }
        if (result.type === 'unknown') {
            return "<p>I don't have that information yet. Please contact Romina Group directly at <a href='mailto:info@rominaplc.com'>info@rominaplc.com</a> or use our <a href='#contact'>Contact section</a>.</p>";
        }
        if (result.type === 'tie') {
            return "<p>Did you mean our <strong>" + escHtml(result.a) + "</strong> or <strong>" + escHtml(result.b) + "</strong> information? Please try being more specific!</p>";
        }
        return getAnswerForTopic(result.topic);
    }

    function getAnswerByTopicId(id) {
        for (var i = 0; i < TOPICS.length; i++) {
            if (TOPICS[i].id === id) return getAnswerForTopic(TOPICS[i]);
        }
        return "<p>I don't have information on that topic yet.</p>";
    }

    /* ─────────────────────────────────────────────────────────
       C. UI HELPERS
    ───────────────────────────────────────────────────────── */
    function escHtml(str) {
        return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    function addMessage(role, html, isHtml) {
        var wrap = document.createElement('div');
        wrap.className = 'rc-msg rc-msg--' + role;
        var bubble = document.createElement('div');
        bubble.className = 'rc-bubble';
        if (isHtml) { bubble.innerHTML = html; }
        else { bubble.textContent = html; }
        wrap.appendChild(bubble);
        messages.appendChild(wrap);
        /* Scroll to bottom */
        body.scrollTop = body.scrollHeight;
    }

    var typingEl = null;
    function showTyping() {
        typingEl = document.createElement('div');
        typingEl.className = 'rc-msg rc-msg--bot rc-typing-wrap';
        typingEl.innerHTML = '<div class="rc-bubble rc-typing"><span></span><span></span><span></span></div>';
        messages.appendChild(typingEl);
        body.scrollTop = body.scrollHeight;
    }
    function hideTyping() {
        if (typingEl && typingEl.parentNode) typingEl.parentNode.removeChild(typingEl);
        typingEl = null;
    }

    function buildQuickQuestions() {
        quickEl.innerHTML = '';
        QUICK.forEach(function(q) {
            var btn = document.createElement('button');
            btn.className = 'rc-quick-btn';
            btn.textContent = q.label;
            btn.setAttribute('type', 'button');
            /* Pass topicId so sendMessage can show correct follow-ups */
            (function(qItem) {
                btn.addEventListener('click', function() {
                    sendMessage(qItem.label, getAnswerByTopicId(qItem.topicId), qItem.topicId);
                });
            }(q));
            quickEl.appendChild(btn);
        });
    }

    /* Return the display label for a topic ID (used by follow-up buttons) */
    function getTopicLabel(id) {
        for (var i = 0; i < QUICK.length; i++) {
            if (QUICK[i].topicId === id) return QUICK[i].label;
        }
        return id.charAt(0).toUpperCase() + id.slice(1);
    }

    /* ─────────────────────────────────────────────────────────
       D. SEND MESSAGE
       - topicIdHint: passed when question comes from a quick-question
         or follow-up button (topicId already known).
         For typed queries it is null; matchQuery() resolves it.
       - After EVERY answer, showInlineFollowUps() is called so the
         conversation never feels finished.
    ───────────────────────────────────────────────────────── */
    var isBotTyping = false;

    function sendMessage(userText, botHtmlOverride, topicIdHint) {
        var text = userText.trim();
        if (!text || isBotTyping) return;

        /* Hide the initial welcome quick-question strip after first use */
        quickEl.style.display = 'none';

        addMessage('user', text, false);
        input.value = '';
        isBotTyping = true;
        showTyping();

        setTimeout(function() {
            hideTyping();

            var resolvedTopicId = topicIdHint || null;
            var answer;

            if (botHtmlOverride) {
                /* Quick-question / follow-up button: topicId already known */
                answer = botHtmlOverride;
            } else {
                /* Typed query: run matcher so we can resolve topicId for follow-ups */
                var result = matchQuery(text);
                if (result.type === 'found') {
                    resolvedTopicId = result.topic.id;
                    answer = getAnswerForTopic(result.topic);
                } else {
                    /* sensitive / unknown / tie — use existing fallback */
                    answer = getAnswer(text);
                }
            }

            addMessage('bot', answer, true);

            /* Always show follow-up options — conversation never ends */
            showInlineFollowUps(resolvedTopicId);

            isBotTyping = false;
        }, 650);
    }

    /* ── Inline follow-up suggestions rendered into the message stream ── */
    function showInlineFollowUps(currentTopicId) {
        var fallback   = ['about', 'businesses', 'coffee', 'contact'];
        var followIds  = (currentTopicId && FOLLOW_UP_MAP[currentTopicId])
            ? FOLLOW_UP_MAP[currentTopicId].slice()
            : fallback;

        /* Never echo the topic that was just answered */
        followIds = followIds.filter(function(id) { return id !== currentTopicId; });

        var wrap = document.createElement('div');
        wrap.className = 'rc-followups';

        var lbl = document.createElement('p');
        lbl.className = 'rc-followups-label';
        lbl.textContent = 'What else would you like to know?';
        wrap.appendChild(lbl);

        var row = document.createElement('div');
        row.className = 'rc-followups-btns';

        followIds.forEach(function(id) {
            var label = getTopicLabel(id);
            var btn = document.createElement('button');
            btn.className = 'rc-followup-btn';
            btn.textContent = label;
            btn.setAttribute('type', 'button');
            (function(topicId, btnLabel) {
                btn.addEventListener('click', function() {
                    sendMessage(btnLabel, getAnswerByTopicId(topicId), topicId);
                });
            }(id, label));
            row.appendChild(btn);
        });

        /* ── Start Over button ── */
        var startBtn = document.createElement('button');
        startBtn.className = 'rc-followup-btn rc-followup-btn--reset';
        startBtn.setAttribute('type', 'button');
        startBtn.setAttribute('aria-label', 'Start conversation over');
        startBtn.textContent = '\u21ba Start over';
        startBtn.addEventListener('click', startOver);
        row.appendChild(startBtn);

        wrap.appendChild(row);
        messages.appendChild(wrap);
        body.scrollTop = body.scrollHeight;
    }

    /* ── Reset conversation to welcome state ── */
    function startOver() {
        messages.innerHTML = '';
        welcomeSent  = false;
        isBotTyping  = false;
        quickEl.innerHTML = '';
        quickEl.style.display = '';
        buildQuickQuestions();
        setTimeout(function() {
            addMessage('bot',
                '<p>Hello! \uD83D\uDC4B Welcome to Romina Group.</p>' +
                "<p>I'm the Romina Assistant. I can help you learn about our company, " +
                'business sectors, restaurants, coffee, imports, Jaquar partnership, ' +
                'sustainability, careers, and contact information.</p>' +
                '<p>What would you like to know?</p>',
                true
            );
        }, 200);
    }

    form.addEventListener('submit', function() {
        sendMessage(input.value, null, null);
    });

    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(input.value, null, null);
        }
    });

    /* ─────────────────────────────────────────────────────────
       E. OPEN / CLOSE
    ───────────────────────────────────────────────────────── */
    var opened = false;
    var welcomeSent = false;

    function rcOpen() {
        win.hidden = false;
        win.setAttribute('aria-hidden', 'false');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.classList.add('rc-toggle--open');
        win.classList.add('rc-window--visible');

        if (!welcomeSent) {
            welcomeSent = true;
            buildQuickQuestions();
            setTimeout(function() {
                addMessage('bot',
                    "<p>Hello! 👋 Welcome to Romina Group.</p>" +
                    "<p>I'm the Romina Assistant. I can help you learn about our company, business sectors, restaurants, coffee, imports, Jaquar partnership, sustainability, careers, and contact information.</p>" +
                    "<p>What would you like to know?</p>",
                    true
                );
            }, 300);
        }

        /* Focus input */
        setTimeout(function() { input.focus(); }, 50);
        opened = true;
    }

    window.rcClose = function () {
        win.classList.remove('rc-window--visible');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.classList.remove('rc-toggle--open');
        setTimeout(function() {
            win.hidden = true;
            win.setAttribute('aria-hidden', 'true');
        }, 220);
        toggle.focus();
        opened = false;
    };

    toggle.addEventListener('click', function() {
        if (opened) { window.rcClose(); } else { rcOpen(); }
    });

    closeBtn.addEventListener('click', window.rcClose);

    /* Close on Escape */
    win.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') window.rcClose();
    });

    /* ─────────────────────────────────────────────────────────
       F. INTRO COORDINATION
       Three cases handled in order of priority:

       (a) #romina-intro not in DOM at all
           → Rare but safe. Show immediately.

       (b) #romina-intro IS in DOM but display:none
           → Returning visitor same session. The intro JS
             read sessionStorage, set display:none, and returned
             WITHOUT removing the element from the DOM.
             The MutationObserver would never fire.
             Detect via getComputedStyle / inline style.
             Show immediately.

       (c) #romina-intro IS in DOM and IS visible
           → First visit this session. Intro is actually playing.
             Watch for it being removed from DOM (intro JS removes
             it in its cleanup setTimeout).
    ───────────────────────────────────────────────────────── */
    function showToggle() {
        toggle.removeAttribute('hidden');
        toggle.classList.add('rc-toggle--visible');
    }

    var introOverlay = document.getElementById('romina-intro');

    if (!introOverlay) {
        /* (a) Element not in DOM at all */
        showToggle();
    } else if (introOverlay.style.display === 'none' ||
               getComputedStyle(introOverlay).display === 'none') {
        /* (b) Element exists but was hidden by the sessionStorage check —
              intro is NOT playing, safe to show chatbot now */
        showToggle();
    } else {
        /* (c) Intro IS actively playing — wait for it to be removed */
        var observer = new MutationObserver(function(mutations) {
            for (var i = 0; i < mutations.length; i++) {
                var m = mutations[i];
                /* Removed from DOM (normal cleanup path) */
                for (var j = 0; j < m.removedNodes.length; j++) {
                    if (m.removedNodes[j].id === 'romina-intro') {
                        showToggle();
                        observer.disconnect();
                        return;
                    }
                }
                /* Hidden but NOT removed (safety net) */
                if (m.type === 'attributes' && m.target.id === 'romina-intro') {
                    if (getComputedStyle(m.target).display === 'none') {
                        showToggle();
                        observer.disconnect();
                        return;
                    }
                }
            }
        });
        observer.observe(document.body, {
            childList:  true,
            subtree:    false,
            attributes: true,
            attributeFilter: ['style']
        });
    }

    /* ─────────────────────────────────────────────────────────
       G. MOBILE VIEWPORT (visualViewport API)
       Reposition chat window when on-screen keyboard appears.
    ───────────────────────────────────────────────────────── */
    if (window.visualViewport) {
        window.visualViewport.addEventListener('resize', function() {
            if (!opened) return;
            var vvHeight = window.visualViewport.height;
            var vvOffset = window.visualViewport.offsetTop;
            win.style.maxHeight = (vvHeight - 100) + 'px';
            win.style.bottom    = Math.max(80, window.innerHeight - vvHeight - vvOffset + 16) + 'px';
        });
    }

}());
</script>
