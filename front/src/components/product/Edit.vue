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
          <button @click="update" v-show="product.name && product.price && product.description" class="btn btn-success pull-right">Update</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import swal from 'sweetalert'
  export default {
    created() {
      this.getProduct()
    },
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
      getProduct() {
        this.$http.get('api/products/' + this.$route.params.product)
             .then(response => {
              this.product =  response.body
             })
      },
      update() {
        this.$http.put('api/products/' + this.$route.params.product, this.product)
            .then(response => {
              swal("Updated", "Your product has been updated", "success")
            })
      }
    }
  }
</script>
