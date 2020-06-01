# Opencart-Webp-Optimizer OC 3.X

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg?style=flat-square)](https://php.net)
[![Minimum Opencart Version](https://img.shields.io/badge/Opencart-%3E%3D%203.X-green)](https://www.opencart.com/index.php?route=common/home)

---

This is Open-surce Version. This extension integrates WebP into OpenCart, and adds WebP images to the page if the browser supports it. Browser support for WebP is detected based on a user-agent check. If WebP support is detected, the extension will output webp format images, otherwise the original cached images(png, jpg, gif) will be displayed.

---

## Installation

```text
- This is a plug and play modification without any settings.
- Install file .ocmod on Extensions/Installer; 
- Reload on Extensions/Modifications;
- Load all Image on cache url: index.php?route=extension/load_image
- PHP 7.x It's required
```
---

## Edit compression image

On /system/library/webpimage.php
Edit the lines below to change the compression levels.
```text
private $options = [
        'png' => [
            'encoding' => 'auto',    /* Try both lossy and lossless and pick smallest */
            'near-lossless' => 60,   /* The level of near-lossless image preprocessing (when trying lossless) */
            'quality' => 85,         /* Quality when trying lossy. It is set high because pngs is often selected to ensure high quality */
            'metadata' => 'none'     /* Meta data info img */
        ],
        'jpeg' => [
            'encoding' => 'auto',     /* If you are worried about the longer conversion time, you could set it to "lossy" instead (lossy will often be smaller than lossless for jpegs) */
            'quality' => 'auto',      /* Set to same as jpeg (requires imagick or gmagick extension, not necessarily compiled with webp) */
            'max-quality' => 80,      /* Only relevant if quality is set to "auto" */
            'default-quality' => 75,  /* Fallback quality if quality detection isnt working */
            'metadata' => 'none'     /* Meta data info img */
        ]
    ];
```

---
## How to contribute

Fork the repository, edit and submit a pull request. Please be very clear on your commit messages and pull request, empty pull request messages may be rejected without reason. Your code standards should match the OpenCart coding standards. We use an automated code scanner to check for most basic mistakes - if the test fails your pull request will be rejected.

---
## Functionality

- Compress image .jpg or .jpeg or .png
- Transform to .webp and save cache copy
- Library tool convert by https://github.com/rosell-dk/webp-convert

---

## Version

### 1.0.1
- Add Accept image
- Add Class for load all image on cache

### 1.0.0
- First release