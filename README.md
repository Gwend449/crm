# CRM.detailing

CRM.detailing - system for store clients and deals in detailing business. Before, all records in studio was writing on board or just keeping in head of owner, thats why we decided to develop directed cms to our tasks.

This application show my thinking way, architecture patters i use in developing. Project is simple (MVP), but have strong fundament and easy to scale, because i write all lines of code keeping "decoupling" concept in mind.

## Technologies

Because business task was improve process of communication with clients, i choose next tools for implementation:

- PHP 8 (analytics, security, automate for personal needs)
- Laravel 12 + Tailwind (quick write simple app, MVC framework)
- Livewire (write dynamic interface on page in easy way)
- MySQL (i always take it when develop applications)

## Overview

### Dashboard

![Main page screenshot] (public/images/doc_images/Screenshot_1.png)

There is nothing special on this page, just printing several variables to show DB information for User. It was wrote with Eloquent ORM.

### Client page
![Clients side screenshot] (public/images/doc_images/Screenshot_2.png)

There is client's page with table. I added some filters: search by name (thanks to Livewire to simplify my life) and sorting by alphabet (Livewire).

### CRUD for clients
![new client page] (public/images/doc_images/Screenshot_4.png)

Initially, all logic for adding, updating, and validating data was located in a single controller, which over time started to look like a "mixed salad." To solve this issue, I applied the following improvements: 

- `FormRequest`: moved all validation logic into a separate class, where I defined rules for creating and updating client information.
- `ClientService`: moved infrastructural logic into a service, which helped to keep the controller light and adhere to the `SRP` principle.
- `DTO (Data Transfer Object)`: used DTOs to secure and structure incoming data from forms. For a project of this size it might look weird, but my goal was to demonstrate thinking ing enterprise-level practices.
- `Reflection and Traits`: extended DTOs with reflection and traits to improve flexibility. Reflection was introduced for scalability, so when we add new fields to database, changes are minimized across the codebase. Traits act as helpers, making the code cleaner and easier to maintain.


### CRUD для сделок
![Скриншот главной страницы приложения] (public/images/doc_images/Screenshot_5.png)

- Here i did all the same things as i wrote above. Paginate, filtration, dynamic interface livewire (for example client's car in deal edit page).  

![Скриншот изменения данных о сделке] (public/images/doc_images/Screenshot_6.png)


Base functionality give big space to make code more complex, add new features and other things. But again i repeat — my goal was demonstrate knowledge of fundamental approach to design and development in short time for myself.
