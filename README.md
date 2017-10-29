# Budgetsystemet
PHP Laravel application that handles the budget of Datasektionen. Live at [budget.datasektionen.se](https://budget.datasektionen.se).

**API documentation** can be found in [API_DOC.md](API_DOC.md).

The frontend is written through Blade as a templating language in Laravel, using Vue.js in certain views.

All numbers representing money is stored as the smallest unit in the current currency (*ören* in SEK). Thereby, many numbers have to be either divided or multiplicated with 100 to get *kr* in SEK.

## Entities

There are three elementary entities in the system. Committees, cost centres and budget lines. Accounts are also used to link the budget to the accounting.

### Committees

A *committee* is a project (Projekt), committee (Nämnd) or other (Annat). They are the main budget divisions. A committee contains *cost centres*, and the total sum of a committee is the sum of its cost centres (which is a sum of the cost centres' budget lines).

### Cost centres

A cost centre is called *resultatställe* in Swedish. A cost centre is part of a committee. For example, a cost centre can be an event or a part of a committee's activity. A cost centre contains *budget lines*, and the total sum of a cost centre is the sum of its budget lines.

### Budget lines

A budget line is the smallest part of a budget, belonging to a cost centre. It consists of an income and expenses and a name. If a budget line named *Food* has an income of *100000* and an expense of *200000*, it means that someone predicts to spend 2 000 kr on food and earn 1 000 kr.

Budget lines are valid between two dates, ```valid_from``` and ``valid_to```.