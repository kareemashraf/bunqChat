# Bunq Backend Home Assignment (Chat Application)
can be tested online on http://ec2-34-242-85-70.eu-west-1.compute.amazonaws.com/
<hr>

## Built With (Tech stack)

* php 7.2 with framework [Laravel](https://laravel.com) 
* [SQLite](https://www.sqlite.org/index.html)
* WebSocket [Pusher](https://pusher.com/)
* [PHPUnit testing](https://phpunit.de/)
* [Postman](https://www.getpostman.com/) for API testing
* [jQuery](https://jquery.com/)
* [Bootstrap](https://getbootstrap.com/)

<hr>




## Getting Started

Clone the project repository by running the command below 

```bash
git clone https://github.com/kareemashraf/bunqChat.git
```

After cloning, run:

```bash
composer install
```

Duplicate `.env.example` and rename it `.env`

#### Database Migrations

since the database is SQLite, please create `databe.sqlite` in the 'database' directory
```bash
sudo touch database/database.sqlite
```

Be sure to fill in your database details in your `.env` file before running the migrations:

```bash
php artisan migrate
```

(optional) run the following command to get sample records to the database

```bash
php artisan db:seed
```

And finally, start the application:

```bash
php artisan serve
```

and visit [http://localhost:8000/](http://localhost:8000/) to see the application in action. (also keep in mind that port 8000 could be different if busy)

#### running PHPUnit test

```bash
composer test
```


## API
The API is generally RESTFUL and returns results in JSON.

|HTTP | resource | Description |
| --- | --- | --- |
| GET | /api/users | get a list of all users |
| GET | /api/users/{id} | get a user by userID |
| GET | /api/messages/{fromUserID}/{toUserID} | get a list of messages that was sent between 2 users|
| POST | /api/messages | store a new message |
|DELETE| /api/messages/{id} | Delete a message by ID |


<hr>



## Assignment

Write a very simple ‘chat’ application backend in PHP. A user should be able to send a simple text
message to another user and a user should be able to get the messages sent to him and the
author users of those messages. The users and messages should be stored in a simple SQLite
database. All communication between the client and server should happen over a simple JSON
based protocol over HTTP (which may be periodically refreshed to poll for new messages). A GUI,
user registration and user login are not needed but the users should be identified by some token
or ID in the HTTP messages and the database.

