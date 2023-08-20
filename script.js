'use strict'

document.addEventListener('readystatechange', event => {
    if (event.target.readyState === 'interactive') {
        thingsJSON('json/furniture.json');
        thingsJSON('json/goods.json');
        thingsJSON('json/listening.json');
        thingsJSON('json/printing.json');
        thingsJSON('json/shopping.json');
        thingsJSON('json/stationary.json');
        thingsJSON('json/viewing.json');
        thingsJSON('json/computer.json');
        thingsJSON('json/www.json');
    } else if (event.target.readyState === 'complete') {
        let targets = document.querySelectorAll("#things ul li")
        let filter = document.querySelectorAll('#org input[type="radio"]')
        if (filter) {
            //****** for all select ******
            for (let i of filter) {
                i.addEventListener('change', () => {
                    let value = i.value
                    let name = i.getAttribute('name')
                    //*** for each target ***
                    for (let ii of targets) {
                        //*** delete hidden class ***
                        ii.classList.remove('hidden')
                        //*** check target every select ***
                        let item_data = ii.getAttribute('data-' + name)
                        //*** set hidden class ***
                        if (value && value !== 'all' && value !== item_data && !ii.classList.contains('hidden')) {
                            ii.classList.add('hidden')
                        }
                    }
                })
            }
        }
    }
});