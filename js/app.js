 M.AutoInit();

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });
 
 var options = {
  data: {
    "Java": Javascript,
    "Javascript": null,
    "CSS": null,
    "HTML": null,
    "NodeJS": null,
    "PHP": "logo-php.png"
  },
}
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.autocomplete');
  var instances = M.Autocomplete.init(elems, options);
});


  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
        