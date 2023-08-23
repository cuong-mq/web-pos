$(document).ready(function () {
    var products = [];
    $(document).on('click', '.js-add-to-cart', function () {
        var productId = $(this).data("id");
        var productName = $(this).data("name");
        var productPrice = $(this).data("price");

        var existingItem = $('#cart-item-' + productId);

        if (existingItem.length > 0) {
            var $input = existingItem.find(".quantity-input");
            var oldValue = $input.val();
            var newVal = parseFloat(oldValue) + 1;
            $input.val(newVal);
            $input.trigger('change');
        } else {
            $('#menu-table-body').append(`
                <tr class="js-item-in-cart" id="cart-item-${productId}" data-product-id="${productId}">
                    <td>
                        <figure class="media">
                            <figcaption class="media-body">
                                <h6 class="title text-truncate">${productName}</h6>
                            </figcaption>
                        </figure>
                    </td>
                    <td>
                        <div class="sp-quantity d-flex">
                            <button type="button" class="m-btn btn btn-default ddd js-sp-minus"><i class="fa fa-minus"></i></button>
                            <input type="text" class="quantity-input m-btn btn form-control border-primary w-ip-total" value="1" data-id="${productId}" data-price="${productPrice}">
                            <button type="button" class="m-btn btn btn-default ddd js-sp-plus"><i class="fa fa-plus"></i></button>
                        </div>
                    </td>
                    <td>
                        <div class="price-wrap">
                            <var class="price" id="price_${productId}"> ${productPrice}</var>
                        </div>
                    </td>
                    <td class="text-right">
                        <a  class="btn btn-outline-danger"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            `);
            products.push({
                id: productId,
                quantity: 1
            });
            let price = productPrice;
            $('#price_' + productId).text(price);

            updateTotalPrice();
        }
    });

    $(document).on('click', '.js-sp-minus, .js-sp-plus', function () {
        let inputElement = $(this).closest('.sp-quantity').find("input.quantity-input");
        let oldVal = parseFloat(inputElement.val());
        let newVal = oldVal;
        if ($(this).hasClass("js-sp-minus")) {
            if (oldVal > 0) {
                newVal = oldVal - 1;
            }
        }
        if ($(this).hasClass("js-sp-plus")) {
            newVal = oldVal + 1;
        }
        inputElement.val(newVal);
        inputElement.trigger("change");
    });

    $(document).on('change', '.sp-quantity .quantity-input', function () {
        let productId = $(this).data('id');
        let price = $(this).val() * $(this).data('price')
        $('#price_' + productId).text(price);

        updateTotalPrice();
    })

    $(document).on('click', '.btn-outline-danger', function () {
        var $item = $(this).closest('tr');
        var price = parseFloat($item.find('.price').text());
        $item.remove();

        updateTotalPrice();
    });

    $(document).on('click', '#cancel-btn', function () {
        $(".js-item-in-cart").remove();

        updateTotalPrice();
    });
    function updateTotalPrice() {
        var amount = 0;
        $(".js-item-in-cart .price").each(function () {
            amount += parseFloat($(this).text());
        });
        $('.total-price').text('$' + amount);
        // $('#total-amount-hidden').val(amount);
    }

    $(document).on('submit', '#add-order-form', (function (event) {
        event.preventDefault();
        var customerName = $('#customer-name-input').val();
        var totalAmount = parseFloat($('.total-price').text().replace('$', ''));
        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().substr(0, 10);
        products = products.map(function (product) {
            var productId = product.id;
            var quantityInput = $('#cart-item-' + productId).find('.quantity-input');
            var quantityValue = parseFloat(quantityInput.val());

            return {
                id: productId,
                quantity: quantityValue
            };
        });
        var order = {
            customer_name: customerName,
            total_price: totalAmount,
            order_date: formattedDate,
            products: products
        };
        // console.log(order);
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/api/order/store',
            data: order,
            dataType: 'json',
            success: function (response) {
                resetOrderForm();
            },
        });
    })
    );

    function resetOrderForm() {
        $('#customer-name-input').val('');
        products = [];
        $('.js-item-in-cart').remove();
        updateTotalPrice();
    }


});