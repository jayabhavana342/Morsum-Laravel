## Morsum-Laravel

![Alt text](images/Project%20screenshot.png)

#### Database

Database Files: 

* Migrations: database/migrations 
* Seeds: database/seeds 

Create a MySQL database "morsum". 

Set the database connection attributes in file ".env":  

DB_DATABASE= 'database'  
DB_USERNAME= 'user'  
DB_PASSWORD= 'password'  

To migrate the database migartions along with sample data seeder's for each model, run:  

```
php artisan migrate
```

Below is the relational schema of the database:  
![Alt text](images/database%20schema.png)

where a Shelve can have multiple books and albums.  

#### Models  

Below are the models for the three tables:

Models are stored under:  
app/

#### Resource Controllers

Resources transform individual models.  
Resource Collections transform collections of models.  

Resource controllers are stored in:  
app/Http/Resources/

#### Controllers

Controllers can group related request handling logic into a single class.   

Controllers are stored in:  
app/Http/Controllers/API/

#### Views

Views contain HTML served by the application.  

Views are stored in:  
resources/views/

#### Routes

###### API Routes:

API routes are stored in:  
routes/api.php

Web routes are stored in:  
routes/web.php

### HTTP requests

URI for HTTP requests:  

Books - /api/books
Albums - /api/albums
Shelves - /api/shelves

HTTP requests for books:  

| HTTP request | Description | URI | Action |
| --- | --- | --- | --- |
| POST | The RESTful HTTP Request POST method is equivalent to Create functions and INSERT SQL statement. | /api/books | store |
| GET | The RESTful HTTP Request GET method is equivalent to the Retrieve functions and Select SQL statement. | /api/books | index |
| GET | The RESTful HTTP Request GET method is equivalent to the Retrieve functions and Select SQL statement. | /api/books/{book} | show |
| PUT | The RESTful HTTP Request PUT method is equivalent to Update functions and UPDATE SQL statement. | /api/books/{book} | update |
| DELETE | The RESTful HTTP Request DELETE method is equivalent to Delete functions and DELETE SQL statement. | /api/books/{book} | destroy |

### HTTP responses

200(OK) - Successful  
201(Created) - Created Resource  
400(Bad Request) - Client-side error  
404(Not Found) - URI cannot be mapped to resource  
500(Internal Server Error) - Generic REST API error response  

### Example URL's 

To list all data:  
http://127.0.0.1:8000/index.php?url=/books  
http://127.0.0.1:8000/index.php?url=/shelves  
http://127.0.0.1:8000/index.php?url=/albums  

To list single record:  
http://127.0.0.1:8000/index.php?url=/books/{id}   
http://127.0.0.1:8000/index.php?url=/shelves/{id}  
http://127.0.0.1:8000/index.php?url=/albums/{id}  

### Command

Run the project by:  
```php artisan serve```

### Requirements
Php
Composer


