<?php
/**
 * Wedding Invitation Configuration
 * --------------------------------
 * Customize all wedding details, theme palette, and copy in this single file.
 * Run `php build.php` (or deploy directly to Netlify via netlify.toml) to
 * compile into static HTML in `dist/`.
 */

$wedding = [
    'site_title'       => 'Yanru & Louvelle — Wedding Invitation',
    'meta_description' => 'Together with their families, Yanru & Louvelle joyfully invite you to celebrate their marriage on Wednesday, December 16, 2026 at Leyesa Residence, Barangay Comunal, Calapan City.',

    // Couple & Monogram
    'partner_one'      => 'Yanru',
    'partner_two'      => 'Louvelle',
    'couple_display'   => 'Yanru &amp; Louvelle',
    'monogram'         => 'Y &amp; L',
    'monogram_plain'   => 'Y & L',

    // Invitation Copy (matching the invitation card)
    'eyebrow'          => 'Together with their families,',
    'invitation_lead'  => 'joyfully invite you to share in their love and happiness as they unite in marriage.',
    'invitation_note'  => 'With grateful hearts and boundless joy, we warmly welcome you to witness our vows, celebrate our new beginning, and share a morning filled with love, laughter, and cherished memories.',

    // Date & Time
    'date_iso'         => '2026-12-16T10:00:00+08:00',
    'date_weekday'     => 'Wednesday',
    'date_full'        => 'Wednesday, December 16, 2026',
    'date_short'       => '12 · 16 · 2026',
    'time_display'     => 'At 10:00 in the morning',
    'time_short'       => '10:00 AM',

    // Venue / Reception Location
    'venue_name'       => 'Leyesa Residence',
    'venue_address'    => 'Barangay Comunal, Calapan City',
    'venue_full'       => 'Leyesa Residence, Barangay Comunal, Calapan City',
    'venue_note'       => 'Reception will be lovingly held at the family residence amidst a soft pastel floral garden setting.',
    'maps_url'         => 'https://www.google.com/maps/search/?api=1&query=Leyesa+Residence+Barangay+Comunal+Calapan+City',

    // Envelope Landing Copy
    'envelope_to'      => 'You Are Cordially Invited',
    'envelope_hint'    => 'Tap the wax seal to open your invitation',

    // Featured Wedding Photo (1 couple photo — swap with your own portrait anytime)
    'couple_photo'     => 'assets/images/couple-wedding.jpg',
    'couple_photo_alt' => 'Wedding portrait of Yanru and Louvelle surrounded by soft pastel blooms',
    'couple_caption'   => 'Two hearts, one promise — forever begins on December 16, 2026.',

    // Floral Meadow Border Artwork
    'floral_meadow'    => 'assets/images/floral-meadow.jpg',

    // Monetary Gift QR (InstaPay)
    'gift_qr'          => 'assets/images/gift-qr.jpg',
    'gift_qr_alt'      => 'InstaPay QR code for monetary wedding gifts to Yanru and Louvelle',
    'gift_note'        => 'Your presence, love, and prayers are the greatest gifts we could ever receive. Should you wish to bless us with a monetary gift as we begin our married life together, you may scan the InstaPay QR code below.',

    // Navigation Sections
    'nav_items'        => [
        ['id' => 'invitation', 'label' => 'Invitation'],
        ['id' => 'couple',     'label' => 'Our Portrait'],
        ['id' => 'schedule',   'label' => 'Date & Time'],
        ['id' => 'venue',      'label' => 'Location'],
        ['id' => 'gifts',      'label' => 'Wedding Gift'],
    ],
];
