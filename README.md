<!--
*** To avoid retyping too much info. Do a search and replace for the following:
*** github_username, repo_name, twitter_handle, email, project_title, project_description
-->

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/robielcpnv/repo_name">
    <img src="public/assets/logo.png" alt="Logo" width="80" height="80">
  </a>
<h3 align="center">Exercise Looper</h3>

## About The Project

This is a CPNV project in which students need to copy a [website](https://stormy-plateau-54488.herokuapp.com/).
It is about planification, learning and programming.

This project allows users to create quizzes, answer questions and look at the statistics. There are 3 types of quizzes: 
building, answering and closed.


A building quiz is a quiz to which questions can be added and which can be deleted. An answering quiz can only be closed
and show statistics. Finally, a closed quiz can be deleted or show statistics.

There are also 3 types of questions: single line text, list of single lines and multi-line text. The only difference 
between them is the size of the questions labels .

### Students

* [Filipe Martins](https://github.com/FilipeCPNV)
* [Robiel Tesfazghi](https://github.com/robielcpnv)

### Built With

* [HMTL & CSS]()
  * [Tailwind CSS](https://tailwindcss.com/docs) Version 2.2.16
* [PHP](https://www.php.net/) Version 8.1
  * [Router Slim](https://packagist.org/packages/slim/slim) Version 4.9
  * [Filu Maw_ORM](https://packagist.org/packages/filu/maw_orm) Version 2.2
* [Mysql](https://dev.mysql.com/downloads/mysql/) Version 8.0.27

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

In order to install all the packages, you'll need :
- [NPM](https://nodejs.org/en/download/)
- [Composer](https://getcomposer.org/download/)

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/robielcpnv/Looper.git
   ```
2. Install NPM packages
   ```sh
   npm install
   ```
3. Install Composer packages
   ```sh
   composer install
   ```
4. Create .env.php . An example is available in the file "example.env.php"

5. Run looper.sql to create your database

6. Run PHP localserver at port 80 or any port of your choosing
    ```sh
    php -S localhost:80 -t public
    ```

## License

Distributed under the MIT License. See `LICENSE` for more information.

## CONTACT 

Filipe Martins - filipe-alexandre.moita-martins@cpnv.ch

Robiel Tesfazghi - robiel.tesfazghi@cpnv.ch

