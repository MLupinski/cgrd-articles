const createButton = document.querySelector('#create-button');
const editButton = document.querySelector('#edit-button');
const createFormTitle = document.querySelector('#create-title');
const editFormTitle = document.querySelector('#edit-title');
const editCloseButton = document.querySelector('.edit-close');
const articleForm = document.querySelector('#article-form');
const articleIdInput = document.querySelector('#article-id');
const articleTitleInput = document.querySelector('#article-title');
const articleDescTextarea = document.querySelector('#article-desc');
let articles = document.querySelectorAll('.edit-article');

articles.forEach((article) => {
    article.addEventListener('click', (event) => {
        const targetElement = event.currentTarget;
        const articleId = targetElement.getAttribute('data-id');
        const articleTitle = document.querySelector('#article-title-' + articleId).innerText;
        const articleDesc = document.querySelector('#article-desc-' + articleId).innerText;

        createButton.classList.add('hidden-button');
        editButton.classList.remove('hidden-button');
        createFormTitle.classList.add('hidden-title');
        editFormTitle.classList.remove('hidden-title');
        editCloseButton.classList.add('active');

        articleForm.action = '/article/update'
        articleIdInput.value = articleId;
        articleTitleInput.value = articleTitle;
        articleDescTextarea.value = articleDesc;
    });
});

editCloseButton.addEventListener('click', () => {
    createButton.classList.remove('hidden-button');
    editButton.classList.add('hidden-button');
    createFormTitle.classList.remove('hidden-title');
    editFormTitle.classList.add('hidden-title');
    editCloseButton.classList.remove('active');

    articleForm.action = '/article/create'
    articleIdInput.value = '';
    articleTitleInput.value = '';
    articleDescTextarea.value = '';
});

