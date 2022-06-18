<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

##Requirement


- php > = 7.4
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- XML PHP Extension

## install

Clone from https://github.com/inspiration988/ProductDiscount_Challenge_Backend.git

`git clone https://github.com/inspiration988/ProductDiscount_Challenge_Backend.git .`

Run composer install

`composer install`

## Database

The Json file is used as a database and is located at the following address :
`./storage/product.json`

##Run API
In root directory run :
`php artisan serve`

Open url [http://127.0.0.1:8000/api/v1/product/index]  in your browser

##Optional Params

- Fitler by category : http://127.0.0.1:8000/api/v1/product/index?category={category_name}

- Fitler by price less than : http://127.0.0.1:8000/api/v1/product/index?price={price}

- Pagination : http://127.0.0.1:8000/api/v1/product/index?page={1,2,3,...}

