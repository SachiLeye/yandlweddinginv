/**
 * Yanru & Louvelle — Wedding Invitation Interactions
 * Handles:
 * 1. Pastel Envelope & Wax Seal click-to-open transition
 * 2. Ambient pastel petals & gold dust particles
 * 3. Smooth scroll-spy, scroll progress, and mobile floral navigation drawer
 * 4. Live wedding countdown (Dec 16, 2026 10:00 AM PHT)
 * 5. Calendar (.ics) download, Google Maps / copy-address, and Netlify-ready RSVP
 */

(function () {
  'use strict';

  const envelopeStage = document.getElementById('envelopeStage');
  const invitationSite = document.getElementById('invitationSite');
  const waxSealBtn = document.getElementById('waxSealBtn');
  const openTextBtn = document.getElementById('openTextBtn');
  const replayEnvelopeBtn = document.getElementById('replayEnvelopeBtn');
  const footerReplayBtn = document.getElementById('footerReplayBtn');

  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const scrollProgressBar = document.getElementById('scrollProgressBar');
  const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let isOpening = false;

  /* ------------------------------------------------------------------------
     1. Envelope Open & Replay Choreography
     ------------------------------------------------------------------------ */
  function openEnvelope() {
    if (isOpening || !envelopeStage || !invitationSite) return;
    isOpening = true;

    envelopeStage.classList.add('is-opening');

    const revealDelay = reducedMotion ? 80 : 1280;
    const unlockDelay = reducedMotion ? 120 : 1850;

    window.setTimeout(() => {
      envelopeStage.classList.add('is-dismissed');
      document.documentElement.classList.remove('is-sealed');
      document.body.classList.remove('is-sealed');
      invitationSite.setAttribute('aria-hidden', 'false');
      invitationSite.classList.add('is-revealed');
      window.scrollTo({ top: 0, behavior: 'auto' });

      // Trigger immediate visibility check for above-the-fold invitation card
      revealVisibleElements();
    }, revealDelay);

    window.setTimeout(() => {
      isOpening = false;
    }, unlockDelay);
  }

  function closeEnvelope() {
    if (isOpening || !envelopeStage || !invitationSite) return;
    closeMobileDrawer();
    window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' });

    window.setTimeout(() => {
      invitationSite.classList.remove('is-revealed');
      invitationSite.setAttribute('aria-hidden', 'true');
      document.documentElement.classList.add('is-sealed');
      document.body.classList.add('is-sealed');
      envelopeStage.classList.remove('is-dismissed', 'is-opening');
    }, reducedMotion ? 40 : 320);
  }

  if (waxSealBtn) waxSealBtn.addEventListener('click', openEnvelope);
  if (openTextBtn) openTextBtn.addEventListener('click', openEnvelope);
  if (replayEnvelopeBtn) replayEnvelopeBtn.addEventListener('click', closeEnvelope);
  if (footerReplayBtn) footerReplayBtn.addEventListener('click', closeEnvelope);

  /* ------------------------------------------------------------------------
     2. Mobile Floral Navigation Drawer & Scroll-Spy
     ------------------------------------------------------------------------ */
  function closeMobileDrawer() {
    if (!mobileMenuBtn || !mobileDrawer) return;
    mobileMenuBtn.setAttribute('aria-expanded', 'false');
    mobileDrawer.hidden = true;
  }

  if (mobileMenuBtn && mobileDrawer) {
    mobileMenuBtn.addEventListener('click', () => {
      const expanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
      mobileMenuBtn.setAttribute('aria-expanded', String(!expanded));
      mobileDrawer.hidden = expanded;
    });
  }

  navLinks.forEach((link) => {
    link.addEventListener('click', () => {
      closeMobileDrawer();
    });
  });

  // Scroll Progress + Active Section Spy
  const sections = Array.from(document.querySelectorAll('main > section[id]'));

  function updateScrollUi() {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    if (scrollProgressBar && docHeight > 0) {
      const pct = Math.min(100, Math.max(0, (scrollTop / docHeight) * 100));
      scrollProgressBar.style.width = `${pct.toFixed(1)}%`;
    }

    let currentId = sections[0]?.id || 'invitation';
    const offset = scrollTop + 160;
    for (const sec of sections) {
      if (sec.offsetTop <= offset) {
        currentId = sec.id;
      }
    }

    navLinks.forEach((link) => {
      const active = link.dataset.section === currentId;
      link.classList.toggle('is-active', active);
    });
  }

  window.addEventListener('scroll', updateScrollUi, { passive: true });

  /* ------------------------------------------------------------------------
     3. Smooth Scroll Reveal Observer
     ------------------------------------------------------------------------ */
  const revealTargets = Array.from(document.querySelectorAll('.reveal-on-scroll'));

  function revealVisibleElements() {
    const vh = window.innerHeight || 800;
    revealTargets.forEach((el) => {
      const rect = el.getBoundingClientRect();
      if (rect.top < vh * 0.92) {
        el.classList.add('is-visible');
      }
    });
  }

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    revealTargets.forEach((el) => observer.observe(el));
  } else {
    revealTargets.forEach((el) => el.classList.add('is-visible'));
  }

  /* ------------------------------------------------------------------------
     4. Live Wedding Countdown
     ------------------------------------------------------------------------ */
  const countdownEl = document.getElementById('weddingCountdown');
  const cdDays = document.getElementById('cdDays');
  const cdHours = document.getElementById('cdHours');
  const cdMins = document.getElementById('cdMins');
  const cdSecs = document.getElementById('cdSecs');

  if (countdownEl && cdDays && cdHours && cdMins && cdSecs) {
    const targetTime = new Date(countdownEl.dataset.target || '2026-12-16T10:00:00+08:00').getTime();

    const tick = () => {
      const diff = Math.max(0, targetTime - Date.now());
      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
      const mins = Math.floor((diff / (1000 * 60)) % 60);
      const secs = Math.floor((diff / 1000) % 60);

      cdDays.textContent = String(days).padStart(2, '0');
      cdHours.textContent = String(hours).padStart(2, '0');
      cdMins.textContent = String(mins).padStart(2, '0');
      cdSecs.textContent = String(secs).padStart(2, '0');
    };

    tick();
    window.setInterval(tick, 1000);
  }

  /* ------------------------------------------------------------------------
     5. Calendar (.ics) Download & Copy Address Toast
     ------------------------------------------------------------------------ */
  const toastEl = document.getElementById('toastNotice');
  let toastTimer = null;

  function showToast(msg) {
    if (!toastEl) return;
    toastEl.textContent = msg;
    toastEl.hidden = false;
    window.clearTimeout(toastTimer);
    toastTimer = window.setTimeout(() => {
      toastEl.hidden = true;
    }, 3000);
  }

  const downloadIcsBtn = document.getElementById('downloadIcsBtn');
  if (downloadIcsBtn) {
    downloadIcsBtn.addEventListener('click', () => {
      const icsContent = [
        'BEGIN:VCALENDAR',
        'VERSION:2.0',
        'PRODID:-//Yanru and Louvelle//Wedding Invitation//EN',
        'BEGIN:VEVENT',
        'UID:yanru-louvelle-20261216@wedding',
        'DTSTAMP:20261126T000000Z',
        'DTSTART:20261216T020000Z',
        'DTEND:20261216T070000Z',
        'SUMMARY:Yanru & Louvelle Wedding',
        'DESCRIPTION:Together with their families, Yanru & Louvelle joyfully invite you to share in their love and happiness as they unite in marriage.',
        'LOCATION:Leyesa Residence, Barangay Comunal, Calapan City',
        'END:VEVENT',
        'END:VCALENDAR',
      ].join('\r\n');

      const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'Yanru-and-Louvelle-Wedding.ics';
      document.body.appendChild(a);
      a.click();
      a.remove();
      URL.revokeObjectURL(url);
      showToast('Calendar invite downloaded!');
    });
  }

  const copyAddressBtn = document.getElementById('copyAddressBtn');
  if (copyAddressBtn) {
    copyAddressBtn.addEventListener('click', async () => {
      const address = copyAddressBtn.dataset.address || 'Leyesa Residence, Barangay Comunal, Calapan City';
      try {
        await navigator.clipboard.writeText(address);
        showToast('Venue address copied to clipboard');
      } catch {
        showToast(address);
      }
    });
  }

  /* ------------------------------------------------------------------------
     6. Ambient Moving Flowers, Pastel Petals & Gold Dust Canvas
     ------------------------------------------------------------------------ */
  const canvas = document.getElementById('petalCanvas');
  if (canvas && !reducedMotion) {
    const ctx = canvas.getContext('2d');
    const colors = [
      'rgba(236, 192, 190, 0.58)',
      'rgba(201, 187, 224, 0.54)',
      'rgba(242, 218, 145, 0.54)',
      'rgba(157, 177, 150, 0.46)',
      'rgba(206, 170, 108, 0.48)',
    ];

    let width = 0;
    let height = 0;
    let particles = [];

    const resize = () => {
      width = canvas.width = window.innerWidth;
      height = canvas.height = window.innerHeight;
      const count = width < 640 ? 20 : 34;
      particles = Array.from({ length: count }, (_, idx) => {
        const kind = idx % 5 === 0 ? 'flower' : idx % 3 === 0 ? 'dust' : 'petal';
        return {
          x: Math.random() * width,
          y: Math.random() * height,
          r: kind === 'flower' ? 4.2 + Math.random() * 2.6 : 2.5 + Math.random() * 4.0,
          vy: 0.25 + Math.random() * 0.45,
          vx: (Math.random() - 0.5) * 0.35,
          rot: Math.random() * Math.PI * 2,
          vRot: (Math.random() - 0.5) * 0.018,
          color: colors[Math.floor(Math.random() * colors.length)],
          kind,
        };
      });
    };

    resize();
    window.addEventListener('resize', resize, { passive: true });

    const drawFlower = (r, color) => {
      ctx.fillStyle = color;
      for (let i = 0; i < 5; i++) {
        ctx.save();
        ctx.rotate((i * Math.PI * 2) / 5);
        ctx.beginPath();
        ctx.ellipse(0, -r * 0.85, r * 0.52, r * 0.82, 0, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
      }
      ctx.fillStyle = 'rgba(216, 174, 96, 0.72)';
      ctx.beginPath();
      ctx.arc(0, 0, r * 0.38, 0, Math.PI * 2);
      ctx.fill();
    };

    const animate = () => {
      ctx.clearRect(0, 0, width, height);
      for (const p of particles) {
        p.y += p.vy;
        p.x += p.vx + Math.sin(p.y * 0.014) * 0.26;
        p.rot += p.vRot;

        if (p.y > height + 20) {
          p.y = -20;
          p.x = Math.random() * width;
        }
        if (p.x > width + 20) p.x = -20;
        if (p.x < -20) p.x = width + 20;

        ctx.save();
        ctx.translate(p.x, p.y);
        ctx.rotate(p.rot);

        if (p.kind === 'flower') {
          drawFlower(p.r, p.color);
        } else if (p.kind === 'petal') {
          ctx.fillStyle = p.color;
          ctx.beginPath();
          ctx.ellipse(0, 0, p.r * 1.4, p.r * 0.78, 0, 0, Math.PI * 2);
          ctx.fill();
        } else {
          ctx.fillStyle = p.color;
          ctx.beginPath();
          ctx.arc(0, 0, p.r * 0.5, 0, Math.PI * 2);
          ctx.fill();
        }
        ctx.restore();
      }
      window.requestAnimationFrame(animate);
    };

    window.requestAnimationFrame(animate);
  }
})();
