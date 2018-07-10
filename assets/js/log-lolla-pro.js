/**
 * Javascript functions for the Log Lolla Pro Theme
 */


// Click on post content
var postContentClick = function() {
  var postContent = document.querySelectorAll('.content-home .post .post__content');

  function postContentRemoveClicks() {
    for (var i = 0; i < postContent.length; i++) {
      postContent[i].parentNode.classList.remove('post--clicked');
    }
  }

  function onMouseClick(index, event) {
    var post = postContent[index].parentNode;

    if (post.classList.contains('post--clicked')) {
      post.classList.remove('post--clicked')
    } else {
      postContentRemoveClicks();
      post.classList.add('post--clicked');
    }

    event.stopPropagation();
  }


  for (var i = 0; i < postContent.length; i++) {
    postContent[i].addEventListener('click', onMouseClick.bind(null, i), false);
  }
}

// Click on the hamburger menu
var menuHamburgerClick = function(ID) {
  var menuHamburger = document.querySelector('.header-menu-hamburger');
  var menuMain = document.querySelector('.header-menu');

  function onViewChange(event) {
    menuMain.classList.toggle('header-menu--closed');
    menuHamburger.classList.toggle('header-menu-hamburger--closed');
    event.stopPropagation();
  }

  menuHamburger.addEventListener('click', onViewChange, false);
}


// Run functions once the document is ready
document.addEventListener('DOMContentLoaded', function(){
  // Post content hover
  if (document.querySelector('.content-home')) {
    postContentClick();
  }

  // Hamburger menu
  if (document.querySelector('.header-menu-hamburger')) {
    menuHamburgerClick('.header-menu-hamburger');
  }
}, false);
