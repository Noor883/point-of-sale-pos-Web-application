$(function () {
    const baseUrl = "http://test.local/";
    const items = $('#items');
    const quanitiy = $('#quantity');
    const price = $('#price');
    const addItem = $('#add-item');
    //const editT = $('#edit-item');
    //const editForm=$('eform')
    const table = $('#selling_table');
    const totalSalesElement = $('#total-sales');
    let totalSales = 0;
    let user_id= $("#id").val();
    

    $.ajax({
        type: "GET",
        url: baseUrl + 'api/transactions/get',
        success: function (response) {
            response.body.forEach((item)=>{
                table.append(`
                <tr >
                <td>${item.id}</td>
                <td>${item.item_name}</td>
                <td>${item.quantity}</td>
                <td>${item.total}</td>
                <td><button class="bi bi-trash-fill btn btn-danger"></button></td>
                <td><button id="add-transactions" class="btn btn-warning w-25">edit</button></td>
                </tr>
                `);            
            })
        }
    });



    $.ajax({ 
        type: "GET",
        url: baseUrl + "api/items",
        success: function (data) {
            data.body.forEach((item) => {
                $('#items').append(`
                <option data-id="${item.id}" value="${item.item_name}">${item.item_name}</option>
                `)
            });    
        }
    });

    $('#items').change(function(){
        item_id=$(this).children(":selected").attr('data-id');
        $.ajax({
            type: "POST",
            url: baseUrl+ 'api/item',
            data: JSON.stringify({id:item_id}),
            success: function (response) {
            $('#quantity').attr({
                'max':response.body.qty,
                'value':$('#quantity').val(),
            });

            $('#quantity').change(function(){
                quanitiy_item=$('#quantity').val(),
                $('#price').attr({
                    "value":response.body.buying_price * $('#quantity').val(),
                })
            })
            }
        });
    })

 
    let counter = 1;
    addItem.click(function (e) {
        e.preventDefault();

        let item = items.val();
        let q = quanitiy.val();
        let p = price.val();

        let data = {
            "item_name":item,
            "quantity":q,
            "user_id":user_id,
            "total":p
        }

        $.ajax({
            type: "POST",
            url: baseUrl + 'api/transactions/create',
            data:JSON.stringify(data),
            success: function (response) {
            }
        });





        if (q == "" || p == "" || item == "") {
            alert("You need to enter the item values to proceed!");
            return;
        }
        table.append(`
    <tr >
        <td>${counter}</td>
        <td>${item}</td>
        <td>${q}</td>
        <td>${q * p}</td>
        <td><button class="bi bi-trash-fill btn btn-danger"></button></td>
        //<td><button id="add-transactions" class="btn btn-warning w-25">edit</button></td>
        </tr>
    `);

    

        totalSales += q * p;
        totalSalesElement.text(totalSales);
        counter++;
        $('#userInputContainer').trigger('reset');    

    });



$(`div[data-id="${item.id}"] button`).click(function () {
                    $.ajax({
                        type: "DELETE",
                        url: baseUrl + "/api/transactionss/delete",
                        
                        data: JSON.stringify({
                            id: item.id
                        }),
                        dataType: "application/json",
                        success: function (response) {

                        }
                    });
                    $(this).parent().hide('slow', function () {
                        $(this).remove();
                    });
                });

});