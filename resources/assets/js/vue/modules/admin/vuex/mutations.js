const mutations = {
    setSnippets: (state, snippets) => state.snippets = snippets,
    setPdfs: (state, pdfs) => state.pdfs = pdfs, 
    setLinks: (state, links) => state.links = links, 
    deleteSnippet: function (state, id) {
        let filtered = state.snippets.filter(snippet => snippet.id !== id);
        state.snippets = filtered;
    },
    deletePdf: function (state, id) {
        let filtered = state.pdfs.filter(pdf => pdf.id !== id);
        state.pdfs = filtered;
    },
    deleteLink: function (state, id) {
        let filtered = state.links.filter(link => link.id !== id);
        state.links = filtered;
    },
}

export default mutations;
