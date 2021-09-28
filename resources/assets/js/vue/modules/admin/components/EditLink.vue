<template>
    <div>
        <b-modal id="EditLink" hide-footer>
            <template #modal-title>
                Edit Modal
            </template>
            <div class="d-block ">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" v-model="link.title">
                </div>
                <div class="form-group">
                    <label for="description">Link</label>
                    <input type="text" class="form-control" v-model="link.link">
                </div>

                <div class="form-group">
                    <label for="snippets">Open in new tab</label>
                    <input type="checkbox" id="checked" v-model="link.tab">
                </div>
            </div>

            <div class="row">
                <b-col>
                    <b-button class="mt-3" block @click="$bvModal.hide('EditLink')">Cancel</b-button>
                </b-col>
                <b-col>
                    <b-button class="mt-3" block @click="$emit('editlink', link.id, link.title, link.link, link.tab)">
                        Save
                    </b-button>
                </b-col>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        props: {
            link: Object
        },
    }

</script>

<style>

</style>
