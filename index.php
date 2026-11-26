<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/partials/floral-svgs.php';

/**
 * Helper to build the December 2026 calendar grid (Dec 1, 2026 is a Tuesday).
 */
$decemberDays = [];
// Sunday = 0, Monday = 1, Tuesday = 2
for ($pad = 0; $pad < 2; $pad++) {
    $decemberDays[] = null;
}
for ($d = 1; $d <= 31; $d++) {
    $decemberDays[] = $d;
}
?>
<!DOCTYPE html>
<html lang="en" class="is-sealed">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($wedding['site_title'], ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($wedding['meta_description'], ENT_QUOTES, 'UTF-8') ?>">

  <!-- Fonts matching the calligraphic & classic serif wedding card -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="is-sealed">

  <!-- Ambient pastel petals, drifting blossoms & gold dust layer -->
  <canvas id="petalCanvas" class="petal-canvas" aria-hidden="true"></canvas>

  <!-- Flying pastel butterflies -->
  <div class="butterfly-layer" aria-hidden="true">
    <div class="butterfly-flight butterfly-a">
      <?= renderButterflySvg('#F2C5C3', '#D5C5EA', '#C7A05D') ?>
    </div>
    <div class="butterfly-flight butterfly-b">
      <?= renderButterflySvg('#F4DC94', '#F2C5C3', '#B89250') ?>
    </div>
    <div class="butterfly-flight butterfly-c">
      <?= renderButterflySvg('#D5C5EA', '#BDD0B6', '#C7A05D') ?>
    </div>
  </div>

  <!-- Subtle watercolor atmosphere glows -->
  <div class="ambient-glows" aria-hidden="true">
    <span class="glow glow-blush"></span>
    <span class="glow glow-lavender"></span>
    <span class="glow glow-sage"></span>
    <span class="glow glow-butter"></span>
  </div>

  <!-- ===================================================================
       LANDING PAGE: PASTEL WEDDING ENVELOPE WITH INTERACTIVE WAX SEAL
       =================================================================== -->
  <section id="envelopeStage" class="envelope-stage" aria-label="Wedding Invitation Envelope">
    <div class="envelope-stage-inner">
      <div class="envelope-heading">
        <p class="env-eyebrow"><?= htmlspecialchars($wedding['envelope_to'], ENT_QUOTES, 'UTF-8') ?></p>
        <h1 class="env-couple-title"><?= $wedding['couple_display'] ?></h1>
        </div>

      <div class="envelope-scene">
        <!-- Decorative floral accents peeking behind the envelope -->
        <div class="env-floral-halo env-floral-top-left" aria-hidden="true">
          <?= renderFloralSprigSvg('sprig-env-tl') ?>
        </div>
        <div class="env-floral-halo env-floral-bottom-right" aria-hidden="true">
          <?= renderFloralSprigSvg('sprig-env-br') ?>
        </div>

        <div id="weddingEnvelope" class="envelope-wrapper">
          <!-- Envelope Back Base -->
          <div class="envelope-back"></div>

          <!-- Botanical Pastel Inner Liner (revealed when flap lifts) -->
          <div class="envelope-liner" aria-hidden="true">
            <div class="liner-pattern"></div>
            <span class="liner-monogram"><?= $wedding['monogram'] ?></span>
          </div>

          <!-- Invitation Letter Card inside the pocket -->
          <div class="envelope-letter" aria-hidden="true">
            <div class="letter-inner">
              <span class="letter-eyebrow"><?= htmlspecialchars($wedding['eyebrow'], ENT_QUOTES, 'UTF-8') ?></span>
              <span class="letter-names"><?= $wedding['couple_display'] ?></span>
              <span class="letter-sub"><?= htmlspecialchars($wedding['date_full'], ENT_QUOTES, 'UTF-8') ?></span>
            </div>
          </div>

          <!-- Front Pastel Envelope Pocket -->
          <div class="envelope-pocket" aria-hidden="true">
            <svg class="pocket-svg" viewBox="0 0 500 340" preserveAspectRatio="none">
              <defs>
                <linearGradient id="pocketLeftGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" stop-color="#F7ECE7"/>
                  <stop offset="100%" stop-color="#ECDAD4"/>
                </linearGradient>
                <linearGradient id="pocketRightGrad" x1="100%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" stop-color="#F5E8E3"/>
                  <stop offset="100%" stop-color="#E9D6CF"/>
                </linearGradient>
                <linearGradient id="pocketBottomGrad" x1="50%" y1="0%" x2="50%" y2="100%">
                  <stop offset="0%" stop-color="#FBF3EE"/>
                  <stop offset="100%" stop-color="#EFE0D9"/>
                </linearGradient>
              </defs>
              <!-- Left fold -->
              <polygon points="0,0 250,185 0,340" fill="url(#pocketLeftGrad)"/>
              <!-- Right fold -->
              <polygon points="500,0 250,185 500,340" fill="url(#pocketRightGrad)"/>
              <!-- Bottom fold -->
              <path d="M0,340 L232,172 Q250,158 268,172 L500,340 Z" fill="url(#pocketBottomGrad)"/>
              <!-- Subtle gold seam accents -->
              <path d="M0,340 L232,172 Q250,158 268,172 L500,340" fill="none" stroke="#C8A56C" stroke-opacity="0.32" stroke-width="1.4"/>
            </svg>
            
          </div>

          <!-- Top 3D Envelope Flap -->
          <div class="envelope-flap" aria-hidden="true">
            <svg class="flap-svg" viewBox="0 0 500 215" preserveAspectRatio="none">
              <defs>
                <linearGradient id="flapOuterGrad" x1="50%" y1="0%" x2="50%" y2="100%">
                  <stop offset="0%" stop-color="#FBF4EF"/>
                  <stop offset="70%" stop-color="#F1E3DC"/>
                  <stop offset="100%" stop-color="#E8D5CD"/>
                </linearGradient>
              </defs>
              <path d="M0,0 L500,0 L268,196 Q250,210 232,196 Z" fill="url(#flapOuterGrad)"/>
              <path d="M2,1 L232,195 Q250,208 268,195 L498,1" fill="none" stroke="#C8A56C" stroke-opacity="0.38" stroke-width="1.4"/>
            </svg>
          </div>

          <!-- Interactive Wax Seal Button -->
          <button
            id="waxSealBtn"
            type="button"
            class="wax-seal-btn"
            aria-label="Open wedding invitation envelope"
          >
            <span class="seal-pulse" aria-hidden="true"></span>
            <span class="seal-sparkles" aria-hidden="true"></span>
            <?= renderWaxSealSvg($wedding['monogram']) ?>
          </button>
        </div>
      </div>

      <div class="envelope-cta">
        <button id="openTextBtn" type="button" class="open-hint-btn">
          <span class="hint-dot" aria-hidden="true"></span>
          <span><?= htmlspecialchars($wedding['envelope_hint'], ENT_QUOTES, 'UTF-8') ?></span>
        </button>
      </div>
    </div>
  </section>

  <!-- ===================================================================
       REVEALED SCROLLABLE PASTEL & FLORAL WEDDING INVITATION
       =================================================================== -->
  <div id="invitationSite" class="invitation-site" aria-hidden="true">

    <!-- Scroll Progress Hairline -->
    <div class="scroll-progress" aria-hidden="true">
      <div id="scrollProgressBar" class="scroll-progress-bar"></div>
    </div>

    <!-- Aesthetic Pastel & Floral Navigation -->
    <header id="mainHeader" class="site-header">
      <nav class="floral-nav" aria-label="Primary Invitation Navigation">
        <a href="#invitation" class="nav-brand" aria-label="Back to top of invitation">
          <span class="brand-seal"><?= $wedding['monogram'] ?></span>
          <span class="brand-names"><?= $wedding['couple_display'] ?></span>
        </a>

        <ul class="nav-links" id="navLinks">
          <?php foreach ($wedding['nav_items'] as $idx => $item): ?>
            <li>
              <a
                href="#<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                class="nav-link<?= $idx === 0 ? ' is-active' : '' ?>"
                data-section="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
              >
                <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="nav-actions">
          <button
            id="replayEnvelopeBtn"
            type="button"
            class="nav-envelope-btn"
            title="Close and view envelope again"
          >
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="2" y="4" width="20" height="16" rx="2"/>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
            </svg>
            <span class="btn-label">Envelope</span>
          </button>

          <button
            id="mobileMenuBtn"
            type="button"
            class="mobile-menu-btn"
            aria-label="Toggle navigation menu"
            aria-expanded="false"
            aria-controls="mobileDrawer"
          >
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </nav>

      <!-- Responsive Mobile Pastel Floral Drawer -->
      <div id="mobileDrawer" class="mobile-drawer" hidden>
        <div class="mobile-drawer-card">
          <?php foreach ($wedding['nav_items'] as $idx => $item): ?>
            <a
              href="#<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
              class="mobile-nav-link<?= $idx === 0 ? ' is-active' : '' ?>"
              data-section="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
            >
              <span class="mobile-dot" aria-hidden="true"></span>
              <span><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </header>

    <main>
      <!-- ---------------------------------------------------------------
           SECTION 1: HERO INVITATION CARD (Faithful to Reference Theme)
           --------------------------------------------------------------- -->
      <section id="invitation" class="section hero-section">
        <div class="container">
          <article class="paper-card hero-card reveal-on-scroll">
            <div class="card-corner-sprig sprig-tl" aria-hidden="true">
              <?= renderFloralSprigSvg() ?>
            </div>
            <div class="card-corner-sprig sprig-tr" aria-hidden="true">
              <?= renderFloralSprigSvg() ?>
            </div>

            <div class="hero-card-content">
              <p class="hero-eyebrow"><?= htmlspecialchars($wedding['eyebrow'], ENT_QUOTES, 'UTF-8') ?></p>

              <h1 class="hero-couple-name">
                <span class="sparkle-dot s1" aria-hidden="true"></span>
                <span class="sparkle-dot s2" aria-hidden="true"></span>
                <span class="sparkle-dot s3" aria-hidden="true"></span>
                <?= $wedding['couple_display'] ?>
              </h1>

              <p class="hero-lead">
                <?= htmlspecialchars($wedding['invitation_lead'], ENT_QUOTES, 'UTF-8') ?>
              </p>

              <?= renderFloralDividerSvg() ?>

              <div class="hero-details-block">
                <p class="hero-date"><?= htmlspecialchars(strtoupper($wedding['date_full']), ENT_QUOTES, 'UTF-8') ?></p>
                <p class="hero-time"><?= htmlspecialchars($wedding['time_display'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="hero-venue">
                  <strong><?= htmlspecialchars($wedding['venue_name'], ENT_QUOTES, 'UTF-8') ?></strong><br>
                  <?= htmlspecialchars($wedding['venue_address'], ENT_QUOTES, 'UTF-8') ?>
                </p>
              </div>

              <p class="hero-warm-message">
                <?= htmlspecialchars($wedding['invitation_note'], ENT_QUOTES, 'UTF-8') ?>
              </p>

              <!-- Live Wedding Countdown -->
              <div class="countdown-grid" id="weddingCountdown" data-target="<?= htmlspecialchars($wedding['date_iso'], ENT_QUOTES, 'UTF-8') ?>" aria-label="Countdown to the wedding">
                <div class="countdown-pill">
                  <span class="count-num" id="cdDays">--</span>
                  <span class="count-unit">Days</span>
                </div>
                <div class="countdown-pill">
                  <span class="count-num" id="cdHours">--</span>
                  <span class="count-unit">Hours</span>
                </div>
                <div class="countdown-pill">
                  <span class="count-num" id="cdMins">--</span>
                  <span class="count-unit">Minutes</span>
                </div>
                <div class="countdown-pill">
                  <span class="count-num" id="cdSecs">--</span>
                  <span class="count-unit">Seconds</span>
                </div>
              </div>
            </div>

            <!-- Watercolor Wildflower Meadow anchored at bottom like the invitation image -->
            <div class="hero-meadow-wrap" aria-hidden="true">
              <img
                src="<?= htmlspecialchars($wedding['floral_meadow'], ENT_QUOTES, 'UTF-8') ?>"
                alt=""
                class="hero-meadow-img"
                loading="eager"
              >
            </div>
          </article>

          <a href="#couple" class="scroll-cue" aria-label="Scroll down to couple portrait">
            <span>Scroll to explore</span>
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M12 5v14"/>
              <path d="m19 12-7 7-7-7"/>
            </svg>
          </a>
        </div>
      </section>

      <!-- ---------------------------------------------------------------
           SECTION 2: FEATURED WEDDING PICTURE OF THE COUPLE
           --------------------------------------------------------------- -->
      <section id="couple" class="section couple-section">
        <div class="container">
          <div class="section-header reveal-on-scroll">
            <span class="section-eyebrow">Our Wedding Portrait</span>
            <h2 class="section-title">The Happy Couple</h2>
            <?= renderFloralDividerSvg() ?>
          </div>

          <div class="couple-showcase reveal-on-scroll">
            <div class="couple-photo-stage">
              <div class="photo-floral-accent top-accent" aria-hidden="true">
                <?= renderFloralSprigSvg() ?>
              </div>
              <figure class="arched-frame">
                <img
                  src="<?= htmlspecialchars($wedding['couple_photo'], ENT_QUOTES, 'UTF-8') ?>"
                  alt="<?= htmlspecialchars($wedding['couple_photo_alt'], ENT_QUOTES, 'UTF-8') ?>"
                  class="couple-photo"
                  loading="lazy"
                >
                <figcaption class="photo-caption">
                  <?= htmlspecialchars($wedding['couple_caption'], ENT_QUOTES, 'UTF-8') ?>
                </figcaption>
              </figure>
              <div class="photo-floral-accent bottom-accent" aria-hidden="true">
                <?= renderFloralSprigSvg() ?>
              </div>
            </div>

            <div class="couple-story-card paper-soft-card">
              <span class="story-tag">Forever &amp; Always</span>
              <h3 class="story-couple-heading"><?= $wedding['couple_display'] ?></h3>
              <p class="story-paragraph">
                Every love story is beautiful, and ours has led us to this cherished morning surrounded by the people who mean the world to us.
              </p>
              <p class="story-paragraph">
                Your presence, warm smiles, and heartfelt prayers are the greatest gifts we could ever ask for as we begin our married life together.
              </p>

              <div class="theme-palette-pills" aria-label="Pastel Floral Celebration Palette">
                <span class="palette-chip"><i class="swatch blush"></i>Blush</span>
                <span class="palette-chip"><i class="swatch lavender"></i>Lavender</span>
                <span class="palette-chip"><i class="swatch butter"></i>Buttercup</span>
                <span class="palette-chip"><i class="swatch sage"></i>Sage</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ---------------------------------------------------------------
           SECTION 3: DATE & TIME OF THE EVENT
           --------------------------------------------------------------- -->
      <section id="schedule" class="section schedule-section">
        <div class="container">
          <div class="section-header reveal-on-scroll">
            <span class="section-eyebrow">Save the Date</span>
            <h2 class="section-title">Date &amp; Time</h2>
            <?= renderFloralDividerSvg() ?>
          </div>

          <div class="schedule-grid">
            <!-- Date & Calendar Card -->
            <div class="paper-soft-card date-card reveal-on-scroll">
              <div class="card-icon-badge" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="18" rx="3"/>
                  <path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
              </div>
              <span class="card-kicker">Wedding Day</span>
              <h3 class="card-big-title"><?= htmlspecialchars($wedding['date_weekday'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p class="card-subtitle">December 16, 2026</p>

              <!-- Mini December 2026 Calendar -->
              <div class="mini-calendar" aria-label="December 2026 Calendar highlighting December 16">
                <div class="cal-month">December 2026</div>
                <div class="cal-weekdays" aria-hidden="true">
                  <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                </div>
                <div class="cal-days">
                  <?php foreach ($decemberDays as $day): ?>
                    <?php if ($day === null): ?>
                      <span class="cal-day is-empty" aria-hidden="true"></span>
                    <?php elseif ($day === 16): ?>
                      <span class="cal-day is-wedding-day" aria-label="December 16, Wedding Day">
                        <span>16</span>
                      </span>
                    <?php else: ?>
                      <span class="cal-day"><?= $day ?></span>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Time & Calendar Action Card -->
            <div class="paper-soft-card time-card reveal-on-scroll">
              <div class="card-icon-badge badge-lavender" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="9"/>
                  <path d="M12 7v5l3 2"/>
                </svg>
              </div>
              <span class="card-kicker">Morning Reception</span>
              <h3 class="card-big-title"><?= htmlspecialchars($wedding['time_short'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p class="card-subtitle"><?= htmlspecialchars($wedding['time_display'], ENT_QUOTES, 'UTF-8') ?></p>

              <p class="time-note">
                Please join us at <strong>10:00 in the morning</strong> on <strong>Wednesday, December 16, 2026</strong> as we gather with family and loved ones to celebrate our union.
              </p>

              <div class="action-buttons-row">
                <button id="downloadIcsBtn" type="button" class="btn-pastel-primary">
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                  </svg>
                  <span>Save to Calendar (.ics)</span>
                </button>

                <a
                  class="btn-pastel-outline"
                  target="_blank"
                  rel="noopener noreferrer"
                  href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Yanru+%26+Louvelle+Wedding&dates=20261216T020000Z/20261216T070000Z&details=Together+with+their+families%2C+Yanru+%26+Louvelle+joyfully+invite+you+to+share+in+their+love+and+happiness+as+they+unite+in+marriage.&location=Leyesa+Residence%2C+Barangay+Comunal%2C+Calapan+City"
                >
                  <span>Google Calendar</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ---------------------------------------------------------------
           SECTION 4: LOCATION & RECEPTION ADDRESS
           --------------------------------------------------------------- -->
      <section id="venue" class="section venue-section">
        <div class="container">
          <div class="section-header reveal-on-scroll">
            <span class="section-eyebrow">Location &amp; Reception</span>
            <h2 class="section-title">Where We Celebrate</h2>
            <?= renderFloralDividerSvg() ?>
          </div>

          <div class="paper-soft-card venue-card reveal-on-scroll">
            <div class="venue-visual" aria-hidden="true">
              <div class="venue-pin-ring">
                <span class="pin-halo"></span>
                <svg viewBox="0 0 48 48" width="44" height="44" fill="none">
                  <path d="M24 4C15.7 4 9 10.7 9 19c0 10.8 15 25 15 25s15-14.2 15-25c0-8.3-6.7-15-15-15z" fill="#F2C8C6" stroke="#B69156" stroke-width="1.8"/>
                  <circle cx="24" cy="19" r="5.5" fill="#FFFDF9" stroke="#B69156" stroke-width="1.6"/>
                </svg>
              </div>
              <p class="venue-visual-tag">Calapan City · Mindoro</p>
            </div>

            <div class="venue-details">
              <span class="card-kicker">Ceremony &amp; Reception Venue</span>
              <h3 class="venue-name"><?= htmlspecialchars($wedding['venue_name'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p class="venue-address"><?= htmlspecialchars($wedding['venue_address'], ENT_QUOTES, 'UTF-8') ?></p>
              <p class="venue-note"><?= $wedding['venue_note'] ?></p>

              <div class="action-buttons-row">
                <a
                  href="<?= htmlspecialchars($wedding['maps_url'], ENT_QUOTES, 'UTF-8') ?>"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="btn-pastel-primary"
                >
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                    <circle cx="12" cy="10" r="3"/>
                  </svg>
                  <span>Open in Google Maps</span>
                </a>

                <button
                  id="copyAddressBtn"
                  type="button"
                  class="btn-pastel-outline"
                  data-address="<?= htmlspecialchars($wedding['venue_full'], ENT_QUOTES, 'UTF-8') ?>"
                >
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                  </svg>
                  <span>Copy Address</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ---------------------------------------------------------------
           SECTION 5: MONETARY GIFT QR (InstaPay)
           --------------------------------------------------------------- -->
      <section id="gifts" class="section gifts-section">
        <div class="container">
          <div class="section-header reveal-on-scroll">
            <span class="section-eyebrow">Monetary Blessings</span>
            <h2 class="section-title">Wedding Gift</h2>
            <?= renderFloralDividerSvg() ?>
          </div>

          <div class="paper-soft-card gift-card reveal-on-scroll">
            <div class="card-corner-sprig sprig-tl" aria-hidden="true">
              <?= renderFloralSprigSvg() ?>
            </div>
            <div class="card-corner-sprig sprig-tr" aria-hidden="true">
              <?= renderFloralSprigSvg() ?>
            </div>

            <div class="gift-content">
              <span class="gift-provider-pill">InstaPay QR</span>
              <p class="gift-note">
                <?= htmlspecialchars($wedding['gift_note'], ENT_QUOTES, 'UTF-8') ?>
              </p>

              <figure class="qr-frame">
                <img
                  src="<?= htmlspecialchars($wedding['gift_qr'], ENT_QUOTES, 'UTF-8') ?>"
                  alt="<?= htmlspecialchars($wedding['gift_qr_alt'], ENT_QUOTES, 'UTF-8') ?>"
                  class="qr-image"
                  loading="lazy"
                >
                <figcaption class="qr-caption">
                  Scan with any InstaPay-supported bank or e-wallet app
                </figcaption>
              </figure>

              <div class="action-buttons-row">
                <a
                  href="<?= htmlspecialchars($wedding['gift_qr'], ENT_QUOTES, 'UTF-8') ?>"
                  download="Yanru-and-Louvelle-InstaPay-QR.jpg"
                  class="btn-pastel-primary"
                >
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                  </svg>
                  <span>Download QR Code</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Floral Meadow Footer -->
    <footer class="site-footer">
      <div class="footer-meadow-backdrop" aria-hidden="true">
        <img src="<?= htmlspecialchars($wedding['floral_meadow'], ENT_QUOTES, 'UTF-8') ?>" alt="" loading="lazy">
      </div>
      <div class="container footer-content">
        <p class="footer-names"><?= $wedding['couple_display'] ?></p>
        <p class="footer-meta">
          <?= htmlspecialchars($wedding['date_full'], ENT_QUOTES, 'UTF-8') ?> &middot; <?= htmlspecialchars($wedding['time_short'], ENT_QUOTES, 'UTF-8') ?><br>
          <?= htmlspecialchars($wedding['venue_full'], ENT_QUOTES, 'UTF-8') ?>
        </p>
        <button id="footerReplayBtn" type="button" class="footer-replay-btn">
          Replay Envelope Opening
        </button>
      </div>
    </footer>
  </div>

  <!-- Toast Notification -->
  <div id="toastNotice" class="toast-notice" role="status" aria-live="polite" hidden></div>

  <script src="assets/js/main.js" defer></script>
</body>
</html>
