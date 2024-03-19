# Capstone_JonEmilyNikoNick_2017
Repository for our Capstone project.

## Archival Note
If you're interested in this project, rather than using it, I'd recommend checking out our dependency sources,
the original [Tesseract OCR](https://github.com/tesseract-ocr/tesseract) library
or the [PHP wrapper](https://github.com/thiagoalessio/tesseract-ocr-for-php) we used.

## Project Details

### Members
- Emily Beauchamp
- Jon Gander
- Niko Bentley

### Capstone Goals
Provide OCR (optical character recognition) for youtube videos.
This was achieved by having the user pause the video where they wanted the information to be read,
then analyzying that video frame in the Selenium browser and applying OCR.

While successful, the quality of the character recognition was limited
(pretty good, but not fully up to the challenge of often-blurry text in videos)

## Project Setup
Once you clone the repository, you will need to install composer and
generate a key. Follow these steps:

- Copy/Paste you '.env.example' file into the same directory
- Name the new file just '.env'
- Open the terminal in PhpStorm with [Alt + F12]
- Type 'composer install' and hit Enter
- When that is finished type 'php artisan key:generate'

# Laravel PHP Framework Details

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).