<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Student Blog

<<<<<<< HEAD
I made this blog as a favour for my brother who is going to University in the summer as his professors require he has a blog, to achive this I used basic CRUD functionality for blog posts and details. I have also integrated a rich text editor from CK text editor. Photos are uploaded to AWS's S3 service.
=======
I made this blog as a favour for my brother who is going to University in the summer as his professors require he has a blog, to achive this I used basic CRUD functionality
for blog posts and details. I have also integrated a rich text editor from [CK text editor](https://ckeditor.com/).  Photos are uploaded to AWS's S3 service.
>>>>>>> 494ac11861b698e5b91219784fe70be0016f1799

## Learning Areas

In this project, new things I have implented that haven't featured in other portfolio include:

- [Eloquent Url Slug ](https://github.com/cviebrock/eloquent-sluggable)
- [CK text rich text editor](https://ckeditor.com/)
- A save post and publish post feature
- An opportunity to practice git branching

## ToDo

Potentially include comments from guests, thus include user permissions also.
<<<<<<< HEAD

=======
>>>>>>> 494ac11861b698e5b91219784fe70be0016f1799


## Installation

- Download the file from github.
- Place the downloaded file into your localhost server folder
- Run 'PHP artisan serve', a place indicating no one has registered yet should show up on 'localhost:8000'
- enter details (i will create a seeder eventually)
- Create a DB called blog in your version of sql, I used mysql, if yours is different you may need to amend the .env file.
- In the terminal or CLI, migrate the migration files to the 'blog' DB using 'php artisan migrate'.
- Attempt to register from the web page hosted locally 'localhost:8000/register'
- Attempt a post from 'create post' link

## Security Vulnerabilities
This project is meant to act as a blog for 1 user, therefore the register link should be inaccesable once that user has registered.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
