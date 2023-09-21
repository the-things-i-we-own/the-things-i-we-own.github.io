'use strict'

function headToBody() {
    const thisTitle = document.querySelector('#title');
    thisTitle.innerText = document.title;

    const description = document.querySelector('#description');
    description.innerText = document.querySelector('meta[name="description"]').content;

    const author = document.querySelector('#author');
    author.innerText = document.querySelector('meta[name="author"]').content;

    const email = document.querySelector('#email');
    const mailto = document.querySelector('meta[name="reply-to"]').content;
    email.href = 'mailto:' + mailto;
    email.innerText = mailto;

    let lastModif = document.querySelector('#lastModified time');
    lastModif.innerText = document.lastModified;
    lastModif.setAttribute("data-time", document.lastModified);

    lastModif.addEventListener('click', function (event) {
        let ago = new Date(document.lastModified);
        let diff = new Date().getTime() - ago.getTime();

        let progress = new Date(diff);
        if (progress.getUTCFullYear() - 1970) {
            event.target.textContent = progress.getUTCFullYear() - 1970 + ' year ago';
        } else if (progress.getUTCMonth()) {
            event.target.textContent = progress.getUTCMonth() + ' month ago';
        } else if (progress.getUTCDate() - 1) {
            event.target.textContent = progress.getUTCDate() - 1 + ' day ago';
        } else if (progress.getUTCHours()) {
            event.target.textContent = progress.getUTCHours() + ' hour ago';
        } else if (progress.getUTCMinutes()) {
            event.target.textContent = progress.getUTCMinutes() + ' minute ago';
        } else {
            event.target.textContent = 'Now';
        }
    });
}

async function readmeMD(url, query) {
    fetch(url)
        .then(response => response.text())
        .then(innerText => {
            document.querySelector(query).innerText = innerText
        });
}

function changeMain() {
    const mainAll = document.querySelectorAll('main');
    mainAll.forEach(main => {
        if (main.hidden == false) {
            main.hidden = true;
            main.style.display = "none";
        } else {
            main.hidden = false;
            main.style.display = "flex";
        }
    })
}