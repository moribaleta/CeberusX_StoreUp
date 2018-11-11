let host = "http://192.168.168.193/decode/moribaleta/"

var forecast_data = null

function getProducts(func_callback) {
    $.get(host + "getProducts.php", function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);
        //console.log(data)
        //return data
        //readablReports(JSON.parse(data))
        if (status == "success") {
            console.log(data)
            func_callback(data)
        }
    });
}

function addNewProduct(item, func_callback) {
    $.post(host + "addProducts.php", {
        name: item.name,
        supplier: item.supplier,
        type: item.type
    }, function (data, status) {
        console.log(data)
        console.log(status)
        if (data == 'success') {
            //func_callback()
            let data = {
                name: item.name,
                supplier: item.supplier,
                type: item.type
            }
            addNewTransaction("PRODUCTS", 
                JSON.stringify(data), func_callback)
        } else {
            alert('error')
        }
    })
}

function addNewSupplier(item, func_callback) {
    $.post(host + "addSupplier.php", {
        item
    }, function (data, status) {
        console.log(data)
        console.log(status)
        if (status == "success") {
            console.log(data)
            addNewTransaction("SUPPLIER", 
            JSON.stringify(item), func_callback)
        }
    })
}

function getHistory(func_callback) {
    $.get(host + "getAllHistory.php", function (data, status) {
        console.log(data)
        console.log(status)
        func_callback(data)
    })
}

function addNewTransaction(type, data, func_callback) {
    $.post(host + "newTransaction.php", {
        type,
        data
    }, function (data, status) {
        console.log(data)
        console.log(status)
        if (status == "success") {
            console.log(data)
            func_callback(data)
        }
    })
}


function getSupplier(saved, func_callback) {
    $.get(host + "getSuppliers.php", {
        saved
    }, function (data, status) {
        console.log(data)
        console.log(status)
        func_callback(data)
    })
}

//  adding Orders
function addNewOrder(item, func_callback) {
    $.post(host + "addOrder.php", {
        item
    }, function (data, status) {
        console.log(data)
        console.log(status)
        if (data != 'error') {
            
            addNewTransaction("ORDER", 
            JSON.stringify(item), null)

            addCart(item.product_list, data, func_callback)
        } else {
            alert('error')
        }
    })
}

function addCart(product_list, ID, func_callback) {
    $.post(host + "addCart.php", {
        product_list, ID,
    }, function (data, status) {
        console.log(data)
        console.log(status)
        if (data != 'error') {
            //func_callback()
            addNewTransaction("PRODUCT_LIST", 
            JSON.stringify({
                product_list,
                ID
            }), func_callback)
        } else {
            alert('error')
        }
    })
}



// getting Products
function getOrders(func_callback) {
    $.get(host + "NewGetOrders.php", function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);
        //console.log(data)
        //return data
        //readablReports(JSON.parse(data))
        if (status == "success") {
            console.log(data)
            func_callback(data)
        }
    });
}


function sendFeedBack(data){
    $.post(host + "sendFeedBack.php",{
        data
    }, function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);
        //console.log(data)
        //return data
        //readablReports(JSON.parse(data))
        if (status == "success") {
            console.log(data)
            func_callback()
        }
    });
}


function searchSupplier(search,func_callback){
    $.post(host+"searchSuppliers.php",{
        search
    },function(data, status){
        console.log(status)
        if (status == "success") {
            func_callback(JSON.parse(data))
        } else {
            func_callback ([])
        }
    })
}