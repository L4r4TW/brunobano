# Bruno Blog WordPress Theme

Custom WordPress theme for a digital marketing blog.

The theme is designed around image-led blog content, bold hero sections, post cards, category/topic navigation, and a green accent visual system.

## Documentation Rule

Keep documentation in sync with the project.

Whenever code, theme structure, WordPress setup, content/database assumptions, assets, templates, or development workflow changes, update the relevant documentation in the same work session whenever possible:

- `README.md` for project overview, setup, theme structure, and development workflow.
- `PROJECT_HANDOFF.md` for current project state, recent changes, known gaps, and resume notes.
- `DATABASE_SETUP.md` for WordPress admin, content, media, menu, post, category, and migration requirements.

Do not leave important implementation or setup changes undocumented.

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

- `style.css`: main stylesheet and WordPress theme metadata.
- `functions.php`: theme setup, menus, featured image support, Google Fonts, stylesheet enqueue, and contact form handling.
- `header.php`: site header, logo fallback, primary menu, and mobile navigation.
- `footer.php`: footer menu, footer logo/name fallback, tagline, and scroll behavior script.
- `front-page.php`: custom homepage with hero, featured posts, contact form, and latest articles.
- `archive.php`: category, tag, taxonomy, author, date, and post type archive template.
- `single.php`: single post layout with hero image, metadata, author, share links, content, and related posts.
- `search.php`: search results template.
- `index.php`: generic fallback template.
- `page-blog.php`: custom `Blog Index` page template.
- `PROJECT_HANDOFF.md`: current handoff notes for resuming work.
- `DATABASE_SETUP.md`: WordPress content/database setup documentation.

## WordPress Template Behavior

WordPress uses the most specific available template:

- Front page: `front-page.php`
- Main blog/posts page: `home.php`, if present
- Category/tag/date/author archives: `archive.php`
- Single posts: `single.php`
- Search results: `search.php`
- Fallback: `index.php`

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
- Theme design images can live in the theme, ideally under `assets/images/`.
- Real content images should be uploaded through the WordPress Media Library.
- The contact form uses `wp_mail`, so email delivery depends on server/local mail configuration.

## Recommended Manual Checks

After changes, test:

1. Front page
2. Main blog/posts page
3. Category archive
4. Tag archive, if tags exist
5. Single post
6. Search results
7. Mobile navigation
8. Mobile and tablet layouts

## Git / Resume Workflow

When returning to the project:

```sh
git status --short
```

Then review:

- `PROJECT_HANDOFF.md`
- Recent template changes
- Recent `style.css` changes
- Whether documentation needs to be refreshed before continuing
