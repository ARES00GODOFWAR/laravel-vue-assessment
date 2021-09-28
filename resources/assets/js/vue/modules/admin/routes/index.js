import Admin from "../Admin.vue";
import Pdf from "../Pdf.vue";
import Link from "../Link.vue";
import AddSnippet from "../components/AddSnippet";
import PdfUpload from "../components/PdfUpload";
import linkUpload from "../components/linkUpload";


const routes = [
  {
    path: "/admin",
    name: "admin",
    component: Admin,
    
  },
  {
    path: "/admin/snippets",
    name: "addSnippet",
    component: AddSnippet,
  },
  {
    path: "/admin/pdfUpload",
    name: "PdfUpload",
    component: PdfUpload,
  },
  {
    path: "/admin/view-pdfs",
    name: "pdf-view",
    component: Pdf,
  },
  {
    path: "/admin/linkUpload",
    name: "linkUpload",
    component: linkUpload,
  },
  {
    path: "/admin/view-links",
    name: "link-view",
    component: Link,
  },

];

export default routes;
