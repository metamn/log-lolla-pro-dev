/**
 * Javascript functions for the Log Lolla Theme
 */


// Hover on post content
var postContentHover = function() {
  var postContent = document.querySelectorAll('.content-home .post .post__content');

  function onMouseOver(index, event) {
    var post = postContent[index].parentNode;

    if (post.classList.contains('post--hovered')) {
      post.classList.remove('post--hovered')
    } else {
      post.classList.add('post--hovered');
    }
    event.stopPropagation();
  }

  function onMouseOut(index, event) {
    postContent[index].parentNode.classList.remove('post--hovered');
    event.stopPropagation();
  }

  for (var i = 0; i < postContent.length; i++) {
    postContent[i].addEventListener('click', onMouseOver.bind(null, i), false);
    postContent[i].addEventListener('mouseout', onMouseOut.bind(null, i), false);
  }
}

// Click on the hamburger menu
var menuHamburgerClick = function(ID) {
  var menuHamburger = document.querySelector('.menu-hamburger');
  var menuMain = document.querySelector('.header-menu');

  function onViewChange(event) {
    menuMain.classList.toggle('header-menu--closed');
    menuHamburger.classList.toggle('menu-hamburger--closed');
    event.stopPropagation();
  }

  menuHamburger.addEventListener('click', onViewChange, false);
}


// Run functions once the document is ready
document.addEventListener('DOMContentLoaded', function(){
  // Post content hover
  if (document.querySelector('.content-home')) {
    postContentHover();
  }

  // Hamburger menu
  if (document.querySelector('.menu-hamburger')) {
    menuHamburgerClick('.menu-hamburger');
  }
}, false);
