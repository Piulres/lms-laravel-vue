<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Courses</h1>
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
                                    <label for="title">Title</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Enter Title"
                                            :value="item.title"
                                            @input="updateTitle"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="instructor">Instructor</label>
                                    <v-select
                                            name="instructor"
                                            label="name"
                                            @input="updateInstructor"
                                            :value="item.instructor"
                                            :options="usersAll"
                                            multiple
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="lessons">Lessons</label>
                                    <v-select
                                            name="lessons"
                                            label="title"
                                            @input="updateLessons"
                                            :value="item.lessons"
                                            :options="lessonsAll"
                                            multiple
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <v-select
                                            name="categories"
                                            label="title"
                                            @input="updateCategories"
                                            :value="item.categories"
                                            :options="coursescategoriesAll"
                                            multiple
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="featured_image">Featured Image</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            @change="updateFeatured_image"
                                    >
                                    <ul v-if="item.featured_image" class="list-unstyled">
                                        <li>
                                            {{ item.featured_image.name || item.featured_image.file_name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeFeatured_image"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="introduction">Introduction</label>
                                    <vue-ckeditor
                                            name="introduction"
                                            :id="'introduction'"
                                            :value="item.introduction"
                                            @input="updateIntroduction"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="duration"
                                            placeholder="Enter Duration"
                                            :value="item.duration"
                                            @input="updateDuration"
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
        ...mapGetters('CoursesSingle', ['item', 'loading', 'usersAll', 'lessonsAll', 'coursescategoriesAll']),
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
        ...mapActions('CoursesSingle', ['fetchData', 'updateData', 'resetState', 'setTitle', 'setInstructor', 'setLessons', 'setCategories', 'setFeatured_image', 'setDescription', 'setIntroduction', 'setDuration']),
        updateTitle(e) {
            this.setTitle(e.target.value)
        },
        updateInstructor(value) {
            this.setInstructor(value)
        },
        updateLessons(value) {
            this.setLessons(value)
        },
        updateCategories(value) {
            this.setCategories(value)
        },
        removeFeatured_image(e, id) {
            this.$swal({
                title: 'Are you sure?',
                text: "To fully delete the file submit the form.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#dd4b39',
                focusCancel: true,
                reverseButtons: true
            }).then(result => {
                if (typeof result.dismiss === "undefined") {
                    this.setFeatured_image('');
                }
            })
        },
        updateFeatured_image(e) {
            this.setFeatured_image(e.target.files[0]);
            this.$forceUpdate();
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updateIntroduction(value) {
            this.setIntroduction(value)
        },
        updateDuration(e) {
            this.setDuration(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'courses.index' })
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
