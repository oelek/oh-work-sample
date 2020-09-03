# oh work sample

### Prerequisites
* sqlite3
* PHP ^7.2.5

### Installation
* Clone the repository with `git clone git@github.com:oelek/oh-work-sample.git`
* Change working dir `cd oh-work-sample`
* Install dependencies `composer install`
* Start server `php artisan serve`

### Routes
|Verb    |  URI                             | Description               |
|--------|----------------------------------|---------------------------|
| GET   |  /api/authors                     | List all authors          |
| GET   |  /api/authors/search              | Search for authors        |
| GET   |  /api/authors/{author}            | View author               |
| GET   |  /api/books                       | List all books            |
| GET   |  /api/books/search                | Search for books          |
| GET   |  /api/books/{book}                | View book                 |
| GET   |  /api/genres                      | List all genres           |
| GET   |  /api/genres/search               | Search for genres         |
| GET   |  /api/genres/{genre}              | View genre                |
| GET   |  /api/authors/{author}/books      | List all books by author  |
| GET   |  /api/books/{book}/authors        | List all authors by book  |
| GET   |  /api/books/{book}/genres         | List all genres by book   |

#### Search query
Add a query param with a filter key value combination. In the example below a query for books with a title containing "park" will be returned:

```
/api/books/search?filter[title]=park
```
