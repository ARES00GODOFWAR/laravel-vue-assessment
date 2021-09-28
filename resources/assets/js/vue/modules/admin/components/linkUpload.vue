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

                    // let data = new FormData();
                    // data.append('id', id);
                    // data.append('title', updatedTitle);
                    // data.append('link', updatedLink);
                    // data.append('tab', updatedTab);
                    await this.$store.dispatch("admin/saveLinks", this.form);

                    // axios.post('/api/update_admin_links', data)

                    this.$notify({
                        group: "success",
                        text: `Pdf has been updated successfully`,
                    });

                } catch (error) {
                    this.$notify({
                        group: "error",
                        text: `An error has occurred updating Pdf`,
                    });
                }

            },

        },
        async mounted() {
            
        }

    }

</script>

<style>

</style>
