<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{product.title}}</h1>
                <p>{{product.review}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductService from './ProductService.js';
    export default {
        props: ['id'],
        data() {
            return {
                product: {}
            }
        },
        created(){
            axios.get('/book/data/' + '.' + 'data' + this.$route.params.id)
            .then((response) => {
                this.product = response.data.data
            })
            .catch(error => {
                console.log('Three was a error',error.response)
            });
        }
    }
</script>

<style scoped>

</style>