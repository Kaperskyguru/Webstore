$(document).ready(function () {
    cat();
    brand();
    product();
        
    function cat() {
        $.ajax({
        url: "action.php",
            method: "POST",
            data: { category: 1 },
            success: function (data) {
                $("#get_category").html(data);
            }
        })
    }

    function brand() {
        $.ajax({
        url: "action.php",
            method: "POST",
            data: { brand: 1 },
            success: function (data) {
                $("#get_brand").html(data);
            }
        })
    }

    function product() {
        $.ajax({
        url: "action.php",
            method: "POST",
            data: { product: 1 },
            success: function (data) {
                $("#get_product").html(data);
                page("product,key");
            }
        })
    }

    
    var cid;
    $("body").delegate(".category", "click", function (event) {
        event.preventDefault();
            cid = $(this).attr('cid');
            $.ajax({
            url: "action.php",
                method: "POST",
                data: { get_selected_category: 1, cid },
                success: function (data) {
                    $("#get_product").html(data);
                    page("cat," + cid);
                }
            })
    })
    
    var bid;
    $("body").delegate(".brand", "click", function (event) {
        event.preventDefault();
            bid = $(this).attr('bid');
            $.ajax({
            url: "action.php",
                method: "POST",
                data: { get_selected_brand: 1, bid },
                success: function (data) {
                    $("#get_product").html(data);
                    page("brand," + bid);
                }
            })
    })

    $("body").delegate("#search_btn", "click", function (event) {
        event.preventDefault();
        var keyword = $("#search").val();
        if (keyword != "") {
            $.ajax({
            url: "action.php",
                method: "POST",
                data: { search: 1, keyword },
                success: function (data) {
                $("#get_product").html(data);
                        page("search," + keyword);
                }
            })
        }
    })

    $("#submit").click(function (event) {
        event.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            url: "actionpage.php",
            method: "POST",
            data: { username, password },
            success: function (data) {
                if (data == "true") {
                    window.location.href = "profile.php";
                }else {
                    if (data == "Incorrect username/password combination!") {
                        alert(data);
                    }
                }
            }
        })
    })
    
        
    $("#checkout").click(function (event){
    event.preventDefault();
    var total_amt = $(total_amt).val();
    alert("True");
    $.ajax({
         url: "action.php",
         method: "POST",
         data: {total_amt:total_amt},
         success: function (data, textStatus, jqXHR) {
             if(data === "true"){
                        alert("True");
             }else{
                        alert("False");
             }
         }
    })
})
    
    $("#register").click(function (event) {
        //event.preventDefault();
        var name = $("#name").val();
        var username = $("#username").val();
        var password = $("#pass").val();
        var email = $("#email").val();
        var address = $("#address").val();
        $.ajax({
            url: "register.php",
            method: "POST",
            data: { name, username,password,email,address },
            success: function (data) {
                if (data == "true") {
                    window.location.href = "profile.php";
                }else {
                    if (data == "Incorrect username/password combination!") {
                        alert(data);
                    }
                }
            }
        })
    })

    $("#update").click(function (event) {
        event.preventDefault();
        var oldpassword = $("#oldpsw").val();
        var newpassword = $("#newpsw").val();
        var confirmpsw = $("#confpsw").val();
        $.ajax({
            url: "actionpage.php",
            method: "POST",
            data: { oldpassword, newpassword, confirmpsw },
            success: function (data) {
                $("#error").html(data);
                }
        })
    })

    cart_count();
    $("body").delegate("#product", "click", function (event) {
        event.preventDefault();
        var p_id = $(this).attr('pid');
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { addProduct: 1, p_id },
            success: function (data) {
            $("#product_msg").html(data);
                cart_count();
                cart_checkout();
                login();
            }
        })
    })

    function login() {
    $.ajax({
    url: "actionpage.php",
        method: "POST",
        data: { loginaction: 1 },
        success: function (data) {
                if (data == "Please Log in to add products to cart") {
                    alert(data);
                } else if (data == NULL) {

                }
            }
        })
    }

    cart_container();
    function cart_container() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { get_cart_product: 1 },
            success: function (data) {
                $("#cart_product").html(data);
            }
        })
    }
    


    function cart_count() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { cart_count: 1 },
            success: function (data) {
                $(".badge").html(data);
            }
        })
    }

    $("#cart_container").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { get_cart_product: 1 },
            success: function (data) {
                $("#cart_product").html(data);
            }
        })
    })

    cart_checkout();
    function cart_checkout() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { cart_checkout: 1 },
            success: function (data) {
                $("#cart_checkout").html(data);
            }
        })
    }

    $("body").delegate(".qty", "keyup", function () {
        var pid = $(this).attr("pid");
        var qty = $("#qty-" + pid).val();
        var price = $("#price-" + pid).val();
        var total = qty * price;
        $("#total-" + pid).val(total);
    })

    $("body").delegate(".remove", "click", function (event) {
        event.preventDefault;
        var pid = $(this).attr("remove_id");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { removeFromCart: 1, pid },
            success: function (data) {
                $("#cart_msg").html(data);
                    cart_checkout();
                    cart_count();
                }
        })
    })

    $("body").delegate(".update", "click", function (event) {
        event.preventDefault;
        var pid = $(this).attr("update_id");
        var qty = $("#qty-" + pid).val();
        var price = $("#price-" + pid).val();
        var total = $("#total-" + pid).val();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { updateProduct: 1, pid, qty, price, total },
            success: function (data) {
            $("#cart_msg").html(data);
                    cart_checkout();
            }
        })
    })
        //var key;
    function page(key) {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { page: 1, key },
            success: function (data) {
                $("#pageno").html(data);
            }
        })
    }

    $("body").delegate("#searchy", "click", function () {
        var pn = $(this).attr("searchy");
        var keyword = $("#search").val();
        nextClick(keyword, pn);
    })

    $("body").delegate("#cat", "click", function () {
        var pn = $(this).attr("cat");
        nextClick("cat", pn, cid);
    })

    $("body").delegate("#brand", "click", function () {
        var pn = $(this).attr("brand");
        //var keyword = $("#search").val();
        nextClick("brand", pn, bid);
    })


    $("body").delegate("#page", "click", function () {
        var pn = $(this).attr("page");
        nextClick("product", pn);
    })

    function nextClick(key, p, id) {
        pn = p + "," + key + "," + id
        $.ajax({
        url: "action.php",
            method: "POST",
            data: { product: 1, setPage: 1, pn },
            success: function (data) {
            $("#get_product").html(data);
            }
        })
    }
    var pid
    var uid
    $('#submitReview').click(function (){
        var comment = $("#comment").val();
        pid = $(#comment).attr('pid');
        uid = $(#comment).attr('uid');
        alert(pid + comment+ uid);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{
                comment:comment,userID:uid
            },
            success: function (data, textStatus, jqXHR) {
                alert("Review Success");
                window.location.href = "ProductPage.php?id="+pid;
            }
        })
    })
    
    
        var trackID;
    $("body").delegate("#view", "click", function (event) {
        event.preventDefault();
        trackID = $(this).attr('trackID');
        alert(trackID);
        $.ajax({
            url: 'action.php',
            method: "POST",
            data: {trackingID:1, trackID},
            success: function (data) {

            }
        })

    })
        
    
    
})
