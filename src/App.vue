<template>
    <div id="app">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <h1 class="is-size-2 has-text-centered">
                        Panteleev Sergey
                    </h1>
                    <h2 class="is-size-4 has-text-centered position">
                        PHP-Developer
                    </h2>

                    <div class="has-text-centered email">
                        <a class="button is-medium is-white has-background-white has-text-grey-dark"
                           href="mailto:sergey@php.net"
                           onclick="ym(50044507, 'reachGoal', 'hire_me'); return true;">
                            <span class="icon">
                                <i class="far fa-envelope-open"></i>
                            </span>
                            <span class="is-size-5">sergey@php.net</span>
                        </a>
                    </div>

                    <div class="has-text-centered cv">
                        <span class="button is-medium is-white has-background-white">Download CV</span>

                        <a class="button is-medium is-rounded is-light cv__link"
                           href="/files/Panteleev_Sergey_PHP.pdf"
                           onclick="ym(50044507, 'reachGoal', 'download_cv'); return true;"
                           target="_blank"
                        >
                            <span class="icon">
                                <i class="flag-icon flag-icon-ru"></i>
                            </span>
                        </a>

                        <a class="button is-medium is-rounded is-light"
                           href="/files/Panteleev_Sergey_PHP_En.pdf"
                           onclick="ym(50044507, 'reachGoal', 'download_cv'); return true;"
                           target="_blank"
                        >
                            <span class="icon">
                                <i class="flag-icon flag-icon-gb"></i>
                            </span>
                        </a>
                    </div>

                    <div class="has-text-centered">
                        <a class="fa-stack fa-lg" href="https://github.com/saundefined"
                           onclick="ym(50044507, 'reachGoal', 'github'); return true;"
                           rel="noreferrer nofollow" target="_blank">
                            <i class="fas fa-circle fa-stack-2x has-text-dark"></i>
                            <i class="fab fa-github-alt fa-stack-1x has-text-white"></i>
                        </a>

                        <a class="fa-stack fa-lg" href="https://blog.s-panteleev.ru"
                           onclick="ym(50044507, 'reachGoal', 'medium'); return true;"
                           rel="noreferrer nofollow" target="_blank">
                            <i class="fas fa-circle fa-stack-2x has-text-dark"></i>
                            <i class="fas fa-feather-alt fa-stack-1x has-text-white"></i>
                        </a>

                        <a class="fa-stack fa-lg" href="https://www.linkedin.com/in/saundefined/"
                           onclick="ym(50044507, 'reachGoal', 'linkedin'); return true;"
                           rel="noreferrer nofollow" target="_blank">
                            <i class="fas fa-circle fa-stack-2x has-text-dark"></i>
                            <i class="fab fa-linkedin-in fa-stack-1x has-text-white"></i>
                        </a>

                        <a class="fa-stack fa-lg" href="https://vk.com/id261057243"
                           onclick="ym(50044507, 'reachGoal', 'vk'); return true;"
                           rel="noreferrer nofollow" target="_blank">
                            <i class="fas fa-circle fa-stack-2x has-text-dark"></i>
                            <i class="fab fa-vk fa-stack-1x has-text-white"></i>
                        </a>

                        <a class="fa-stack fa-lg" href="https://instagram.com/saundefined/"
                           onclick="ym(50044507, 'reachGoal', 'instagram'); return true;"
                           rel="noreferrer nofollow" target="_blank">
                            <i class="fas fa-circle fa-stack-2x has-text-dark"></i>
                            <i class="fab fa-instagram fa-stack-1x has-text-white"></i>
                        </a>

                        <a class="fa-stack fa-lg" href="https://t.me/saundefined"
                           onclick="ym(50044507, 'reachGoal', 'telegram'); return true;"
                           rel="noreferrer nofollow" target="_blank">
                            <i class="fas fa-circle fa-stack-2x has-text-dark"></i>
                            <i class="fab fa-telegram-plane fa-stack-1x has-text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
  export default {
    name: 'app',
    components: {},
  };
</script>

<style>
    @import '../node_modules/bulma/css/bulma.min.css';
    @import '../node_modules/@fortawesome/fontawesome-free/css/all.min.css';
    @import '../node_modules/flag-icon-css/css/flag-icon.min.css';
    @import 'css/app.min.css';
</style>
