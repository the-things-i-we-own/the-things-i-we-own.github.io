'use strict'

async function coverJson(requestURL) {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();
    const index = JSON.parse(jsonIndex);
    coverORG(index);
};

function coverORG(obj) {
    const cover = document.querySelector('#cover #img');
    const coverAll = obj.cover;

    for (const coverEach of coverAll) {
        const coverLi = document.createElement('li');
        coverLi.className = coverEach.size;
        coverLi.setAttribute("data-org", coverEach.org);
        coverLi.style.left = coverEach.x;
        coverLi.style.top = coverEach.y;
        coverLi.style.backgroundImage = `url('${coverEach.src}')`;
        cover.appendChild(coverLi);
    };
};
