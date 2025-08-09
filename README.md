Study in Italy – Static Website

A modern, responsive, SEO-friendly multi-page website for a consultancy helping students apply to Italian universities.

Structure
- `index.html` – Home
- `about.html` – About Us
- `universities.html` – Universities (searchable)
- `services.html` – Services
- `scholarships.html` – Scholarships
- `guide.html` – Blog/Guides
- `testimonials.html` – Testimonials
- `contact.html` – Contact (PHP handler)
- `booking.html` – Booking (PHP handler)
- `css/styles.css` – Global styles
- `js/main.js` – UI interactions & animations
- `js/search.js` – Universities search
- `backend/contact.php`, `backend/booking.php` – Simple email handlers
- `assets/icons/favicon.svg` – Favicon
- `sitemap.xml`, `robots.txt` – SEO

Run locally
- Option 1: Open `index.html` directly in your browser.
- Option 2 (PHP forms): Serve with PHP so forms work.
  - Windows PowerShell: `php -S localhost:8080 -t .`
  - Then visit: `http://localhost:8080/`

Configure forms
- Edit these lines and set your real recipient email:
  - `backend/contact.php`: `$to = 'you@example.com';`
  - `backend/booking.php`: `$to = 'you@example.com';`
- If mail() is not configured, switch to Formspree or EmailJS.

Replace content
- Update text, images, and links across pages.
- Swap Unsplash image URLs with your licensed assets.
- Update canonical URLs and `sitemap.xml` with your domain.

Deploy
- Any static host (Netlify, Vercel, GitHub Pages). For PHP handlers, use a PHP-capable host or serverless functions.

License
Placeholder content and images are for demo only. Replace with your own.


