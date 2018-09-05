<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Courses</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ item.title }}</td>
                                            </tr>
                                        <tr>
                                            <th>Instructor</th>
                                            <td>
                                                <span class="label label-info" v-for="instructor in item.instructor">
                                                    {{ instructor.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lessons</th>
                                            <td>
                                                <span class="label label-info" v-for="lessons in item.lessons">
                                                    {{ lessons.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Categories</th>
                                            <td>
                                                <span class="label label-info" v-for="categories in item.categories">
                                                    {{ categories.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Featured Image</th>
                                            <td v-html="item.featured_image_link"></td>
                                            </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ item.description }}</td>
                                            </tr>
                                        <tr>
                                            <th>Introduction</th>
                                            <td v-html="item.introduction"></td>
                                            </tr>
                                        <tr>
                                            <th>Duration</th>
                                            <td>{{ item.duration }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('CoursesSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('CoursesSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
