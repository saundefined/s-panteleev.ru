<template>
    <div class="work__item has-text-white">
        <div class="work__duration">{{ duration }}</div>
        <div class="work__meta columns">
            <div class="column is-1">
                <figure class="image is-square">
                    <img :alt="title" :title="title" v-bind:src="require('../assets/' + logo + '_logo.svg')">
                </figure>
            </div>
            <div class="column is-11">
                <div class="is-size-5 has-text-weight-semibold">{{ title }}</div>
                <div class="is-size-6">{{ position }}</div>
                <div class="work__description">
                    <div class="is-size-6 has-text-weight-semibold">{{ $t('work.responsibility') }}</div>
                    <ul class="work__tasks">
                        <li :key="index" v-for="(item, index) in description">{{ item }}</li>
                    </ul>
                </div>

                <ul class="work__links">
                    <li :key="index" v-for="(item, index) in links">
                        <a :href="item.link" class="link">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'WorkItem',
    props: {
      logo: String,
      title: String,
      position: String,
      duration: String,
      description: Array,
      links: Array,
    },
  };
</script>

<style>
    .work__item {
        margin-bottom: 36px;
        padding-bottom: 36px;
        position: relative;
        border-bottom: 1px solid #444;
    }

    .work__duration {
        font-size: 15px;
        color: #999999;
        margin-bottom: 15px;
    }

    .work__meta {

    }

    .work__description {
        margin-top: 20px;
    }

    .work__tasks {
        margin: 5px 0 0 0;
        padding: 0;
        list-style: none;
    }

    .work__tasks li {
        padding-left: 20px;
        position: relative;
        margin-bottom: 10px;
    }

    .work__tasks li:before {
        content: '–';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
    }

    .work__links {
        margin-top: 20px;
    }

    .work__links li {
        display: inline-block;
        margin-right: 50px;
        margin-bottom: 20px;
    }
</style>