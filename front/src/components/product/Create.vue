<template>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<form @submit.prevent="create">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="name" v-validate="'required'" class="form-control" v-model="product.name">
							<div class="help-block alert alert-danger"
							v-show="errors.has('name')">
							{{ errors.first('name') }}
						</div>
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="number" name="price" class="form-control" v-model="product.price" v-validate="'max_value:50|min_value:1'">
						<div class="help-block alert alert-danger"
						v-show="errors.has('price')">
						{{ errors.first('price') }}
					</div>
				</div>
				<div class="form-group">
					<label for="description">description:</label>
					<textarea name="description" rows="6" class="form-control" v-model="product.description" v-validate="'required'"></textarea>
					<div class="help-block alert alert-danger"
					v-show="errors.has('description')">
					{{ errors.first('description') }}
				</div>
			</div>
			<input type="submit" class="btn btn-success pull-right" value="Create">
		</form>
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
				this.$validator.updateDictionary({
					'fr': {
						attributes: {
							name: 'nom'
						}
					}
				})
				this.$validator.setLocale('fr')
				this.$validator.validateAll().then(() => {
					this.$http.post('api/products', this.product)
					.then(response => {
						this.$router.push('/feed')
					})
				})
			}
		}
	}
</script>
