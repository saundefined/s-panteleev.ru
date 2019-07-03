import Vue from 'vue';
import VueI18n from 'vue-i18n';
import App from './App.vue';

Vue.use(VueI18n);

let locale = window.location.hash.replace('#', '');
if (!locale) {
  locale = 'en';
}

const i18n = new VueI18n({
  locale: locale,
  messages: {
    en: {
      title: 'Panteleev Sergey – PHP-Developer',
      hello: {
        hi: 'Hi, my name is',
        name: 'Sergey Panteleev',
        iam: 'I am',
        cv: 'Download CV',
        cv_link: '/files/Panteleev_Sergey_PHP_En.pdf',
        roles: [
          'PHP-Developer',
          'Front-end developer',
          'novice Maintainer of Russian PHP documentation',
        ],
      },
      about: {
        title: 'I am a Web-developer',
        line1: 'Hi, I\'m a self-taught programmer and I write in PHP for more than five years.',
        line2: 'The most projects on current work based on Bitrix CMS, but on pet projects I prefer Laravel or Slim Framework.',
        line3: 'I can understand the unfamiliar code and I don\'t suggest to rewrite all project from the start, but if it\'s really necessary – can do it.',
        line4: 'Also, I write in React (JS, Native, Redux), Vue.js and now I study Swift.',
        hire: 'Hire me',
      },
      skills: {
        title: 'Skills and abilities',
        hackerrank: 'Sometimes I solve problems on',
        toster: 'and to answer the questions on',
        toster_name: 'Toster',
        stackoverflow: '(someday I\'ll do it on StackOverflow)',
        medium: 'Also I write articles on Medium – ',
      },
      work: {
        title: 'Work experience',
        prominado_development: 'Development from scratch: from corporate sites to complex CRM systems.',
        prominado_api: 'API design and development (Slim Framework).',
        prominado_mobile: 'Development of mobile applications on React Native.',
        prominado_blog: 'Writing articles in a corporate blog.',
        prominado_duration: 'Duration 5 years (2013 – until now)',
        prominado_position: 'Web-developer',
        prominado: 'Prominado',
        cetera_development: 'Small tasks on the frontend and programming of existing projects.',
        cetera_duration: 'Duration 1 year (2010 – 2011)',
        cetera_position: 'Junior',
        cetera: 'Cetera Labs',
        website: 'Company website',
        github: 'Corporate GitHub',
        responsibility: 'Responsibility',
      },
      edu: {
        title: 'Education and Hobbies',
        languages: 'In plans in 2019, I would like to get TOEFL- and TestDAF-certificates.',
        skillset: 'And I always try to improve my skill-set.',
        running: 'In free time I like running, in 2019 I would like to run over 2019 km (while I carry out this plan) and in 2020th – BMW Berlin Marathon.',
      },
      links: {
        title: 'Links',
        vk: 'Vkontakte',
        fb: 'Facebook',
        tw: 'Twitter',
        ig: 'Instagram',
        gh: 'GitHub',
        moikrug: 'Moikrug',
        toster: 'Toster',
        hr: 'HackerRank',
      },
    },
    ru: {
      title: 'Пантелеев Сергей – Разработчик PHP',
      hello: {
        hi: 'Привет, меня зовут',
        name: 'Пантелеев Сергей',
        iam: 'Я',
        cv: 'Скачать резюме',
        cv_link: '/files/Panteleev_Sergey_PHP.pdf',
        roles: [
          'разработчик PHP',
          'front-end разработчик',
          'начинающий мейнтейнер русской документации PHP',
        ],
      },
      about: {
        title: 'Web-разработчик',
        line1: 'Привет, я программист-самоучка и пишу на PHP более пяти лет.',
        line2: 'Большинство проектов на текущей работе разработаны на системе 1С-Битрикс, в собственных проектах я предпочитаю использовать Laravel или Slim Framework.',
        line3: 'Я умею понимать чужой код и не предлагаю переписать весь проект с нуля, но если это действительно необходимо – смогу это сделать.',
        line4: 'Также, пишу на React (JS, Native, Redux), Vue.js и в свободное время изучаю Swift.',
        hire: 'Пригласить на собеседование',
      },
      skills: {
        title: 'Профессиональные навыки',
        hackerrank: 'Иногда решаю задачи на',
        toster: 'и отвечаю на вопросы на',
        toster_name: 'Тостере',
        stackoverflow: '(когда-нибудь перейду на StackOverflow)',
        medium: 'Также пишу статьи на Medium – ',
      },
      work: {
        title: 'Опыт работы',
        prominado_development: 'Верстка и разработка проектов с нуля: от корпоративных сайтов до CRM-систем (1С-Битрикс).',
        prominado_api: 'Проектирование и разработка API (Slim Framework).',
        prominado_mobile: 'Разработка мобильных приложений (React Native, Redux).',
        prominado_blog: 'Написание статей в корпоративный блог. ',
        prominado_duration: 'Продолжительность 5 лет (2013 – настоящее время)',
        prominado_position: 'Web-developer',
        prominado: 'Prominado',
        cetera_development: 'Простые задачи по поддержке существующих проектов (1С-Битрикс, Cetera CMS).',
        cetera_duration: 'Продолжительность 1 год (2010 – 2011)',
        cetera_position: 'Junior',
        cetera: 'Cetera Labs',
        website: 'Сайт компании',
        github: 'Корпоративный GitHub',
        responsibility: 'Обязанности',
      },
      edu: {
        title: 'Образование и хобби',
        languages: 'В 2019 году собираюсь получить TOEFL- и TestDAF-сертификаты.',
        skillset: 'Всегда стараюсь улучшать свои навыки.',
        running: 'В свободное время люблю бегать, в 2019 году я собираюсь пробежать 2019 километров, а в 2020-м — BMW Berlin Marathon. ',
      },
      links: {
        title: 'Ссылки',
        vk: 'ВКонтакте',
        fb: 'Facebook',
        tw: 'Twitter',
        ig: 'Instagram',
        gh: 'GitHub',
        moikrug: 'Мой Круг',
        toster: 'Тостер',
        hr: 'HackerRank',
      },
    },
  },
});
document.title = i18n.i('title');

new Vue({
  i18n,
  render: h => h(App),
}).$mount('#app');

window.addEventListener('hashchange', setLocale, false);

function setLocale() {
  let locale = 'en';
  if (window.location.hash.replace('#', '')) {
    locale = window.location.hash.replace('#', '');
  }

  i18n.locale = locale;
  document.title = i18n.i('title');
}
