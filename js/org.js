'use strict'

window.onload = function () {
    const about = document.querySelector('#about');
    let label = document.querySelectorAll('#org label');
    for (let i of label) {
        const aboutORG = document.createElement('li');
        aboutORG.setAttribute("data-org", i.getAttribute('for'));
        aboutORG.innerHTML = `
        <b>${i.textContent}</b>
        <small>${i.getAttribute('data-txt')}</small>
        `;
        about.appendChild(aboutORG);
    };

    let filter = document.querySelectorAll('#org input[type="radio"]');
    for (let ii of filter) {
        ii.addEventListener('change', () => {
            let value = ii.value;
            let targets = document.querySelectorAll("main ul li");
            for (let iii of targets) {
                iii.hidden = false;
                let item_data = iii.getAttribute('data-org');
                if (value && value !== 'all' && value !== item_data) {
                    iii.hidden = true;
                };
            };
        }, false)
    };
};