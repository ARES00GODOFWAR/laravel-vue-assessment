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
                            <th class="text-left p-3 px-5">LINK</th>
                            <th class="text-left p-3 px-5">Open in new tab</th>
                            <th class="text-left p-3 px-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="link in links" :key="link.id">
                            <td>{{link.id}}</td>
                            <td>{{link.title}}</td>
                            <td>
                                <button class="btn btn-primary" @click="checkIfChecked(link)">Open Link</button>
                                <!-- <a @click="" :id="`sumn${link.id}`" :href="link.link">Sumn</a> -->
                            </td>
                            <td>
                                <span>
                                    {{link.tab ? 'true' : 'false'}}

                                </span>
                            </td>
                            <td class="d-flex justify-space-between">
                                <div style="padding: 5px">
                                    <div class="editTooltip">
                                        <b-button variant="outline-primary" @click="toggleModal(link)"
                                            v-b-modal.EditLink>edit
                                        </b-button>
                                        <span class="editTooltiptext">Edit</span>
                                    </div>
                                </div>
                                <div style="padding: 5px; margin-left: 60px">
                                    <div class="deleteTooltip">
                                        <b-button variant="outline-danger" @click="toggleModal(link)"
                                            v-b-modal.DeleteLink>delete
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

        <EditLink @editlink="editlink" :link="linkData" />
        <DeleteLink @deletelink="deletelink" :link="linkData" />
    </div>

</template>

<script>
    import Navbar from './components/Navbar.vue'
    import 'bootstrap/dist/css/bootstrap.min.css';
    import "datatables.net-dt/js/dataTables.dataTables"
    import "datatables.net-dt/css/jquery.dataTables.min.css"
    import $ from 'jquery'
    import EditLink from '../admin/components/EditLink.vue'
    import DeleteLink from '../admin/components/DeleteLink.vue'


    export default {
        data() {
            return {
                linkData: null,
            }
        },
        components: {
            Navbar,
            EditLink,
            DeleteLink
        },
        methods: {
            toggleModal(link) {
                this.linkData = link;
            },
            async checkIfChecked(links) {

                if (links.tab) {
                    window.open(links.link, '_blank');
                    return false
                } else {
                    window.open(links.link, '_self');
                }

            },
            async editlink(id, updatedTitle, updatedLink, updatedTab) {

                try {

                    if (updatedTab) {
                        updatedTab = 1
                    } else {
                        updatedTab = 0
                    }
                    let data = new FormData();
                    data.append('id', id);
                    data.append('title', updatedTitle);
                    data.append('link', updatedLink);
                    data.append('tab', updatedTab);

                    axios.post('/api/update_admin_links', data)

                    this.$notify({
                        group: "success",
                        text: `Link has been updated successfully`,
                    });

                } catch (error) {
                    this.$notify({
                        group: "error",
                        text: `An error has occurred updating Link`,
                    });
                }

            },
            async deletelink(link) {
                try {

                    await this.$store.dispatch("admin/deleteLink", link);

                    this.$notify({
                        group: "success",
                        text: `Link has been successfully deleted`,
                    });
                    return await this.$store.dispatch("admin/loadLinks");

                } catch (e) {
                    this.$notify({
                        group: "error",
                        text: "An error has occurred deleting this Link",
                    });
                    console.log(e.message);
                    return await this.$store.dispatch("admin/loadLinks");
                }
            }
        },
        computed: {
            links() {
                return this.$store.getters["admin/getLinks"];
            },

        },
        async mounted() {
            await this.$store.dispatch("admin/loadLinks");

            console.log(this.links);

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

</style>>

</style>
