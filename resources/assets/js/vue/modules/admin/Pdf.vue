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
                            <th class="text-left p-3 px-5">Pdf lINK</th>
                            <th class="text-left p-3 px-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pdf in pdfs" :key="pdf.id">
                            <td>{{pdf.id}}</td>
                            <td>{{pdf.title}}</td>
                            <td>
                                <a target="_blank" :href="pdf.path">
                                    <img style="width: 50px" src="/images/pdf-icon.png" alt="">
                                </a>
                            </td>
                            <td class="d-flex justify-space-between">
                                <div style="padding: 5px">
                                    <div class="editTooltip">
                                        <b-button @click="toggleModal(pdf)" variant="outline-primary" v-b-modal.EditPdf>
                                            edit
                                        </b-button>
                                        <span class="editTooltiptext">Edit</span>
                                    </div>
                                </div>
                                <div style="padding: 5px; margin-left: 60px">
                                    <div class="deleteTooltip">
                                        <b-button @click="toggleModal(pdf)" variant="outline-danger"
                                            v-b-modal.DeletePdf>delete
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
        <EditPdf @savePdfs="savePdfs" :pdf="pdfData" />
        <DeletePdf @deletePdf="deletePdf" :pdf="pdfData" />
    </div>
</template>

<script>
    import Navbar from './components/Navbar.vue'
    import 'bootstrap/dist/css/bootstrap.min.css';
    import "datatables.net-dt/js/dataTables.dataTables"
    import "datatables.net-dt/css/jquery.dataTables.min.css"
    import EditPdf from '../admin/components/EditPdf.vue'
    import DeletePdf from '../admin/components/DeletePdf.vue'

    import $ from 'jquery'
    export default {
        data() {
            return {
                pdfData: null,
                file: '',
            }
        },
        components: {
            Navbar,
            EditPdf,
            DeletePdf
        },
        methods: {
            toggleModal(pdf) {
                this.pdfData = pdf;
            },
            async savePdfs(id, updatedTitle, updatedfile) {

                try {

                    this.file = updatedfile

                    console.log(this.file);
                    console.log(updatedTitle);

                    let data = new FormData();
                    data.append('id', id);
                    data.append('file', this.file);
                    data.append('title', updatedTitle);

                    axios.post('/api/update_admin_pdf', data, {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    })

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
            async deletePdf(pdf) {
                try {

                    await this.$store.dispatch("admin/deletePdf", pdf);

                    this.$notify({
                        group: "success",
                        text: `Pdf has been successfully deleted`,
                    });
                    return await this.$store.dispatch("admin/loadSnippets");

                } catch (e) {
                    this.$notify({
                        group: "error",
                        text: "An error has occurred deleting this Pdf",
                    });
                    console.log(e.message);
                    return await this.$store.dispatch("admin/loadPdfs");
                }
            }

        },
        computed: {
            pdfs() {
                return this.$store.getters["admin/getPdfs"];
            },
        },
        async mounted() {
            await this.$store.dispatch("admin/loadPdfs");

            console.log(this.pdfs);

            $(document).ready(function () {
                $('#table_id').DataTable({
                    stripeClasses: ['strip1', 'strip2', 'strip3'],
                })
            })

        },

    }

</script>

<style scoped>
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
