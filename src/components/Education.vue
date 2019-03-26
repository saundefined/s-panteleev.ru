<template>
    <div class="education has-background-dark">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="title is-3 has-text-white">{{ $t('edu.title') }}</div>
                    <div class="education__text has-text-white">
                        <p>{{ $t('edu.languages') }}</p>
                        <p>{{ $t('edu.skillset') }}</p>
                        <p><br/></p>
                        <p>{{ $t('edu.running') }}</p>
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