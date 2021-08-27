/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/chat.js ***!
  \******************************/
var div = document.querySelector('#online');
var usersContainer = document.querySelector('.online-users__list'); // Make a request for a user with a given ID

var users;

function online(url) {
  var res;
  axios.get(url).then(function (response) {
    // handle success
    count = response.data['onlineCount'];
    counter = document.createElement('span');
    counter.innerHTML = count + ' utilisateur(s) connecté(s)';
    users = response.data['userOnline'];
    div.appendChild(counter);
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
}

online(div.attributes.online.value);
window.setInterval(function () {
  online(div.attributes.online.value);
}, 60000);
users.map(function (user) {
  li = document.createElement('li');
  container = document.createElement('span');
  container.innerHTML = user;
  li.appendChild(container);
  usersContainer.appendChild(li);
});
/******/ })()
;