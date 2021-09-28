<template>
    <div>
        <b-modal id="EditSnippet" hide-footer>
            <template #modal-title>
                Edit Modal
            </template>
            <div class="d-block ">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="email" class="form-control" v-model="snippet.title">
                </div>
                <div class="form-group">
                    <label for="description">Snippet Description</label>
                    <textarea class="form-control" rows="4" v-model="snippet.description"></textarea>
                </div>
                <div class="form-group">
                    <label for="snippets">Snippets</label>
                    <textarea class="form-control" rows="6" v-model=" snippet.snippet"></textarea>
                </div>
            </div>

            <div class="row">
                <b-col>
                    <b-button class="mt-3" block @click="$bvModal.hide('EditSnippet')">Cancel</b-button>

                </b-col>
                <b-col>
                    <b-button class="mt-3" block @click="$emit('update',snippet.id, snippet.title, snippet.description, snippet.snippet)">Save</b-button>

                </b-col>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        props: {
            snippet: Object
        },
    }

</script>

<style>

</style>
