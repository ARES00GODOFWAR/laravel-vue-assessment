<template>
    <div>
        <b-modal id="EditPdf" hide-footer>
            <template #modal-title>
                Edit Modal
            </template>
            <div class="d-block ">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="email" class="form-control" v-model="pdf.title">
                </div>
                <div class="form-group">
                    <label for="description">Pdf Upload</label>
                    <input type="file" multiple class="form-control" @change="inputChange">
                </div>
            </div>
            <div class="row">
                <b-col>
                    <b-button class="mt-3" block @click="$bvModal.hide('EditPdf')">Cancel</b-button>
                </b-col>
                <b-col>
                    <b-button class="mt-3" block @click="$emit('savePdfs', pdf.id, pdf.title, file)">Save
                    </b-button>
                </b-col>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        props: {
            pdf: Object
        },
        data() {
            return {
                file: ''
            }
        },
        methods: {
            inputChange(event) {
                this.file = event.target.files[0]
            }
        }


    }

</script>

<style>

</style>
