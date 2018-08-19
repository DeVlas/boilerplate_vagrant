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
        background: rgba(180, 180, 180, 0.65);
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>
