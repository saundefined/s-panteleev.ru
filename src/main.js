import Vue from 'vue';
import App from './App.vue';
import VueYandexMetrika from 'vue-yandex-metrika';

Vue.use(VueYandexMetrika, {
  id: 50044507,
});

new Vue({
  render: h => h(App),
}).$mount('#app');