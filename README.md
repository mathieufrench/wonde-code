## About

A quick application to show usage of the Wonde API.
Uses Bootstrap and basic tables. 

## Further enhancements

- Pagination using the API
- refinemant of data passed between controller & view
- Some logic to display the lessons in a calendar format 
- testing
- actual implementation of the Auth provided by Laravel based on teacher data
- linking through to student profiles with full knowledge
- some breadcrumbs between screens
- separation of the three aspects into their own controller
- Some sort of container (I like to use Vagrant)


## Running the application

cp .env.example .env
vi .env
* add your key + School ID *
php artisan serve


