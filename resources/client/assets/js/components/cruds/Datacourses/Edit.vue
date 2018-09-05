<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Data Courses</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <v-select
                                            name="course"
                                            label="title"
                                            @input="updateCourse"
                                            :value="item.course"
                                            :options="coursesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="user">User</label>
                                    <v-select
                                            name="user"
                                            label="name"
                                            @input="updateUser"
                                            :value="item.user"
                                            :options="usersAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                    type="checkbox"
                                                    name="view"
                                                    :value="item.view"
                                                    :checked="item.view == true"
                                                    @change="updateView"
                                                    >
                                            View
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="progress">Progress</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="progress"
                                            placeholder="Enter Progress"
                                            :value="item.progress"
                                            @input="updateProgress"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="rating"
                                            placeholder="Enter Rating"
                                            :value="item.rating"
                                            @input="updateRating"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
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
    computed: {
        ...mapGetters('DatacoursesSingle', ['item', 'loading', 'coursesAll', 'usersAll']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('DatacoursesSingle', ['fetchData', 'updateData', 'resetState', 'setCourse', 'setUser', 'setView', 'setProgress', 'setRating']),
        updateCourse(value) {
            this.setCourse(value)
        },
        updateUser(value) {
            this.setUser(value)
        },
        updateView(e) {
            this.setView(e.target.checked)
        },
        updateProgress(e) {
            this.setProgress(e.target.value)
        },
        updateRating(e) {
            this.setRating(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'datacourses.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
