<template>
    <div class="hello">
        <div class="hello__title">
            <span class="hello__me">I am</span>
            <vue-typer
                    :pre-erase-delay='1000'
                    :text="roles"
                    :type-delay='50'
                    erase-style='clear'
            ></vue-typer>
        </div>
    </div>
</template>

<script>
  import {VueTyper} from 'vue-typer';

  export default {
    name: 'About',
    data() {
      return {
        roles: [
          'Sergey Panteleev',
          'a PHP-Developer',
          'a Web-Developer',
        ],
      };
    },
    components: {
      'vue-typer': VueTyper,
    },
  };
</script>