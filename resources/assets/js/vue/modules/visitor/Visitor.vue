<template>
    <div>
        <VisitorNavbar />
        <div>
            <h1 class="ml-3 pb-3 pt-3">Snippets</h1>
        </div>
        <section>
            <div class="col col-md-6" v-for="sumn in info" :key="sumn.id">
                <div class="card">
                    <div class="text-right">
                        <svg @click="copyEvent(sumn.id)" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather clipboard feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                    </div>
                    <section class="mt-3">
                        <div>
                            <pre>
                                <code :id="`sumn${sumn.id}`">{{sumn.snippet}}</code>
                            </pre>
                        </div>
                    </section>
                </div>
            </div>

        </section>

        <div>
            <h1 class="ml-3 pb-3 pt-3">Pdf's</h1>
        </div>
        <section>
            <div class="col col-md-6" v-for="pdf in pdfs" :key="pdf.id">
                <div class="card pdf-card">
                    <div class="card-body">
                        <h1 class="card-title pb-3">{{pdf.title}}</h1>
                        <div class="text-center">
                            <a :download="pdf.title" target="_blank" :href="pdf.path">
                                <img style="width: 100px" src="/images/pdf-icon.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div>
            <h1 class="ml-3 pb-3 pt-3">Link's</h1>
        </div>
        <section>
            <div class="col col-md-6" v-for="link in links" :key="link.id">
                <div class="card pdf-card">
                    <div class="card-body">
                        <h1 class="card-title pb-3">{{link.title}}</h1>
                        <button class="btn btn-primary" @click="checkIfChecked(link)">Open Link</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import axios from 'axios'
    import VisitorNavbar from '../visitor/components/VisitorNavbar.vue'
    export default {
        data() {
            return {
                info: '',
            }
        },
        components: {
            VisitorNavbar
        },
        methods: {
            async getSumn() {
                await axios
                    .get('/api/sumn')
                    .then((res) => (this.info = res.data))
                    .catch((error) => {
                        console.log(error)
                    })
            },
            copyEvent(id) {
                let elementText = document.getElementById('sumn' + id).innerText;
                let inputElement = document.createElement('input');
                inputElement.setAttribute('value', elementText);
                document.body.appendChild(inputElement);
                inputElement.select();
                navigator.clipboard.writeText(elementText);
                inputElement.parentNode.removeChild(inputElement)
            },
            async checkIfChecked(links) {

                if (links.tab) {
                    window.open(links.link, '_blank');
                    return false
                } else {
                    window.open(links.link, '_self');
                }

            },
        },
        computed: {
            pdfs() {
                return this.$store.getters["admin/getPdfs"];
            },
            links() {
                return this.$store.getters["admin/getLinks"];
            },
        },
        async mounted() {

            await this.$store.dispatch("admin/loadLinks");

            await this.$store.dispatch("admin/loadPdfs");

            await this.getSumn()
            console.log(this.info);
        }
    }

</script>

<style scoped>
    code {
        display: block;
        white-space: pre;
    }

    .card {
        max-height: 300px !important;
        padding: 20px;
        background-color: rgb(207, 207, 207);
        margin-bottom: 10px;
    }

    .pdf-card {
        max-width: auto !important;
    }

    .clipboard {
        color: rgb(74, 74, 226);
        cursor: pointer;
    }


    section::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #f5f5f5;
        border-radius: 10px;
    }

    section::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        background-color: #f5f5f5;
    }

    section::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-color: #ff0000;
    }

    section {
        padding: 0px;
        display: flex;
        overflow-x: auto;
        width: auto;
    }

</style>
