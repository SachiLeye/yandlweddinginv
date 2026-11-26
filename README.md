# Yanru & Louvelle — Pastel Floral Wedding Invitation

A modern, responsive PHP wedding invitation website styled with a soft pastel watercolor & floral meadow theme, featuring an interactive sealed pastel envelope landing page that opens into a scrollable invitation.

## Structure
- `index.php` — Main PHP template (envelope landing + scrollable invitation sections)
- `config.php` — Central configuration for couple names, date, time, venue, copy, and photo path
- `partials/floral-svgs.php` — Reusable wax seal and botanical SVG helpers
- `assets/css/style.css` — Pastel & floral theme styling, 3D envelope transitions, and responsive layout
- `assets/js/main.js` — Envelope opening choreography, scroll-spy navigation, countdown, `.ics` calendar export, and Netlify RSVP handling
- `assets/images/couple-wedding.jpg` — Featured couple wedding portrait (replace with your own photo anytime)
- `assets/images/floral-meadow.jpg` — Watercolor floral meadow border artwork
- `build.php` & `netlify.toml` — Compiles PHP into static HTML in `dist/` for seamless Netlify hosting

## Deploying to Netlify
### Option 1: Git Repository (Automatic Build)
1. Push this folder to GitHub, GitLab, or Bitbucket.
2. Connect the repository in Netlify.
3. Netlify reads `netlify.toml`, runs `php build.php`, and publishes `dist/`.
4. Guest RSVPs submitted through `#rsvp` are automatically captured by **Netlify Forms**.

### Option 2: Manual Drag-and-Drop (Netlify Drop)
1. Run `php build.php` locally to regenerate `dist/`.
2. Drag the `dist/` folder directly onto [Netlify Drop](https://app.netlify.com/drop).

## Local Preview
```bash
# Preview directly with PHP built-in server:
php -S localhost:8080

# Or build static output for Netlify:
php build.php
```
