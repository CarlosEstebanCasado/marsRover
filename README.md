# Mars Rover Mission
This software has been created for Housfy technical test.
It consists of moving a Rover around Mars by entering some commands that the user passes to it.

## Stack to run the software
- Min PHP version: 7.3
- NodeJS version: 14.x

## Install Mars Rover Mission
First of all, let's download and install the project.
- Clone the repo from github.

    ```
    git clone git@github.com:CarlosEstebanCasado/marsRover.git
    ```
- Install dependencies
    ```
    composer install && npm install
    ```
- Generate webpack mix
    ```
    npm run dev
    ```
## Run the software
- We can use this command provided by Laravel to run the project locally.
    ```
    php artisan serve
    ```
- Once the previous command has been executed, the project can be viewed here: http://127.0.0.1:8000

- If you have any problem viewing the application, you will have to rename `env.example` to `.env`

## Execute tests
- To see that everything works correctly, you have the option to run these integration tests
    ```
    vendor/bin/phpunit
    ```
## App Workflow

We will start in the home of the app.
A form will appear so that we can configure the robot, we can choose the cardinal direction and the starting coordinates.

Once the configuration is done, all the robot data and the number of obstacles on the planet will appear at the top of the page.

We can see a form to enter the movement commands.
- Forward (F)
- Right (R)
- Left (L)

You can add as many commands as you want.

When we send the commands to the robot, it will execute all the commands step by step. In case that the robot encounters an obstacle or reaches the edge of the planet, it will return to the previous position and continue executing the following commands.

Once the commands have been executed, the robot will generate a small report of all the movements made.

At this point, we can re-execute a new command or reconfigure the robot in a new point.
