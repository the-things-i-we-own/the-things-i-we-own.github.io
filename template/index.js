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

async function indexJSON() {
    const requestURL = 'index.json';
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();

    const index = JSON.parse(jsonIndex);
    indexHead(index);
    indexORG(index);
    coverORG(index);
}

function indexHead(obj) {
    const head = document.querySelector('head');
    const orgTitle = document.querySelector('#title');
    const indexTitle = document.createElement('title');
    const ogTitle = document.createElement('meta');
    const twittetTitle = document.createElement('meta');
    orgTitle.textContent = obj['title']
    indexTitle.textContent = obj['title'] + ' | ' + obj['author'];
    ogTitle.setAttribute("property", "og:title");
    ogTitle.setAttribute("content", obj['title']);
    twittetTitle.setAttribute("name", "twitter:title");
    twittetTitle.setAttribute("content", obj['title']);
    head.appendChild(indexTitle);
    head.appendChild(ogTitle);
    head.appendChild(twittetTitle);

    const orgDescription = document.querySelector('#description');
    const indexDescription = document.createElement('meta');
    const ogDescription = document.createElement('meta');
    const twitterDescription = document.createElement('meta');
    orgDescription.textContent = obj['description']
    indexDescription.setAttribute("name", "description");
    indexDescription.setAttribute("content", obj['description']);
    ogDescription.setAttribute("property", "og:description");
    ogDescription.setAttribute("content", obj['description']);
    twitterDescription.setAttribute("name", "twitter:description");
    twitterDescription.setAttribute("content", obj['description']);
    head.appendChild(indexDescription);
    head.appendChild(ogDescription);
    head.appendChild(twitterDescription);

    const indexAuthor = document.createElement("meta");
    indexAuthor.setAttribute("name", "author");
    indexAuthor.setAttribute("content", obj['author']);
    head.appendChild(indexAuthor);

    const author = document.querySelector('#author');
    author.innerText = obj['author']

    const indexEmail = document.createElement("meta");
    indexEmail.setAttribute("name", "reply-to");
    indexEmail.setAttribute("content", obj['email']);
    head.appendChild(indexEmail);

    const email = document.querySelector('#email');
    email.href = 'mailto:' + obj['email']
    email.innerText = obj['email']

    const ogType = document.createElement("meta");
    ogType.setAttribute("property", "og:type");
    ogType.setAttribute("content", obj['type']);
    head.appendChild(ogType);

    const twitter = document.createElement("meta");
    const twitterCard = document.createElement("meta");
    twitter.setAttribute("name", "twitter:site");
    twitter.setAttribute("content", obj['twitter']);
    twitterCard.setAttribute("name", "twitter:card");
    twitterCard.setAttribute("content", obj['card']);
    head.appendChild(twitter);
    head.appendChild(twitterCard);

    const ogIMG = document.createElement("meta");
    const twitterIMG = document.createElement("meta");
    ogIMG.setAttribute("property", "og:image");
    twitterIMG.setAttribute("name", "twitter:image");
    ogIMG.setAttribute("content", obj['src']);
    twitterIMG.setAttribute("content", obj['src']);
    head.appendChild(ogIMG);
    head.appendChild(twitterIMG);

    const ogSite = document.createElement("meta");
    ogSite.setAttribute("property", "og:site_name");
    ogSite.setAttribute("content", location.hostname);
    head.appendChild(ogSite);

    const ogURL = document.createElement("meta");
    ogURL.setAttribute("property", "og:url");
    ogURL.setAttribute("content", location.href);
    head.appendChild(ogURL);

    const iconCC = document.createElement("link");
    iconCC.rel = "icon";
    iconCC.type = "image/png";
    iconCC.href = obj['icon'];
    head.appendChild(iconCC);
}

function indexORG(obj) {
    const navORG = document.querySelector('header nav');
    const aboutORG = document.querySelector('#about');
    const orgAll = obj.org;

    for (const orgEach of orgAll) {
        const inputORG = document.createElement('input');
        const labelORG = document.createElement('label');

        inputORG.setAttribute("type", "radio");
        inputORG.setAttribute("name", "org");
        inputORG.id = orgEach.id;
        inputORG.value = orgEach.id;
        labelORG.setAttribute("for", orgEach.id);
        labelORG.innerHTML = orgEach.name;

        navORG.appendChild(inputORG);
        navORG.appendChild(labelORG);

        const aboutLi = document.createElement('li');
        aboutLi.setAttribute("data-org", orgEach.id);
        aboutLi.innerHTML = `
        <small>${orgEach.name}</small><br/>
        <b>${orgEach.info}</b>
        `
        aboutORG.appendChild(aboutLi);
    }
}

function coverORG(obj) {
    const cover = document.querySelector('#cover #img');
    const coverAll = obj.cover;

    for (const coverEach of coverAll) {
        const coverLi = document.createElement('li');
        coverLi.className = coverEach.size;
        coverLi.setAttribute("data-org", coverEach.org);
        coverLi.style.backgroundImage = `url('${coverEach.src}')`
        cover.appendChild(coverLi);
    }
}

indexJSON();