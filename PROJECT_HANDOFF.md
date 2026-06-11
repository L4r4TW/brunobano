# Project Handoff

Last updated: 2026-06-11

## Project Summary

This is a custom WordPress theme for a digital marketing blog. The theme lives inside:

```text
wp-content/themes/bruno_theme
```

Only files inside this theme should be modified. Do not edit WordPress core files, plugins, uploads, or parent directories unless the project direction changes explicitly.

The current design direction is a modern digital marketing blog: strong image-led hero sections, bold uppercase headings, post cards, category/topic navigation, and a green accent color.

## Current State

The theme is active development work and currently has uncommitted changes:

```text
M archive.php
M style.css
?? home.php
?? PROJECT_HANDOFF.md
```

The latest completed task was creating a blog archive page similar to digital marketing blogs.

## Important Files

- `style.css`  
  Main theme stylesheet and WordPress theme header. Most visual styling is here. Blog archive styles start under the `/* ===== Blog Archive ===== */` section.

- `functions.php`  
  Theme setup, menu registration, featured image support, Google Fonts enqueue, stylesheet enqueue, and contact form handling.

- `header.php`  
  Site header, logo/custom logo fallback, primary menu, and mobile burger markup.

- `footer.php`  
  Footer menus, footer logo/name fallback, footer tagline, and scroll listener for header styling.

- `front-page.php`  
  Custom homepage with static hero, featured posts, contact form, and latest articles.

- `home.php`  
  Main WordPress posts index template. This file currently reuses `archive.php` so the main blog page and archive pages share the same layout.

- `archive.php`  
  Category, tag, taxonomy, author, date, and post type archive template. It now renders the new marketing-blog archive layout.

- `single.php`  
  Single post layout with image hero, date, title, author, share buttons, content, and related posts.

- `index.php`  
  Fallback template. WordPress uses it only when a more specific template is unavailable.

- `search.php`  
  Search results template.

- `page-blog.php`  
  Older custom page template named `Blog Index`. It has a basic blog grid and may now overlap in purpose with `home.php` and `archive.php`.

## Template Behavior

WordPress template hierarchy matters here:

- Front page uses `front-page.php`.
- Main posts/blog index uses `home.php` if the site has a posts page configured.
- Category, tag, taxonomy, author, and date archives use `archive.php`.
- Single posts use `single.php`.
- Search results use `search.php`.
- Generic fallback uses `index.php`.

Because `home.php` requires `archive.php`, the main blog page and archive pages now share one archive layout.

## Recent Blog Archive Work

Files changed:

- `archive.php`
- `home.php`
- `style.css`

What was added:

- Archive hero with dark/green overlay on `hero.jpg`.
- Clean archive titles for categories, tags, taxonomies, authors, and post type archives.
- Archive description support with fallback marketing copy.
- Category/topic chip navigation using the top 8 categories by post count.
- Featured first article on the first archive page.
- Responsive latest-articles card grid.
- Post metadata with category and date.
- Featured image fallback to `hero.jpg`.
- Pagination styling.
- Empty archive state.
- Responsive desktop/tablet/mobile behavior.

## Visual System Notes

Fonts are loaded in `functions.php`:

- Anton for large hero-style headings.
- DM Sans for headings, navigation, and body UI.

Common colors currently used:

- Main green: `#4a7856`
- Bright green accent: `#59c36f`
- Dark text: `#111827`
- Muted text: `#5f6672`
- Soft green background: `#f3f7f0`

The header is transparent/absolute and designed to sit over hero sections.

## Local Development Notes

This appears to be a Local WP site. The theme path is:

```text
/Users/bruno_bano/Local Sites/test/app/public/wp-content/themes/bruno_theme
```

No package manager or build step is currently required. This is a simple PHP/CSS WordPress theme.

There is no local PHP CLI available in the current shell environment, so PHP linting with `php -l` could not be run here.

Recommended manual checks in WordPress:

1. Open the front page.
2. Open the main blog/posts page.
3. Open a category archive.
4. Open a tag archive if tags exist.
5. Open a single post.
6. Check mobile navigation and responsive card layout.

## WordPress Admin Setup To Check

In WordPress admin:

1. Confirm the theme `Bruno Blog` is active.
2. Go to Settings > Reading.
3. Confirm whether a static front page and posts page are configured.
4. Confirm primary and footer menus are assigned.
5. Confirm posts have featured images for the best archive/card appearance.
6. Optional: create or assign a `featured` category for the homepage featured block.

## Known Gaps / Follow-Up Work

- `page-blog.php` may be redundant now that `home.php` and `archive.php` provide the blog archive layout. Decide whether to remove it, keep it for custom pages, or restyle it to match.
- `index.php` still has an older fallback layout and may not visually match the new archive design.
- `search.php` has a basic layout and could be updated to match the new archive cards.
- `style.css` has repeated/global rules for `.grid`, `.card`, `.hero`, and navigation. Future cleanup should be careful because these are shared across multiple templates.
- The contact form sends email through `wp_mail`; delivery depends on the local/server mail configuration.
- No automated test or lint command is currently available in this project.

## Safe Editing Rules

- Keep all edits inside `wp-content/themes/bruno_theme`.
- Do not modify WordPress core files.
- Prefer scoped CSS classes for new layouts to avoid breaking existing pages.
- Before changing shared selectors like `.hero`, `.grid`, `.card`, `.nav`, or `.menu-list`, check every template that uses them.
- Preserve user-created content in WordPress admin; theme files should not assume specific post IDs.

## Resume Checklist

When returning to the project:

1. Run `git status --short`.
2. Review this handoff file.
3. Inspect `archive.php`, `home.php`, and the Blog Archive CSS section in `style.css`.
4. Open the site in Local WP and manually test the main blog page plus at least one category archive.
5. Decide whether to commit the archive work before continuing with other template cleanup.
