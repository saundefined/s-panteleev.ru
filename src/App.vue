<template>
    <div id="app">
        <About/>
    </div>
</template>

<script>
  import About from './components/About.vue';

  export default {
    name: 'app',
    components: {
      About,
    },
  };
</script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,700');
    @import 'css/app.css';
</style>