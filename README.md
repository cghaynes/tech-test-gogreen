# GoGreen Tech Test
Author: Chris Haynes
Date: 12th November 2020

## Installation

 1. Checkout Repository onto your Homestead instance.
 2. Run ``composer install``
 3. Set up your .env file to point to a new database.
 4. Run command ``php artisan migrate`` to initialise the database.

## Using the Technical Test

Using this RSS Feed Reader is really simple. Navigate to your project once set up, and create a user following the registration link on the initial login page.

Once you have completed registration it will automatically log you in.

Add a Feed using the box at the top of the page. This will then populate below, and begin to load in the content requested. Multiple feeds? No problem! This will even arrange it in date order, so that you can merge all your favourite RSS feeds and see them all in one place.

Want to only see one of your feeds at once? Click on the Feed Name in the Listing above, and it will take you to see just that one feed.


### Future Updates (should this be longer than a few hours of a project)
- Style to ensure that content remains clean throughout
- Turn the backend into an API based system and enable Vue on the frontend.
- Add multiple types of feed listing type