<template>
    <div id="app">
        <Hello/>
        <About/>
    </div>
</template>

<script>
  import Hello from './components/Hello';
  import About from './components/About';

  export default {
    name: 'app',
    components: {
      About,
      Hello,
    },
  };
</script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:700');
    @import url('https://fonts.googleapis.com/css?family=Open Sans:300,400,700');
    @import '../node_modules/bulma/css/bulma.min.css';
    @import 'css/app.css';
</style>