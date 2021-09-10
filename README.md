# Online Cemetery Locator
The Online Cemetery Locator is a responsive web application made on Codeigniter that allows people to search for cemeteries only. A location is stored in mySQL database which can easily be added or fetched. You no longer need to search for cemeteries all day long!

## Requirements
* A browser where you can run the web application
* **PHP version** >= 5.3.7
	
## Installation
1. First of all head over to **"application/config"** and open **"config.php"** file to change some global variable:
 	* Search for **"$config['base_url']"** to change the **Base URL** or you can say the **Root URL** accordingly.
 	* Search for **"$config['site_title']"** to set your website title.
 	* Search for **"$config['phone_number']"** to set phone number.
 	* Search for **"$config['email_address']"** to set your email address.
 	* Search for **$config['address']** to your companies address where your company is located.

2. Now head over to **"application/config"** and open **"database.php"** file in order to connect to your database.
	* Import the database named **"online-cemetery-locator.sql"** in database and;
	* Change your hostname, username, password & database(database-name) accordingly to connect with your database.

3. Now head over to **"application/controllers"** and open **"Welcome.php""** file to change your Google Map API Key.
	* Search for function named **"location"** and add your API key provided by the google at **"$config[apikey]"**.

## Login to Dashboard
	* Head over to the URL **"domain.com/login"** and use default email and password to login as admin.
	* **Email:** admin@admin.com
	* **Password:** 123456
	
## Contribute
Thank you for choosing Online Cemetery Locator and we would be more then happy if your would like to contribute. Developers are encouraged to use GitHub's fork/pull request mechanism for contributing to this repository.
