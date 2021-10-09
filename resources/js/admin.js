const select = [
    'dashboard',
    'blog',
    'message',
    'suscriber'
]

let lastSelect = ''

function component(component) {
    return '.' + component
}

function show(node) {
    node.classList.add('select');
    if (lastSelect !== '' && lastSelect !== node) {
        lastSelect.classList.remove('select')
    }
    lastSelect = node
}
const content = document.querySelector('.select-content');
const navbarItems = document.querySelectorAll('.listen');

navbarItems.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        var toShow = document.querySelector(component(select[e.target.id]))
        console.log(toShow);
        show(toShow);


    })
});

const toggleBtn = document.querySelectorAll('.toggle-button');
//pff
toggleBtn.forEach(element => {
    console.log(element.attributes.val.value)
    if (element.attributes.val.value == 1) {
        element.classList.add('blocked')
    }
    let value = element.attributes.val.value
    element.addEventListener('click', () => {
        element.classList.toggle('blocked')
        value = !value
        console.log(value)
        element.closest('form').submit();
    })
});