/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
var select = ['dashboard', 'blog', 'message', 'suscriber'];
var lastSelect = '';

function component(component) {
  return '.' + component;
}

function show(node) {
  node.classList.add('select');

  if (lastSelect !== '' && lastSelect !== node) {
    lastSelect.classList.remove('select');
  }

  lastSelect = node;
}

var content = document.querySelector('.select-content');
var navbarItems = document.querySelectorAll('.listen');
navbarItems.forEach(function (item) {
  item.addEventListener('click', function (e) {
    e.preventDefault();
    var toShow = document.querySelector(component(select[e.target.id]));
    console.log(toShow);
    show(toShow);
  });
});
var toggleBtn = document.querySelectorAll('.toggle-button');
toggleBtn.forEach(function (element) {
  console.log(element.attributes.val.value);

  if (element.attributes.val.value == 1) {
    element.classList.add('blocked');
  }

  var value = element.attributes.val.value;
  element.addEventListener('click', function () {
    element.classList.toggle('blocked');
    value = !value;
    console.log(value);
    element.closest('form').submit();
  });
});
/******/ })()
;