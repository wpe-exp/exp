var foundation = require('foundation');
var sns = require('./app/sns.js');

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

    if(typeof sns !== 'undefined') {
      sns.init();
    }

  });
})(jQuery);
