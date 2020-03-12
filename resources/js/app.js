/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
  $(window).on('scroll', function(e) { //quando vado a fare scroll con il mouse
  st = $(this).scrollTop(); //imposto la posizione di scorrimento
  //console.log(st);
  if (st > 80) { //se la posizione di scorrimento è maggiore a 80px
    $('.home-navbar').addClass('change-prop'); //cambio le proprietà della navbar
    $('.info-room-navbar').slideDown();
    $('.logoBlue').slideDown(); //appare il logo blue
  } else { //altrimenti (se faccio scroll in alto)
    $('.logoBlue').hide(); //scompare il logo blue
    $('.home-navbar').removeClass('change-prop'); //rimetto le proprietà della navbar come prima
    $('.info-room-navbar').slideUp();
  }
  prevTop = st; //la posizione iniziale sulla posizione corrente sulla pagina, diventa la posizione di scorrimento
  if ($(window).width() > 996) { //se le dimensioni del display sono inferiori a 996px
    if (st > 900) { //se si fa scroll oltre i 900px
      $('.card-scroll').css('margin-top','700px'); //la card a lato scende fino in fondo
    } else {
      $('.card-scroll').css('margin-top','0'); //altrimenti risale
    }
  }
});
});
