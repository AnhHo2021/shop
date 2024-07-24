
function cart(){
}
cart.NAME         = "cart";
cart.VERSION      = "1.2";
cart.DESCRIPTION  = "Class cart";

cart.prototype.constructor = cart;
cart.prototype = {
    init: function(){
        $('#p-cart').on('click','.minus-prduct-btn',function(){
            var amount = parseInt($(this).closest('.closest-btn-action').find('.amount-prduct').val());
            if(amount >0) {
                amount--
                $(this).closest('.closest-btn-action').find('.amount-prduct').val(amount)
                common.prototype.removeProdductInCart($(this))
                crt.amountOfMoney()
            }
        })
        /***************************************************/
        $('#p-cart').on('click','.plus-prduct-btn',function(){
            var amount = parseInt($(this).closest('.closest-btn-action').find('.amount-prduct').val());
            amount++
            $(this).closest('.closest-btn-action').find('.amount-prduct').val(amount)
            common.prototype.addtoCart($(this),true)
            crt.amountOfMoney()
        })

        /************************************************/
        $('#p-cart .btn-app-discount').unbind('click').bind('click',function(){
             var app_code = $(this).closest('.app-code').find('.discount-code').val()
            crt.checkDiscountCode(app_code)
        })

        /**********************************************/
        $('#p-cart .discount-code').keydown(function(){
            $('#p-cart .discount-valid').addClass('hidden-cls')
        });

        crt.showCart();
    },
    /*********************************************************/
    showCart:function(){
        var yourCart = localStorage.getItem('yourCart')
        if(yourCart !='' && yourCart != null && yourCart != undefined){
            var row =''
            var yourCart = JSON.parse(yourCart)
            yourCart.forEach(function(item){

            })

            $('#show-cart').html(row)
            crt.amountOfMoney()
        }
    },
    /***************************************************/
    amountOfMoney:function(loadFirst,discount,app_dicount,discount_code){
        var yourCart = localStorage.getItem('yourCart')
        if(yourCart !='' && yourCart != null && yourCart != undefined){
            var yourCart = JSON.parse(yourCart)
            //console.log(yourCart)
            var amount_of_money=0
            yourCart.forEach(function(item){
                amount_of_money += parseFloat(item.prd_price) * parseFloat(item.amount)
            })
        }
        //create table shipping fee
        //create table discount
        var discount_val =''
        var shipping_fee = 0
        var total = amount_of_money + parseFloat(shipping_fee)
        if(loadFirst =='load'){
            if(parseFloat(discount) >0 && parseFloat(app_dicount) <= amount_of_money){
                total =total - parseFloat(discount)
                discount_val = discount
                localStorage.setItem('discount_code',discount_code);
                localStorage.setItem('discount_value',discount_val);
            }
        }else{
            var discount_code = localStorage.getItem('discount_code')
            var discount_value = localStorage.getItem('discount_value')
            total =total - parseFloat(discount_value)
            discount_val = discount_value
            $('#p-cart .discount-code').val(discount_code)
        }

        discount = numeral(discount_val).format('$ 0,0')
        total = numeral(total).format('$ 0,0')
        amount_of_money = numeral(amount_of_money).format('$ 0,0')
        $('.amount-of-money').text(amount_of_money)
        $('.total-money').text(total)
        $('.discount').text(discount)
    },
    /*********************************************************/
    checkDiscountCode:function(discount_code){
        var link3 =api_link+'check_discount';
        var discount_code = $('#p-cart .discount-code').val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "async": true,
            "crossDomain": true,
            "url": link3,
            "method": "POST",
            dataType: 'json',
            data:{discount_code:discount_code},
            //contentType: 'application/json',
            success: function (res) {
                if(res.discount.length > 0){
                    var data = res.discount[0]
                    console.log(data.discount_amount)
                    crt.amountOfMoney('load',data.discount_amount,data.discount_amount,data.discount_code)
                }else{
                    $('#p-cart .discount-code').val('')
                    $('#p-cart .hidden-cls').removeClass('hidden-cls')
                }
            },
            error : function (status,res,error) { }

        });
    }
    /*********************************************************/
}
var crt = new cart();
$(function(){
    crt.init();
});