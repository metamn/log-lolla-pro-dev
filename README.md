# Log Lolla Pro

## Naming conventions

### Folder structure

Following WordPress standards: https://developer.wordpress.org/themes/basics/organizing-theme-files/

### Templates

Following the WordPress Template Hierarchy: https://developer.wordpress.org/themes/basics/template-hierarchy/

### Template parts

Template parts are included with the `get_template_part($slug, $name)` function: https://developer.wordpress.org/reference/functions/get_template_part/

Here we use *special* conditions:

* `$slug` has to be a separate entity. For example `post-list` and `post-format` has to be separated from `post`:

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

* Each entity has to have a `/parts` subfolder where all the partials making the entity are stored:

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


## Internationalization

- https://developer.wordpress.org/themes/functionality/localization/
