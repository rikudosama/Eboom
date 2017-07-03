<template>
	<div class="row">
		<my-product v-for="product in products" :product="product" :authenticatedUser="authenticatedUser" @delete-product="deleteProduct(product)">
		</my-product>
	</div>
</template>
<script>
	import swal from 'sweetalert'
	import Product from './Product.vue'
	export default {
		data() {
			return {
				products: []
			}
		},
		computed: {
			authenticatedUser() {
				return this.$auth.getAuthenticatedUser()
			}
		},
		components: {
			'my-product': Product
		},
		created() {
			this.$http.get('api/products')
			.then(response => {
				console.log(response)
				this.products = response.body
			})
		},
		methods: {
			deleteProduct(product) {
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
					this.$http.delete('api/products/' + product.id)
					.then(response => {
						let index = this.products.indexOf(product)
						this.products.splice(index, 1)
						swal("Deleted", "your product has been deleted", "success")
					})
				}.bind(this)
				);
			}
		}
	}
</script>
