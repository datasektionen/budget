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
| **Data params**      | ```name``` the new name of the cost centre<br> ```speedledger_id``` the new Speedledger identification for the cost centre<br> If any is left blank the field won't be updated<br> Example: ```{ name: 'Ettans fest', speedledger_id: 'MEtFe' }``` |
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
| **URL params**       | ```:id``` the id of the cost centre to list budget lines for |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the budget lines |
| **Notes** |  |



### Add budget line to cost centre

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/cost-centres/:id/budget-lines |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the cost centre to add budget line to |
| **Data params**      | ```name``` the new name of the budget line<br> ```income``` the income value for the budget line (in smallest unit of currency)<br> ```expenses``` the expenses value for the budget line (in smallest unit of currency)<br> ```type``` the type the budget line (external or **internal**)<br> ```valid_from``` the start date of the validity of budget line (YYYY-MM-DD HH:II:SS)<br> ```valid_to``` the end date of the validity of budget line (YYYY-MM-DD HH:II:SS)<br> Example: ```{ 'name': 'Mat', 'income': '100000', 'expenses': '200000', 'type': 'external', 'valid_from': '2017-08-16 00:00:00', 'valid_to': '2017-12-31 23:59:59' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the budget line and the committee. Example: ```{ "budget_line": { "id" : 1, "name": "Mat", "income": "100000", ... }, "committee": {"id": 1, name": "Mottagningen" ...} }``` |
| **Notes** |  |




### Get budget line

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/budget-line/:id |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the budget line to get |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the budget line. |
| **Notes** |  |



### Update budget line

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/budget-line/:id |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the budget line to update |
| **Data params**      | ```name``` the new name of the budget line<br> ```income``` the income value for the budget line (in smallest unit of currency)<br> ```expenses``` the expenses value for the budget line (in smallest unit of currency)<br> ```type``` the type the budget line (external or **internal**)<br> ```valid_from``` the start date of the validity of budget line (YYYY-MM-DD HH:II:SS)<br> ```valid_to``` the end date of the validity of budget line (YYYY-MM-DD HH:II:SS)<br> If any is left blank the field won't be updated<br> Example: ```{ 'name': 'Mat', 'income': '100000', 'expenses': '200000', 'type': 'external', 'valid_from': '2017-08-16 00:00:00', 'valid_to': '2017-12-31 23:59:59' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the committee belonging to the budget line. |
| **Notes** |  |



### Add account to budget line

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/budget-line/:id/accounts/:aid |
| **Method**           | POST           |
| **URL params**       | ```:id``` the id of the budget line to update<br> ```:aid``` the id of the account (***NOTE:** this is not the account number!*) |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the budget line. |
| **Notes** |  |



### List all accounts

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/accounts |
| **Method**           | GET           |
| **URL params**       | None |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with all accounts. |
| **Notes** |  |



### Add account

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/accounts |
| **Method**           | POST           |
| **URL params**       | None |
| **Data params**      | ```name``` the new name of the account<br> ```description``` a description of what the account is used for<br> ```number``` the account number<br> Example: ```{ 'name': 'Försäljning biljett, alkohol', 'description': 'All försäljning av biljett till event som inkluderar alkohol', 'number': '3042' }``` |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the newly created account. |
| **Notes** |  |



### Get account

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/accounts/:id |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the account to show |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the account. |
| **Notes** |  |



### Get account by account number

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/accounts/number/:number |
| **Method**           | GET           |
| **URL params**       | ```:number``` the number of the account to show, for example 3042 for "Försäljning biljett, alkohol" |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the account. |
| **Notes** |  |



### Get budget suggestion

| Property         | Value          |
| ---------------- | -------------- |
| **URL**              | /api/suggestions/:id |
| **Method**           | GET           |
| **URL params**       | ```:id``` the id of the suggestion to show |
| **Data params**      | None |
| **Success response CODE** | 200 |
| **Success response content** | JSON object with the suggestion. |
| **Notes** |  |