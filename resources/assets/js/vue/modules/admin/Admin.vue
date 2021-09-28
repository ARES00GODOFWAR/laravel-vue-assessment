<template>
    <div>
        <Navbar />
        <div class="container-fluid mt-5">
            <div class="row">
                <table id="table_id"
                    class="w-full text-md bg-white shadow-md stripe hover cell-border order-column rounded mb-4">
                    <thead>
                        <tr class="border">
                            <th class="text-left p-3 px-5">ID</th>
                            <th class="text-left p-3 px-5">Title</th>
                            <th class="text-left p-3 px-5">Description</th>
                            <th class="text-left p-3 px-5">Snippet</th>
                            <th class="text-left p-3 px-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="snippet in snippets" :key="snippet.id">
                            <td>{{snippet.id}}</td>
                            <td>{{snippet.title}}</td>
                            <td>{{snippet.description}}</td>
                            <td>
                                <pre>
                                    <code>{{snippet.snippet}}</code>
                                </pre>
                            </td>
                            <td class="d-flex justify-space-between">
                                <div style="padding: 5px">
                                    <div class="editTooltip">
                                        <b-button variant="outline-primary" @click="toggleModal(snippet)" v-b-modal.EditSnippet>edit
                                        </b-button>
                                        <span class="editTooltiptext">Edit</span>
                                    </div>
                                </div>
                                <div style="padding: 5px; margin-left: 60px">
                                    <div class="deleteTooltip">
                                        <b-button variant="outline-danger" @click="toggleModal(snippet)" v-b-modal.DeleteSnippet>delete
                                        </b-button>
                                        <span class="deleteTooltiptext">Delete</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <EditSnippet @update="update" :snippet="snippetData" />
        <DeleteSnippet @deleteSnippet="deleteSnippet" :snippet="snippetData" />
    </div>
</template>

<script>
    import Navbar from './components/Navbar.vue'
    import 'jquery/dist/jquery.min.js';
    import 'bootstrap/dist/css/bootstrap.min.css';
    import "datatables.net-dt/js/dataTables.dataTables"
    import "datatables.net-dt/css/jquery.dataTables.min.css"
    import $ from 'jquery'
    import EditSnippet from '../admin/components/EditSnippet.vue'
    import DeleteSnippet from '../admin/components/DeleteSnippet.vue'

    export default {

        data() {
            return {
                editModalShow: false,
                snippetData: null
            }
        },
        components: {
            Navbar,
            EditSnippet,
            DeleteSnippet
        },
        methods: {
            toggleModal(snippet) {
                this.snippetData = snippet;
            },
            async update(id, updatedTitle, updatedDescription, updatedSnippet) {

                try {

                    let formData = new FormData();
                    formData.append('id', id);
                    formData.append('title', updatedTitle);
                    formData.append('description', updatedDescription);
                    formData.append('snippet', updatedSnippet);


                    await axios.post(`/api/update_admin_form`, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    });
                    await this.$store.dispatch("admin/loadSnippets");
                    this.$notify({
                        group: "success",
                        text: `Snippet has been updated successfully`,
                    });

                } catch (e) {
                    this.$notify({
                        group: "error",
                        text: `An error has occurred updating snippet`,
                    });
                    console.log(e.message);

                    return await this.$store.dispatch("admin/loadSnippets");

                }
            },
            async deleteSnippet(snippet) {
                try {

                     await this.$store.dispatch("admin/deleteSnippet", snippet);

                    this.$notify({
                        group: "success",
                        text: `Snippet has been successfully deleted`,
                    });
                    return await this.$store.dispatch("admin/loadSnippets");

                } catch (e) {
                    this.$notify({
                        group: "error",
                        text: "An error has occurred deleting this Snippet",
                    });
                    console.log(e.message);
                    return await this.$store.dispatch("admin/loadSnippets");
                }
            }
        },
        computed: {
            snippets() {
                return this.$store.getters["admin/getSnippets"];
            },
        },
        async mounted() {
            await this.$store.dispatch("admin/loadSnippets");

            $(document).ready(function () {
                $('#table_id').DataTable({
                    stripeClasses: ['strip1', 'strip2', 'strip3'],
                })
            })

        },
    }

</script>

<style scoped>
    code {
        display: block;
        white-space: pre;
    }

    .deleteTooltip,
    .editTooltip {
        position: absolute;
        display: inline-block;
    }



    .editTooltip .editTooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -65px;
        margin-bottom: 10px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .deleteTooltip .deleteTooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -65px;
        margin-bottom: 10px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .deleteTooltip .deleteTooltiptext::after,
    .editTooltip .editTooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .deleteTooltip:hover .deleteTooltiptext,
    .editTooltip:hover .editTooltiptext {
        visibility: visible;
        opacity: 1;
    }

</style>
