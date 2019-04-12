<template>
    <div class="hello">
        <div class="container is-fluid">
            <div class="hero is-fullheight">
                <div class="hero-head">
                    <div class="lang has-text-right">
                        <a class="lang__link"
                           :href="'#' + lang"
                           v-bind:key="index"
                           v-for="(lang, index) in locales"
                        >{{ lang }}</a>
                    </div>
                </div>
                <div class="hero-body">
                    <div class="hello__body">
                        <div class="hello__text">{{ $t('hello.hi') }}</div>
                        <div class="hello__title is-size-1-tablet is-size-4-mobile">{{ $t('hello.name') }}</div>
                        <div class="hello__description">
                            {{ $t('hello.iam') }}
                            <vue-typer
                                    :pre-erase-delay='1000'
                                    :text="$t('hello.roles')"
                                    :type-delay='50'
                                    erase-style='clear'
                            ></vue-typer>
                        </div>
                        <div class="hello__download">
                            <a :href="$t('hello.cv_link')" class="hello__link link"
                               onclick="ym(50044507, 'reachGoal', 'download_cv'); return true;">{{ $t('hello.cv') }}</a>
                        </div>
                    </div>
                </div>
                <div class="hero-foot">
                    <span class="mouse"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {VueTyper} from 'vue-typer';

  export default {
    name: 'Hello',
    data() {
      return {
        locales: [
          'ru',
          'en',
        ],
      };
    },
    components: {
      'vue-typer': VueTyper,
    },
  };
</script>

<style>
    .lang {
        margin-top: 30px;
    }

    .lang__link {
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 18px;
        font-weight: 200;
        position: relative;
        display: inline-block;
        color: #ffffff;
        margin-left: 30px;
    }

    .lang__link:hover {
        color: #ffffff;
    }

    .lang__link:after {
        content: '';
        width: 0;
        height: 1px;
        position: absolute;
        right: 0;
        bottom: 0;
        opacity: 0.5;
        background: #444;
        -webkit-transition: ease all 0.3s;
        -moz-transition: ease all 0.3s;
        -o-transition: ease all 0.3s;
        transition: ease all 0.3s;
    }

    .lang__link:hover:after,
    .lang__link--active:after {
        width: 100%;
        transition-delay: 0.4s;
        background: #fff;
    }

    .hello {
        background: #000000;
    }

    .hello__body {
        position: relative;
        padding-left: 45px;
    }

    .hello__body:before {
        content: '';
        position: absolute;
        width: 5px;
        left: 1px;
        top: 5px;
        bottom: 0;
        background: linear-gradient(to right, #0072ff, #00c6ff);
    }

    .hello__text {
        font-size: 20px;
        color: #fff;
    }

    .hello__title {
        font-family: 'Raleway', sans-serif;
        font-weight: 700;
        color: #fff;
        margin: 0 0 15px;
    }

    .hello__description {
        font-weight: 400;
        font-size: 18px;
        padding: 0 0 35px;
        margin: 0;
        color: #fff;
    }

    .vue-typer .custom.char {
        color: #fff;
    }

    .vue-typer .custom.caret {
        margin-left: 5px;
        width: 1px;
        background-color: #aebcb9;
    }

    .mouse {
        width: 26px;
        height: 42px;
        border: 2px solid #fff;
        border-radius: 24px;
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .mouse:after {
        content: '';
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -2px;
        background-color: #fff;
        border-radius: 100%;
        width: 4px;
        height: 4px;
        opacity: 1;
        -webkit-transform: translateY(0px) scaleY(1) scaleX(1) translateZ(0px);
        transform: translateY(0px) scaleY(1) scaleX(1) translateZ(0px);
        -webkit-animation: scroll 1.5s -1s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
        animation: scroll 1.5s -1s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
    }

    @-webkit-keyframes scroll {
        0%, 20% {
            -webkit-transform: translateY(0px) scaleY(1) scaleX(1) translateZ(0px);
            transform: translateY(0px) scaleY(1) scaleX(1) translateZ(0px);
        }

        10% {
            -webkit-transform: translateY(0px) scaleY(1.2) scaleX(1.2) translateZ(0px);
            transform: translateY(0px) scaleY(1.2) scaleX(1.2) translateZ(0px);
            opacity: 1;
        }

        100% {
            -webkit-transform: translateY(20px) scaleY(2.5) scaleX(0.5) translateZ(0px);
            transform: translateY(20px) scaleY(2.5) scaleX(0.5) translateZ(0px);
            opacity: 0.01;
        }
    }

    @keyframes scroll {
        0%, 20% {
            -webkit-transform: translateY(0px) scaleY(1) scaleX(1) translateZ(0px);
            transform: translateY(0px) scaleY(1) scaleX(1) translateZ(0px);
        }

        10% {
            -webkit-transform: translateY(0px) scaleY(1.2) scaleX(1.2) translateZ(0px);
            transform: translateY(0px) scaleY(1.2) scaleX(1.2) translateZ(0px);
            opacity: 1;
        }

        100% {
            -webkit-transform: translateY(20px) scaleY(2.5) scaleX(0.5) translateZ(0px);
            transform: translateY(20px) scaleY(2.5) scaleX(0.5) translateZ(0px);
            opacity: 0.01;
        }
    }
</style>