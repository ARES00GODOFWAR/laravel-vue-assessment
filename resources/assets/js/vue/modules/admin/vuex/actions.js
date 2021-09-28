import axios from "axios";

const actions = {

  async loadSnippets({ commit }){
    return await axios.get('/api/get-snippets')
                    .then( res => commit("setSnippets",res.data))
                    .catch( err => console.log(err))
  },
  async loadPdfs({ commit }){
    return await axios.get('/api/get-pdfs')
                    .then( res => commit("setPdfs",res.data))
                    .catch( err => console.log(err))
  },
  async loadLinks({ commit }){
    return await axios.get('/api/get-links')
                    .then( res => commit("setLinks",res.data))
                    .catch( err => console.log(err))
  },
  async saveSnippets({ commit }, body) {
      await axios
        .post("/api/update_admin_form", {
          title: body.title,
          description: body.description,
          snippet: body.snippet,
        })
        .then((res) => {
          console.log(res.data);
          commit("setSnippets", res.data);
        })
        .catch((error) => console.log(error));
  },
  async savePdfs({ commit }, body) {
      await axios
        .post("/api/update_admin_pdf", {
          title: body.title,
          path: body.path,
        })
        .then((res) => {
          console.log(res.data);
          commit("setPdfs", res.data);
        })
        .catch((error) => console.log(error));
  },
  async saveLinks({ commit }, body) {
      await axios
        .post("/api/update_admin_links", {
          title: body.title,
          link: body.link,
          tab: body.tab
        })
        .then((res) => {
          console.log(res.data);
          commit("setLinks", res.data);
        })
        .catch((error) => console.log(error));
  },
  async deleteSnippet({ commit }, snippet) {
    await axios
      .delete(`/api/remove-snippet`, {data: snippet})
      .catch((error) => console.log(error));
      commit("deleteSnippet", snippet.id)
  },
  async deletePdf({ commit }, pdf) {
    await axios
      .delete(`/api/remove-pdf`, {data: pdf})
      .catch((error) => console.log(error));
      commit("deletePdf", pdf.id)
  },
  async deleteLink({ commit }, link) {
    await axios
      .delete(`/api/remove-link`, {data: link})
      .catch((error) => console.log(error));
      commit("deleteLink", link.id)
  },
 
};

export default actions;
