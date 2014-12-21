##### Project 4 created by Steve Motsco
##### Project URL:  http://p4.stevemotsco.me/
**Username:**  Haus@gmail.com
**Password:**  1234qwer
##### Demo URL:  http://screencast.com/t/yj1zrI3HGStF

### Website:  Sunshine Farms
###### This website will be Sunshine Farms’ presence on the internet.  It will give information about Sunshine Farms to include services it provides along with associated costs; the ability to schedule, edit, and delete future events; review past events; read reviews from previous customers; add a review; and more (hopefully).
##### Essential features:
###### •	Display page to allow new users to create user accounts
###### •	Display page to allow users to login
###### •	Display page to allow people (user account not required) to review the various services provided along with associated costs
###### •	Display page to allow users to review details of past events they have participated in (ie - riding lessons, trail rides, etc.)
###### •	Display page to allow users to add a future event (ie - guided trail ride)
###### •	Display page to allow users to cancel/edit a future event already scheduled (ie - guided trail ride)

##### Bonus features:
###### •	Display page to allow users to write reviews about past services received
###### •	Display page to allow people (user account not required) to read reviews from past customers
###### •	Display page to allow people to download discount coupons
###### •	Send out emails to users of special events
###### •	Display page to allow users with a recurring event (ie - boarding) to pay bill online
###### •	Display page to allow users with a recurring event (ie - boarding) to see amount that is owed and when payment is due
###### •	Display page to allow people to read of upcoming charitable avtivities in the area that have to do with horses

##### Database Structure:
The database currently consists of three tables with the following field:

**users**
increments('id');
string('username')->unique();
string('email')->unique();
string('remember_token',100); 
string('password');
boolean('is_admin')->default(0);
boolean('confirmed')->default(0);
timestamps();

**services**
increments('id');
string('servname')->unique();
string('servdesc');
integer('cost_unit')->unsigned();
string('unit');
timestamps();

**hevents**
increments('id');
date('event_date');
integer('participants')->unsigned();
integer('units')->unsigned();
boolean('is_complete')->default(0);
date('completed_date')->nullable();
integer('user_id')->unsigned(); 
integer('service_id')->unsigned(); 
timestamps();
  Foreign keys
foreign('user_id')->references('id')->on('users');
foreign('service_id')->references('id')->on('services');

##### External Code:
* https://netdna.bootstrapcdn.com
* http://amsul.ca/pickadate.js/index.htm
* http://maxoffsky.com/code-blog/integrating-date-pickers/
* https://code.jquery.com

##### Issues encountered:
One big issue I encountered was that I originally created a table named events which caused the associated model to be named Event which caused big problems because Event is a reserved word in Laravel.  I also ran into significant issues getting the datepicker to function correctly mainly due to conflicts with css files as well as tweaking the javascript files for the datepicker I ended up using.  Luckily, this project pushed me to set up the initial framework for a website for my wif's business for which she is grateful.  I will continue to work on it and implement all the bonus features and more (hopefully).