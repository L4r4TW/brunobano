# Project Handoff

Last updated: 2026-06-11

## Documentation Rule

Always keep the documentation current.

When a change affects project setup, templates, styling, assets, WordPress admin configuration, content/database assumptions, migration steps, or known project state, update the relevant documentation in the same session whenever possible:

- `README.md`
- `PROJECT_HANDOFF.md`
- `DATABASE_SETUP.md`

Before finishing a meaningful development task, check whether these docs need updates. Do not rely on memory for important setup or handoff details.

## Project Summary

This is a custom WordPress theme for a digital marketing blog. The theme lives inside:

```text
wp-content/themes/bruno_theme
```

Only files inside this theme should be modified. Do not edit WordPress core files, plugins, uploads, or parent directories unless explicitly requested.

## Current Development Context

The design direction is a modern digital marketing blog:

- Strong image-led hero sections
- Bold uppercase headings
- Responsive post cards
- Category/topic navigation
- Green accent color system

## Important Files

- `style.css`: main stylesheet and WordPress theme header.
- `functions.php`: theme setup, menus, featured image support, enqueues, and contact form handler.
- `header.php`: site header and primary navigation.
- `footer.php`: footer navigation and footer brand.
- `front-page.php`: custom homepage.
- `archive.php`: archive template.
- `single.php`: single post template.
- `search.php`: search results template.
- `index.php`: fallback template.
- `page-blog.php`: custom page template for a blog index.
- `README.md`: project overview and development guide.
- `DATABASE_SETUP.md`: WordPress database/content setup guide.

## WordPress Template Behavior

- Front page uses `front-page.php`.
- Main posts/blog index uses `home.php` if that file exists.
- Category, tag, taxonomy, author, and date archives use `archive.php`.
- Single posts use `single.php`.
- Search results use `search.php`.
- Generic fallback uses `index.php`.

## Asset Notes

Theme-owned images may live in the theme, but the preferred future structure is:

```text
assets/images/
```

Images that are real post/page content should be uploaded through the WordPress Media Library, not hardcoded as theme files.

## Known Gaps / Follow-Up Work

- Decide whether `page-blog.php` is still needed or should be replaced by the standard posts page/archive flow.
- Consider moving theme image assets into `assets/images/` and updating references.
- `search.php` and `index.php` may need visual alignment with the archive/blog card design.
- `style.css` contains shared selectors that should be edited carefully.
- PHP CLI linting may not be available in the current shell.

## Safe Editing Rules

- Keep all edits inside `wp-content/themes/bruno_theme`.
- Do not modify WordPress core files.
- Prefer scoped CSS classes for new layouts.
- Before changing shared selectors like `.hero`, `.grid`, `.card`, `.nav`, or `.menu-list`, check every template that uses them.
- Preserve user-created content in WordPress admin.
- Refresh `README.md`, `PROJECT_HANDOFF.md`, and/or `DATABASE_SETUP.md` when a change makes them outdated.

## Resume Checklist

When returning to the project:

1. Run `git status --short`.
2. Review this handoff file.
3. Check whether `README.md` and `DATABASE_SETUP.md` still match the current code and setup.
4. Inspect recent template and stylesheet changes.
5. Open the site in Local WP and manually test the affected pages.
