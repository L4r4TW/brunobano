# Bruno Blog WordPress Theme

Custom WordPress theme for a digital marketing blog.

The theme is designed around image-led blog content, bold hero sections, post cards, category/topic navigation, and a green accent visual system.

## Theme Location

```text
wp-content/themes/bruno_theme
```

Only modify files inside this theme. Do not edit WordPress core files.

## Requirements

- WordPress
- PHP through the WordPress/local server environment
- No Node, Composer, Sass, or build step is currently required

This project appears to be developed with Local WP.

## Main Files

- `style.css`  
  Main stylesheet and WordPress theme metadata.

- `functions.php`  
  Theme setup, menus, featured image support, Google Fonts, stylesheet enqueue, and contact form handling.

- `header.php`  
  Site header, logo fallback, primary menu, and mobile navigation.

- `footer.php`  
  Footer menu, footer logo/name fallback, tagline, and scroll behavior script.

- `front-page.php`  
  Custom homepage with hero, featured posts, contact form, and latest articles.

- `home.php`  
  Main posts/blog index. Currently reuses `archive.php`.

- `archive.php`  
  Blog archive layout for the posts page, categories, tags, taxonomies, authors, dates, and post type archives.

- `single.php`  
  Single post layout with hero image, metadata, author, share links, content, and related posts.

- `search.php`  
  Search results template.

- `index.php`  
  Generic fallback template.

- `page-blog.php`  
  Older custom `Blog Index` page template. It may overlap with the newer `home.php` and `archive.php` blog archive layout.

- `PROJECT_HANDOFF.md`  
  Current project handoff notes for resuming work later or on another device.

## WordPress Template Behavior

WordPress uses the most specific available template:

- Front page: `front-page.php`
- Main blog/posts page: `home.php`
- Category/tag/date/author archives: `archive.php`
- Single posts: `single.php`
- Search results: `search.php`
- Fallback: `index.php`

The main blog page and archive pages currently share the same layout because `home.php` loads `archive.php`.

## Blog Archive Layout

The current archive design includes:

- Hero section with dark green image overlay
- Archive title and description
- Category/topic navigation chips
- Featured first post on the first archive page
- Responsive latest-articles card grid
- Category and date metadata
- Featured image fallback to `hero.jpg`
- Pagination styling
- Empty state for archives with no posts

Archive-specific styles live in `style.css` under:

```css
/* ===== Blog Archive ===== */
```

## Visual System

Fonts are loaded from Google Fonts in `functions.php`:

- Anton for large hero-style headings
- DM Sans for headings, navigation, and UI text

Common colors:

- Main green: `#4a7856`
- Bright green accent: `#59c36f`
- Dark text: `#111827`
- Muted text: `#5f6672`
- Soft green background: `#f3f7f0`

## WordPress Admin Setup

Check these settings in WordPress admin:

1. Appearance > Themes: confirm `Bruno Blog` is active.
2. Settings > Reading: configure the front page and posts page as needed.
3. Appearance > Menus: assign the primary and footer menus.
4. Posts: add featured images for best card and hero presentation.
5. Optional: assign posts to a `featured` category for the homepage featured block.

## Development Notes

- Keep new styles scoped where possible.
- Be careful editing shared selectors like `.hero`, `.grid`, `.card`, `.nav`, and `.menu-list`.
- Prefer WordPress template functions over hardcoded post IDs.
- The contact form uses `wp_mail`, so email delivery depends on server/local mail configuration.
- PHP CLI was not available in the current shell, so `php -l` linting could not be run from the terminal.

## Recommended Manual Checks

After changes, test:

1. Front page
2. Main blog/posts page
3. Category archive
4. Tag archive, if tags exist
5. Single post
6. Search results
7. Mobile navigation
8. Mobile and tablet archive card layouts

## Git / Resume Workflow

When returning to the project:

```sh
git status --short
```

Then review:

- `PROJECT_HANDOFF.md`
- Recent changes in `archive.php`
- Recent changes in `style.css`
- Whether `home.php` is still intended to reuse `archive.php`

Before starting a new feature, decide whether to commit the current archive work.
