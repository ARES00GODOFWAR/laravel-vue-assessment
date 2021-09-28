<template>
    <div>
        <b-modal id="DeletePdf" hide-footer>
            <template #modal-title>
                Delete Modal
            </template>
            <h1>Are you sure you want to delete this PDF</h1>
            <div class="row">
                <b-col>
                    <b-button class="mt-3" block @click="$bvModal.hide('DeletePdf')">Cancel</b-button>
                </b-col>
                <b-col>
                    <b-button class="mt-3" block @click="$emit('deletePdf',pdf)"
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
            pdf: Object
        },
    }

</script>

<style>

</style>
