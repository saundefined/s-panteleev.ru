<template>
    <div class="about">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="columns">
                        <div class="column is-4">
                            <figure class="image is-4by5">
                                <img alt="Panteleev Sergey" src="../assets/ava.jpg" title="Panteleev Sergey">
                            </figure>
                        </div>
                        <div class="column is-7 is-offset-1">
                            <div class="about__title">
                                <div class="title is-3 has-text-white">I am a Web-developer</div>
                            </div>
                            <div class="about__text">
                                <p class="about__text">
                                    Hi, I'm a self-taught programmer and I write in PHP for more than five years.
                                </p>
                                <p class="about__text">
                                    The most projects on current work based on Bitrix CMS, but on pet
                                    projects I prefer Laravel or Slim Framework.
                                </p>
                                <p class="about__text">
                                    I can understand the unfamiliar code and I don't suggest to rewrite all project from
                                    the
                                    start, but if it's really necessary – can do it.
                                </p>
                                <p class="about__text">
                                    Also, I write in React (JS, Native, Redux), Vue.js and now I study Swift.
                                </p>
                            </div>
                            <div class="about__link">
                                <a class="link" href="mailto:sergey@s-panteleev.ru?subject=We're hire!">Hire me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'About',
  };
</script>

<style>
    .about {
        background: #131414;
    }

    .about__title {
        position: relative;
        font-weight: 600;
        margin-bottom: 30px;
        padding-bottom: 20px;
    }

    .about__title:before {
        content: '';
        width: 100%;
        height: 1px;
        background: rgba(1, 1, 1, 0.05);
        position: absolute;
        bottom: 0;
        left: 0;
        background: #222;
    }

    .about__title:after {
        left: 0;
        content: '';
        width: 60px;
        height: 1px;
        background: linear-gradient(to right, #0072ff, #00c6ff);
        position: absolute;
        bottom: 0;
    }

    .about__text {
        font-size: 16px;
        color: #a3a3a3;
        line-height: 1.6;
        word-spacing: 1px;
        margin: 0 0 10px 0;
    }

    .about__link {
        margin-top: 40px;
    }
</style>