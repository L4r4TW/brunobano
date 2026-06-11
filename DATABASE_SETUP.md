# Database Setup

This file documents the WordPress database/content configuration needed for the `Bruno Blog` theme to work correctly.

Do not commit database dumps, database credentials, salts, user passwords, or `.env` files to this theme repository.

## Documentation Rule

Keep this file updated whenever WordPress admin, content, media, menu, post, category, tag, or migration requirements change.

If a code change creates a new content requirement, such as a new required page, menu location, category, custom field, image expectation, plugin dependency, or setting, update this file in the same work session whenever possible.

Also update `README.md` and `PROJECT_HANDOFF.md` when the change affects general setup or project state.

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

2. Settings > Reading
   - Choose whether the site uses a static front page.
   - Recommended setup:
     - Homepage: a page assigned as the static front page.
     - Posts page: a page assigned as the blog/posts page.

3. Settings > Permalinks
   - Recommended: `Post name`.

4. Appearance > Themes
   - Activate `Bruno Blog`.

## Required Pages

Create or confirm these pages in WordPress:

- Home
  - Assign this as the static homepage in Settings > Reading.
  - The theme uses `front-page.php` for the front page.

- Blog
  - Assign this as the posts page in Settings > Reading.

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

Featured images are important because the theme uses them in homepage cards, archive cards, single post heroes, and related post cards.

## Categories

Recommended category examples for a digital marketing blog:

- SEO
- Content Marketing
- Social Media
- Email Marketing
- Analytics
- Paid Ads
- Strategy

## Featured Category

The homepage tries to load posts from a category with this slug:

```text
featured
```

If no posts are found in the `featured` category, the homepage falls back to recent posts.

## Tags

Tags are optional but useful for archive pages.

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

## Custom Logo

The header and footer support the WordPress custom logo.

Setup:

1. Go to Appearance > Customize.
2. Open Site Identity.
3. Upload a custom logo.

If no custom logo exists, the theme falls back to the site name.

## Media Library

Real content images for posts and pages should be uploaded through the WordPress Media Library.

Theme-owned fallback/design images can live in the theme. Preferred theme asset structure:

```text
assets/images/
```

Current theme image files may include:

- `hero.jpg`
- `img1.jpg`
- `post-1.jpg`
- `post-2.jpg`
- `post-3.jpg`

If these are real post images, upload them through Media Library and assign them as featured images. If they are placeholders or fallback design assets, keep them as theme assets.

## Contact Form Data

The homepage contact form in `front-page.php` posts to WordPress `admin-post.php`.

The form:

- Uses a nonce for validation.
- Uses a honeypot field for spam reduction.
- Sends email with `wp_mail`.
- Sends messages to the WordPress admin email address.

No contact form entries are stored in custom database tables by this theme.

Email delivery depends on the local/server mail configuration.

## Migration Between Devices

Recommended migration options:

1. Export/import WordPress content with Tools > Export and Tools > Import.
2. Use a full WordPress migration tool if moving the complete site.
3. Copy or version-control this theme separately.

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
