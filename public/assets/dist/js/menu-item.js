$(document).ready(function () {
	function loadMenu() {
		$.ajax({
			type: 'GET',
			url: 'http://localhost:8000/api/menu',
			dataType: 'json',
			success: function (res) {
				res.forEach(function (product) {
					$('#menu-item').append(`
                    <div class="col-md-3 menu-item">
						<figure class="card-item card-product">
							
							<div class="img-wrap" style="height: 200px">
								<img src="/storage/${product.image}" style="width: 100%; height: 100%; object-fit: contain;">
							</div>
							<figcaption class="info-wrap">
								<h4 href="#" class="title">${product.name}</h4>
								<h5 href="#" class="title">${product.description}</h5>
								<div class="action-wrap">
								<button class="btn btn-primary btn-sm float-right js-add-to-cart" data-name="${product.name}" data-id="${product.id}" data-price="${product.price}"> <i class="fa fa-cart-plus"></i> Add </button>
								<div class="price-wrap h5">
									<span class="price-new">$${product.price}</span>
								</div> 
								</div> 
							</figcaption>
						</figure> 
					</div>

                    `);
				});
			}
		});
	}
	loadMenu();
	
});