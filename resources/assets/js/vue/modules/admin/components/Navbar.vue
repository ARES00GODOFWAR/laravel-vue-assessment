<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="/images/logo.png" height="60" alt=""
                            loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <router-link active-class="active" to="/" class="nav-link">
                                <p style="margin: 0px">Home</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link active-class="active" to="/admin" class="nav-link">
                                <p style="margin: 0px">View Snippets</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link active-class="active" :to="{name: 'pdf-view'}" class="nav-link">
                                <p style="margin: 0px">View Pdfs</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link active-class="active" :to="{name: 'link-view'}" class="nav-link">
                                <p style="margin: 0px">View Links</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link active-class="active" :to="{name: 'addSnippet'}" class="nav-link">
                                <p style="margin: 0px">Add Snippet</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link active-class="active" :to="{name: 'PdfUpload'}" class="nav-link">
                                <p style="margin: 0px">PDF Upload</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link active-class="active" :to="{name: 'linkUpload'}" class="nav-link">
                                <p style="margin: 0px">Link Upload</p>
                            </router-link>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </div>
</template>

<script>
    export default {

    

    }

</script>

<style >
  
</style>
