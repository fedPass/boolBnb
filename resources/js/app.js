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
  if (st > 80) { //se la posizione di scorrimento Ã¨ maggiore a 80px
    $('.home-navbar').addClass('change-prop'); //cambio le proprietÃ  della navbar
    $('.info-room-navbar').slideDown();
    $('.logoBlue').slideDown(); //appare il logo blue
  } else { //altrimenti (se faccio scroll in alto)
    $('.logoBlue').hide(); //scompare il logo blue
    $('.home-navbar').removeClass('change-prop'); //rimetto le proprietÃ  della navbar come prima
    $('.info-room-navbar').slideUp();
  }
  prevTop = st; //la posizione iniziale sulla posizione corrente sulla pagina, diventa la posizione di scorrimento
  if ($(window).width() > 996) { //se le dimensioni del display sono inferiori a 996px
    if (st > 1000) { //se si fa scroll oltre i 900px
      $('.card-scroll').css('margin-top','700px'); //la card a lato scende fino in fondo
    } else {
      $('.card-scroll').css('margin-top','0'); //altrimenti risale
    }
  }
});

// -----FORM VALIDATION BOOTSTRAP-----------//
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
// -----FORM VALIDATION BOOTSTRAP END-----------//


var lat = 0;
var lon = 0;


  $("#search-dove").keyup(function () {
    $("#item-list").empty();
     if (($(this).val()).length >= 3) {
       autoComplete($(this).val());
     }
   }); // end keyup search


   $(document).on('click', "li.singleAddress" , function(){
      lat = $(this).attr('data-lat');
      lon = $(this).attr('data-lon');
      $("#search-dove").val($(this).text());
      $("#lat").val(lat);
      $("#lon").val(lon);
      $("#item-list").empty();
      console.log(lat);
      console.log(lon);
   }); // end item-list click

  //  var ospiti = 1;
  //  $("#exampleFormControlSelect1").change(function(){
  //   ospiti = $(this).val();
  //   console.log(opsiti);
  //   $('#ospiti').val(ospiti);
  // }); //end change select
  //


  $("#via").keyup(function () {
    $("#via-list").empty();
    console.log($(this).val());
     if (($(this).val()).length >= 2) {
       autoCompleteCreate($(this).val());
     }
   }); // end keyup search


   $(document).on('click', 'li.via-address', function(){
     lat = $(this).attr('data-lat-create');
     lon = $(this).attr('data-lon-create');
     $('#via').val($(this).text());
     $("#lat-create").val(lat);
     $("#lon-create").val(lon);
     $("#via-list").empty();
     console.log(lat);
     console.log(lon);
   }); // end autoCompleteCreate


   //cambio style al cambio Visibilità
   $('.custom-control.custom-switch').click(function(){
       // alert('ciao');
       if ($(this).find('input').checked) { //.is(':checked')
           $(this).parents('.card').find('.img-thumbnail').css('filter','grayscale(0) blur(0)');
           $(this).parents('.card').find('h5').css('color','#3490dc');
       } else {
           $(this).parents('.card').find('.img-thumbnail').css('filter','grayscale(1) blur(2px)');
           $(this).parents('.card').find('h5').css('color','black');
       }
   });


 // autoComplete function
  function autoComplete(query){

    $.ajax({
      url: "https://api.tomtom.com/search/2/geocode/" + query + ".json",
      method: "GET",
      data:{
        key: "begalCOpySZrKc5PeNb372wgWaNLv7oq",
        limit: "5"
      },
      success: function (data) {
            console.log(data)
            if (data.results.length !== 0){
                $("#item-list").empty();
              $("#item-list").append(
                '<ul class="" style="display:block; position:absolute;">'
              );
                for (var i = 0; i < data.results.length ; i++) {
                  $("#search ul").append("<li class='singleAddress' data-lat='" + data.results[i].position.lat + "' data-lon='" + data.results[i].position.lon + "'>" + data.results[i].address.freeformAddress + "</li>");
                }
              $("#item-list").append("</ul>");
            }
          },
          "error": function () {
            // alert("error"); //per il momento commentato per ovviare all'errore in fase di ricerca (da l'erore in console ma la ricerca la effettua comunque)
          } //end error
        }); //end ajax

      } // end function autoComplete

  function autoCompleteCreate(query){

    $.ajax({
      url: "https://api.tomtom.com/search/2/geocode/" + query + ".json",
      method: "GET",
      data:{
        key: "begalCOpySZrKc5PeNb372wgWaNLv7oq",
        limit: "5"
      },
      success: function (data) {
            console.log(data)
            if (data.results.length !== 0){
                $("#via-list").empty();
              $("#via-list").append(
                '<ul class="" style="display:block; position:absolute;">'
              );
                for (var i = 0; i < data.results.length ; i++) {
                  $("#create ul").append("<li class='via-address' data-lat-create='" + data.results[i].position.lat + "' data-lon-create='" + data.results[i].position.lon + "'>" + data.results[i].address.freeformAddress + "</li>");
                }
              $("#via-list").append("</ul>");
            }
          },
          "error": function () {
            // alert("error");
          } //end error
        }); //end ajax

      } // end function autoComplete



  }); // end DOM
