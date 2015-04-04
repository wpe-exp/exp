var foundation = require('foundation');
var facebook = require('./app/fb.js');
facebook(document, 'script', 'facebook-jssdk');

(function($){
  $(document).ready(function(){

    if(typeof $.prototype.foundation === 'function') {
      $(document).foundation();
    }

    if(typeof hljs !== 'undefined') {
      hljs.initHighlightingOnLoad();
      $('#stylePost').find('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
      });
    }



  });
})(jQuery);
