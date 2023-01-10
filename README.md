# point-of-sale-pos-Web-application
final project  /build a Point of Sale (POS) web application to handle the store sales transactions and stock. There are many employees with a different role that will work on the POS. The admin of the POS system wants to see a quick information of the total sales and transactions in addition to the stock of each item
# POS point of sale with Selling dashboard  LIST API

Response schema: JSON Object {
"success": boolean,
"message_code": string,
"body": Array
}

GET /items

- Fetches all checklist items
- Request Arguments: None
- 404 will be returned if no item was found

POST /items/create

- creates new checklist items
- Request Arguments: {"item_name": string,"item.quantity:int","item.id:int","item.total:int",}
- 422 will be returned if name param was not found


GET /transaction

- Fetches all checklist transactions
- Request Arguments: None
- 404 will be returned if no transaction was found.
- 422  message_code transaction_was_not_get
 .
POST /transactions/create

- creates new checklist transaction
- Request Arguments: {"name": string}
- 422 will be returned if name param was not found

PUT /transactions/update

- updates the pos checklist item's completion status
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found
- 404 will be retruned if no item was found

DELETE /transactions/delete

- deletes checklist item
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found
