<template>
    <div>
        <Navbar />
        <div class="container">
            <div class="row">
                <form class="admin_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="email" class="form-control" v-model="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Pdf Upload</label>
                        <input type="file" accept="pdf" multiple class="form-control" @change="inputChange">
                    </div>

                    <button class="btn btn-primary" type="button" @click="savePdfs">Upload</button>
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
                title: '',
                file: '',
                form: {}

            };
        },
        components: {
            Navbar
        },
        methods: {
            async savePdfs(e) {

                try {
                    e.preventDefault();
                    let existingObj = this;

                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    }

                    let data = new FormData();
                    data.append('file', this.file);
                    data.append('title', this.title);

                    axios.post('/api/update_admin_pdf', data, config)
                        .then(function (res) {
                            existingObj.success = res.data.success;
                        })
                        .catch(function (err) {
                            existingObj.output = err;
                        });
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

            inputChange(event) {
                this.file = event.target.files[0]
            }

        }
    }

</script>

<style>

</style>
