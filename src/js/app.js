// var $ = require('jquery');
var foundation = require('foundation');

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
