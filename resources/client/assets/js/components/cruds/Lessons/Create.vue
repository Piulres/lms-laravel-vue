<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Lessons</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
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
                                    <label for="introduction">Introduction</label>
                                    <vue-ckeditor
                                            name="introduction"
                                            :id="'introduction'"
                                            :value="item.introduction"
                                            @input="updateIntroduction"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="study_material">Study Material</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            @change="updateStudy_material"
                                            multiple="multiple"
                                    >
                                    <ul v-if="item.study_material || item.uploaded_study_material" class="list-unstyled">
                                        <li v-for="study_material in item.uploaded_study_material">
                                            {{ study_material.file_name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeUploadedStudyMaterial($event, study_material.id);"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                        <li v-for="(study_material, index) in item.study_material">
                                            {{ study_material.name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeStudy_material($event, index);"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <vue-ckeditor
                                            name="content"
                                            :id="'content'"
                                            :value="item.content"
                                            @input="updateContent"
                                    />
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
        ...mapGetters('LessonsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('LessonsSingle', ['storeData', 'resetState', 'setTitle', 'setIntroduction', 'setStudy_material', 'destroyStudy_material', 'destroyUploadedStudyMaterial', 'setContent']),
        updateTitle(e) {
            this.setTitle(e.target.value)
        },
        updateIntroduction(value) {
            this.setIntroduction(value)
        },
        removeStudy_material(e, id) {
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
                    this.destroyStudy_material(id);
                }
            })
        },
        updateStudy_material(e) {
            this.setStudy_material(e.target.files);
            this.$forceUpdate();
        },
        removeUploadedStudyMaterial (e, id) {
        this.$swal({
          title: 'Are you sure ? ',
          text: "To fully delete the file submit the form.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          confirmButtonColor: '#dd4b39',
          focusCancel: true,
          reverseButtons: true
        }).
        then(result => {
            if (typeof result.dismiss === "undefined") {
                this.destroyUploadedStudyMaterial(id);
            }
        })
        },
        updateContent(value) {
            this.setContent(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'lessons.index' })
                    this.$eventHub.$emit('create-success')
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
