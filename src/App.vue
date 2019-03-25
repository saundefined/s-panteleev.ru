<template>
    <div id="app">
        <Hello/>
        <About/>
        <Skills/>
        <WorkExperience/>
        <Education/>
        <Links/>
    </div>
</template>

<script>
  import Hello from './components/Hello';
  import About from './components/About';
  import WorkExperience from './components/WorkExperience';
  import Skills from './components/Skills';
  import Education from './components/Education';
  import Links from './components/Links';

  export default {
    name: 'app',
    components: {
      Links,
      Education,
      Skills,
      WorkExperience,
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