<template>
    <div>
       <SliderComponent></SliderComponent>
       <ServiceComponent></ServiceComponent>
       <AboutComponent></AboutComponent>
       <CountupComponent></CountupComponent>
    </div>
</template>

<script>
    import SliderComponent from './SliderComponent.vue';
    import ServiceComponent from './ServiceComponent.vue';
    import AboutComponent from './AboutComponent.vue';
    import CountupComponent from './CountupComponent.vue';

    export default {
        components: {
            SliderComponent,
            ServiceComponent,
            AboutComponent,
            CountupComponent
        }
    }
</script>
<style scoped>

</style>