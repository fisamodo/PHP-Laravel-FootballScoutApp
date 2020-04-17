This app allows for storing custom player data and their picture.
App also tracks results from the English premier leauge ( not live because football api costs alot)
Full CRUD functionality, authentication for users and full access control.
You can register and post your players, everybody can see the players in the system, guests and authenticated users, but only the person who make a insert into database can edit and delete the information. 
Point of this was to practice database, things like checkbox array switch to string so it's storable in the database is all here.

Second part of this project is that of Live scores. I used public json i found which contains all match fixtures of epl this season.
More below

1. Detalied display of scouted player. App calculates gpa and goal contribution based on his G/A/Appearance ratio.
Every bit of data is from or calculated from database, no hardcoding
![](https://github.com/fisamodo/PHP-Laravel-FootballScoutApp/blob/master/descPics/Details.png)
2. Display of all players that are in database
![](https://github.com/fisamodo/PHP-Laravel-FootballScoutApp/blob/master/descPics/PlayerPage.png)
3. Every registered user has it's own user report where he can see all the players he tracked(inserted)
can customize their data, but only the user who made the insert
![](https://github.com/fisamodo/PHP-Laravel-FootballScoutApp/blob/master/descPics/UserReport.png)
4. JSON data displayed in table. Data is decoded, then send into blade view. Using double for loops i generate tables each for one game week. Club Badges are found by club->key values from json. 
![](https://github.com/fisamodo/PHP-Laravel-FootballScoutApp/blob/master/descPics/standingsDisplay.png)
