<template>
  <div class="container">
    <h3 class="header-edit text-center">Available Books Online</h3>
    <div class="row course-set courses__row">
        <ProductCard v-for="product in products.data" :key="product.id" :product="product"/>
    </div>
  </div>
</template>

<script>
    import ProductCard from './ProductCard.vue';
    import ProductService from './ProductService.js';

    export default {
        data() {
            return {
                products: []
            }
        },
        components: {
            ProductCard
        },
        created() {
            axios.get('/book/data')
                .then((response) => {
                    this.products = response.data
                })
        }
    }
</script>

<style scoped>

</style>