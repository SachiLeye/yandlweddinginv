<?php
/**
 * Reusable Botanical & Wax Seal SVG Helpers
 * Crisp, theme-matched pastel watercolor-inspired vector accents.
 */

function renderWaxSealSvg(string $monogram): string
{
    return <<<SVG
<svg class="wax-seal-svg" viewBox="0 0 140 140" aria-hidden="true">
  <defs>
    <radialGradient id="waxBaseGrad" cx="38%" cy="32%" r="70%">
      <stop offset="0%" stop-color="#E7BEB3"/>
      <stop offset="45%" stop-color="#C9968A"/>
      <stop offset="85%" stop-color="#A67469"/>
      <stop offset="100%" stop-color="#8B5D53"/>
    </radialGradient>
    <radialGradient id="waxInnerGrad" cx="35%" cy="30%" r="70%">
      <stop offset="0%" stop-color="#D7A79B"/>
      <stop offset="65%" stop-color="#B68276"/>
      <stop offset="100%" stop-color="#9A685D"/>
    </radialGradient>
    <linearGradient id="waxGoldRim" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#F7E6C9"/>
      <stop offset="50%" stop-color="#D2AA6E"/>
      <stop offset="100%" stop-color="#F3DEC0"/>
    </linearGradient>
    <filter id="waxShadow" x="-15%" y="-15%" width="130%" height="130%">
      <feDropShadow dx="0" dy="6" stdDeviation="5" flood-color="#5E4039" flood-opacity="0.28"/>
    </filter>
  </defs>

  <!-- Organic sculpted wax edge -->
  <path filter="url(#waxShadow)" fill="url(#waxBaseGrad)"
    d="M70,8 C83,7 94,14 104,17 C115,21 124,31 128,42 C133,54 134,67 131,80 C128,93 124,106 113,115 C103,124 91,130 78,131 C65,133 52,130 41,124 C29,119 19,109 14,97 C9,85 8,71 10,58 C12,44 17,31 27,22 C37,13 55,9 70,8 Z"/>

  <!-- Pressed inner rim -->
  <circle cx="70" cy="70" r="46" fill="url(#waxInnerGrad)" stroke="url(#waxGoldRim)" stroke-width="1.6" stroke-opacity="0.72"/>
  <circle cx="70" cy="70" r="41" fill="none" stroke="#F8EAD4" stroke-width="0.7" stroke-opacity="0.45" stroke-dasharray="2.5 3.5"/>

  <!-- Delicate embossed botanical wreath -->
  <g stroke="#F8EAD4" stroke-opacity="0.65" fill="none" stroke-width="1.15" stroke-linecap="round">
    <path d="M40,87 C33,73 35,55 46,44"/>
    <path d="M100,87 C107,73 105,55 94,44"/>
    <path d="M35,71 C31,66 32,61 37,62 C38,67 37,70 35,71 Z" fill="#F8EAD4" fill-opacity="0.25"/>
    <path d="M39,56 C37,50 40,46 44,49 C43,53 41,55 39,56 Z" fill="#F8EAD4" fill-opacity="0.25"/>
    <path d="M105,71 C109,66 108,61 103,62 C102,67 103,70 105,71 Z" fill="#F8EAD4" fill-opacity="0.25"/>
    <path d="M101,56 C103,50 100,46 96,49 C97,53 99,55 101,56 Z" fill="#F8EAD4" fill-opacity="0.25"/>
  </g>

  <!-- Monogram -->
  <text x="70" y="76" text-anchor="middle" fill="#FFF7EA" font-family="'Cormorant Garamond', Georgia, serif"
        font-size="23" font-weight="600" letter-spacing="1.5">{$monogram}</text>
</svg>
SVG;
}

function renderFloralSprigSvg(string $class = ''): string
{
    return <<<SVG
<svg class="floral-sprig {$class}" viewBox="0 0 180 120" fill="none" aria-hidden="true">
  <!-- Sage stems & eucalyptus leaves -->
  <path d="M18,108 C48,86 84,62 142,36" stroke="#9CAF97" stroke-width="1.8" stroke-linecap="round"/>
  <path d="M58,80 C76,78 96,82 118,92" stroke="#A6B7A1" stroke-width="1.4" stroke-linecap="round"/>
  <ellipse cx="44" cy="76" rx="13" ry="6.5" transform="rotate(-38 44 76)" fill="#B4C4AE" fill-opacity="0.72"/>
  <ellipse cx="76" cy="57" rx="14" ry="7" transform="rotate(-28 76 57)" fill="#9CAF97" fill-opacity="0.65"/>
  <ellipse cx="105" cy="76" rx="11" ry="5.5" transform="rotate(24 105 76)" fill="#B8C7B2" fill-opacity="0.7"/>
  <ellipse cx="136" cy="54" rx="11" ry="5.5" transform="rotate(-12 136 54)" fill="#A4B69E" fill-opacity="0.65"/>

  <!-- Blush cosmos blossom -->
  <g transform="translate(52, 46)">
    <ellipse cx="0" cy="-12" rx="7" ry="11" fill="#F2C8C6" fill-opacity="0.88"/>
    <ellipse cx="11" cy="-3" rx="11" ry="7" transform="rotate(14 11 -3)" fill="#EBBAB8" fill-opacity="0.82"/>
    <ellipse cx="7" cy="10" rx="7" ry="10" transform="rotate(-24 7 10)" fill="#F3CECC" fill-opacity="0.85"/>
    <ellipse cx="-8" cy="10" rx="7" ry="10" transform="rotate(24 -8 10)" fill="#EBBAB8" fill-opacity="0.82"/>
    <ellipse cx="-11" cy="-3" rx="11" ry="7" transform="rotate(-14 -11 -3)" fill="#F2C8C6" fill-opacity="0.88"/>
    <circle cx="0" cy="0" r="4.8" fill="#E8C677"/>
    <circle cx="0" cy="0" r="2.2" fill="#C49A48"/>
  </g>

  <!-- Lavender blossom -->
  <g transform="translate(106, 36) scale(0.85)">
    <ellipse cx="0" cy="-11" rx="6" ry="10" fill="#CFC0E3" fill-opacity="0.88"/>
    <ellipse cx="10" cy="-3" rx="10" ry="6" transform="rotate(18 10 -3)" fill="#C3B1DA" fill-opacity="0.85"/>
    <ellipse cx="6" cy="9" rx="6" ry="9" transform="rotate(-22 6 9)" fill="#D7CAE9" fill-opacity="0.88"/>
    <ellipse cx="-7" cy="9" rx="6" ry="9" transform="rotate(22 -7 9)" fill="#C3B1DA" fill-opacity="0.85"/>
    <ellipse cx="-10" cy="-3" rx="10" ry="6" transform="rotate(-18 -10 -3)" fill="#CFC0E3" fill-opacity="0.88"/>
    <circle cx="0" cy="0" r="4" fill="#F0D484"/>
  </g>

  <!-- Buttercup yellow bloom -->
  <g transform="translate(148, 30) scale(0.72)">
    <circle cx="0" cy="-8" r="7" fill="#F5DE95" fill-opacity="0.9"/>
    <circle cx="8" cy="-2" r="7" fill="#EED27E" fill-opacity="0.88"/>
    <circle cx="5" cy="7" r="7" fill="#F6E2A0" fill-opacity="0.9"/>
    <circle cx="-5" cy="7" r="7" fill="#EED27E" fill-opacity="0.88"/>
    <circle cx="-8" cy="-2" r="7" fill="#F5DE95" fill-opacity="0.9"/>
    <circle cx="0" cy="0" r="4" fill="#C99E4C"/>
  </g>

  <!-- Gold pollen speckles -->
  <circle cx="28" cy="34" r="1.6" fill="#CFA968" fill-opacity="0.7"/>
  <circle cx="84" cy="20" r="1.4" fill="#CFA968" fill-opacity="0.6"/>
  <circle cx="127" cy="18" r="1.8" fill="#CFA968" fill-opacity="0.65"/>
  <circle cx="164" cy="52" r="1.3" fill="#CFA968" fill-opacity="0.55"/>
</svg>
SVG;
}

function renderFloralDividerSvg(): string
{
    return <<<SVG
<svg class="floral-divider" viewBox="0 0 320 44" fill="none" aria-hidden="true">
  <line x1="16" y1="22" x2="122" y2="22" stroke="#D7C3A3" stroke-width="1" stroke-linecap="round"/>
  <line x1="198" y1="22" x2="304" y2="22" stroke="#D7C3A3" stroke-width="1" stroke-linecap="round"/>
  <path d="M134,22 C142,14 149,14 156,22 C149,30 142,30 134,22 Z" fill="#B5C4AE" fill-opacity="0.65"/>
  <path d="M186,22 C178,14 171,14 164,22 C171,30 178,30 186,22 Z" fill="#B5C4AE" fill-opacity="0.65"/>
  <circle cx="160" cy="22" r="6.5" fill="#F1C5C3" fill-opacity="0.9"/>
  <circle cx="160" cy="22" r="2.7" fill="#C89E53"/>
  <circle cx="128" cy="22" r="2.5" fill="#CBBCE0"/>
  <circle cx="192" cy="22" r="2.5" fill="#F2D98D"/>
</svg>
SVG;
}

function renderButterflySvg(string $primaryWing = '#F2C5C3', string $secondaryWing = '#D5C5EA', string $accentGold = '#C7A05D'): string
{
    return <<<SVG
<div class="butterfly-wings">
  <svg class="wing wing-left" viewBox="0 0 40 60" fill="none" aria-hidden="true">
    <path d="M39,28 C30,8 9,4 5,18 C2,29 18,33 39,31 Z" fill="{$primaryWing}" fill-opacity="0.88" stroke="{$accentGold}" stroke-width="0.9" stroke-opacity="0.65"/>
    <path d="M39,32 C24,33 11,42 15,52 C19,60 34,50 39,35 Z" fill="{$secondaryWing}" fill-opacity="0.86" stroke="{$accentGold}" stroke-width="0.9" stroke-opacity="0.6"/>
    <circle cx="18" cy="20" r="3" fill="#FFFDF9" fill-opacity="0.55"/>
    <circle cx="24" cy="44" r="2" fill="#FFFDF9" fill-opacity="0.5"/>
  </svg>
  <span class="butterfly-thorax" aria-hidden="true"></span>
  <svg class="wing wing-right" viewBox="0 0 40 60" fill="none" aria-hidden="true">
    <path d="M1,28 C10,8 31,4 35,18 C38,29 22,33 1,31 Z" fill="{$primaryWing}" fill-opacity="0.88" stroke="{$accentGold}" stroke-width="0.9" stroke-opacity="0.65"/>
    <path d="M1,32 C16,33 29,42 25,52 C21,60 6,50 1,35 Z" fill="{$secondaryWing}" fill-opacity="0.86" stroke="{$accentGold}" stroke-width="0.9" stroke-opacity="0.6"/>
    <circle cx="22" cy="20" r="3" fill="#FFFDF9" fill-opacity="0.55"/>
    <circle cx="16" cy="44" r="2" fill="#FFFDF9" fill-opacity="0.5"/>
  </svg>
</div>
SVG;
}