23 March

Todo:
- Hung: proper view for user login. User model if needed.

- Tien: dummy view/controller to manipulate hotel. Room model & Room dummy controller.

- Biyan: dummny view/controller and model for hotel booking. Database migration. From CodeIgniter Folder, run "php index.php migrate"

Tien & Biyan: For the controller: need to be able to list existing records (using a simple table),
view 1 individual record, create a new record, delete a record, update record.

- Carmen & Hung: proper view for the website.

- Van: continue working on the design

Done:
- Agree on how model work. There is an entity class and a manager class (Hotel vs HotelManager).
The manager provide ultility functions to work with the entity. The entity contains attributes, 
knows how to save/ update/ delete itself from the database

- Hotel model

- User system & dummy view to create user/login/logout etc.

- Initial work on the welcome screen

=========================================================

16 March

- Tien & Biyan: writing models
- Hung & Carmen: controllers & views
- Van: wireframe

Tien:
- How to use SQL query instead of ActiveRecord

Biyan:
- Having model for users up ASAP

Hung & Carmen:
- Create controllers & views for other stuff. Using fake data
to render pages.
- User should be able to register, login bythe end of the week

* Login pages
* View list of hotels
* View list of rooms in a hotel
* View detail about a room / a hotel
* Search view for hotel
* View list of bookings

[User, Hotel, Room, Booking] ==> CRUD (Create - view to create the item, Read - View a list, View single item, Update)

Goal:
- By 1 April, done the project
- 1 week for the report

===========================================================

- Tien: Setup CodeIgniter
- Using bootstrap for UI
- Hung: setup the database schema in SQL

Tasks:
- Mock up the UIs for pages: Van
- Backend: Tien + Biyan
- Front end: Hung + Carmen

Functionality:
- Customer:
+ Register
+ Make booking
+ Cancel booking
+ Search hotel & room by some parameters: location, comfort level, etc.
+ Browse through the hotels, see the features of the hotels, etc.

- Admins:
+ Create new hotels, new rooms
+ Add features to hotels & stuff
+ Review the bookings

By 16:
- Van: having mockup of welcome, login, etc.
- Tien & Biyan: setup code igniter, setup database.
- Hung & Carmen: study code igniter, mock ui if possible.

Next meeting: March 16. 11am. Starbuck
