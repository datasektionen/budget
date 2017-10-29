# Budgetsystemet
PHP Laravel application that handles the budget of Datasektionen. Live at https://budget.datasektionen.se.

## API
The API is located at ```/api``` (https://bokning.datasektionen.se/api).

All API endpoints returns the response formatted as JSON if successful. If the request is invalid, the response is unspecified. Read the HTTP status code, all successful responses will have code 200, and every non-successful response will not.

### List all committees

| Egenskap         | Värde          |
| ---------------- | -------------- |
| **URL**              | /api/committees |
| **Method**           | GET            |
| **URL params**       | ```short``` (**optional**) If short is false or not given, all budget lines for every committee is included |
| **Data params**      | None           |
| **Success response CODE** | 200 |
| **Success response content** | JSON array of committees |
| **Notes** | Only get the budget lines when you really need it. It is quite heavy. |


### Create new committee

| Egenskap         | Värde          |
| ---------------- | -------------- |
| **URL**              | /api/committees |
| **Method**           | POST           |
| **URL params**       | None |
| **Data params**      | ```name``` the name of the committee<br> ```type``` the type of the committee (committee, project or other)<br> Example: ```{ name: 'New committee', type: 'committee' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the newly created committee |
| **Notes** |  |


### Get committee

| Egenskap         | Värde          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the committee to get |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the committee, including cost centres with budget lines |
| **Notes** |  |



### Update committee

| Egenskap         | Värde          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the committee to update |
| **Data params**      | ```name``` the name of the committee<br> ```type``` the type of the committee (committee, project or other)<br> Example: ```{ name: 'New committee', type: 'committee' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the committee, including cost centres with budget lines |
| **Notes** |  |
