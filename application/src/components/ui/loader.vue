<template>
    <div class="lds-ripple">
        <div />
        <div />
    </div>
</template>
<script>
    export default {
        name: 'loader'
    };
</script>
<style scoped lang="scss">
    .lds-ripple {
        position: relative;
        display: inline-block;
        width: 128px;
        height: 128px;
    }

    .lds-ripple div {
        position: absolute;
        border: 4px solid #fff;
        border-radius: 50%;
        opacity: 1;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }

    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }

    @keyframes lds-ripple {
        0% {
            top: 64px;
            left: 64px;
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            top: -1px;
            left: -1px;
            width: 128px;
            height: 128px;
            opacity: 0;
        }
    }

</style>
