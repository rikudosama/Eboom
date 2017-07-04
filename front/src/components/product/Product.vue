<template>
	<div>
		<div class="col-md-4">
			<div class="thumbnail">
				<img :src="'http://localhost:8000/' + product.image">
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
						<a href="#" class="btn btn-danger" role="button" @click="$emit('delete-product')">
							Delete
						</a>
						<router-link :to="'/products/' + product.id + '/edit'" class="btn btn-primary">
							Edit
						</router-link>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		props: ['product', 'authenticatedUser'],
	}
</script>
