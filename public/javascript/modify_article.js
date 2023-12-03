const changeArticleForm = document.getElementById('changeArticle');

if (changeArticleForm) {
    const articleSelect = document.getElementById('article');

    articleSelect.addEventListener('change', function() {
        changeArticleForm.submit();
    });
}