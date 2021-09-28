<template>
    <b-modal id="DeleteSnippet" hide-footer>
        <template #modal-title>
            Delete Modal
        </template>
        <h1>Are you sure you want to delete this snippet</h1>

        <div class="row">
                <b-col>
                    <b-button class="mt-3" block @click="$bvModal.hide('DeleteSnippet')">Cancel</b-button>
                </b-col>
                <b-col>
                    <b-button class="mt-3" block @click="$emit('deleteSnippet',snippet)">Yes</b-button>
                </b-col>
            </div>
    </b-modal>
</template>

<script>
    export default {
        props: {
            snippet: Object
        }

    }

</script>

<style>

</style>
