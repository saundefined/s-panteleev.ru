<template>
    <div class="work">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="title is-3 has-text-white">{{ $t('work.title') }}</div>
                    <div class="work__items">
                        <WorkItem
                                :description="[
                                    $t('work.prominado_development'),
                                    $t('work.prominado_api'),
                                    $t('work.prominado_mobile'),
                                    $t('work.prominado_blog')
                                ]"
                                :duration="$t('work.prominado_duration')"
                                :links="[
                                    {name: $t('work.website'), link: 'https://vk.cc/8oHdHf', goal: 'prominado_website'},
                                    {name: $t('work.github'), link: 'https://vk.cc/8oHdVS', goal: 'prominado_github'},
                                ]"
                                logo="prominado"
                                :position="$t('work.prominado_position')"
                                :title="$t('work.prominado')"
                        />

                        <WorkItem
                                :description="[
                                    $t('work.cetera_development')
                                ]"
                                :duration="$t('work.cetera_duration')"
                                :links="[
                                    {name: $t('work.website'), link: 'https://vk.cc/8oHe02', goal: 'cetera_website'},
                                ]"
                                logo="cetera"
                                :position="$t('work.cetera_position')"
                                :title="$t('work.cetera')"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import WorkItem from './WorkItem';

  export default {
    name: 'WorkExperience',
    components: {
      WorkItem,
    },
  };
</script>

<style>
    .work {
        background: #131414;
    }
</style>