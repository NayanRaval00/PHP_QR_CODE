//item filter category wise.

function category_click(id) {

    var cat_dish = jQuery('#cat_dish').val();
    var check = cat_dish.search(":" + id);
    if (check != '-1') {
        cat_dish = cat_dish.replace(":" + id, '');
    } else {
        cat_dish = cat_dish + ":" + id;
    }
    jQuery('#cat_dish').val(cat_dish);
    jQuery('#frmCatDish')[0].submit();
}
//item filter food type wise
function food_type(type) {
    // alert(id);
    var food_type = jQuery('#type').val(type);
    // alert(id)
    jQuery('#frmCatDish')[0].submit();   
}
//add to cart
function add_cart(id,type) {
    const qty = jQuery('#qty' + id).val();
    const attr = jQuery('input[name="radio_' + id + '"]:checked').val();
    var is_attr_checked = '';
    
    if (typeof attr === 'undefined') {
        //alert('yes');
        is_attr_checked = 'no';
    }
    if (qty > 0 && is_attr_checked != 'no') {
    
        jQuery.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: 'qty=' + qty + '&attr=' + attr + '&type=' + type,
            success: function (result) {
                // var data = jQuery.parseJSON(result);
                alert("Item Added SuccesFully");
                // jQuery('#shop_add_msg_' + attr).html('(ADDED -' + qty + ')');
                // jQuery('#totcartdish').html(data.totcartdish);
                // jQuery('#totalprice').html(data.totalprice + "&#8377;");
               window.location.href = 'shop.php';
            }
        });
    } else {
        alert("PLESE SELECT QUENTITY AND DISH ITEM");
    } 
}
function clear_me(){
    window.location.href='shop.php';
}
function del_item(id){
    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'attr='+ id + '&type=delete',
        success:function (result) {
            alert('item delete');
            window.location.href=window.location.href;
        }
    });
}