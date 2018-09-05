<template>
    <div v-html="row.avatar_link"></div>
</template>


<script>
    export default {
        props: ['row'],
    }
</script>
