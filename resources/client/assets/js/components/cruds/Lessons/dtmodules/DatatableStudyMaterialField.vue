<template>
    <div v-html="row.study_material_link"></div>
</template>


<script>
    export default {
        props: ['row'],
    }
</script>
