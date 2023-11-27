# Profiler

This project showcases a simple user authentication and profile management system using PHP, SQL, MongoDB .This uses session to manage.

## Table of Contents

- [Requirement](#installation)
- [Set up](#setup)
- [Data Base](#database)
- [Usage](#usage)


## Installation

1. I used xampp for the php environment and used the inbuilt sql features.
2.Clone the project

```bash
gh repo clone MohamedAliyarAR/profiler
```
such that htdocs   folder is a parent folder(C:\xampp\htdocs\)

3. Install MongoDB , for php and configure.
4. Install Composer(package manager for php).
5. Install MongoDB compass.


## Set up
- Start the xampp Apache server and sql.
- Start the mongoDB by running `mongo` in the terminal.
- Run the following command to install PHP dependencies `composer install`
- Run the sql server in the **3307** port

## Database 
  ### sql
  - Enter localhost in search params and click phpmyadmin 
   - Create a Database in SQL named `profileauth`
   - Create a table named `customertable`
   - It should have two columns they are `email` and `password`
  ### mongo
    - The Database and table structure will be created after the submission.
    - email is the primary key in this project.
## Usage
 - Go to localhost/**your foldername**
 - Ensure the set up is done properly
