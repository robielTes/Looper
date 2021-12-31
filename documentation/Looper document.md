<!--
*** To avoid retyping too much info. Do a search and replace for the following:
*** github_username, repo_name, twitter_handle, email, project_title, project_description
-->

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/robielcpnv/repo_name">
    <img src="https://github.com/robielcpnv/Looper/blob/main/public/assets/logo.png?raw=true" alt="Logo" width="80" height="80">
  </a>


    
<h1 align="center">Exercise Looper</h1>

## Students

* [Filipe Martins](https://github.com/FilipeCPNV)
* [Robiel Tesfazghi](https://github.com/robielcpnv)


## About The Project

This is a CPNV project in which students need to copy a [website](https://stormy-plateau-54488.herokuapp.com/).
It is about planification, learning and programming.
The objective was to put this project online so that everyone can access it but for now you can find in [github](https://github.com/robielcpnv/Looper). 

This project allows users to create exercise with fields, and allow us to answer them and look at the statistics. There are 3 types of stats: 

#### building

when we first creat a new exercise it has building status by default, when the exercise is in this status it means it is not ready and could have fields or not it depend. Also

    - we change the state to answering
    - we can delete the exercise
    - we can add fields
    - we can edit the fields

#### answering

when the exercise have some field we can change its state to answering, when the exercise is in this status it means the exercise is  ready for answering.

    - we change the state to closed
    - we can see the result of the exercise
    - we can answer the exercise
    - we can add fields "not recommend"
    - we can edit the fields "not recommend"

#### closed

when the exercise have answering status we can change its state to closed, when the exercise is in this status it means the exercise is finish.
    
    - we can see the result of the exercise
    - we can delete the exercise
    - we change the state to answering "not recommend"
    - we can add fields "not recommend"
    - we can edit the fields "not recommend"

![exercise](https://github.com/robielcpnv/Looper/blob/main/documentation/img/manage.png?raw=true)

Manage Exercise

There are also 3 types of questions: single line text, list of single lines and multi-line text. The only difference between them is the size of the questions labels.


## MLC MDC
we use utf-8 for character encoding and UTC for as time/tme-zone standard.

![MCD](https://github.com/robielcpnv/Looper/blob/main/documentation/database/MCD.PNG?raw=true)

MCD

![MLD](https://github.com/robielcpnv/Looper/blob/main/documentation/database/MLD.PNG?raw=true)

MLD

![Diagram class](https://github.com/robielcpnv/Looper/blob/main/documentation/uml/Diagram.drawio.png?raw=true)

Diagram class

## ExerciseLooper features

### Exercise building

     - [*] Create a new blank exercise with a title
     - [*] Add a new field with a title and a value type
     - [*] Edit an existing field to either rename it or change the value type
     - [*] Destroy an existing field

### Exercise taking

     - [*] List the exercises that are ready for answers
     - [*] Take an exercise to see all the fields
     - [*] Answer the taken exercise by filling the fields
     - [*] Update the existing answers for a taken exercise

### Exercise management

     - [*] List all the exercises in 3 columns based on their state
     - [*] Destroy an exercise (only when building or closed)
     - [*] Change state of an exercise through icon buttons
     - [*] Stats for an exercise: show the recap (all takes, all fields)
     - [*] Stats for an exercise: show the answers of all fields of one take
     - [*] Stats for an exercise: show the answers on one field of all takes


## Architecture

### Built With

* [HMTL & CSS]()
  * [Tailwind CSS](https://tailwindcss.com/docs) Version 2.2.16
* [PHP](https://www.php.net/) Version 8.1
  * [Router Slim](https://packagist.org/packages/slim/slim) Version 4.9
  * [Filu Maw_ORM](https://packagist.org/packages/filu/maw_orm) Version 2.2
* [Mysql](https://dev.mysql.com/downloads/mysql/) Version 8.0.27

To develop this project, we were inspired by Laravel, so we use many laravel feature such as blade template, controller API, route call. As design pattern we use MVC Interactions with the database are done by model, html rendering is done by views and all logic is handled by controllers.

### Libraries

we use some libraries for this project such as

- slime/slime this library like most routing libray it allow as to map URLS to php functions unlike         other routing libray that use function anonymous/callback we can config this libray to look like or       use the same way as laravel to call method in controller class and it is easy to configurate because       it use dependence injection.

- jenssegers/blade this libray allow as to use blade template outside laravel framware.

- illuminate/support this library allow as to many usefull php string & array method

- filu/maw_orm this is simple ORM developed by filipe.

- For unit testing, we used the standard PHP library for unit tests.


<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

In order to install all the packages, you'll need :100: 
- [PHP](https://www.php.net/downloads)
- [MySQL](https://dev.mysql.com/downloads/windows/installer/8.0.html)
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

## Hacks used in this project

route

I modified the slime library a lot to use it like Laravel and was unable to use the other methods like put/patch and delete eventhough the [slime library](https://www.slimframework.com/docs/v4/objects/routing.html) enables to use them. After some time I concluded it is better to use only get/post rather than wasting time to solve the bug.

    Route::get('/exercises', 'ExerciseController@edit');
    Route::get('/exercises/new', 'ExerciseController@create');
    Route::get('/exercises/answering', 'ExerciseController@index');
    Route::get('/exercises/{id}/fields', 'ExerciseController@show');
    Route::post('/exercises/{id}/fields', 'ExerciseController@store');
    Route::post('/exercises/{id}/state', 'ExerciseController@update');
    Route::post('/exercises/{id}/state/{status}', 'ExerciseController@update'); // from create field form
    Route::post('/exercises/{id}/destroy', 'ExerciseController@destroy');

404

The library slime comes with its own simple 404 page, so I added my custom page for the 404 error page but I couldn't replace the default slime page with my custom page, so when the error is found by the library, it uses its 404 page.
![slime](https://github.com/robielcpnv/Looper/blob/main/documentation/img/404slime.png?raw=true)

default 404

![custom](https://github.com/robielcpnv/Looper/blob/main/documentation/img/404.png?raw=true)

custom 404

## Retrospective

### feedback

This was a very good and useful project. We have learned a lot of useful way of working with the group in the Agile Way, by adding a new feather to our project every week or so after we have our sprint meeting or when we are learning new things in class like,
- The creation of a new ORM or learning a new technology that we don't know like the route we have found and that is now working for us after 3 setbacks, each one with its own reason, from a broken dependency to a non-existent document.
- Or changing our development model from Git Flow to Trunk as we learn the pros and cons of each model.

### what worked well

- since the group is consisting of two members, we can make a decision or assign work quickly, saving us a lot of time.
- we have known each other since we were in cfc, therefore we know our limitations, this allows us to allocate the tasks based on our experience and skill levels, so we are very good at collaborating, like when we began the project, Filipe has started to work with the view and I with the model, after this, when he was working with ORM, I began to work with route.

### what did not work well

- At first we used a simple route that was fine, but as we were going forward we realized it wasn't good enough and we ended up having to spend extra time on a new route that was not planned.

- We had a few challenges in the last part of the project as Filipe made the decision to stop the CPNV even though we had finished most of the project by that time.


### How to organize the work in the group

When we started working on this project, we had already taken some GPR1 courses. So we decided to use the agile/kanban framework with the GitFlow development method, the GitHub project to track progress using issues and milestones and to share the code we use Github.

- In the beginning we created a lot of user stort with Dod and put them in the Product Backlog column.
- At the beginning of each spring, we move the user story we want to work on to the Sprint Backlog column.
- Then we assign the user story to someone or both of us as an Issue and place it in the in progre column.
- When the entire Dod is completed, we both approve it " before we wait for the teacher's approval".
- After being approved, we close the issue to move it to the "completed" column.
- Move to the next user story. Sometimes we work on several user stories at the same time.


## License

Distributed under the MIT License. See `LICENSE` for more information.

## CONTACT 

Filipe Martins - filipe-alexandre.moita-martins@cpnv.ch

Robiel Tesfazghi - robiel.tesfazghi@cpnv.ch

