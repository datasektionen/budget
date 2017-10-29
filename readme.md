# Budgetsystemet
PHP Laravel application that handles the budget of Datasektionen. Live at https://budget.datasektionen.se.

## API
The API is located at ```/api``` (https://bokning.datasektionen.se/api).

All API endpoints returns the response formatted as JSON if successful. If the request is invalid, the response is unspecified. Read the HTTP status code, all successful responses will have code 200, and every non-successful response will not.

### List all committees

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees |
| **Method**           | GET            |
| **URL params**       | ```short``` (**optional**) If short is false or not given, all budget lines for every committee is included |
| **Data params**      | None           |
| **Success response CODE** | 200 |
| **Success response content** | JSON array of committees |
| **Notes** | Only get the budget lines when you really need it. It is quite heavy. |


### Create new committee

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees |
| **Method**           | POST           |
| **URL params**       | None |
| **Data params**      | ```name``` the name of the committee<br> ```type``` the type of the committee (committee, project or other)<br> Example: ```{ name: 'New committee', type: 'committee' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the newly created committee |
| **Notes** |  |


### Get committee

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the committee to get |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the committee, including cost centres with budget lines |
| **Notes** |  |



### Update committee

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the committee to update |
| **Data params**      | ```name``` the name of the committee<br> ```type``` the type of the committee (committee, project or other)<br> Example: ```{ name: 'New committee', type: 'committee' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the committee |
| **Notes** |  |



### Delete committee

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id |
| **Method**           | DELETE           |
| **URL params**       | ```:id``` the id of the committee to delete |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the deleted committee |
| **Notes** |  |



### Get cost centres for committee

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id/cost-centres |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the committee to get cost centres for |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the cost centres |
| **Notes** |  |



### Create cost centre for committee

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/committees/:id/cost-centres |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the committee to add cost centre to |
| **Data params**      | ```name``` the name of the cost centre<br> ```speedledger_id``` the Speedledger identification for the cost centre<br> Example: ```{ name: 'Ettans fest', speedledger_id: 'MEtFe' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the cost centre and the committee. Example: ```{ "cost_centre": { "id" : 1, "name": "Ettans fest", "speedledger_id": "MEtFe", "committee_id": 1 ... }, "committee": {"id": 1, name": "Mottagningen" ...} }``` |
| **Notes** |  |



### Get cost centre

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/cost-centres/:id |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the cost centre to get |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the cost centre. |
| **Notes** |  |



### Update cost centre

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/cost-centres/:id |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the cost centre to update |
| **Data params**      | ```name``` the new name of the cost centre<br> ```speedledger_id``` the new Speedledger identification for the cost centre<br>
If any is left blank the field won't be updated<br> Example: ```{ name: 'Ettans fest', speedledger_id: 'MEtFe' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the cost centre. |
| **Notes** |  |




### Delete cost centre

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/cost-centres/:id |
| **Method**           | DELETE           |
| **URL params**       | ```:id``` the id of the cost centre to delete |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the deleted cost centre. |
| **Notes** |  |



### Get budget lines for cost centre

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/cost-centres/:id/budget-lines |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the cost centre to list budget liens for |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the budget lines |
| **Notes** |  |
