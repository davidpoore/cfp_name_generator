# College Football Player Name Generator
Generates a random player name with a random position from a list of ~30000 first and last names pulled from actual college football rosters

This repository includes the SQL to create the DB and tables, a Python script to populate the database (update the necessary MySQL options in the script with your own user / password info; you will also needed an access token from https://collegefootballdata.com/key), and some minimal HTML, JavaScript, and PHP to quert the DB and create a randomized name.

# .env configuration
We're using https://github.com/vlucas/phpdotenv to store the ENV variables for DB authentication - your .env file MUST be placed in the directory just ABOVE the document root