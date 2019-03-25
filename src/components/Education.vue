<template>
    <div class="education has-background-dark">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="title is-3 has-text-white">Education and Hobbies</div>
                    <div class="education__text has-text-white">
                        <p>In plans in 2019, I would like to get TOEFL- and TestDAF-certificates.</p>
                        <p>And I always try to improve my skill-set.</p>
                        <p><br/></p>
                        <p>In free time I like running, in 2019 I would like to run over 2019 km (while I carry out this
                            plan) and in 2020th – BMW Berlin Marathon.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Education',
  };
</script>

<style>
    .education {
        background-attachment: fixed;
        padding: 50px 0;
        background-image: url('../assets/education.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
    }

    .education:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000;
        opacity: 0.8;
    }

    .education__text {
        font-size: 18px;
        line-height: 32px;
    }
</style>