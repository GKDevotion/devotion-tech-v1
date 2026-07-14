<?php
  /**
   * SEO meta helper — set $seo array per page before including this file.
   * Falls back to global defaults if a key isn't set.
  */
  function e(string $value): string {
     return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  } 
  $defaults = [
      'title' => 'Devotion Technologies| IT Services & Technology Solutions', 
      'description' => 'Devotion Technologies offers innovative IT solutions, web development, software development and digital transformation services.', 
      'keywords' => 'Devotion Technologies, IT services, web development, software solutions', 
      'author' => 'Devotion Technologies'
  ]; 
  // Merge page-specific overrides ($seo) with defaults — one line, no repeated ?? chains
  $seo = array_merge($defaults, $seo ?? []);
  ?> 
  <title><?php echo e($seo['title']); ?></title>
  <meta name="description" content="<?php echo e($seo['description']); ?>">
  <meta name="keywords" content="<?php echo e($seo['keywords']); ?>">
  <meta name="author" content="<?php echo e($seo['author']); ?>">
  <!-- Page Title -->