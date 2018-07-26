# Log Lolla Pro

Developer documentation.

## Naming conventions

### Folder structure

Follows WordPress standards: https://developer.wordpress.org/themes/basics/organizing-theme-files/

### Templates

Follows the WordPress Template Hierarchy: https://developer.wordpress.org/themes/basics/template-hierarchy/

### Template parts

Template parts are included with the `get_template_part($slug, $name)` function: https://developer.wordpress.org/reference/functions/get_template_part/

Here we use a few *special* conditions / conventions:

1. `$slug` has to be a separate entity. For example `post-list` and `post-format` has to be separated from `post`:

```
template-parts/post/
├── post-format-aside.php
├── post-format-audio.php
├── post-format-chat.php
├── post-format-gallery.php
├── post-format-image.php
├── post-format-link.php
├── post-format.php
├── post-format-quote.php
├── post-format-status.php
├── post-format-summary.php
├── post-format-video.php
├── post-list-of-a-summary.php
├── post-list-outside-the-loop.php
├── post-list.php
├── post-list-post-type.php
├── post-list-summaries-for-post-type.php
├── post-list-summaries.php
├── post-list-thoughts.php
├── post-list-with-comments.php
├── post-none.php
├── post-search.php
├── post-sidebar-left.php
├── post-sidebar-right.php
├── post-single.php
└── post-single-summary.php
```

2. Each entity has to have a `/parts` subfolder where all the partials making the entity are stored:

```
template-parts/post/
├── parts
│   ├── post-author-linking-to-post.php
│   ├── post-author.php
│   ├── post-categories-as-list.php
│   ├── post-categories-or-tags-as-list.php
│   ├── post-content.php
│   ├── post-content-standard.php
│   ├── post-date-and-time.php
│   ├── post-date.php
│   ├── post-edit-link.php
│   ├── post-excerpt.php
│   ├── post-featured-image.php
│   ├── post-first-image.php
│   ├── post-footer.php
│   ├── post-footer-summary.php
│   ├── post-format-and-topics.php
│   ├── post-gallery.php
│   ├── post-paginated-content.php
│   ├── post-permalink-if-link-is-external.php
│   ├── post-permalink-if-no-title.php
│   ├── post-permalink.php
│   ├── post-sticky.php
│   ├── post-summary-date.php
│   ├── post-summary-link-to-archive.php
│   ├── post-summary-link-to-topic.php
│   ├── post-title.php
│   └── post-title-without-link.php
├── post-none.php
├── post-search.php
├── post-single.php
```

### HTML classes

#### Naming conventions

We try to use the BEM standards (https://en.bem.info/methodology/quick-start/) but without the `__` prefix for Elements.

For example `Archive header` will become `archive-header` instead of `archive__header` for the sake of clarity.

On Modifiers we try to use a special prefix whenever possible to mark the scope of the modifier.

For example `archive-header-post-type` is incorrect vs. the `archive-header-for-post-type`.

#### Synchronization

Ideally we would a need a single rule to sync the PHP/HTML structure with the SCSS structure: each PHP file should contain its name as a classname.

But WordPress structure and naming conventions are messy. For example the `date.php` stands for the date archives page; `archive-people.php` stands for the people archives page. If we use that single rule we will have `date` and `archive-people` classes which don't tells both of them are archive pages.

Here we need to add a handy transformation / new conventions:

##### Prefixing

Each PHP file should contain its name as a classname, transformed if necessary. For example `date.php` will have to have an `archive-date` classname.

##### Staying semantic

The site has only a few page types but much more templates. We have the homepage, post pages, standard pages, not-found and archive pages as page types.  

Archive pages have multiple templates associated like `archive-people.php`, `page-categories.php`, `single-people.php` etc. All of these templates has to be prefixed with an `archive` class, and, their specific classnames like `page`, `single` has to be removed.


##### Default site structure

The site has a default structure given by a few main sections: `header`, `content`, `sidebar`, `footer`.

While we all have PHP templates for `header`, `sidebar`, `footer` we have no template for `content`. This needs to be added by hand.


## Internationalization

- https://developer.wordpress.org/themes/functionality/localization/
