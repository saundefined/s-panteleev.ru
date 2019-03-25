<template>
    <div class="skills has-background-dark">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="title is-3 has-text-white">Skills and abilities</div>
                    <div class="skills__text has-text-white">
                        <p>Sometimes I solve problems on
                            <a class="link__inline" href="https://www.hackerrank.com/saundefined"
                               rel="noreferrer nofollow"
                               target="_blank">HackerRank</a>
                            and to answer the questions on
                            «<a class="link__inline" href="https://toster.ru/user/s_panteleev" rel="noreferrer nofollow"
                                target="_blank">Toster</a>»
                            (someday I'll do it on StackOverflow).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Skills',
  };
</script>

<style>
    .skills {
        background-attachment: fixed;
        padding: 50px 0;
        background-image: url('../assets/skills.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
    }

    .skills:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000;
        opacity: 0.8;
    }

    .skills__text {
        font-size: 18px;
        line-height: 32px;
    }
</style>