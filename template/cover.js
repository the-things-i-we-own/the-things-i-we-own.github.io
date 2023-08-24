'use strict'

function changeHidden() {
    const mainAll = document.querySelectorAll('main')
    mainAll.forEach(main => {
        if (main.hidden == false) {
            main.hidden = true
            main.style.display = "none"
        } else {
            main.hidden = false
            main.style.display = "flex"
        }
    })
}

async function coverJSON() {
    const requestURL = 'index.json';
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();

    const index = JSON.parse(jsonIndex);
    coverORG(index);
}

function coverORG(obj) {
    const cover = document.querySelector('#cover #img');
    const coverAll = obj.cover;

    for (const coverEach of coverAll) {
        const coverLi = document.createElement('li');
        const coverIMG = document.createElement('img');

        coverLi.className = coverEach.size;
        coverLi.setAttribute("data-org", coverEach.org);
        coverIMG.src = coverIMG.src

        cover.appendChild(coverLi);
        coverLi.appendChild(coverIMG);
    }
}
