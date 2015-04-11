var foundation = require('foundation');

var facebook = require('./app/fb.js');
facebook(document, 'script', 'facebook-jssdk');

var pocket = require('./app/pocket.js');
pocket(document, 'pocket-btn-js');

var hatebu = require('./app/hatebu.js');
hatebu(document, 'hatebu-count');

var twitter = require('./app/tw.js');
twitter(document, 'tweet-count');

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
