<template>
    <div>
        <Navbar />
        <div class="container">
            <div class="row">
                <form class="admin_form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" v-model="form.title">
                    </div>
                    <div class="form-group">
                        <label for="description">Link</label>
                        <input type="text" class="form-control" v-model="form.link">
                    </div>

                    <div class="form-group">
                        <label for="snippets">Open in new tab</label>
                        <input type="checkbox" id="checked" v-model="form.tab">
                    </div>

                    <button class="btn btn-primary" type="button" @click="saveLink">Submit</button>
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
                form: {},
                checked: []
            }
        },
        components: {
            Navbar
        },
        methods: {
            async saveLink() {
                try {
                    await this.$store.dispatch("admin/saveLinks", this.form);

                    this.$notify({
                        group: "success",
                        text: `Pdf has been updated successfully`,
                    });
                    this.form.title = ''
                    this.form.link = ''
                    this.form.tab = 0


                } catch (error) {
                    this.$notify({
                        group: "error",
                        text: `An error has occurred updating Pdf`,
                    });
                }

            },

        },

    }

</script>

<style>

</style>
