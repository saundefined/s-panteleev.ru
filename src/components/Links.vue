<template>
    <div class="links">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="title is-3 has-text-white">{{ $t('links.title') }}</div>

                    <div class="columns">
                        <div class="column is-6">
                            <ul class="links__list">
                                <li>
                                    <a class="link" href="https://vk.com/id261057243" rel="noreferrer nofollow"
                                       onclick="ym(50044507, 'reachGoal', 'vk'); return true;"
                                       target="_blank">{{ $t('links.vk') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="https://www.facebook.com/saundefined"
                                       onclick="ym(50044507, 'reachGoal', 'fb'); return true;"
                                       rel="noreferrer nofollow"
                                       target="_blank">{{ $t('links.fb') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="http://twitter.com/s_panteleev" rel="noreferrer nofollow"
                                       onclick="ym(50044507, 'reachGoal', 'twitter'); return true;"
                                       target="_blank">{{ $t('links.tw') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="https://www.instagram.com/saundefined/"
                                       onclick="ym(50044507, 'reachGoal', 'instagram'); return true;"
                                       rel="noreferrer nofollow"
                                       target="_blank">{{ $t('links.ig') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="column is-6">
                            <ul class="links__list">
                                <li>
                                    <a class="link" href="https://people.php.net/sergey" rel="noreferrer nofollow"
                                       onclick="ym(50044507, 'reachGoal', 'people_php'); return true;"
                                       target="_blank">{{ $t('links.php') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="https://github.com/saundefined/" rel="noreferrer nofollow"
                                       onclick="ym(50044507, 'reachGoal', 'github'); return true;"
                                       target="_blank">{{ $t('links.gh') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="https://moikrug.ru/saundefined" rel="noreferrer nofollow"
                                       onclick="ym(50044507, 'reachGoal', 'moikrug'); return true;"
                                       target="_blank">{{ $t('links.moikrug') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="https://toster.ru/user/s_panteleev" rel="noreferrer nofollow"
                                       onclick="ym(50044507, 'reachGoal', 'toster'); return true;"
                                       target="_blank">{{ $t('links.toster') }}</a>
                                </li>
                                <li>
                                    <a class="link" href="https://www.hackerrank.com/saundefined"
                                       onclick="ym(50044507, 'reachGoal', 'hackerrank'); return true;"
                                       rel="noreferrer nofollow"
                                       target="_blank">{{ $t('links.hr') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Links',
  };
</script>

<style>
    .links {
        background: #131414;
    }

    .links__list {

    }

    .links__list li {
        display: block;
        margin-bottom: 20px;
    }
</style>