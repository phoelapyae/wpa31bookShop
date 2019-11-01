<template>
    <div class="container">
        <section id="blog" class="py-3">
            <div class="container">
                <article class="col-md-12 course-block course-block-lessons mb-3">
                    <div class="card-deck">
                        <div class="card">
                            <div class="row">
                                <div class="col-6">
                                    <img style="width: 100%; height: 350px;" :src="'storage/' + product.filename" class="card-img-top">
                                </div>
                                <div class="col-6">
                                    <div class="card-body">
                                        <h5 class="card-title text-center logo-font">
                                            {{limitTitle(product)}}
                                        </h5>
                                        <p class="products-item">Author - {{product.author}}</p>
                                        <p class="products-item">Category - {{product.category}}</p>
                                        <p class="products-item">Publisher - {{product.publisher}}</p>
                                        <p class="products-item">Price - {{product.price}} MMK</p>
                                        <p class="products-item">Pages - {{product.page}} pages</p>
                                        <a href="/frontend/order" class="btn btn-primary btn-block">Order Now!</a>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </article>
            </div> 
        </section>
    </div>
</template>

<script>
    export default {
        props: {
            product: Object
        },
        methods: {
            limitReview(post) {
                let body = this.stripTags(post.review);

                return body.length > 60 ? body.substring(0, 60) + '...' : body;
            },

            limitTitle(tit) {
                let topic = this.stripTags(tit.title);
                return topic.length > 20 ? topic.substring(0, 20) + '...' : topic;
            },

            stripTags(text) {
                return text.replace(/(<([^>]+)>)/ig, '');
            }
        }
    }
</script>

<style scoped>
    .router-class {
        text-decoration: none;
    }
</style>