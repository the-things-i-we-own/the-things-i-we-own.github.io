'use strict'

async function thingsJSON(requestURL = '') {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const thingsThis = await response.text();
    const thisJSON = JSON.parse(thingsThis);
    thingsORG(thisJSON);

    function thingsORG(obj) {
        const mainThings = document.querySelector('#things');
        const thingsUL = document.createElement('ul');
        const thingsP = document.createElement('p');

        thingsUL.id = obj.id;
        thingsP.innerHTML = `<strong>${obj.value}</strong>`;

        mainThings.appendChild(thingsUL);
        thingsUL.appendChild(thingsP);

        const thingsID = document.querySelector(`#${obj.id}`);
        const thingAll = obj.things;

        for (const thing of thingAll) {
            const thingLi = document.createElement('li');
            thingLi.setAttribute("data-org", thing.org);
            thingLi.innerHTML = `
            <u>${thing.type}</u>
            <b>${thing.name}</b><br/>
            <small>${thing.description}</small>
            `
            thingsID.appendChild(thingLi);
        }
    }
}
