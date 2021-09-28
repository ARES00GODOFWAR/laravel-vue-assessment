<template>
    <div>
        <b-modal id="DeleteLink" hide-footer>
            <template #modal-title>
                Delete Modal
            </template>
            <h1>Are you sure you want to delete this Link</h1>
            <div class="row">
                <b-col>
                    <b-button class="mt-3" block @click="$bvModal.hide('DeleteLink')">Cancel</b-button>
                </b-col>
                <b-col>
                    <b-button class="mt-3" block @click="$emit('deletelink',link)"
                       >Delete
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
