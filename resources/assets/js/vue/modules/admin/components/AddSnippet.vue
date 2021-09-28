<template>
    <div>
        <Navbar />
        <div class="container">
            <div class="row">
                <form class="admin_form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="email" class="form-control" v-model="form.title">
                    </div>
                    <div class="form-group">
                        <label for="description">Snippet Description</label>
                        <textarea class="form-control" rows="4" v-model="form.description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="snippets">Snippets</label>
                        <textarea class="form-control" rows="6" v-model=" form.snippet"></textarea>
                    </div>

                    <button class="btn btn-primary" type="button" @click="saveSnippet">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import Navbar from './Navbar.vue';

    export default {
        data() {
            return {
                form: {}
            }
        },
        components: {
            Navbar
        },
        methods: {
            async saveSnippet() {
                try {
                    await this.$store.dispatch("admin/saveSnippets", this.form);
                    this.$notify({
                        group: 'success',
                        text: 'Your changes have been saved',
                    })
                    this.form.title = ''
                    this.form.description = ''
                    this.form.snippet = ''

                } catch (e) {
                    this.$notify({
                        group: 'error',
                        text: 'An error has occurred',
                    })
                }
            },
        },
        mounted: async function () {
            console.log(this.form);

        },
    }

</script>

<style scoped>
    /* .admin_form {
        width: 560px;
        border: 1px solid black;
        padding: 20px;
        margin-top: 50px;
        background-color: rgb(184, 182, 182);
        border-radius: 5px;
    } */

</style>
