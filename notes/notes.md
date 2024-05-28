## File and Directory Descriptions

```

404.php: Template for displaying 404 (not found) pages.
archive.php: Template for displaying archive pages.
comments.php: Template for displaying comments and the comment form.
footer.php: Template for displaying the footer section of the site.
functions.php: File for theme setup, widget registration, and other functions.
header.php: Template for displaying the header section of the site.
index.php: The main template file for the theme.
page.php: Template for displaying individual pages.
README.md: File for theme documentation (optional but recommended).
screenshot.png: Image used as a theme thumbnail in the WordPress admin.
search.php: Template for displaying search results.
sidebar.php: Template for displaying the sidebar.
single.php: Template for displaying individual posts.
style.css: Main stylesheet for the theme.

```

## Front Page

The site’s homepage or front page is the first page visitors will see. Its layout can vary greatly between websites. The front page hierarchy has three templates:

front-page.php
home.php
index.php

## single.php => singhe-post functions

```php
<?php the_title(); ?>
<?php the_content(); ?>
<?php the_excerpt(); ?>
<?php
if ( has_post_thumbnail() ) {
    the_post_thumbnail('thumbnail'); // other sizes: 'medium', 'large', 'full', or custom size
}
?>
<?php the_meta(); ?>
<?php the_author(); ?>
<?php the_date(); ?>
<?php the_category(', '); ?>
<?php the_tags('', ', ', ''); ?>
<?php comments_template(); ?>


```

## Resouces links

https://www.hostinger.in/tutorials/wordpress-template-hierarchy

## Visual Resources

[](./01-wordpress-template-hierarchy.webp)
[](./02-front-page-hierarchy-1.webp)
[](./03-single-posts-hierarchy-1536x930.webp)
[](./04-single-pages-hierarchy-1536x1058.webp)
[](./05-category-archive-hierarchy-1536x608.webp)
[](./06-custom-post-types-hierarchy-1536x490.webp)
[](./07-search-results-pages-hierarchy-1536x452.webp)
[](./08-404-error-pages-hierarchy-1536x452.webp)
