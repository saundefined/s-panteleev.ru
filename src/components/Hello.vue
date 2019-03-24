<template>
    <div class="hello">
        <div class="container is-fluid">
            <div class="hero is-fullheight">
                <div class="hero-body">
                    <div class="hello__body">
                        <div class="hello__text">Hi, my name is</div>
                        <div class="hello__title">Sergey Panteleev</div>
                        <div class="hello__description">
                            I am
                            <vue-typer
                                    :pre-erase-delay='1000'
                                    :text="roles"
                                    :type-delay='50'
                                    erase-style='clear'
                            ></vue-typer>
                        </div>
                        <div class="hello__download">
                            <a class="hello__link" href="#">Download CV</a>
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
        roles: [
          'PHP-Developer',
          'Front-end developer',
        ],
      };
    },
    components: {
      'vue-typer': VueTyper,
    },
  };
</script>

<style>
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
        font-size: 65px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 15px;
    }

    .hello__description {
        width: 600px;
        max-width: 100%;
        font-weight: 400;
        font-size: 18px;
        padding: 0 0 35px;
        margin: 0;
        color: #fff;
    }

    .hello__link {
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 18px;
        font-weight: 200;
        position: relative;
        display: inline-block;
        color: #ffffff;
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