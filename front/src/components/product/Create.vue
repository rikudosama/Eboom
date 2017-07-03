<template>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control" v-model="product.name">
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="number" name="price" class="form-control" v-model="product.price">
					</div>
					<div class="form-group">
						<label for="description">description:</label>
						<textarea name="description" rows="6" class="form-control" v-model="product.description"></textarea>
					</div>
					<button @click="create" v-show="product.name && product.price && product.description" class="btn btn-success pull-right">Create</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				product: {
					name: '',
					price: 0,
					description: ''
				}
			}
		},
		methods: {
			create() {
				this.$http.post('api/products', this.product)
				    .then(response => {
				    	this.$router.push('/feed')
				    })
			}
		}
	}
</script>
