<template>
	<div>
		<div class="col-md-4">
			<div class="thumbnail">
				<img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Hermes-product-image.png" alt="">
				<div class="caption">
					{{ product.user_id }}
					<h3>{{ product.name }}</h3>
					<p>{{ product.price }}</p>
					<hr>
					<p>
						<a href="#" class="btn btn-default">
							Wish list
						</a>
						<a href="#" class="btn btn-success">
							Buy
						</a>
					</p>
					<p v-if="product.user_id == authenticatedUser.id">
						<a href="#" @click="deleteProduct" class="btn btn-danger" role="button">
							Delete
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import swal from 'sweetalert'
	export default {
		props: ['product', 'authenticatedUser'],
		methods: {
			deleteProduct() {
				swal({
					title: "Are you sure ?",
					text: "you will not be able to recover this product !",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "yes, delete it !",
					closeOnConfirm: false
				},

				function() {
					this.$http.delete('api/products/' + this.product.id)
					    .then(response => {
					    	console.log(response)
					    	swal("Deleted", "your product has been deleted", "success")
					    })
				}.bind(this)
				);
			}
		}
	}
</script>
