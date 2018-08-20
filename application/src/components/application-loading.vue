<template>
    <div class="application-loading">
        <loader />
    </div>
</template>
<script>
    import Loader from 'components/ui/loader'

    export default {
        name: 'application-loading',
        components: {
            Loader
        }
    }
</script>
<style lang="scss" scoped>
    .application-loading {
        display: flex;
        flex: 1;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        background: rgba(180, 180, 180, 0.65);
    }
</style>
