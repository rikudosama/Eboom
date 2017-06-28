<template>
	<div>
		<h1>Feed</h1>
		<ul>
			<li v-for="product in products">
				{{ product.name }} | {{ product.price }}
			</li>
		</ul>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				products: []
			}
		},
		created() {
			this.$http.get('api/products')
			     .then(response => {
			     	this.products = response.body
			     })
		}
	}
</script>