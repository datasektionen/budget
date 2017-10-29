# Budgetsystemet
PHP Laravel application that handles the budget of Datasektionen. Live at https://budget.datasektionen.se.

## API
The API is located at ```/api``` (https://bokning.datasektionen.se/api).

### API endpoints
All API endpoints returns the response formatted as JSON if successful. If the request is invalid, the response is unspecified. Read the HTTP status code, all successful responses will have code 200, and every non-successful response will not.

#### List all committees

| URL              | /api/committee |
| Method           | GET            |
| URL params       | ```short``` (**optional**) If short is false or not given, the budgetlines for every committee is included |
| Data params      | None           |
| Success response CODE | 200 |
| Success response content | JSON array of committees |