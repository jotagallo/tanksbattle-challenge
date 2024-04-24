# Battle of Stalingrad challenge

Mini game simulation for the tanks battle code testing.

## Requirements:

Docker and Docker Compose installed on the system

## How to run:

Run scripts on terminal:

<strong><i>$ ./start.sh</i></strong> - to install and start container with installed dependencies.

<strong><i>$ ./stop.sh</i></strong> - to shutdown everything.

The project will be running on default 80 localhost port (http://localhost).

## Description of the project

This project was built using only raw/pure PHP with a Docker configuration using MongoDB and Composer to manage dependencies, with no framework added. A small MVC pattern was used, along with other best practices and principes to get the best code quality possible.

Unfortunately, i couldn't have the time needed to develop the game engine itself, so by the time i'm writing this file i focused to give an app solution ready-to-go to prove my capabilities as a software developer, specially on the backend layer.

A few notes about that:
 - No frontend asset was added so the game could run only in HTML text mode (decision i made at the beggining and stick with it).
 - MongoExpress container was added on port 8081 (http://localhost:8081/) so the database schema can be easily visible.
 - No .env file was added, for the sake of simplicity.
 - I choosed to commit MongoDB files to the repository, althought i know this is a very bad practice and a better DB import/export tool would be needed for that.
 - No API was added, couldn't have the time to do it, and would be useless without game engine and game results.

 ## Game description

 The game i designed would work like a Role Playing Game (RPG) beetween the two tanks. Each tank has strenghts and weaknesses between their main properties: <strong>armor, fire,	range, speed and engine</strong>. 
 
 Tanks would start the battle with 100 of health points and would lose points with obstacles on the ground, along with the enemy fire as well. Each property value would define how much damage would it take for each tank. 
 
 Let's explain a little bit better:

- The map would have a fixed size with a minimum proportion of obstacles. Each tank would have their turn to make a move and/or fire to a given direction, like a chess game. 
- Range would define how far a blast can reach; Fire would define how much damage: More distance from the fire, less damage it takes.
- Armor can reduce damage from fire and obstacles, but it's finite. 
- Engine protects the tank from obstacles, and can define how many moves a tank can make in a battle.
- Speed determines how far the tank can move on the map. Heavy tanks cannot move too far, but combined with Engine it can last longer.
- The score of a winner tank would be determined by it's health points by the end of the battle and the extra damage it took from the defeated tank after it reached zero points of health.
- For example, if a defeated tank was with 20pts of health, took a 50pts of damage, it ended with -20pts. The winner tank was with 40pts of healfh, so the total score for the winner would be 60pts.