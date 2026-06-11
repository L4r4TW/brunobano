# Database Setup

This file documents the WordPress database/content configuration needed for the `Bruno Blog` theme to work correctly.

Do not commit database dumps, database credentials, salts, user passwords, or `.env` files to this theme repository.

## Purpose

This theme does not define custom database tables. It relies on standard WordPress data:

- Pages
- Posts
- Categories
- Tags
- Menus
- Featured images
- Site settings
- Custom logo

Use this document when recreating the site on another device, migrating the site, or checking whether the WordPress admin setup matches the theme.

## Required WordPress Settings

In WordPress admin, check:

1. Settings > General
   - Set the site title and tagline.
   - The tagline may be used as fallback archive description text.

2. Settings > Reading
   - Choose whether the site uses a static front page.
   - Recommended setup:
     - Homepage: a page assigned as the static front page.
     - Posts page: a page assigned as the blog/posts page.

3. Settings > Permalinks
   - Recommended: `Post name`.
   - This gives clean URLs for posts, categories, and pages.

4. Appearance > Themes
   - Activate `Bruno Blog`.

## Required Pages

Create or confirm these pages in WordPress:

- Home
  - Assign this as the static homepage in Settings > Reading.
  - The theme uses `front-page.php` for the front page.

- Blog
  - Assign this as the posts page in Settings > Reading.
  - The theme uses `home.php`, which reuses `archive.php`.

Optional pages:

- About
- Contact
- Services
- Privacy Policy

The current homepage includes a contact form section directly in `front-page.php`, so a separate Contact page is optional.

## Posts

Posts are the main content type for the blog.

Recommended post setup:

- Add a clear title.
- Add a useful excerpt.
- Add a featured image.
- Assign at least one category.
- Add tags where useful.

Featured images are important because the theme uses them in:

- Homepage featured cards
- Homepage latest articles
- Blog archive cards
- Single post hero sections
- Related post cards

If a post does not have a featured image, some templates fall back to `hero.jpg`.

## Categories

Categories power blog organization and archive navigation.

Recommended category examples for a digital marketing blog:

- SEO
- Content Marketing
- Social Media
- Email Marketing
- Analytics
- Paid Ads
- Strategy

The archive page displays up to 8 category/topic chips, ordered by post count.

## Featured Category

The homepage tries to load 3 posts from a category with this slug:

```text
featured
```

Recommended setup:

1. Go to Posts > Categories.
2. Create a category named `Featured`.
3. Confirm the slug is:

```text
featured
```

4. Assign this category to posts that should appear in the homepage featured block.

If no posts are found in the `featured` category, the homepage falls back to the latest 3 posts.

## Tags

Tags are optional but useful for archive pages.

If tags are used, WordPress tag archive pages will use `archive.php` and receive the same blog archive layout.

Recommended tag examples:

- keyword research
- conversion rate
- content strategy
- technical SEO
- lead generation

## Menus

The theme registers two menu locations in `functions.php`:

- Primary Menu
- Footer Menu

Setup:

1. Go to Appearance > Menus.
2. Create a primary navigation menu.
3. Assign it to `Primary Menu`.
4. Create a footer menu.
5. Assign it to `Footer Menu`.

If no footer menu is assigned, the footer attempts to fall back to the primary menu.

Recommended primary menu items:

- Home
- Blog
- About
- Contact

## Custom Logo

The header and footer support the WordPress custom logo.

Setup:

1. Go to Appearance > Customize.
2. Open Site Identity.
3. Upload a custom logo.

If no custom logo exists, the theme falls back to the site name.

## Media Library

The theme expects image-led content.

Recommended media setup:

- Upload a custom logo.
- Add featured images to all major posts.
- Use consistent image dimensions where possible.
- Prefer landscape images for blog cards and post heroes.

Theme files also include local image assets:

- `hero.jpg`
- `img1.jpg`
- `post-1.jpg`
- `post-2.jpg`
- `post-3.jpg`

These are theme assets, not Media Library records.

## Contact Form Data

The homepage contact form in `front-page.php` posts to WordPress `admin-post.php`.

The form:

- Uses a nonce for validation.
- Uses a honeypot field for spam reduction.
- Sends email with `wp_mail`.
- Sends messages to the WordPress admin email address.

No contact form entries are stored in custom database tables by this theme.

Email delivery depends on the local/server mail configuration. On local development environments, email may not send unless mail capture or SMTP is configured.

## Migration Between Devices

Recommended migration options:

1. Export/import WordPress content:
   - Tools > Export
   - Tools > Import

2. Use a full WordPress migration tool if moving the complete site:
   - Database
   - Uploads
   - Plugins
   - Theme
   - WordPress settings

3. Copy or version-control this theme separately:
   - `wp-content/themes/bruno_theme`

When moving to another device, confirm:

- The theme is active.
- The posts page is assigned.
- Menus are assigned.
- Featured images imported correctly.
- Permalinks are saved again.

## Do Not Commit

Do not commit:

- SQL database dumps
- `wp-config.php`
- Database usernames or passwords
- WordPress auth salts
- Admin user passwords
- `.env` files
- Local-only backup files

## Quick Setup Checklist

1. Install WordPress.
2. Copy or clone this theme into `wp-content/themes/bruno_theme`.
3. Activate `Bruno Blog`.
4. Create Home and Blog pages.
5. Assign Home as the homepage and Blog as the posts page.
6. Set permalinks to `Post name`.
7. Create and assign Primary and Footer menus.
8. Upload a custom logo.
9. Create categories, including optional `featured`.
10. Add posts with excerpts, categories, and featured images.
11. Test the homepage, blog page, category archive, single post, search, and mobile menu.
