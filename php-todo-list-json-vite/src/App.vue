<script>
import SiteHeader from "./components/SiteHeader.vue";
import SiteMain from "./components/SiteMain.vue";
export default {
    components: {
        SiteHeader,
        SiteMain,
    }
};
</script>

<template>
    <SiteHeader></SiteHeader>
    <SiteMain></SiteMain>
</template>

<style lang="scss">
@use './styles/general.scss';
</style>
