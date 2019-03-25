<template>
    <div class="work">
        <div class="container">
            <div class="hero">
                <div class="hero-body">
                    <div class="title is-3 has-text-white">Work experience</div>
                    <div class="work__items">
                        <WorkItem
                                :description="[
                                    'Development from scratch: from corporate sites to complex CRM systems.',
                                    'Development of mobile applications on React Native.',
                                    'Writing articles in a corporate blog.',
                                ]"
                                :links="[
                                    {name: 'Company website', link: 'https://vk.cc/8oHdHf'},
                                    {name: 'Corporate GitHub', link: 'https://vk.cc/8oHdVS'},
                                ]"
                                duration="Duration 5 years (2013 – until now)"
                                logo="prominado"
                                position="Web-developer"
                                title="Prominado"
                        />

                        <WorkItem
                                :description="[
                                    'Small tasks on the frontend and programming of existing projects.'
                                ]"
                                :links="[
                                    {name: 'Company website', link: 'https://vk.cc/8oHe02'},
                                ]"
                                duration="Duration 1 year (2010 – 2011)"
                                logo="cetera"
                                position="Junior"
                                title="Cetera Labs"
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