## About This Project Laravel Restaurant Reservation Project

This is laravel web application to register the information of the client who want to book a table in the restaurant

Outlines:
- The application is responsive, which means that you can use it on your computer and phone without losing any details.
- It's built on both dark and light themes, which allow you to switch between them whenever you want.

## Libraries that we used in this project

- We used [Flowbite](https://flowbite.com/docs/getting-started/introduction/) which allow you to build websites even faster with components on top of Tailwind CSS
- And aslo we used [reCAPTCHA v3](https://developers.google.com/recaptcha/docs/v3) for security purpose
> Note: it's necassery having an account on reCAPTCHA version 3 because you have to define your reCAPTHCA v3 secrete and public keys  in the `.env` file **RECAPTCHA_SITE_KEY** & **RECAPTCHA_SECRET_KEY**


## How to run the project

First of all you have to make sure that your computer has **nodejs**, **composer** and local server such as **XAMPP**
Then follow these steps:
1. Download the project as zip file or clone it
    1. `git clone https://github.com/AliKDeveloper/Restaurant-Reservation.git`
2. Open the project from IDE such as VS Code or PhpStorme and run the following commands inside the terminal:
    1. `composer install`
    2. `cp .env.example .env`
    3. `php artisan key:generate`
    4. `php artisan migrate`
    5. `npm install`
    6. `npm run build`
3. Define your reCAPTHCA v3 keys in the `.env` file **RECAPTCHA_SITE_KEY** & **RECAPTCHA_SECRET_KEY**
4. run the project `php artisan serve`
5. Finally go to link <http://127.0.0.1:8000>

## Secrete Key

This web app is closed system so in order to make the system closed so that it's only been accessible to the users who are allowed to access the system \
We added `secrete key` field in the registeration so that every user when they try to register they will have to enter the secrete key \
We made the `secrete key` dynamic so that you can change it whenever you want \
### What is the value of secrete key
When there is no user in the database the `secrete key` is **`hello_world`** there is a hint which says that the secrete key is **`hello_world`** at the first time in the registration form \
After you register your first user there will be a form where you can change the secrete key, it's highly recommended to change the secrete key
### How you can change the Secrete key
You can change the `secrete key` in the profile section after you login as it shows in the following pictires:

![secrete key 1 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/daab5610-e843-4fa5-971f-808d98bd600a)

![secrete key 1 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/38f8ed19-5462-4220-99b6-058212c1e366)

### What to do if you forgot the secrete key
There is two possibel ways to reset the secrete key in case you forgot it:
- delete all tables then you will see a form where you can change the secrete key without having to enter the current one
- delete all users from the database then re-register new user in this case the secrete key will be reset to **`hello_world`**


## Some Screenshots of the Project

![1 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/04aa8759-4e19-4cec-934f-9df9d2af5126)

![1 1phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/65fedca3-dd14-438b-b09e-06bd2f70b713)

![1 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/66a26c83-9b2a-41ab-92b8-1877d92f2ec5)

![1 2 phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/96990b57-dc2f-48eb-803a-e8bc8f488e1c)

![1 1 register](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/958d66f8-48e2-45f1-862b-02378d23bda0)

![1 1 register phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/1e8fb45d-c636-431c-ae13-2cc5bdd89218)

![new 2 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/b473441b-fa66-49ef-9c54-9883a302b80b)

![new 2 1 phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/aa1c21ca-ec4e-4530-8da3-f74c2836c05f)

![2 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/d5843919-9c9a-4478-bbdd-6ee972e3f955)

![3 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/38753f36-a9b2-4105-9383-835e0396909b)

![3 1 phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/6c5dbd38-b2be-4a2a-a0d7-20645020df6d)

![3 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/71828a76-7ed0-4533-b3b7-8bfe7cbb6a6d)

![4 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/90c11d78-95bb-4dfe-8238-d7a02a3e2d2d)

![4 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/4d0b9146-cd8e-4400-b770-a3c71ac502ed)

![5 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/b874cc79-0fcb-4c27-a383-ac55e4f3a8b0)

![5 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/9cc2d376-3ee9-4866-a0ee-82821ab40fba)

![5 2 phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/6c62a7b5-00ec-4b68-a8e2-6cb5bfba88c3)

![6](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/12d662a3-df51-4f39-86cc-f71d52eebfc3)

![6 phone](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/fe30d188-23ce-43fc-a190-e5e2e33f391b)

![7](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/b18da07e-10ea-405a-a868-4866915a1038)

![8 1](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/2633b222-e416-42e4-bb82-9d99c3750041)

![8 2](https://github.com/AliKDeveloper/Restaurant-Reservation/assets/154816741/3b905a2a-a6a5-4121-be66-4995ec32af82)
