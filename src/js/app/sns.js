module.exports = {
  init: function() {
    this.fbWidget(document, 'script', 'facebook-jssdk');
    this.fbCount();
    this.fbOpen();
    this.haCount();
    this.haOpen();
    this.twOpen();
    this.pocketBtn(document,"pocket-btn-js");
  },
  // facebook
  fbWidget: function(d, s, id, url) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=504626236318429&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  },
  fbCount: function() {
    var url = 'http://graph.facebook.com/?id=' + encodeURIComponent(location.href);
    $.ajax({
      url: url,
      dataType: 'jsonp',
      success: function(json) {
        var count = json.shares ? json.shares: 0;
        $('#main').find('.count--fb').html(count);
      }
    });
  },
  fbOpen: function() {
    var $target = $('#main').find('.btnShare--fb');
    $target.on('click', function(event) {
      event.preventDefault();
      window.open($(this).attr('href'), 'facebook', 'width=670, height=400, menubar=no, toolbar=no, scrollbars=yes');
    });
  },
  // hatebu
  haCount: function() {
    var url = 'http://api.b.st-hatena.com/entry.count?url=' + encodeURIComponent(location.href);
    $.ajax({
      url: url,
      dataType: 'jsonp',
      success: function(json) {
        var count = json ? json : 0;
        $('#main').find('.count--ha').html(count);

        if(typeof(count) == 'undefined'){
          count = 0;
        }
      }
    });
  },
  haOpen: function() {
    var $target = $('#main').find('.btnShare--ha');
    $target.on('click', function(event) {
      event.preventDefault();
      window.open($(this).attr('href'), 'はてなブックマークブックマークレット', 'width=550, height=420, menubar=no, toolbar=no, scrollbars=yes');
    });
  },
  // twtter
  twOpen: function() {
    var $target = $('#main').find('.btnShare--tw');
    $target.on('click', function(event) {
      event.preventDefault();
      window.open($(this).attr('href'), 'Twitter でリンクを共有する', 'width=550, height=400, menubar=no, toolbar=no, scrollbars=yes');
    });
  },
  // pocket
  pocketBtn: function(d,i){
    if(!d.getElementById(i)){
      var j=d.createElement("script");
      j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";
      var w=d.getElementById(i);
      d.body.appendChild(j);
    }
  }
};
